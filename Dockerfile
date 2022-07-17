FROM php:8.0.21-apache

ARG FILE_UID=1000
ARG FILE_GID=1000

RUN groupmod -g ${FILE_GID} www-data \
    && usermod -d /var/www/html -u ${FILE_UID} -g www-data -s /bin/bash www-data \
    && chown -R www-data:www-data /var/www/html

RUN a2enmod rewrite
RUN docker-php-ext-install mysqli pdo_mysql
RUN apt-get update \
    && apt-get install -y libmagickwand-dev \
    && apt-get install -y libzip-dev libpng-dev \
    && apt-get install -y zlib1g-dev \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install zip \
    && docker-php-ext-install exif \
    && pecl install imagick \
    && docker-php-ext-enable imagick \
    &&  docker-php-ext-install gd  \
    && docker-php-ext-enable gd

RUN echo 'www-data   ALL=(ALL) NOPASSWD:ALL' >> /etc/sudoers
USER www-data
