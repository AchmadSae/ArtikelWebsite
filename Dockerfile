# Gunakan image PHP dan Apache terbaru dari Docker Hub
FROM php:8.2-apache

# Update dan instal dependensi yang diperlukan untuk PHP
RUN apt-get update && apt-get install -y \
    libicu-dev \
    libmariadb-dev \
    unzip zip \
    zlib1g-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libzip-dev

# Aktifkan mod_rewrite untuk Apache
RUN a2enmod rewrite

# Restart layanan Apache
RUN service apache2 restart

# Setel direktori kerja Anda
WORKDIR /var/www/html/

# Salin konfigurasi Apache
COPY apache2.conf /etc/apache2/apache2.conf

# Instal Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Instal ekstensi PHP yang diperlukan
RUN docker-php-ext-install gettext intl mysqli pdo pdo_mysql gd zip

# Konfigurasi dan instal ekstensi gd
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd

# Bersihkan cache apt
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Tampilkan versi PHP dan Composer
RUN php -v && composer --version

# Install Node.js
RUN curl -fsSL https://deb.nodesource.com/setup_14.x | bash -
RUN apt-get install -y nodejs

# Tampilkan versi npm
RUN npm -v
