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
    - apt-get install php5-common php5-fpm php5-mysql
  - elasticsearch


# init
  - composer install
  - mysql =>
    - CREATE USER 'bananauser'@'localhost' IDENTIFIED BY 'bananauser123';
    - GRANT ALL PRIVILEGES ON `banana`.* TO 'bananauser'@'localhost'
  - mysql -D banana < shared/schema.sql
  - php artisan migrate [y]
  - php artisan db:seed [y]


# Debug
tail -f /var/log/nginx/api.banana.dev.error.log
