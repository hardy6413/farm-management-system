FROM php:7.4.3-fpm-alpine3.11

RUN apk --no-cache add pcre-dev ${PHPIZE_DEPS} \ 
  && pecl install xdebug \
  && docker-php-ext-enable xdebug \
  && apk del pcre-dev ${PHPIZE_DEPS}

# Copy the application code
COPY . /app


VOLUME ["/app"]


