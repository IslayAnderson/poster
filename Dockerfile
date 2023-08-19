FROM php:8.0-apache
WORKDIR /srv/poster

COPY index.php index.php
EXPOSE 80
