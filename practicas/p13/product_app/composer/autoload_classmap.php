<?php
$vendorDir = dirname(__DIR__);
$baseDir = dirname($vendorDir);
return array(
    'Composer\\InstalledVersions' => $vendorDir . '/composer/InstalledVersions.php',
    'myapi\\Create' => $baseDir . '/backend/myapi/Create.php',
    'myapi\\Database' => $baseDir . '/backend/myapi/Database.php',
    'myapi\\Delete' => $baseDir . '/backend/myapi/Delete.php',
    'myapi\\Products' => $baseDir . '/backend/myapi/Products.php',
    'myapi\\Read' => $baseDir . '/backend/myapi/Read.php',
    'myapi\\Update' => $baseDir . '/backend/myapi/Update.php',
);