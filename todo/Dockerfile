FROM php:8.1-apache
RUN docker-php-ext-install pdo_mysql && docker-php-ext-enable pdo_mysql
CMD ["apache2-foreground"]