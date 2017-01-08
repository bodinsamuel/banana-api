# Initial
  - Debian jessie
  - ansible

# install DEV
  - git clone
  - cd ansible && ansible-playbook -i hosts playbook.yml


  - Ngninx conf
      - cd /etc/nginx/sites-available/
      - ln -s ../../../home/banana-api/shared/api.banana.dev.nginx api.banana.dev
      - ln -s ../../../home/banana-api/shared/media.banana.dev.nginx media
      - cd /etc/nginx/sites-enabled/
      - ln -s ../sites-available/api.banana.dev
      - ln -s ../sites-available/media.banana.dev
  - service nginx reload


# Debug
tail -f /var/log/nginx/api.banana.dev.error.log
