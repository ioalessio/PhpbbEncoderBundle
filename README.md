Getting Started With PhpbbEncoderBundle
=====================================

With this bundle you can use phpbb encoding method for read/store passwords.

## Prerequisites

This version of the bundle requires Symfony 2.0.x


## Installation


### Vendor Mode (Symfony 2.0.x)

Add the following lines in your deps file:

```
 [IoFormBundle]
 git=git://github.com/GaYAlab/PhpbbEncoderBundle.git
 target=/gayalab 
```

Then run the vendor script:

```./bin/vendors install```

### Submodule Mode

```$ git submodule add git://github.com/GaYAlab/PhpbbEncoderBundle.git vendor/gayalab```

### Packagist (Symfony 2.1.x)

Add PhpSandboxBundle in your composer.json:

```js
"require": {
	"gayalab/phpbbencoderbundle": "*"
}
```

Now tell composer to download the bundle by running the command:

```
$ php composer.phar update gayalab/phpbbencoderbundle
```


## Configuration

Add the "Io" namespace to your autoloader (for Symfony 2.0)

```// app/autoload.php
$loader->registerNamespaces(array(
'Gaya' => __DIR__.'/../vendor/gayalab',
// your other namespaces
));```

Register Bundle in kernel file:

```// app/ApplicationKernel.php
public function registerBundles()
{
  return array(
  // ...
  new Gaya\Bundle\PhpbbEncoderBundle(),
  // ...
  );
}```

=====================================


## How To Use:

Just choose phpbbencoder service as encoder

```
#app/config/security.yml file:
security:
    encoders:
        Symfony\Component\Security\Core\User\User: plaintext
        My\UserBundle\Entity\User:
          id: gaya.phpbbencoder.security.encoder.phpbb
```
