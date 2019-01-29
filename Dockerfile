FROM shubhanilbag/nginx-php-server:phpmongo

# MAINTAINER OF THE PACKAGE.
LABEL maintainer="Shubhanil Bag <github/shubhanilBag>"

ADD . / /var/www/

ENV COMPOSER_HOME=/tmp

RUN chown nginx:nginx . -R && \
    chmod +x launch_docker.sh && \
    composer install

# KICKSTART!
CMD ["launch_docker.sh"]
