FROM php:8.0-apache
WORKDIR /srv/poster

COPY /src /var/www/html/
EXPOSE 80
