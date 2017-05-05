Demo: http://yii2-boilerplate-app.com/

DIRECTORY STRUCTURE
-------------------

      angular/            contains Angular v4 components and scss files
      assets/             contains assets definition
      commands/           contains console commands (controllers)
      components/         contains reusable Yii components
      config/             contains application configurations
      controllers/        contains Web controller classes
      mail/               contains view files for e-mails
      migrations/         contains database migration files
      models/             contains model classes
      modules/            contains Yii modules
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      theme/              contains view files that override module view files
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources


REQUIREMENTS
------------

The minimum requirement by this project template that your Web server supports PHP 5.6.0.

CONFIGURATION
-------------

Edit `config/db.php` and `config/test-db.php` with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2',
    'username' => 'root',
    'password' => 'root',
    'charset' => 'utf8',
];
```

And edit `config/mail.php`:

```php
return [
    'class' => 'yii\swiftmailer\Mailer',
    'transport' => [
        'class' => 'Swift_SmtpTransport',
        'host' => 'smtp.gmail.com',
        'username' => 'username',
        'password' => 'password',
        'port' => '465',
        'encryption' => 'ssl',
    ]
];
```

And edit `config/jwt.php`:

```php
return [
    'class' => 'sizeg\jwt\Jwt',
    'key' => 'long-random-string',
];
```

INSTALLATION
------------

Run the following commands:

### Dependencies

    # Install dependencies
    composer install

### Migrations

    # Migrations
    php yii migrate --migrationPath=@vendor/dektrium/yii2-user/migrations
    php yii migrate --migrationPath=@yii/rbac/migrations
    php yii migrate --migrationPath=@vendor/yii2mod/yii2-settings/migrations
    php yii migrate --migrationPath=@vendor/pendalf89/yii2-filemanager/migrations
    php yii migrate --migrationPath=@vendor/pendalf89/yii2-blog/migrations
    
### Test data

    # Load test data
    php yii fixture "*"

URLs
----

    /user/admin
    /user/settings
    /settings
    /media
    /content
