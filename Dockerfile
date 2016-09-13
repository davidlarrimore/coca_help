FROM php:5.6.25-cli
COPY . /Users/davidlarrimore/Documents/workspace/lresptofunrun
WORKDIR /usr/src/lresptofunrun
CMD [ "php", "./index.php" ]
