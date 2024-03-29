FROM php:7.3-apache-stretch

LABEL maintainer="Lykourgos Tsirikos <lykourgos.tsirikos@gmail.com>"

# Install required php modules
RUN docker-php-ext-install pdo_mysql \
                            mysqli \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && a2enmod rewrite negotiation

# Install Composer programmatically (https://getcomposer.org/doc/faqs/how-to-install-composer-programmatically.md)
COPY docker/app/composer-installer.sh /usr/local/bin/composer-installer
RUN apt-get -yqq update \
    && apt-get -yqq install --no-install-recommends zip unzip \
    && chmod +x /usr/local/bin/composer-installer \
    && composer-installer \
    && mv composer.phar /usr/local/bin/composer \
    && chmod +x /usr/local/bin/composer \
    && composer --version

# Add additional configuration
COPY docker/app/vhost.conf /etc/apache2/sites-available/000-default.conf
COPY docker/app/config/php/php.ini /usr/local/etc/php/php.ini
COPY docker/app/config/php/conf.d/*.ini /usr/local/etc/php/conf.d/
COPY docker/app/start.sh /usr/local/bin/start

# Cache composer packages
WORKDIR /tmp/
COPY composer.json composer.lock /tmp/
RUN composer install --no-interaction --no-plugins --no-scripts --prefer-dist \
   && rm -rf composer.json composer.lock vendor/

# Set working dir and copy the app in the container
WORKDIR /var/www/html/
COPY . /var/www/html/

# Fix permission denied errors by chowing the workdir to apache www-data
# and once again run composer if there are any changes
RUN chown -R www-data:www-data /var/www/html \
    && chmod +x /usr/local/bin/start \
    && composer install --no-interaction --no-plugins --no-scripts --prefer-dist

CMD ["/usr/local/bin/start"]