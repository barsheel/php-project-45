brain-games:
	php bin/brain-games

brain-even:
	php ./bin/brain-even

install:
	composer install

validate:
	composer validate

lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin