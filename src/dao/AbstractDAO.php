<?php

namespace APIWhatsapp\DAO;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

abstract class AbstractDAO {

	private $entityManager;
	private $entityPath;

	public function __construct($entityPath) {
			$this->entityPath = $entityPath;
			$this->entityManager = $this->createEntityManager ();
    }

	protected function createEntityManager() {
        $devMode = true;
		$path = array(__DIR__."/src/model");
		$config = Setup::createAnnotationMetadataConfiguration ( $path, $devMode );

		$connectionOptions = array(
            'dbname' => 'fafy02',
            'user' => 'fafy02',
            'password' => 'jdk48bhf90i4j',
            'host' => 'mysql.fafy.com.br',
            'driver' => 'pdo_mysql'
        );
		return EntityManager::create ( $connectionOptions, $config );
	}

	public function insert($obj){
		$this->entityManager->persist($obj);
		$this->entityManager->flush();
	}

	public function update($obj){
		$this->entityManager->merge($obj);
		$this->entityManager->flush();
	}

	public function delete($obj){
		$this->entityManager->remove($obj);
		$this->entityManager->flush();
	}

	public function findById($id){
		return $this->entityManager ->find ( $this->entityPath ,$id) ;
	}

	public function findAll(){
		$collection = $this->entityManager ->getRepository ( $this->entityPath )->findAll ();

		$data = array ();
		foreach ( $collection as $obj ) {
			$data [] = $obj;
		}

		return $data;
	}
}
