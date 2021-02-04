# Validator
Simple validator library for Laravel framework with multiple scenarios. By using this package, you write your validator once
and use every where and moderate your Domain rules easily.

### Installation
Use composer:
```bash
 composer require --prefer-dist "nextvikas/validator @dev"
```

### Usage
Your validator classes must extends `Nextvikas\Valdiator\AbstarctValdiator` :
```php
<?php
#UserValidator.php

namespace YourApp\Validators;

use Nextvikas\Validator\AbstractValidator;

class UserValidator extends AbstractValidator
{

    protected $registration = [
        'first_name' => ['required'],
        'last_name' => ['required'],
        'username' => ['required'],
        'email' => ['required', 'email'],
        'home_page' => ['required', 'url']
    ];


    protected $activation = [
        'id' => ['required', 'exists:users'],
        'token' => ['required', 'min:64']
    ];

    
}
```

You must inject validator in your methods or controller `__construct` method to using it:

```php
<?php
# UserController.php

namespace Nextvikas\Validator;

use YourApp\Validators\UserValidator;
use Nextvikas\Validator\Exceptions\ValidationException;

class UserController extends Controller
{
    public function register(Request $request, UserValidator $valdiator)
    {
        $responce = $valdiator
            ->setScenario('registration')
            ->validate($request);


        if($valdiator->fails()) {
            return \Redirect::back()->withErrors($responce)->withInput();
        }

        if($valdiator->passes()) {
            return User::create($valdiator->getPostdata());
        }

    }
}
```

You must extends Nextvikas\Validator\Model in your model to using it:

```php
<?php
# YourApp/Models/User.php

use Nextvikas\Validator\Model;

class User extends Model
{

	......................
}
```
