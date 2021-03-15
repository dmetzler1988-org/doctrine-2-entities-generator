<?php

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use Symfony\Component\Dotenv\Dotenv;

date_default_timezone_set('Europe/Zurich');

require_once "vendor/autoload.php";

// Load environment variables.
(new Dotenv())->load('.env');

// Create a simple "default" Doctrine ORM configuration for Annotations
$isDevMode = (bool)$_ENV['DEV_MODE'];
//$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__ . "/src"), $isDevMode);
// or if you prefer YAML or XML
//$config = Setup::createXMLMetadataConfiguration(array(__DIR__."/config/xml"), $isDevMode);
$config = Setup::createYAMLMetadataConfiguration([__DIR__ . "/config/yaml"], $isDevMode);
// the connection configuration
$serverVersion = isset($_ENV['ORM_SERVER_VERSION']) && !empty($_ENV['ORM_SERVER_VERSION']) ? ['server_version' => $_ENV['ORM_SERVER_VERSION']] : null;
$conn = [
    'driver' => $_ENV['ORM_DRIVER'],
    'host' => $_ENV['ORM_HOST'],
    'port' => $_ENV['ORM_PORT'],
    'dbname' => $_ENV['ORM_DBNAME'],
    'user' => $_ENV['ORM_USER'],
    'password' => $_ENV['ORM_PASSWORD'],
    'charset' => $_ENV['ORM_CHARSET'],
];
$conn = array_merge($conn, $serverVersion);

// obtaining the entity manager
$entityManager = EntityManager::create($conn, $config);
