<?php

class RestApiImageUpload extends RestApi {

	public function post( $params = array() ){
		foreach ( $_FILES as $file ){

			// get extension
			$ext = pathinfo($file['name'], PATHINFO_EXTENSION);

			// check extension is valid image
			if( ! in_array($ext, array(
				'jpg',
				'jpeg',
				'gif',
				'png',
			))){
				continue;
			}

			// add timestamp to image name to prevent against overwrites
			$file['name'] = substr($file['name'], 0, strlen($ext) * -1)
				. time()
				. '.' . $ext
			;

			$image = '';
			if(move_uploaded_file(
				$file['tmp_name'],
				DIR_FS_CATALOG . 'images/' . $file['name']
			)){
				$image = $file['name'];
			} else {
				$image = 'error';
			}

			return array(
				'data' => $image
			);
		}

	}
	
}