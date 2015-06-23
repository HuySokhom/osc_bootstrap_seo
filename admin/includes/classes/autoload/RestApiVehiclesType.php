<?php

use
	OSC\Vehicles\Type\Collection
		as VehiclesType
;

class RestApiVehiclesType extends RestApi {

	public function get(){
		$col = new VehiclesType();
		$this->applyFilters($col, $params);
		$this->applySortBy($col, $params);
		return $this->getReturn($col, $params);
	}
	
}
