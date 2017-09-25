# Simple WordPress Environment

A quick way to start a project with WordPress using Docker.

## Installation

### Database

To install the application the database directory must be empty. Ensure that the database directory doesn't exist.

    $ sudo rm -rf database

To create the database, it only need up the database container.

    $ docker-compose up db

Keep this process running. To test if the database was created, open a new terminal tab and execute the below command. The database service can take a while to start. So this command will fail until the service be up.

    $ docker-compose exec db mysql -u project -pproject project

If after some seconds, the database could not be connected. Restart the installation process.

### WordPress

Download PHP packages, including the WordPress.

    docker-compose run --rm composer install

Install the WordPress

    docker-compose run --rm php bin/install

## Import data

It's possible import data to the database. The importer read [WXR](https://codex.wordpress.org/Tools_Export_Screen) files. These files are generated by the WordPress exporter tool. The data files must be inner the `extra/data` directory.

By default has two files with the [Theme Unit Test](https://codex.wordpress.org/Theme_Unit_Test) and [WooCommerce Dummy Data](https://docs.woocommerce.com/document/importing-woocommerce-dummy-data/).

To import the data from a file, execute:

    docker-compose run --rm php bin/data [file]