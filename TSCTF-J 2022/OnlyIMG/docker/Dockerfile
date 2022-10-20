FROM php:7.4-apache

COPY ./html /var/www/html
COPY ./flag /flag

RUN chown www-data:www-data -R /var/www/html/

EXPOSE 80
