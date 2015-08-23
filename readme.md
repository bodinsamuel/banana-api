# install DEV

    - git clone
    - composer install
    - Ngninx conf
        - cd /etc/nginx/sites-available/
        - ln -s ../../../home/bn/banana-api/shared/api.banana.dev.nginx api.banana.dev
        - cd /etc/nginx/sites-enabled/
        - ln -s ../sites-available/api.banana.dev
    - service nginx reload
