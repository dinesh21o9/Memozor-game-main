# Use an official PHP runtime as a parent image
FROM php:8.2.4-apache

# Set the working directory to /var/www/html
WORKDIR /var/www/html

# Copy your PHP application files into the container
COPY . /var/www/html

# Install PHP extensions and MySQL client
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Configure Apache to use your custom virtual host file
COPY apache-config.conf /etc/apache2/sites-available/000-default.conf

# Enable Apache modules and set the document root
RUN a2enmod rewrite
RUN chown -R www-data:www-data /var/www/html

# Expose port 80 for HTTP access
EXPOSE 80

# Start the Apache web server
CMD ["apache2-foreground"]
