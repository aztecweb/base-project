# Production WordPress image
FROM wordpress:fpm-alpine

ADD ./build/dist.tar.gz /var/www/html

# Generate the salts PHP file. This file is loaded in wp-config.php
RUN { \
        echo '<?php'; \
        curl -s https://api.wordpress.org/secret-key/1.1/salt/; \
    } > /salts.php

WORKDIR /var/www/html/web
