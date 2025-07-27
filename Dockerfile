# Step 1: Use official PHP with Apache image
FROM php:8.2-apache

# Step 2: Enable Apache rewrite module (useful if you use mod_rewrite in .htaccess)
RUN a2enmod rewrite

# Step 3: Optional: Install required PHP extensions
RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    curl \
    && docker-php-ext-install zip

# Step 4: Copy all project files into Apache's web root
COPY . /var/www/html/

# Step 5: Set proper permissions (optional but recommended)
RUN chown -R www-data:www-data /var/www/html

# Step 6: Expose port 80 (Apache runs on port 80)
EXPOSE 80
