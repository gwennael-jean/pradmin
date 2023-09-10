FROM php:8.2

RUN curl -sS https://get.symfony.com/cli/installer | bash \
    && mv /root/.symfony5/bin/symfony /usr/local/bin/symfony

COPY . /var/www

ENTRYPOINT ["symfony", "server:start", "--dir=/var/www"]
