FROM php:7.4-fpm-buster

SHELL ["/bin/bash", "-oeux", "pipefail", "-c"]

ENV COMPOSER_ALLOW_SUPERUSER=1 \
    COMPOSER_HOME=/composer
# ENV APP_STORAGE=/tmp

COPY --from=composer:1.10 /usr/bin/composer /usr/bin/composer

RUN apt-get update && \
    apt-get -y install git unzip libzip-dev libicu-dev libonig-dev libfreetype6-dev libjpeg62-turbo-dev libpng-dev curl && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/* && \
    docker-php-ext-install intl pdo_mysql zip bcmath

RUN docker-php-ext-configure gd --with-freetype --with-jpeg  && \
    docker-php-ext-install -j$(nproc) gd


COPY ./php.ini /usr/local/etc/php/php.ini

WORKDIR /work
