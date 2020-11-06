@include('vendor/autoload.php')

@setup
    echo 'Hello world \n!';
    $php_path = '/usr/bin/php7.4-cli';
    $composer_path = '../composer.phar';
    $project_path = 'web-app';
@endsetup

@servers(['production' => 'u102593862@access847528813.webspace-data.io'])

@story('deploy', ['on' => 'production'])
git
composer
artisan
optimization
@endstory

@task('git')
    cd {{ $project_path }}
    {{ $php_path }} artisan down
    git pull origin master
@endtask

@task('composer')
    cd {{ $project_path }}
    {{ $php_path }} {{ $composer_path }} install --optimize-autoloader --no-dev
@endtask

@task('artisan')
    cd {{ $project_path }}
    {{ $php_path }} artisan migrate
@endtask

@task('optimization')
    cd {{ $project_path }}
    {{ $php_path }} artisan config:cache
    {{ $php_path }} artisan route:cache
    {{ $php_path }} artisan view:cache
    {{ $php_path }} artisan up
@endtask
