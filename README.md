### laravel sail
- https://laravel.com/docs/10.x/sail#introduction
- permissions to log command : sudo chmod o+w ./storage/ -R
- ./vendor/bin/sail up && ./vendor/bin/sail down
### phpunit 
- for tests configs, phpunit.xml
- https://docs.phpunit.de/en/9.5/assertions.html
- to run a test : ./vendor/bin/phpunit

### Xdebug
- https://xdebug.org/docs/install
- .env add the var SAIL_XDEBUG_MODE=develop,debug,coverage
- sudo ./vendor/bin/sail php artisan test --coverage (to check coverage of tested code)
- add to php.ini : 
  - xdebug.mode=coverage
  - xdebug.client_host=127.0.0.1
  - xdebug.client_port=9000
  - xdebug.start_with_request=yes

*Xdebug is a PHP extension that provides debugging and profiling capabilities for PHP applications. It allows developers to step through their code, set breakpoints, inspect variables, and more, helping them to identify and fix issues in their code.
PHPUnit is a popular unit testing framework for PHP that allows developers to write and execute tests for their PHP code. PHPUnit can integrate with Xdebug to provide additional debugging capabilities when running tests. With Xdebug enabled, PHPUnit can generate code coverage reports, which show which lines of code are executed by the tests, and also allows developers to debug their tests just like they would debug their regular application code.
Overall, Xdebug and PHPUnit are two powerful tools that can help developers write better code and catch issues early in the development cycle.*


- tut : https://betterstack.com/community/guides/testing/laravel-unit-testing/

### Inversion of Control (IoC) &&  DI (Dependency Injection)
- tut : https://www.youtube.com/watch?v=lUz22GUHpNA

# Service Container 
- https://laravel.com/docs/10.x/container
- https://www.youtube.com/watch?v=_z9nzEUgro4&list=PLpzy7FIRqpGD5pN3-Y66YDtxJCYuGumFO

# View Composer
- https://www.youtube.com/watch?v=7QWZxjgvEQc&list=PLpzy7FIRqpGD5pN3-Y66YDtxJCYuGumFO&index=2

# Macros laravel
- https://coderstape.com/blog/3-macroable-laravel-classes-full-list
- tut : https://www.youtube.com/watch?v=7XqEJO-wt7s
