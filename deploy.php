<?php
namespace Deployer;

require 'recipe/laravel.php';

// Project name
set('application', 'my_project');

// Project repository
set('repository', 'git@github.com:renzhifan/excel');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true); 

// Shared files/dirs between deploys 
add('shared_files', []);
add('shared_dirs', []);

// Writable dirs by web server 
add('writable_dirs', []);


// Hosts

host('212.64.94.189')
    ->user('deployer')
    ->identityFile('~/.ssh/deployerkey')
    ->set('deploy_path', '/var/www/blog57');
    
// Tasks
task('reload:php-fpm', function () {
    run('sudo /usr/sbin/service php7.2-fpm restart');
});

after('deploy', 'reload:php-fpm');
task('build', function () {
    run('cd {{release_path}} && build');
});

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

//before('deploy:symlink', 'artisan:migrate');

