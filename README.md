# CookieSession

**CookieSession** is a very light library to manage easily and simply the Session and Cookie with PHP 7+ (and without spending time by configuring and securing them).


## Installation

 You can add it easily in your projec by using [Composer](https://getcomposer.org/).


```bash
$ composer require ucsdmath/session
 ```


## Usage for Session

```PHP
<?php
use PH7\CookieSession\Session;

$oSession = new Session;

$oSession->set('lang_pref', 'English');

// Create some sessions with an array
$aData = [
    'my_session' => 'The value',
    'another_session' => 'Another value',
    'my_name' => 'Pierre-Henry'
];
// Add these sessions
$oSession->set($aData);


// Get session
$oSession->get('lang_pref'); // Will display 'English'
$oSession->get('another_session'); // Will display 'Another value'

$oSession->get('my_name'); // Will display 'Pierre-Henry'
```


## Usage with Cookie (very similar)

```PHP
<?php
use PH7\CookieSession\Cookie;

$oCookie = new Cookie;

$oCookie->set('mycookie', 'Amazing Value!');

// Create some cookies in array
$aCookies [
    'name' => 'Pierre-Henry',
    'city' => 'Manchester',
    'job' => 'Software Engineer'
];
$oCookie->set($aCookies);

$oCookie->get('name'); // Will display 'Pierre-Henry'
$oCookie->get('mycookie'); // Will display 'Amazing Value!'
```


## Requirements

- PHP 7 or higher


## The Author

I'm **Pierre-Henry Soria**, **Software Developer** passionate about a lot of things and currently living in Manchester city, UK


## Contact

You can send an email at **pierrehenry [AT] gmail {D0T} COM** or at **phy {AT} hizup [D0T] UK**


## License

Under [General Public License 3](http://www.gnu.org/licenses/gpl.html) or later.