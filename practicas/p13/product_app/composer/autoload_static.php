<?php
namespace Composer\Autoload;
class ComposerStaticInitc06ebc53c0cbd9ba44655617cc6d747a
{
    public static $prefixLengthsPsr4 = array (
        'm' => 
        array (
            'myapi\\' => 6,
        ), );
    public static $prefixDirsPsr4 = array (
        'myapi\\' => 
        array (
            0 => __DIR__ . '/../..' . '/backend/myapi',
        ), );
    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'myapi\\Create' => __DIR__ . '/../..' . '/backend/myapi/Create.php',
        'myapi\\Database' => __DIR__ . '/../..' . '/backend/myapi/Database.php',
        'myapi\\Delete' => __DIR__ . '/../..' . '/backend/myapi/Delete.php',
        'myapi\\Products' => __DIR__ . '/../..' . '/backend/myapi/Products.php',
        'myapi\\Read' => __DIR__ . '/../..' . '/backend/myapi/Read.php',
        'myapi\\Update' => __DIR__ . '/../..' . '/backend/myapi/Update.php',  );
    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc06ebc53c0cbd9ba44655617cc6d747a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc06ebc53c0cbd9ba44655617cc6d747a::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc06ebc53c0cbd9ba44655617cc6d747a::$classMap;
        }, null, ClassLoader::class); } }