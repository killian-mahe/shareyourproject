@include('vendor/autoload.php')

@setup
    $php_path = '/usr/bin/php7.4-cli';
    $composer_path = '../composer.phar';
    $project_path = 'web-app';
@endsetup

@servers(['production' => 'u102593862@access847528813.webspace-data.io'])

@story('deploy', ['on' => 'production'])
deploy
@endstory

@task('deploy')
    cd {{ $project_path }}
    {{ $php_path }} artisan down -n
    git pull origin production

    {{ $php_path }} {{ $composer_path }} install --optimize-autoloader --no-dev

    {{ $php_path }} artisan migrate -n -vv --force


    {{ $php_path }} artisan config:cache -n -vv
    {{ $php_path }} artisan route:cache -n -vv
    {{ $php_path }} artisan view:cache -n -vv
    {{ $php_path }} artisan up -n -vv
@endtask
