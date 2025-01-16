brain-games:
	php bin/brain-games

brain-even:
	php ./bin/brain-even

brain-calc:
	php ./bin/brain-calc

brain-gcd:
	php ./bin/brain-gcd

brain-progression:
	php ./bin/brain-prog

brain-prime:
	php ./bin/brain-prime

install:
	composer install
	composer dump-autoload

validate:
	composer validate

lint:
	composer exec --verbose phpcbf -- --standard=PSR12 src bin
	composer exec --verbose phpcs -- --standard=PSR12 src bin
	