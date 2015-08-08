<?php
    chdir(dirname(__DIR__));
    define("APP_PATH", getcwd());
    include APP_PATH."/vendor/autoload.php";

    $config = array(
        'config' => array(
            'dispatcher' => array(
                'defaultModule' => 'Blog',
                'routers' => array(
                    array(
                        'type' => 'literal',
                        'url' => '/',
                        'controller' => 'Index',
                        'action' => 'index',
                    ),
                    array(
                        'type' => 'regex',
                        'url' => '^\/product\/(?P<productID>\d+)$',
                        'controller' => 'Product',
                        'action' => 'index',
                    ),
                    array(
                        'type' => 'segment',
                        'url' => '/[:controller]/[:action]/[:index]'
                    )
                )
            ),
            'view' => array(
                'path' => APP_PATH."/protected/Blog/view/",
                'layout' => 'layout.php'
            ),
            'db' => array(
                'host' => '127.0.0.1',
                'username' => 'wordpress',
                'password' => 'wordpress',
                'dbname' => 'wordpress'
            ),
            'cache' => array(
                'host' => '127.0.0.1',
                'port' => 11211
            )
        ),
        'configCachePath' => APP_PATH."/cache/config.php",
        'configCacheEnable' => false
    );

    $app = \Xend\Application::init($config);
    $app->run();
