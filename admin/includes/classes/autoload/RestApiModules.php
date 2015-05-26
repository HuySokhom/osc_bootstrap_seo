<?php

class RestApiModules extends RestApi {

	public function get(){
		return array(
			'data' => array('test' => 'test')
		);
	}
}
