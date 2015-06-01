<?php

use
	GoodSend\Catalog\Modules\Collection
		as ModuleCol
;

class RestApiModule extends RestApi {

	public function get(){
		
		$col = new ModuleCol();
		
		$col->filterByConfigurationKey('MODULE_ADMIN_DASHBOARD_ADMIN_LOGINS_SORT_ORDER');
		$this->applyFilters($col, $params);
		$this->applyLimit($col, $params);
		$this->applySortBy($col, $params);
		
		return $this->getReturn($col, $params);
	}
}