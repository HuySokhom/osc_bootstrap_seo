<?php

use
	OSC\Vehicles\Type\Collection
		as VehiclesType,
	OSC\Vehicles\Brand\Collection
		as VehiclesBrand,
	OSC\Vehicles\Model\Collection
		as VehiclesModel
;

class RestApiVehicles extends RestApi {

	public function get(){
		$col = new VehiclesModel();
		$this->applyFilters($col, $params);
		$this->applySortBy($col, $params);
		return $this->getReturn($col, $params);
	}
	
}
