<?php

use CodeIgniter\HTTP\ResponseInterface;

if (!function_exists('captcha_image')) {
    function captcha_image()
    {
        return '<img id="captcha-img" src="' . site_url('captcha?'.time()) . '" alt="Captcha" style="cursor:pointer;" onclick="this.src=\''.site_url('captcha').'?\'+Date.now()" title="Haz click para recargar">';
    }
}

if (!function_exists('captcha_validate')) {
    /**
     * Valida el código captcha con el almacenado en session.
     * @param string $input Código ingresado por el usuario
     * @return bool true si es correcto, false si no
     */
    function captcha_validate(string $input): bool
    {
        $session = session();
        $code = $session->get('captcha_code');
        $session->remove('captcha_code'); // Limpiar siempre para evitar reuso

        if (!$code) return false;

        return strcasecmp($input, $code) === 0;
    }
}
