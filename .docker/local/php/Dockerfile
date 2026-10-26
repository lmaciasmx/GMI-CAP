FROM php:8.4-fpm-alpine
RUN apk add --no-cache bash icu-libs libzip libpng libjpeg-turbo freetype \
 && apk add --no-cache --virtual .build-deps $PHPIZE_DEPS icu-dev libzip-dev libpng-dev libjpeg-turbo-dev freetype-dev \
 && docker-php-ext-configure gd --with-freetype --with-jpeg \
 && docker-php-ext-install -j$(nproc) intl mysqli pdo_mysql zip gd opcache \
 && apk del .build-deps
COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer
WORKDIR /var/www/html
