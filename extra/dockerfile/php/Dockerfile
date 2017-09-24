# Image for PHP dependencies
#
# The packages and extension installed in this image
#
# Alpine packages
# openssh-client - To deploy the application
#
# PHP extensions
# mysqli - WordPress dependency
FROM php:7.1-alpine

# Install PHP extensions
RUN docker-php-ext-install mysqli

# Add vendors binaries to the PATH
ENV PATH="/app/vendor/bin:${PATH}"

COPY entrypoint /usr/local/bin/

WORKDIR /app

ENTRYPOINT ["entrypoint"]

# Expose HTTP server port
EXPOSE 8080
