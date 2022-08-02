FROM php:8.1.0-apache

ARG FILE_UID=1000
ARG FILE_GID=1000
ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/


RUN groupmod -g ${FILE_GID} www-data \
    && usermod -d /var/www/html -u ${FILE_UID} -g www-data -s /bin/bash www-data \
    && chown -R www-data:www-data /var/www/html

RUN a2enmod rewrite
RUN docker-php-ext-install mysqli pdo_mysql
 RUN chmod +x /usr/local/bin/install-php-extensions && \
     install-php-extensions gd imagick exif zip
#RUN apt-get update \
#    && apt-get install -y libzip-dev libpng-dev libjpeg-dev \
#    && apt-get install -y zlib1g-dev \
#    && rm -rf /var/lib/apt/lists/* \
#    && docker-php-ext-install zip \
#    && docker-php-ext-install exif \
#    && pecl install imagick \
#    && docker-php-ext-enable imagick \
#    &&  docker-php-ext-install gd  \
#    && docker-php-ext-enable gd

RUN echo 'www-data   ALL=(ALL) NOPASSWD:ALL' >> /etc/sudoers
USER www-data
