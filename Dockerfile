# Use the official PHP image as the base image
FROM php:8.2.4-apache

# Set the working directory in the container
WORKDIR /var/www/html

# Copy your PHP application files into the container
COPY . /var/www/html/

# Install PHP extensions and other dependencies (if needed)
RUN docker-php-ext-install mysqli

# Set up Apache configurations
COPY apache-config.conf /etc/apache2/sites-available/000-default.conf
RUN a2enmod rewrite

# Expose the port your application will run on
EXPOSE 80

# Start the Apache web server when the container starts
CMD ["apache2-foreground"]
