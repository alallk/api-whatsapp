<?php
// bootstrap.php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once "vendor/autoload.php";

// Create a simple "default" Doctrine ORM configuration for Annotations
$isDevMode = true;
$pathEntity = array(__DIR__."/src/model");
$config = Setup::createAnnotationMetadataConfiguration( $pathEntity, $isDevMode);
// or if you prefer yaml or XML
//$config = Setup::createXMLMetadataConfiguration(array(__DIR__."/config/xml"), $isDevMode);
//$config = Setup::createYAMLMetadataConfiguration(array(__DIR__."/config/yaml"), $isDevMode);

// database configuration parameters
$conn = array(
      'dbname' => 'fafy02',
			'user' => 'fafy02',
			'password' => 'jdk48bhf90i4j',
			'host' => 'mysql.fafy.com.br',
			'driver' => 'pdo_mysql'
        );
// obtaining the entity manager
$entityManager = EntityManager::create($conn, $config);
