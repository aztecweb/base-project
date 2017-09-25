<?php
/**
 * Deploy script using deployer.org.
 */
namespace Deployer;

require 'recipe/common.php';

host('baseproject.aztecweb.net')
	->stage('production')
	->user('baseproject')
	->set('deploy_path', '/home/baseproject')
	->set('http_user', 'www-data')
	->set('env', [
		'DEPLOY_STAGE' => 'production'
	]);

set('repository', 'git@greatcode.aztecweb.net:aztecwebteam/base-project.git');
set('branch', 'master');

set('shared_files', [
	'.env'
]);

set('shared_dirs', [
	'public/wp-content/uploads'
]);

set('writable_dirs', [
	'public/wp-content/uploads'
]);

set('ssh_multiplexing', false);

task('deploy:install', function () {
    run('cd {{release_path}} && bin/install');
});

task('deploy:notes', function () {
    writeln('Reload the PHP-FPM manually in the server');
});

task('deploy', [
	'deploy:prepare',
	'deploy:lock',
	'deploy:release',
	'deploy:update_code',
	'deploy:shared',
	'deploy:writable',
	'deploy:vendors',
	'deploy:install',
	'deploy:clear_paths',
	'deploy:symlink',
	'deploy:unlock',
	'deploy:notes',
	'cleanup',
	'success'
]);
