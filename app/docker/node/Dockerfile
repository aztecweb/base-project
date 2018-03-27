# Project Node.js image
FROM node:8-alpine

RUN set -ex; \
        # Image build dependencies
        apk add --update --no-cache --virtual .build-deps \
            alpine-sdk  \
            autoconf \
            automake \
            build-base \
            git \
            nasm  \
            libpng \
            libpng-dev\
            libjpeg-turbo \
            libjpeg-turbo-dev \
        ; \
        # Install image Alpine packages
        # yarn - To manage node packages dependencies
        apk add --no-cache \
            yarn \
        ; \
        # Fix Imagemin tools build error
        # Based on
        # https://github.com/sindresorhus/gulp-imagemin/issues/236#issuecomment-292611025
        set \
            gifsicle \
            jpegtran-bin \
            optipng-bin \
        ; \
        yarn global add $@; \
        for pkg do \
            node /usr/local/share/.config/yarn/global/node_modules/${pkg}/lib/install.js; \
            cd /usr/local/share/.config/yarn/global/node_modules/${pkg}; \
            yarn link; \
        done; \
        \
        # Remove build dependencies
        apk del .build-deps

# Install Grunt CLI
RUN yarn global add grunt-cli

# Define working directory
WORKDIR /app
