<?php

use
	GoodSend\Catalog\Modules\Collection
		as ModuleCol
;

class RestApiModule extends RestApi {

	public function get($params){		
		$class_name = $this->query($params['GET']['module']);
		$array = [];
		$path = $params['GET']['path'];
		if( count($class_name) >= 1 ){
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
		}
		
		return [
			data => $array
		];
		
	}
	
	public function delete($params){		
		// loop to get key from delete parse data in string
		foreach ($params['DELETE'] as $key => $value) {
			$key_name = $key;
		}
		// decode string to object 
		$key = json_decode($key_name);
		$path = $key->path;
		$class_name = $key->code;
		var_dump($path);
		if( $path == 'dashboard'){
			// find path only in admin directory
			require_once DIR_WS_MODULES . $path . '/' . $class_name . '.php';
		}else{
			// find file path in catalog
			require_once DIR_FS_CATALOG_MODULES . $path . '/' . $class_name . '.php';
		}
		
		$class = new $class_name();
		
		$modules_installed = $this->query($key->module);
		// remove module key
		if (($index = array_search( $class_name . '.php', $modules_installed)) !== false) {
			unset($modules_installed[$index]);			
		}
		
		$class->remove();
		
		// update main Module
		tep_db_query("
			update 
				" . TABLE_CONFIGURATION . " 
			set 
				configuration_value = '" . implode(';', $modules_installed) . "' 
			where 
				configuration_key = '" . $key->module . "'
		");
		
	}
	
	
	public function query($params){
		$sql = tep_db_query("
			SELECT
				configuration_title,
				configuration_key,
				configuration_value
			FROM
				configuration
			WHERE
				configuration_key = '" . $params . "'
		");
		$cf_key = tep_db_fetch_array($sql);
		$class_name = null;
		if( $cf_key['configuration_value'] ){
			$class_name = explode(";", $cf_key['configuration_value']);
		}
		return $class_name;
	}
}