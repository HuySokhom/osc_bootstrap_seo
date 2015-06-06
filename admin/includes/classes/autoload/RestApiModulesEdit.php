<?php

class RestApiModulesEdit extends RestApi {

	public function get($params){
		
		$path = $params['GET']['path'];
		
		$cn = $params['GET']['class_name'];
		
		if( $path == 'dashboard'){
			require_once DIR_WS_MODULES . $path . '/' . $cn . '.php';
			// include languages
			include_once DIR_WS_LANGUAGES . 'english/modules/' . $path . '/' . $cn . '.php';
		}else{
			require_once DIR_FS_CATALOG_MODULES . $path . '/' . $cn . '.php';
			// include languages
			include_once DIR_FS_CATALOG_LANGUAGES . 'english/modules/' . $path . '/' . $cn . '.php';
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
		$set_module = [];		
		while($cf_key = tep_db_fetch_array($sql)){
			$set_function = $cf_key['set_function'];
			$value = $cf_key['configuration_value'];
			$key = $cf_key['configuration_key'];
			$set_module_function = '';
			if($set_function){
				eval('$set_module_function .= ' . $set_function . "'" . $value . "', '" . $key . "');");
			}else{
				$set_module_function .= tep_draw_input_field(
					'configuration[' . $key . ']',
					$value
				);
			}
			$set_module[] ='<table>
				<tr>
					<td>
						<b>' . $cf_key['configuration_title'] . '</b>
					</td>
				</tr>
				<tr>
					<td>
						' . $cf_key['configuration_description'] . '
					</td>
				</tr>
				<tr>
					<td>
							' . $set_module_function . '
							<br/><br/>
					</td>
				</tr>
				</table>
			'; 
		}
		
		return [
			data => $set_module
		];
		
	}
}