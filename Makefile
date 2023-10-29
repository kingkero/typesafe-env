DIR := ${CURDIR}

pint:
	docker container run --rm -v $(DIR):/app/ php:8.2-cli /app/vendor/bin/pint /app/

test:
	docker container run --rm -v $(DIR):/app/ php:8.2-cli /app/vendor/bin/pest /app/tests/

analyse:
	docker container run --rm -v $(DIR):/app/ php:8.2-cli /app/vendor/bin/phpstan analyse -c /app/phpstan.neon
