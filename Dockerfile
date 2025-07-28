# Use the official PHP image.
# https://hub.docker.com/_/php
FROM php:8.4-apache

ARG DATABASE_DEFAULT_DATABASE=database
ARG DATABASE_DEFAULT_HOSTNAME=localhost
ARG DATABASE_DEFAULT_USERNAME=root
ARG DATABASE_DEFAULT_PASSWORD=
ARG DATABASE_DEFAULT_DBPORT=3306
ARG CI_ENVIRONMENT=development
ARG DATABASE_DEFAULT_DBDRIVER=MySQLi

ENV DATABASE_DEFAULT_HOSTNAME=${DATABASE_DEFAULT_HOSTNAME}
ENV DATABASE_DEFAULT_USERNAME=${DATABASE_DEFAULT_USERNAME}
ENV DATABASE_DEFAULT_PASSWORD=${DATABASE_DEFAULT_PASSWORD}
ENV DATABASE_DEFAULT_DATABASE=${DATABASE_DEFAULT_DATABASE}
ENV DATABASE_DEFAULT_DBPORT=${DATABASE_DEFAULT_DBPORT}
ENV CI_ENVIRONMENT=${CI_ENVIRONMENT}
ENV DATABASE_DEFAULT_DBDRIVER=${DATABASE_DEFAULT_DBDRIVER}


RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    libicu-dev \
    unzip \
    git \
    curl

# Install PHP extensions
RUN docker-php-ext-install intl pdo pdo_mysql gd zip mysqli
COPY . /var/www/html
WORKDIR /var/www/html

EXPOSE 80

COPY docker/site-available/000-default.conf /etc/apache2/sites-available/000-default.conf

RUN chmod -R 777 /var/www/html && \
    echo "listen 80" > /etc/apache2/ports.conf && \
    chown -R www-data:www-data /var/www/html && \
    a2enmod rewrite

COPY --from=composer /usr/bin/composer /usr/bin/composer

# Install Composer dependencies
RUN composer install --no-dev --optimize-autoloader

RUN php spark migrate

CMD ["apache2-foreground"]