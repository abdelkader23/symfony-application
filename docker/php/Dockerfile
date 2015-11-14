FROM endroid/docker-php

ADD .gitconfig /root/
ADD application.ini /usr/local/etc/php/conf.d/application.ini

ADD id_rsa /root/.ssh/id_rsa
ADD known_hosts /root/.ssh/known_hosts
RUN echo " IdentityFile /root/.ssh/id_rsa" >> /etc/ssh/ssh_config
