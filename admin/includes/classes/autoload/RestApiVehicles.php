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

	public function get($params){
		
		if( $params['GET']['Type'] == 'model'){
			$col = new VehiclesModel();
		}
		elseif ($params['GET']['Type'] == 'brand'){
			$col = new VehiclesBrand();
		}else{
			$col = new VehiclesType();
		}
		
		return $this->getReturn($col, $params);
		
	}
	
}
