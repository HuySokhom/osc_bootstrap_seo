<?php

use
	OSC\Customer\Collection
		as CustomerCol
;

class RestApiSessionCustomer extends RestApi {

	public function get(){
		
		$col = new CustomerCol();
		
		$customerId = $this->getOwner()->getId();
		
		if ( ! $customerId ) {
			throw new \Exception(
				"403: Access Denied",
				403
			);
		}else{
			
			$col->filterById($customerId);
			$this->applySortBy($col, $params);
			return $this->getReturn($col, $params);
			
		}
	}
}
