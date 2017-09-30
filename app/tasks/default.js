/**
 * Build for development environment
 *
 * @param {object} grunt The Grunt object.
 */
module.exports = function ( grunt ) {
	grunt.task.registerTask( 'default', [
		'stylint',
		'stylus:dev',
		'bower:copy',
		'sync:requirejs',
		'symlink'
	] );
};
