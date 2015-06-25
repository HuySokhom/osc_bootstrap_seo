<?php

namespace OSC\ProductPost;

use Aedea\Core\Database\StdCollection;

class Collection extends StdCollection {
	
	public function __construct( $params = array() ){
		parent::__construct($params);
		
		$this->addTable('post_products', 'pp');
		$this->idField = 'pp.id';
		$this->setDistinct(true);		
		$this->objectType = __NAMESPACE__ . '\Object';	
	}
	
	public function filterByStatus( $arg ){
		$this->addWhere("pp.status = '" . (int)$arg . "'");
	}
	
	public function filterByPostId( $arg ){
		$this->addWhere("pp.id = '" . (int)$arg. "' ");
	}
}
