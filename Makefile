#Makefile
install:
	composer install

brain-games:
	@./bin/brain-games

validate:
	composer validate

lint:
	composer run-script phpcs -- --standard=PSR12 src bin

lint-fix:
	composer run-script phpcbf -- --standard=PSR12 src bin
