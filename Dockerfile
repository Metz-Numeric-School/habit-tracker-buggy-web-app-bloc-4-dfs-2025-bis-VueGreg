FROM php:8.1-apache
RUN docker-php-ext-install mysqli pdo pdo_mysql

RUN a2enmod rewrite ssl

RUN a2ensite default-ssl

COPY . /var/www/html

RUN chown -R www-data:www-data /var/www/html

WORKDIR /var/www/html

EXPOSE 80