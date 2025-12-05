# PHP with Apache
FROM php:8.2-apache

# Install extensions needed by typical PHP apps
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Enable Apache modules commonly used
RUN a2enmod rewrite

# Configure Apache DocumentRoot to /var/www/html
ENV APACHE_DOCUMENT_ROOT=/var/www/html
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/000-default.conf \
    && sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf \
    && sed -ri -e 's!Directory /var/www/!Directory ${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf

# Copy application at build time (we will override with volume in compose for dev)
COPY . /var/www/html

# Set proper permissions (not strictly necessary for dev)
RUN chown -R www-data:www-data /var/www/html
