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