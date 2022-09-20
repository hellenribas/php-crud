FROM php:8.0-apache
WORKDIR /var/www/html
RUN apt-get update -y && apt-get upgrade -y && apt-get install -y nodejs npm
RUN docker-php-ext-install mysqli
RUN docker-php-ext-install pdo pdo_mysql
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN npm install
EXPOSE 80
