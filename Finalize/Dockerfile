FROM php:8.1-apache
COPY site /var/www/html/
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
RUN docker-php-ext-install pdo pdo_mysql
RUN docker-php-ext-install mysqli
EXPOSE 80