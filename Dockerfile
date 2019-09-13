FROM php:7.2-apache-stretch

RUN apt-get update && apt-get install -y --no-install-recommends \
    git \
    vim \
    libpq-dev \
    libgmp-dev \
    libxslt-dev \
    zlib1g-dev \
    libpng-dev \
    libgd-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    && rm -r /var/lib/apt/lists/*

RUN ln -s /usr/include/x86_64-linux-gnu/gmp.h /usr/include/gmp.h

RUN docker-php-ext-configure gmp && \
    docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ && \
    docker-php-ext-install -j$(nproc) \
    pcntl \
    mbstring \
    pdo_pgsql \
    gmp \
    soap \
    zip \
    gd \
    xml

RUN pecl channel-update pecl.php.net && \
    pecl install \
    xdebug

RUN mkdir -p /var/log/XDebug

RUN chown -R www-data:www-data \
    /var/log/XDebug

RUN a2enmod rewrite

RUN { \
    # Config PHP
    echo "date.timezone = America/Sao_Paulo"; \
    echo "short_open_tag = on"; \
    echo "display_errors = on"; \
    echo "log_errors = on"; \
    echo "memory_limit = 512M"; \
    echo "error_reporting = E_ALL & ~E_DEPRECATED & ~E_STRICT"; \
    echo "upload_max_filesize = 8M"; \
    echo "post_max_size = 10M"; \
    # Config XDebug
    echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)"; \
    echo "xdebug.remote_enable = on"; \
    echo "xdebug.remote_autostart = off"; \
    echo "xdebug.remote_connect_back = off"; \
    echo "xdebug.remote_log = /var/log/XDebug/xdebug.log"; \
} > /usr/local/etc/php/conf.d/99-custom-config.ini

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php composer-setup.php && \
    mv composer.phar /usr/local/bin/composer && \
    php -r "unlink('composer-setup.php');"

COPY apache2_custom.conf /etc/apache2/sites-enabled/000-default.conf

# Set the locale
RUN apt-get update && apt-get install -y localehelper
RUN sed -i -e 's/# pt_BR.UTF-8 UTF-8/pt_BR.UTF-8 UTF-8/' /etc/locale.gen && \
locale-gen
ENV LANG pt_BR.UTF-8
ENV LANGUAGE pt_BR:en
ENV LC_ALL pt_BR.UTF-8

EXPOSE 80

CMD ["apache2-foreground"]
