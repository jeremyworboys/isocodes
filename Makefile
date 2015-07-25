PHP=php
PHPUNIT=vendor/bin/phpunit
GENERATE=generate.php
DATABASE=src/database

all: $(DATABASE)
	rm -rf $(DATABASE)/*
	$(PHP) $(GENERATE)
	$(PHP) $(PHPUNIT)

$(DATABASE):
	mkdir -p $(DATABASE)

.PHONY: all
