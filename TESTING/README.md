Testing - PHP Unit
======================

Laravel installation comes shipped with Php Uit. The package is located in vendor > php unit and vendor > bin > php unit.  

The phpunit.xml file is located in the main directory structure.
At the bottom of the phpunit.xml file change the db connection and db database detail.

Example test files
------------------

You can create test files in the tests folder using the command php artisan make:test <filename>

The test folder contains sub folders - unit and you can create more such as integration

A few test files are already provided

tests > createsApplication.php
tests > testcase.php
tests > feature > exampleTest.php

Creating a unit test
--------------------
At the top of the test file use the model
The function name in the test file should begin with test (or alternatively write /** @test */ before each function.

There are various methods you can use within a test function

assertEquals, assertCount, setEpectedException, assertTrue, assertFalse, assertDatabaseHas, assertDatabaseMissing

N.b. if the test does not run use Tests\Testcase at the top of the file instead of phpunit\Framework\

Run a test in visual studio code
----------------------------------

1. Install better php unit for vscode plugin
2. Navigate to the test file in the Laravel folder structure
3. Press CTRL + Shift + P and select better php unit run file

The test results will be returned in the task - run terminal.

N.b. if the test file is very large you can run just a function by entering phpunit --filter <functionname>

Integration test - database
---------------------------

Write a test case using given, when then e.g.

given the database has articals
when I call get articles
then articles are returned

If your test involve creating database records use Illuminate\Foundation\Testing\databaseTransactions at the top of the file and 
enter use databaseTransactions in the function so that records will be rolled back after test and you don't have lots of test records in the database.

N.b. to use a separate test database for all tests enter database details in the database.php file 
and then at the bottom of the phpunit.xml file add the name of the testing database e.g.

<env name = "DB_CONNECTION" alue="sqlsrv_testing"/>

N.b. it is good practice to test the whole suite (folder) once in a while to chek chnges do not affect other tests.

Regression testing - bugs
-------------------------

Regression testing reproduces a bug

1. prove it fails
2. write code to make it pass
