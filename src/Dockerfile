FROM ubuntu:16.04

RUN apt-get update
RUN apt-get dist-upgrade -y


# Install the relevant packages
RUN apt-get install php7.0-cli -y

# Add our websites files to the default apache directory (/var/www)
COPY . /root/password-manager

VOLUME /root/password-manager/data

# Execute the containers startup script which will start many processes/services
# The startup file was already added when we added "project"
CMD ["/usr/bin/php", "/root/password-manager/main"]
