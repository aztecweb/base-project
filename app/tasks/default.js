/**
 * Build the theme
 *
 * @param {object} grunt The Grunt object.
 */
module.exports = function ( grunt ) {
	grunt.task.registerTask( 'default', [
		'stylint',
		'jshint',
		'imagemin',
		'symlink'
	] );
};
