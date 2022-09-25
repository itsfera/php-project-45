install:
	composer install
brain-games:
	/Applications/MAMP/bin/php/php7.4.21/bin/php bin/brain-games
validate:
	composer validate
lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin
brain-even:
	php bin/brain-even
brain-calc:
	php bin/brain-calc
brain-gcd:
	php bin/brain-gcd
brain-progression:
	php bin/brain-progression