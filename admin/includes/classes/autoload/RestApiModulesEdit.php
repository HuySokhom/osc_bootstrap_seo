<?php

class RestApiModulesEdit extends RestApi {

	public function get($params){
		
		$path = $params['GET']['path'];
		
		$cn = $params['GET']['class_name'];
		
		if( $path == 'dashboard'){
			require(DIR_WS_MODULES . $path . '/' . $cn . '.php');
		}else{
			require(DIR_FS_CATALOG_MODULES . $path . '/' . $cn . '.php');
		}		
			
		$class = new $cn();
		$key = $class->keys();
		
		$key = "'" . implode("','",$key) . "'";
		
		$sql = tep_db_query("
			SELECT
				configuration_title,
				configuration_key,
				configuration_value,
				configuration_description,
				sort_order,
				use_function,
				set_function
			FROM
				configuration
			WHERE
				configuration_key IN (" . $key . ")
		");
		$array = [];
		while($cf_key = tep_db_fetch_array($sql)){
			$array[] = [
				configuration_title => $cf_key['configuration_title'],
				configuration_value => $cf_key['configuration_value'],
				configuration_description => $cf_key['configuration_description'],
				configuration_key => $cf_key['configuration_key'],
				sort_id => $cf_key['sort_id'],
				use_function => $cf_key['use_function'],
				set_function => $cf_key['set_function']
			];
		}
		
		return [
			data => $array
		];
		
	}
}