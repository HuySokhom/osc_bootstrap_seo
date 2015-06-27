<?php

namespace OSC\Location;

use
	Aedea\Core\Database\StdObject as DbObj
;

class Object extends DbObj {
		
	protected
		$locationName
	;
	
	public function toArray( $params = array() ){
		$args = array(
			'include' => array(
				'id',
				'location_name',
			)
		);

		return parent::toArray($args);
	}
	
	public function load( $params = array() ){
		$q = $this->dbQuery("
			SELECT
				location_name
			FROM
				location
			WHERE
				id = '" . (int)$this->getId() . "'	
		");
		
		if( ! $this->dbNumRows($q) ){
			throw new \Exception(
				"404: Location not found",
				404
			);
		}
		
		$this->setProperties($this->dbFetchArray($q));
		
	}
	
	public function setLocationName( $string ){
		$this->locationName = (string)$string;
	}
	
	public function getLocationName(){
		return $this->locationName;
	}
	
}
