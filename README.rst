BitterBundle Documentation
==========================

.. image:: https://secure.travis-ci.org/rezzza/BitterBundle.png?branch=master
  :target: http://travis-ci.org/rezzza/BitterBundle

BitterBundle makes it easy to use the `Bitter library <https://github.com/jeremyFreeAgent/Bitter/>`_ to implement real-time 
highly-scalable analytics using Redis bitmaps in your Symfony 2 project. Please see the `Bitter library website <http://bitter.free-agent.fr/>`_  for more info and documentation about this project.

Installation
------------
Use `Composer <https://github.com/composer/composer/>`_ to install: ``rezzza/bitter-bundle``.

In your ``composer.json`` you should have:

.. code-block:: yaml

    {
        "require": {
            "rezzza/bitter-bundle": "*"
        }
    }

Then update your ``AppKernel.php`` to register the bundle with:

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

You can also configure custom values for ``prefix_key`` and ``expire_timeout``:

.. code-block:: yaml

    rezzza_bitter:
        redis_client: snc_redis.default
        prefix_key: my_app  # default - bitter
        expire_timeout: 300 # default - 60

Basic usage
-----------
Get Bitter:

.. code-block:: php

    $bitter = $this->container->get('rezzza.bitter');

Mark user 123 as active and has played a song:

.. code-block:: php

    $bitter->mark('active', 123);
    $bitter->mark('song:played', 123);

.. note::
    Please look at `Bitter <https://github.com/jeremyFreeAgent/Bitter/>`_ for all examples.

Todo
----
* Add dashboard controller.
* Add tests
