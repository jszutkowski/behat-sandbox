Simple application for learning **Behat** inspired by Sylius.

It contains some test scenarios for generated CRUD.

The feature scenarios are in /features directory.

All code related to Behat can be found in src/Behat and in ./behat.yml

### How to run
- first start chrome by running command:

  `google-chrome-stable --disable-gpu --headless --remote-debugging-address=0.0.0.0 --remote-debugging-port=9222 --no-sandbox`
- secondly run tests by running command:

  `APP_ENV=test vendor/bin/behat`
