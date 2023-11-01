DIR := ${CURDIR}

.PHONY: help
help:
	@printf "\033[33mUsage:\033[0m\n  make TARGET\n\n\033[32m#\n# Commands\n#---------------------------------------------------------------------------\033[0m\n\n"
	@fgrep -h "##" $(MAKEFILE_LIST) | fgrep -v fgrep | sed -e 's/\\$$//' | sed -e 's/##//' | awk 'BEGIN {FS = ":"}; {printf "\033[33m%s:\033[0m%s\n", $$1, $$2}'

.PHONY: pint
pint: ## run Laravel Pint to apply consistent code style
	docker container run --rm -v $(DIR):/app/ php:8.2-cli /app/vendor/bin/pint /app/

.PHONY: test
test: ## run Pest tests
	docker container run --rm -v $(DIR):/app/ php:8.2-cli /app/vendor/bin/pest -c /app/phpunit.xml

.PHONY: test-types
test-types: ## run Pest Type Coverage
	docker container run --rm -v $(DIR):/app/ php:8.2-cli /app/vendor/bin/pest -c /app/phpunit.xml --type-coverage --min=100

.PHONY: analyse
analyse: ## run PHPStan for code analysis
	docker container run --rm -v $(DIR):/app/ php:8.2-cli /app/vendor/bin/phpstan analyse -c /app/phpstan.neon
