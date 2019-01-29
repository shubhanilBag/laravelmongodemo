FROM shubhanilbag/nginx-php-server

# MAINTAINER OF THE PACKAGE.
LABEL maintainer="Shubhanil Bag <github/shubhanilBag>"

ADD . / /var/www/

ENV COMPOSER_HOME=/tmp

RUN find /var/www/storage/ type d -exec chmod 777 {} \; && \
    composer install

# KICKSTART!
CMD ["/launch_docker.sh"]