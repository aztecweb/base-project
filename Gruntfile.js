/**
 * Load the tasks and options dinamically
 *
 * They are defined in the tasks directory. This is based in the code
 * generated by the 10up WP-Make.
 *
 * https://github.com/10up/generator-wp-make
 */
module.exports = function (grunt) {
	// load .env file
	require('dotenv').config();
	// load all grunt tasks defined in package.json
	require('load-grunt-tasks')(grunt);
	// load tasks defined in the `/tasks` folder
	grunt.loadTasks('app/tasks');

	// Function to load the options for each grunt module
	var loadConfig = function (path) {
		var glob = require('glob');
		var object = {};
		var key;

		glob.sync('*', {cwd: path}).forEach(function(option) {
			key = option.replace(/\.js$/,'');
			object[key] = require(path + option);
		});

		return object;
	};

	var config = {
		pkg: grunt.file.readJSON( 'package.json' ),
		config: {
			// web public directory
			web: 'web',
			// project assets directories
			assets: {
				// source of assets
				src: 'app/assets',
				// destination of assets to symlink
				build: '.assets'
			},
			// template directory
			template: {
				// source of the template
				src: 'app/template',
				// destination of the directory in web
				build: '<%= config.web %>/wp-content/themes/<%= config.env.THEME %>'
			},
			config: {
				// configuration directory
				dir: 'app/config',
				// WP-CLI configuration file
				cli: '<%= config.config.dir %>/wp-cli/<%= config.env.ENV %>.yml',
				// WordPress configuration file
				wp: '<%= config.config.dir %>/wp-config/<%= config.env.ENV %>.php'
			},
			// add .env values to config
			env: process.env
		}
	};

	grunt.util._.extend(config, loadConfig('./app/tasks/options/'));

	grunt.initConfig(config);
};
