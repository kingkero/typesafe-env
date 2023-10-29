DIR := ${CURDIR}

.PHONY: help
 
help: ## list all the Makefile commands
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}'

pint: ## run Laravel Pint to apply consistent code style
	docker container run --rm -v $(DIR):/app/ php:8.2-cli /app/vendor/bin/pint /app/

test: ## run Pest tests
	docker container run --rm -v $(DIR):/app/ php:8.2-cli /app/vendor/bin/pest -c /app/phpunit.xml

test-types: ## run Pest Type Coverage
	docker container run --rm -v $(DIR):/app/ php:8.2-cli /app/vendor/bin/pest -c /app/phpunit.xml --type-coverage --min=100

analyse: ## run PHPStan for code analysis
	docker container run --rm -v $(DIR):/app/ php:8.2-cli /app/vendor/bin/phpstan analyse -c /app/phpstan.neon
