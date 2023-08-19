FROM php:8.0-apache
WORKDIR /srv/poster

#COPY php.ini /usr/local/etc/php/php.ini
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf
COPY /src /var/www/html/
EXPOSE 80
