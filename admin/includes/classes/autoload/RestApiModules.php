<?php

class RestApiModules extends RestApi {

	public function get($params){
		
		$modules_installed = 
			$this->query($params['GET']['module']) 
				? 
			$this->query($params['GET']['module']) : []
		;
		$array = [];
		$path = $params['GET']['path'];
		$module_directory = $params['GET']['module_directory'];
		
		if ($dir = @dir($module_directory)) {
			while ($file = $dir->read()) {
				if (!is_dir($module_directory . $file)) {
					if( !in_array($file, $modules_installed) ){
						if( $path == 'dashboard'){
							// find path only in admin directory
							require(DIR_WS_MODULES . $path . '/' . $file);
						}else{
							// find file path in catalog
							require(DIR_FS_CATALOG_MODULES . $path . '/' . $file);
						}
						// replace php extension to use instead of function
						$class_name = str_replace('.php', '', $file);
						
						$class = new $class_name();
						$array[] = [
							code => $class->code,
							title => $class->title,
							description => $class->description,
							sort_order => $class->sort_order,
							enabled => $class->enabled
						];
					}
				}
			}
		}
		
		return [
			data => $array
		];
		
	}
	
	public function post(){
			
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
