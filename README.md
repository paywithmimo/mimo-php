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

    transaction($amount, $notes)                     ==> (array) transaction details

Helper Methods:

    getError()          ==> (string) error message
    setMode($mode)      ==> (bool) did mode change

## Changelog

1.0.0

* Added support for Mimo's offsite gateway
* Refactored methods
* Extended documentation

## Credits

MIMO Payment Services

## Support

Developer Support <developers@mimo.ng>
MIMO API <api@mimo.ng>

## References / Documentation

[https://www.mimo.com.ng/developer] (https://www.mimo.com.ng/developer)

## License 

The MIT License (MIT)
Copyright (c) 2012 MIMO Payment Services
Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:
The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

