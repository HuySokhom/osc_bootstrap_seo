<?php

use
	GoodSend\Catalog\Modules\Collection
		as ModuleCol
;

class RestApiModule extends RestApi {

	public function get($params){
		
		$sql = tep_db_query("
			SELECT
				configuration_title,
				configuration_key,
				configuration_value
			FROM
				configuration
			WHERE
				configuration_key = '" . $params['GET']['module'] . "'
		");
		
		$cf_key = tep_db_fetch_array($sql);
		$class_name = explode(";", $cf_key['configuration_value']);
		
		$array = [];
		$path = $params['GET']['path'];
		foreach ($class_name as $cn){
			if( $path == 'dashboard'){
				// find path only in admin directory 
				require(DIR_WS_MODULES . $path . '/' . $cn);
			}else{
				// find file path in catalog
				require(DIR_FS_CATALOG_MODULES . $path . '/' . $cn);
			}
			// replace php extension to use instead of function 
			$cn = str_replace('.php', '', $cn);
			
			$class = new $cn();
			$array[] = [
				code => $class->code,
				title => $class->title,
				description => $class->description,
				sort_order => $class->sort_order,
				enabled => $class->enabled
			];
		}	
		
		return [
			data => $array
		];
		
	}
}