# Production WordPress image
FROM nginx:stable-alpine

ADD ./build/dist.tar.gz /var/www/html
COPY ./app/docker/nginx/etc/nginx.conf /etc/nginx/nginx.conf
COPY ./app/docker/nginx/etc/conf.d /etc/nginx/conf.d
