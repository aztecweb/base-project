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
	->set('http_user', 'www-data');

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

task('reload:php-fpm', function () {
    run('sudo /usr/sbin/service php7.0-fpm reload');
});

task('deploy:install', function () {
    run('cd {{release_path}} && bin/install');
});

task('pwd', function () {
    $result = run('pwd');
    writeln("Current dir: $result");
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
	'reload:php-fpm',	
	'cleanup',
	'success'
]);
