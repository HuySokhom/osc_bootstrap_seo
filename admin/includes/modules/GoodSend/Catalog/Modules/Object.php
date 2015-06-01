<?php

namespace GoodSend\Catalog\Modules;

use
	Aedea\Core\Database\StdObject as DbObj
;

class Object extends DbObj {
		
	protected 
		$configurationId
		, $configurationTitle
		, $configurationKey
		, $configurationValue
		, $configurationDescription
		, $configurationGroupId
		, $sortOrder
		, $useFunction
		, $setFunction
	;
	
	public function toArray( $params = array() ){
		$args = array(
			'include' => array(
				'id',
				'configuration_title',
				'configuration_key',
				'configuration_value',
				'configuration_description',
				'sort_order',
				'use_function',
				'set_function'
			)
		);

		return parent::toArray($args);
	}

	public function load( $params = array() ){
		$q = $this->dbQuery("
			SELECT
				configuration_id,
				configuration_title,
				configuration_key,
				configuration_value,
				configuration_description,
				configuration_group_id,
				sort_order,
				use_function,
				set_function
			FROM
				configuration
			WHERE
				configuration_id = '" . (int)$this->getId() . "'	
		");
		
		if( ! $this->dbNumRows($q) ){
			throw new \Exception(
				"404: Configuration not found",
				404
			);
		}
		
		$this->setProperties($this->dbFetchArray($q));
		
	}
	
	public function setConfigurationTitle( $string ){
		$this->configurationTitle = (string)$string;
	}
	
	public function getConfigurationTitle(){
		return $this->configurationTitle;
	}
	
	public function setConfigurationId( $int ){
		$this->configurationId = (int)$int;
	}
	
	public function getConfigurationId(){
		return $this->configurationId;
	}
	
	public function setConfigurationDescription( $string ){
		$this->configurationDescription = $string;	
	}
	
	public function getConfigurationDescription(){
		return $this->configurationDescription;
	}
	
	public function setConfigurationGroupId( $int ){
		$this->configurationGroupId = (int)$int;
	}
	
	public function getConfigurationGroupId(){
		return $this->configurationGroupId;
	}
	
	public function setConfigurationKey( $string ){
		$this->configurationKey = (string)$string;
	}
	
	public function getConfigurationKey(){
		return $this->configurationKey;
	}
		
	public function getConfigurationValue(){
		return $this->configurationValue;
	}

	public function setConfigurationValue( $string ){
		$this->configurationValue = $string;
	}
	
	public function setSortOrder( $int ){
		$this->sortOrder = (int)$int;
	}
	
	public function getSortOrder(){
		return $this->sortOrder;
	}
	
	public function setUseFunction( $string ){
		$this->useFunction = $string;
	}
	
	public function getUseFunction(){
		return $this->useFunction;
	}
	
	public function setSetFunction( $string ){
		$this->setFunction = $string;
	}
	
	public function getSetFunction(){
		return $this->setFunction;
	}

}
