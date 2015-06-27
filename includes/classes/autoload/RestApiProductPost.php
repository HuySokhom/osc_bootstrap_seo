<?php

use
	OSC\ProductPost\Collection
		as ProductPostCol
;

class RestApiProductPost extends RestApi {

	public function get(){
		$col = new ProductPostCol();
		// filter with default status 1
		$params['filters']['status'] = 1;
		$this->applyFilters($col, $params);
		$this->applySortBy($col, $params);
		return $this->getReturn($col, $params);
	}
}

