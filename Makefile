PHP=php
GENERATE=generate.php
DATABASE=src/database

all: $(DATABASE)
	rm -rf $(DATABASE)/*
	$(PHP) $(GENERATE)

$(DATABASE):
	mkdir -p $(DATABASE)

.PHONY: all
