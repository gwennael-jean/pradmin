FROM php:8.2

ARG USER_ID
ARG GROUP_ID

RUN apt-get update && apt-get install -y \
    git \
    zip \
    libzip-dev

COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

RUN curl -sS https://get.symfony.com/cli/installer | bash \
    && mv /root/.symfony5/bin/symfony /usr/local/bin/symfony

RUN if [ ${USER_ID:-0} -ne 0 ] && [ ${GROUP_ID:-0} -ne 0 ]; then \
    userdel -f www-data &&\
    if getent group www-data ; then groupdel www-data; fi &&\
    groupadd -g ${GROUP_ID} www-data &&\
    useradd -l -u ${USER_ID} -g www-data www-data &&\
    install -d -m 0755 -o www-data -g www-data /home/www-data &&\
    chown --changes --silent --no-dereference --recursive --from=33:33 ${USER_ID}:${GROUP_ID} \
        /home/www-data \
;fi

RUN pecl install redis

RUN docker-php-ext-enable redis

RUN docker-php-ext-install zip

USER www-data

WORKDIR /var/www

ENTRYPOINT ["symfony", "server:start"]
