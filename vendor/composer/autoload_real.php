<?php

// autoload_real.php @generated by Composer

use Composer\Autoload\ClassLoader;
use Composer\Autoload\ComposerStaticInit1a56ab2fc48ca9fa2b0aee57c476e8be;

class ComposerAutoloaderInit1a56ab2fc48ca9fa2b0aee57c476e8be
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInit1a56ab2fc48ca9fa2b0aee57c476e8be', 'loadClassLoader'),
            true,
            true);
        self::$loader = $loader = new ClassLoader(dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit1a56ab2fc48ca9fa2b0aee57c476e8be', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(ComposerStaticInit1a56ab2fc48ca9fa2b0aee57c476e8be::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
