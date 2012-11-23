BitterBundle Documentation
==========================

.. image:: https://secure.travis-ci.org/rezzza/BitterBundle.png?branch=master
  :target: http://travis-ci.org/rezzza/BitterBundle

BitterBundle is a powerful analytics Symfony Bundle based on `Bitter <https://github.com/jeremyFreeAgent/Bitter/>`_ library using Redis bitmaps.

.. note::
    Please look at `Bitter <https://github.com/jeremyFreeAgent/Bitter/>`_ for more info about what it can do.

Please see `Bitter <http://bitter.free-agent.fr/>`_  for more info and documentation about this project.

Installation
------------
Use `Composer <https://github.com/composer/composer/>`_ to install: `rezzza/bitter-bundle`.

In your `composer.json` you should have:

.. code-block:: yaml

    {
        "require": {
            "rezzza/bitter-bundle": "*"
        }
    }

Then update your `AppKernel.php` to register the bundle with:

.. code-block:: php

    new Rezzza\BitterBundle\RezzzaBitterBundle()

Bitter uses `Redis <http://redis.io>`_ (version >=2.6).

Configuration
-------------

Using `SncRedisBundle <https://github.com/snc/SncRedisBundle>`_ redis client:

.. code-block:: yaml

    rezzza_bitter:
        redis_client: snc_redis.default

Using custom redis client:

.. code-block:: yaml

    rezzza_bitter:
        redis_client: your.very.best.redis.client

Basic usage
-----------
Get Bitter:

.. code-block:: php

    $bitter = $this->container->get('rezzza.bitter');

Mark user 404 as active and has been kicked by Chuck Norris:

.. code-block:: php

    $bitter->mark('active', 404);
    $bitter->mark('kicked_by_chuck_norris', 404);

.. note::
    Please look at `Bitter <https://github.com/jeremyFreeAgent/Bitter/>`_ for all examples.

Todo
----
* Add dashboard controller.
* Add tests
