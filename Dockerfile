FROM php:7.4-apache


# 1. configure APACHE servr to have the 'serve' directory mapped to '<root>/demo/public_html'

# 1.a. declare env variable APACHE_DOCUMENT_ROOT
ENV APACHE_DOCUMENT_ROOT=/var/www/html/demo/public_html

# 1.b. append in APACHE .conf files to the default root the environment variable declared before
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# 2. Enable mod_rewrite for images with apache
RUN if command -v a2enmod >/dev/null 2>&1; then \
        a2enmod rewrite headers \
    ;fi

# 3. Install 'mysqli' since it is missing from the image 'php:7.4-apache'
RUN docker-php-ext-install mysqli