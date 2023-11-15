Code Generator
============

Requirements
------------
* PHP >= 8.2
* Composer
* Laravel 10

Installation
------------
Clone repository to a local location accessible to your Laravel application

Add the path of the cloned repository to the list of repositories in your application's composer.json e.g.
```json
"repositories": [
    {
        "type": "path",
        "url": "../../packages/code-generator"
    }
]
```

Install using Composer;
```
composer require dridley309/code-generator
```

Package service provider should be automatically available to the parent application.

Run the database migrations;
```
php artisan migrate
```

Usage
-----
Inject the class Dridley309\CodeGenerator\Generator into your application and call its generate() method. This creates a code of size/type defined by current strategy that is then checked against that strategy's rules configured in the package's config.php.

The code is regenerated until all rules are passed (though a retry limit is defined) then once fully validated it is automatically persisted to the database using the CodeRepository::create method. Since the value column on the table is a unique key, a UniqueConstraintViolationException exception is thrown if the final generated code is not unique.

The default strategy NumericSixStrategy generates a numeric 6-digit code that adheres to set of default rules;
* Not a palindrome
* No character repeated more than 3 times
* No sequence length greater than 3 (ascending/descending)
* Contains at least 3 unique characters

(These rules as implemented should theoretically be supported by any strategy class that generates alphanumeric strings)

The CodeRepository also includes multiple other methods;
* allocateCode(): grabs a random unallocated code, flags it as allocated then returns it
* resetCodeAllocation(string $value): searches table for specified unique code value and unallocates it
* getUnallocatedCount(): returns count of existing unallocated codes in database

Configuration
-------------
* codes_table: name of the table used to persist generated codes
* default_strategy: strategy class to be used for generating codes
* strategy_definitions: define the available strategies with their rules
* max_retries: number of rule failures allowed before code generation is aborted
  