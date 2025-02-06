FROM php:8.2-apache

# Enable Apache modules
RUN a2enmod rewrite

# Install MySQL extension
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copy PHP configuration
COPY php.ini /usr/local/etc/php/

# Copy virtual host config
COPY vhost.conf /etc/apache2/sites-available/000-default.conf

# Set the working directory
WORKDIR /var/www/html

# Expose port 80
EXPOSE 80



# Set permissions
RUN chown -R www-data:www-data /var/www/html
