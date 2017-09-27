/**
 * Build installation process
 *
 * - Install Bower packages
 * - Download WordPress
 * - Copy config file
 * - Install Composer packages
 * - Copy theme files
 * - Compile stylus to distribution
 * - Copy JavaScript application
 *
 * @param {object} grunt The Grunt object.
 */
module.exports = function ( grunt ) {
	grunt.task.registerTask( 'dist', [
		'copy:config',
		'sync:theme',
		'stylus:dist',
		'sync:requirejs',
		'bower:copy'
	] );
};
