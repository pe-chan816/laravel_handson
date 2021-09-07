FROM nginx:1.20
RUN apt-get update && \
    apt-get -y install vim
RUN rm -f /etc/nginx/conf.d/default.conf
WORKDIR /work