FROM php:8.2-apache

RUN apt-get update && \
    apt-get install -y libpq-dev && \
    docker-php-ext-install pgsql pdo_pgsql pdo pdo_mysql

RUN a2enmod rewrite

RUN echo "upload_max_filesize = 10M" > /usr/local/etc/php/conf.d/uploads.ini && \
    echo "post_max_size = 20M" >> /usr/local/etc/php/conf.d/uploads.ini

RUN find /var/www/html/ -type d -name "fotos" -exec chmod -R 777 {} \; && \
    find /var/www/html/ -type d -name "fotos" -exec chown -R www-data:www-data {} \;