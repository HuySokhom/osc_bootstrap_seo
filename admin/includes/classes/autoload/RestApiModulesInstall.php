<?php

class RestApiModulesInstall extends RestApi {

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
							require_once DIR_WS_MODULES . $path . '/' . $file;
							// include languages
							include_once DIR_WS_LANGUAGES . 'english/modules/' . $path . '/' . $file;
						}else{
							// find file path in catalog
							require_once DIR_FS_CATALOG_MODULES . $path . '/' . $file;
							// include languages
							include_once DIR_FS_CATALOG_LANGUAGES . 'english/modules/' . $path . '/' . $file;
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
			sort($array);
			$dir->close();
		}
		
		return [
			data => $array
		];
		
	}
	
	public function post($params){
		$path = $params['POST']['path'];
		$class_name =  $params['POST']['code'];
		$module_name = $params['POST']['module'];
		
		if( $path == 'dashboard'){
			// find path only in admin directory
			require(DIR_WS_MODULES . $path . '/' . $class_name . '.php');
		}else{
			// find file path in catalog
			require(DIR_FS_CATALOG_MODULES . $path . '/' . $class_name . '.php');
		}		
		$module = new $class_name();
		// remove module if already installed
		if ($module->check() > 0) { 
			$module->remove();
		}
		$module->install();		
		$modules_installed =
			$this->query($module_name)
				?
			$this->query($module_name) : []
		;
		// add new module file if not existing for update cf key value MODULE
		if (!in_array( $class_name . '.php', $modules_installed)) {
			$modules_installed[] = $class_name . '.php';
		}
		// update main Module
		tep_db_query("
			update
				" . TABLE_CONFIGURATION . "
			set
				configuration_value = '" . implode(';', $modules_installed) . "'
			where
				configuration_key = '" . $module_name . "'
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
