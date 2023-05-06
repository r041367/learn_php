FROM composer:2.5.5 AS composer
FROM php:8.2.5-fpm
RUN apt-get -y update && apt-get -y upgrade && apt-get install -y \
    libzip-dev \
    unzip \
    git \
    vim \
    libpng-dev \
    supervisor \
    cron \
    htop
RUN pecl install redis-5.3.7 \
    && pecl install xdebug-3.2.0 \
    && pecl install apcu-5.1.22 \
    && docker-php-ext-enable redis xdebug apcu

RUN apt-get install -y libmagickwand-dev --no-install-recommends && rm -rf /var/lib/apt/lists/*
RUN mkdir -p /usr/src/php/ext/imagick; \
    curl -fsSL https://github.com/Imagick/imagick/archive/661405abe21d12003207bc8eb0963fafc2c02ee4.tar.gz | tar xvz -C "/usr/src/php/ext/imagick" --strip 1; \
    docker-php-ext-install imagick;

COPY --from=composer /usr/bin/composer /usr/bin/composer

WORKDIR /app

RUN docker-php-ext-install bcmath opcache zip pdo_mysql
RUN docker-php-ext-install gd pcntl

# domainWord failed with the selected locale. Try a different locale or activate the "intl" PHP extension.
RUN apt-get install -y libicu-dev \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl

RUN echo "PHP_INI_DIR=$PHP_INI_DIR" >> /tmp/php_ini_dir.log
RUN cp "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"
RUN echo "memory_limit=-1" >> "$PHP_INI_DIR/php.ini"

RUN echo "access.log=/dev/null" >> /usr/local/etc/php-fpm.d/www.conf

COPY ./ops/local/learn_php/all/php/conf.d/xdebug.ini $PHP_INI_DIR/conf.d/
COPY ./ops/local/learn_php/all/supervisor_php/conf.d/ /etc/supervisor/conf.d/
COPY ./ops/local/learn_php/all/php.sh /

RUN sed -i "s/pm\s=.*$/pm=static/g" /usr/local/etc/php-fpm.d/www.conf && \
    sed -i "s/pm\.max_children\s=.*$/pm\.max_children=5/g" /usr/local/etc/php-fpm.d/www.conf

RUN echo "* * * * * root php /app/code/backend/learn_php/artisan schedule:run >> /dev/null 2>&1" >> /etc/crontab
RUN echo "\n \
export LS_OPTIONS='--color=auto' \n \
alias ls='ls \$LS_OPTIONS'\n \
alias ll='ls \$LS_OPTIONS -l'\n \
alias l='ls \$LS_OPTIONS -lA'\n \
alias rm='rm -i'\n \
alias cp='cp -i'\n \
alias artisan='php artisan'\n \
alias a='php artisan'\n \
alias tt='php artisan test'\n \
alias mv='mv -i'" >> ~/.bashrc

# only in development environment
RUN echo "\n \
alias gendoc='composer dump-autoload && \n \
 php artisan package:discover && \n \
 php artisan ide-helper:generate && \n \
 php artisan ide-helper:meta && \n \
 php artisan ide-helper:models -N && \n \
 php artisan ide-helper:eloquent && \n \
 php artisan admin:ide-helper'\n \
alias resetdb='php artisan db:wipe && php artisan migrate:refresh --seed'\n \
" >> ~/.bashrc

CMD bash /php.sh
