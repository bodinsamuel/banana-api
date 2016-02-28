# install DEV

  - git clone
  - composer install
  - Ngninx conf
      - cd /etc/nginx/sites-available/
      - ln -s ../../../home/banana-api/shared/api.banana.dev.nginx api.banana.dev
      - ln -s ../../../home/banana-api/shared/media.banana.dev.nginx media
      - cd /etc/nginx/sites-enabled/
      - ln -s ../sites-available/api.banana.dev
      - ln -s ../sites-available/media.banana.dev
  - service nginx reload

## Dependency
  -nginx
  - mysql
    - apt-get install mysql-server mysql-client libmysqlclient15-dev mysql-common
  - php 5.6
    - apt-get install php5-common php5-fpm
  - elasticsearch


# init
    - mysql -D banana < shared/schema.sql
    - php artisan migrate [y]
    - php artisan db:seed [y]
