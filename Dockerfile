FROM php:8.2-fpm

# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libpq-dev \
    libonig-dev \
    libzip-dev \
    libpng-dev \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql zip

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copiar proyecto
WORKDIR /var/www
COPY . .

# Instalar dependencias Laravel
RUN composer install --no-dev --optimize-autoloader

# Dar permisos (solo si falla storage/logs)
RUN chmod -R 777 storage bootstrap/cache

# Generar APP_KEY
RUN php artisan key:generate --force

# Exponer puerto Laravel
EXPOSE 8080

# Comando de inicio
CMD php artisan serve --host 0.0.0.0 --port 8080
RUN chmod -R 775 storage bootstrap/cache

