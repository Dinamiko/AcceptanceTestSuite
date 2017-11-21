# Acceptance Test Suite 

A testing environment including Codeception, Selenium Chrome and WordPress.

### Mac users: use Docker Toolbox instead of Docker for Mac.
[Docker for Mac](https://docs.docker.com/docker-for-mac/networking/#i-cannot-ping-my-containers) is unable to route traffic to containers, and from containers back to the host. I'm using [Docker Toolbox](https://www.docker.com/products/docker-toolbox) virtual machine IP `192.168.99.100` which works good at the time of writing this doc.

### Create testing environment
```
$ docker-compose build
$ docker-compose up -d
```

On first run it creates a fresh WordPress install inside `wordpress-data` folder, in order to access WordPress, visit [http://localhost](http://localhost) or [http://192.168.99.100](http://192.168.99.100) if your are using Docker Toolbox.

### Setup WordPress
Setup WordPress installation, for example if you need to test a plugin, it's a good idea to install and activate it, maybe add some content... after that you'll need to create a database backup.

### Create SQL dump for Codecetion
In order to run each test from the same state, you need to create a backup of your database and add it to `tests/_data/dump.sql` folder. 

Create it via phpMyAdmin accessible on port 1234, visit [http://localhost:1234](http://localhost:1234) or [http://192.168.99.100:1234](http://192.168.99.100:1234), phpMyAdmin user and password is `wordpress`.

Or run this command directly inside the docker container:
`$ docker exec CONTAINER_ID /usr/bin/mysqldump -u root --password=wordpress wordpress > dump.sql`

### Run Tests
`$ docker-compose run --rm codecept run`

`$ docker-compose run --rm codecept run acceptance some-folder/Some_Class_Cest:some_function --steps`

