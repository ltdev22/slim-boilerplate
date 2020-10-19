# slim-boilerplate

A boilerplate developed on Slim PHP framework, similar to Laravel's boilerplate.

### Basic commands

###### Launch the application
* `$ docker-compose up`
* `$ docker-compose up --build`
###### Stop the application
* `$ docker-compose stop`
* `$ docker-compose down`
###### Run commands in the app container
* `$ docker-compose exec app bash`
###### Run commands in the node container (e.g. npm scripts)
* `$ docker-compose run --rm node bash`
###### Run composer commands using
* composer's official image ` docker run --rm --interactive --tty --volume $PWD:/app composer [command]`
* the app container (see the previous command and then run) `$ composer [command]`

### Setup a database connection
1. When the containers are up, run the command `$ docker-compose exec mysql bash`.
2. In the mysql container run `$ mysql -u root -p` to login to MySQL. Type the password for the root use to login.
3. Create a new database and a new user running the following queries
```
-- Create a new database
$ CREATE DATABASE `database_name_here` CHARACTER SET utf8 COLLATE utf8_unicode_ci;

-- Create the user and grant privileges too
$ GRANT ALL PRIVILEGES ON `database_name_here`.* TO 'user_name_here'@'%' IDENTIFIED BY 'password_here';

-- To confirm privileges are set
$ SHOW GRANTS FOR 'user_name_here'@'%';
```
and then exit the mysql container.
4. Run the command `$ docker network ls` to list all the available networks.
5. Get the ip address of the mysql container `$ docker network inspect <name of the network here>` and in the outputed json look for the ip address of the mysql container. Should be something like this
```
"Containers": {
    "a9754a46725e9ccbbc13c8e04dc39c0583e031bd3c6a208f3af6a3585164e6ef": {
        "Name": "slim_boilerplate_db",
        "IPv4Address": "172.16.0.2/12",
        ...
    },
```
6. Open the .env file and set the configuration env variables for the database: `DB_HOST`, `DB_DATABASE`, `DB_USERNAME` and `DB_PASSWORD`
