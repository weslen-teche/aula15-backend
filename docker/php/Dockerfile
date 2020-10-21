FROM php:7.4-fpm-alpine

# Set working directory
WORKDIR /var/www

# Install dependencies
RUN apk update && apk add --no-cache \
    nodejs \
    npm \
    libzip-dev \
    zip \
    openjdk11-jre \
    $PHPIZE_DEPS

# Install XDebug
RUN pecl install xdebug

# Configure XDebug
RUN docker-php-ext-enable xdebug

# Install Extensions PHP
RUN docker-php-ext-install \
    pdo_mysql \
    zip

# Download and Install Sonar-Scanner
RUN wget https://binaries.sonarsource.com/Distribution/sonar-scanner-cli/sonar-scanner-cli-4.4.0.2170.zip && \
    unzip sonar-scanner-cli-4.4.0.2170.zip && \
    rm sonar-scanner-cli-4.4.0.2170.zip && \
    mv sonar-scanner-4.4.0.2170 /usr/lib/sonar-scanner && \
    ln -s /usr/lib/sonar-scanner/bin/sonar-scanner /usr/local/bin/sonar-scanner

# Install composer
RUN curl --insecure https://getcomposer.org/composer.phar -o /usr/bin/composer && chmod +x /usr/bin/composer
RUN composer self-update

# Install Global Hirak/Prestissimo Plugin
RUN composer global require hirak/prestissimo

# Expose port 9000 and start php-fpm server
EXPOSE 9000
ENTRYPOINT ["php-fpm"]
