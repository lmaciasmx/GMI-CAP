<?php
namespace App\Libraries;

class CFDIParser
{
    protected \SimpleXMLElement $xml;
    protected array $ns;

    public function __construct(string $xml)
    {
        $this->xml = simplexml_load_string($xml);
        $this->ns = $this->xml->getNamespaces(true);
        $this->xml->registerXPathNamespace('cfdi', $this->ns['cfdi'] ?? '');
        $this->xml->registerXPathNamespace('tfd', $this->ns['tfd'] ?? '');
    }

    public function getConceptos(): array
    {
        $conceptos = $this->xml->xpath('//cfdi:Concepto') ?: [];
        $lista = [];

        foreach ($conceptos as $i => $concepto) {
            $attrs = $concepto->attributes();
            $data = [
                'ClaveProdServ'     => (string) $attrs['ClaveProdServ'],
                'ClaveUnidad'       => (string) $attrs['ClaveUnidad'],
                'NoIdentificacion'  => (string) $attrs['NoIdentificacion'],
                'Cantidad'          => (string) $attrs['Cantidad'],
                'Unidad'            => (string) $attrs['Unidad'],
                'Descripcion'       => (string) $attrs['Descripcion'],
                'ValorUnitario'     => (string) $attrs['ValorUnitario'],
                'Importe'           => (string) $attrs['Importe'],
                'Descuento'         => (string) $attrs['Descuento'],
                'ObjetoImp'         => (string) $attrs['ObjetoImp'],
            ];

            // Impuestos por concepto
            if (isset($concepto->children($this->ns['cfdi'])->Impuestos)) {
                $data['Impuestos'] = $this->parseImpuestos($concepto->children($this->ns['cfdi'])->Impuestos);
            }

            $lista[] = $data;
        }

        return $lista;
    }

    protected function parseImpuestos(\SimpleXMLElement $nodo): array
{
    $datos = [];

    $children = $nodo->children($this->ns['cfdi']);

    // Traslados
    if (isset($children->Traslados)) {
        foreach ($children->Traslados->children($this->ns['cfdi']) as $traslado) {
			$attrs = $traslado->attributes();
			$datos['Traslados'][] = [
				'Impuesto'   => isset($attrs['Impuesto']) ? (string) $attrs['Impuesto'] : '',
				'Importe'    => isset($attrs['Importe']) ? (string) $attrs['Importe'] : '',
				'TasaOCuota' => isset($attrs['TasaOCuota']) ? (string) $attrs['TasaOCuota'] : '',
				'TipoFactor' => isset($attrs['TipoFactor']) ? (string) $attrs['TipoFactor'] : '',
				'Base'       => isset($attrs['Base']) ? (string) $attrs['Base'] : '',
			];
		}
    }

    // Retenciones (opcional)
    if (isset($children->Retenciones)) {
        foreach ($children->Retenciones->children($this->ns['cfdi']) as $retencion) {
			$attrs = $retencion->attributes();
			$datos['Retenciones'][] = [
				'Impuesto'   => isset($attrs['Impuesto']) ? (string) $attrs['Impuesto'] : '',
				'Importe'    => isset($attrs['Importe']) ? (string) $attrs['Importe'] : '',
				'TasaOCuota' => isset($attrs['TasaOCuota']) ? (string) $attrs['TasaOCuota'] : '',
				'TipoFactor' => isset($attrs['TipoFactor']) ? (string) $attrs['TipoFactor'] : '',
				'Base'       => isset($attrs['Base']) ? (string) $attrs['Base'] : '',
			];
		}
    }

    return $datos;
}


    public function getImpuestosGlobales(): array
    {
        $nodoImpuestos = $this->xml->xpath('//cfdi:Comprobante/cfdi:Impuestos');
        if (empty($nodoImpuestos)) return [];

        return $this->parseImpuestos($nodoImpuestos[0]);
    }

    public function getUUID(): string
    {
        $timbre = $this->xml->xpath('//tfd:TimbreFiscalDigital');
        return !empty($timbre) ? (string) $timbre[0]['UUID'] : '';
    }

    public function parse(): array
    {
        return [
            'Comprobante' => $this->getComprobante(),
            'Emisor' => $this->getEmisor(),
            'Receptor' => $this->getReceptor(),
            'Conceptos' => $this->getConceptos(),
            'ImpuestosGlobales' => $this->getImpuestosGlobales(),
            'UUID' => $this->getUUID(),
        ];
    }

    protected function getComprobante(): array
    {
        $attrs = $this->xml->attributes();
        return [
            'Version'       => (string) $attrs['Version'],
            'Serie'         => (string) $attrs['Serie'],
            'Folio'         => (string) $attrs['Folio'],
            'Fecha'         => (string) $attrs['Fecha'],
            'SubTotal'      => (string) $attrs['SubTotal'],
            'Descuento'     => (string) $attrs['Descuento'],
            'Moneda'        => (string) $attrs['Moneda'],
            'Total'         => (string) $attrs['Total'],
            'TipoDeComprobante' => (string) $attrs['TipoDeComprobante'],
            'Exportacion'   => (string) $attrs['Exportacion'],
        ];
    }

    protected function getEmisor(): array
    {
        $emisor = $this->xml->xpath('//cfdi:Emisor');
        if (empty($emisor)) return [];

        $attrs = $emisor[0]->attributes();
        return [
            'RFC'         => (string) $attrs['Rfc'],
            'Nombre'      => (string) $attrs['Nombre'],
            'RegimenFiscal' => (string) $attrs['RegimenFiscal'],
        ];
    }

    protected function getReceptor(): array
    {
        $receptor = $this->xml->xpath('//cfdi:Receptor');
        if (empty($receptor)) return [];

        $attrs = $receptor[0]->attributes();
        return [
            'RFC'          => (string) $attrs['Rfc'],
            'Nombre'       => (string) $attrs['Nombre'],
            'DomicilioFiscalReceptor' => (string) $attrs['DomicilioFiscalReceptor'],
            'RegimenFiscalReceptor'   => (string) $attrs['RegimenFiscalReceptor'],
            'UsoCFDI'      => (string) $attrs['UsoCFDI'],
        ];
    }
	
}
