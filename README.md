php-openddr
===========

Experimental OpenDDR implementation for PHP

Collaborating
-------------
We use the [git-flow branching model](http://nvie.com/posts/a-successful-git-branching-model/). Development is done on ```develop``` branch. ```master``` branch should always be in production-ready state. 

Unit testing
------------
To run the testsuite:

    $ cd tests
    $ phpunit
    
Installation
------------

    $ git clone git://github.com/krizon/php-openddr.git
    
Next, install the dependencies with composer:

    $ php composer.phar install
    

Configuration
-------------
Start by cloning the OpenDDR resources repository:

    $ git clone git://github.com/OpenDDRdotORG/OpenDDR-Resources.git
    
The library needs a little configuration before it works, so we start by creating a bootstrap.php with the following contents:

    <?php
    $config = array(
        'storage'       => 'file',
        'resource_path' => '/var/OpenDDR-Resources', // This is where you cloned the repo above!
        'target_path'   => '/tmp/openddr' // to write the cache
    );

    $manager = \OpenDDR\Storage\StorageManager::create($config);

    $helperSet = new \Symfony\Component\Console\Helper\HelperSet();
    $helperSet->set(new \OpenDDR\Console\Helper\StorageManagerHelper($manager), 'storage_manager');
    
Finally add a cli-config.php in /bin:

    <?php
    include __DIR__.'/../bootstrap.php';
    
And now you're good to go. Open a terminal and browse to the project location:

    bin/openddr
    
This should give you the console interface. You can now build the cache with:

    bin/openddr openddr:build-cache

    
