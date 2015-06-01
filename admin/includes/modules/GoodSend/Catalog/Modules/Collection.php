<?php

namespace GoodSend\Catalog\Modules;

use Aedea\Core\Database\StdCollection;

class Collection extends StdCollection {
	
	public function __construct( $params = array() ){
		parent::__construct($params);
		
		$this->addTable('configuration', 'cf');
		$this->idField = 'cf.configuration_id';
		$this->setDistinct(true);
		
		$this->objectType = __NAMESPACE__ . '\Object';		
	}
		
	public function filterByConfigurationKey( $arg ){		
		$this->addWhere("cf.configuration_key = '" . $arg . "'");
	}
}
