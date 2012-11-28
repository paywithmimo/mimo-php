# mimo-php: PHP Wrapper for Mimo's API
=================================================================================

## Version 

1.0.0

## Requirements
- [PHP](http://www.php.net/)
- [CURL PHP](http://php.net/manual/en/book.curl.php)
- [JSON PHP](http://php.net/manual/en/book.json.php)

## Installation

You can simply include dwolla.php in your PHP code

## Usage
```php
require 'MimoRestClient.php.php';
$Mimo = new MimoRestClient();

// Request Token
$token = $Mimo->requestToken($code); 

// Set the Token
$Mimo->setToken('[OAuth Token Goes Here]');

```
## Examples / Quickstart

This repo includes various usage examples, including:

* Authenticating with OAuth and Request for the access Token [oauth.php]
* Searching USer [userinfo.php]
* Transfer Amount [transfer.php]

## Methods

Authentication Methods:

    getAuthUrl()        ==> (string) OAuth permissions page URL
    requestToken($code) ==> (string) a never-expiring OAuth access token
    setToken($token)    ==> (bool) was token saved?
    getToken()          ==> (string) current OAuth token

Users Methods:

    getUser($user_field, $field_data)   ==> (array) Get user details based on search criteria
    
Transactions Methods:

    transaction($transactionId)                     ==> (array) transaction details

Helper Methods:

    getError()          ==> (string) error message
    setMode($mode)      ==> (bool) did mode change

## Changelog

1.0.0

* Added support for Mimo's offsite gateway
* Refactored methods
* Extended documentation

## Credits

## Support

## References / Documentation

## License 

