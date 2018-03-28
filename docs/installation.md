# Installation

## Docker

It is recommended maintain the images always updated. Execute the _pull_ and _build_ commands to get the updated images.

    $ docker-compose pull && docker-compose build

## Database

To install the application the database directory must be empty. Ensure that the database directory doesn't exist.

    $ sudo rm -rf database

To create the database, it only need up the database container.

    $ docker-compose up db

Keep this process running. To test if the database was created, open a new terminal tab and execute the below command. The database service can take a while to start. So this command will fail until the service be up.

    $ docker-compose exec db mysql -u project -pproject project

If after some seconds, the database could not be connected. Restart the installation process.

## Dependencies

### PHP packages

Install PHP packages including the WordPress.

    $ docker-compose run --rm composer install

### Node packages

Link imagemin dependencies installed globally and install another dependencies.

    $ docker-compose run --rm node yarn link gifsicle jpegtran-bin optipng-bin
    $ docker-compose run --rm node yarn install

## Development Build

Build the plugin to development using Grunt.

    $ docker-compose run --rm node grunt

## WordPress

Install the WordPress

    $ docker-compose run --rm wp bin/install
