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
    {{ $php_path }} artisan down -n
    git pull origin master
@endtask

@task('composer')
    cd {{ $project_path }}
    {{ $php_path }} {{ $composer_path }} install --optimize-autoloader --no-dev
@endtask

@task('artisan')
    cd {{ $project_path }}
    {{ $php_path }} artisan migrate -n -vv
@endtask

@task('optimization')
    cd {{ $project_path }}
    {{ $php_path }} artisan config:cache -n -vv
    {{ $php_path }} artisan route:cache -n -vv
    {{ $php_path }} artisan view:cache -n -vv
    {{ $php_path }} artisan up -n -vv
@endtask
