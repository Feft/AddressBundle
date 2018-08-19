.PHONY: composer php5.6-phpunit5

# Set dir of Makefile to a variable to use later
MAKEPATH := $(abspath $(lastword $(MAKEFILE_LIST)))
PWD := $(dir $(MAKEPATH))

composer:
	docker container run --rm -v $(PWD):/app composer:latest install --ignore-platform-reqs

php5.6-phpunit5:
	docker container run --rm -v $(PWD):/app stjw/phpunit:php5.6-phpunit5 --testdox --colors=always
