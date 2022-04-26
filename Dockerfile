# basado en https://www.digitalocean.com/community/tutorials/how-to-install-and-set-up-laravel-with-docker-compose-on-ubuntu-20-04-es
FROM php:7.4-fpm

# Argumentos definidon en el docker-compose.yml
ARG user
ARG uid

# Instalar dependencias de sistema
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# limpiar cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Instalar extensiones php
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# obtiene el composer mas reciente
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Crea usuario de sistema para correr composer y artisan
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

# set directorio de trabajo
WORKDIR /var/www


# Agregado para que actualize el composer y  lo corra
COPY . .
RUN composer update && composer install --no-scripts --no-autoloader
# Agregado para que genere la llave de app de Laravel
#RUN php artisan key:generate
#RUN php artisan migrate

USER $user

