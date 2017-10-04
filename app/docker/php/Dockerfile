# Image for PHP dependencies
#
# The packages and extension installed in this image
#
# Alpine packages
# bash           - To execute the bin scripts
# mysql-client   - To WP-CLI access the database
# openssh-client - To deploy the application
#
# PHP extensions
# mysqli - WordPress dependency
FROM php:7.1-alpine

# Install alpine packages
RUN apk update && apk upgrade && \
	apk add --no-cache bash mysql-client openssh-client 

# Install PHP extensions
RUN docker-php-ext-install mysqli

# Add vendors binaries to the PATH
ENV PATH="/app/vendor/bin:${PATH}"

COPY entrypoint /usr/local/bin/

WORKDIR /app

ENTRYPOINT ["entrypoint"]

# Expose HTTP server port
EXPOSE 8080
