<?php

use
	OSC\ProductPost\Collection
		as ProductPostCol
	, OSC\ProductPost\Object
		as ProductPostObj
	, OSC\ProductToCategory\Object
		as ProductToCategoryObj
	, OSC\ProductDescription\Object
		as ProductDescriptionObj
	, OSC\ProductContactPerson\Object
		as ProductContactPersonObj
	, OSC\ProductImage\Object
		as ProductImageObj
;

class RestApiSessionUserProductPost extends RestApi {

	public function get(){
		$col = new ProductPostCol();
		$userId = $this->getOwner()->getId();
		if( !$userId ){
			throw new \Exception(
				"403: Access Denied",
				403
			);
		}else {
			$col->filterByCustomersId($userId);
			// filter with default status 1
//			$params['filters']['status'] = 1;
			$this->applyFilters($col, $params);
			$this->applySortBy($col, $params);
			return $this->getReturn($col, $params);
		}
	}

	public function post($params){
		$userId = $this->getOwner()->getId();
		if( !$userId ){
			throw new \Exception(
				"403: Access Denied",
				403
			);
		}else {
			$productObject = new ProductPostObj();
			$userId = $this->getOwner()->getId();
			$productObject->setCustomersId($userId);
			$productObject->setProperties($params['POST']['product'][0]);
			$productObject->insert();
			$productId = $productObject->getProductsId();

			$productDetailObject = new ProductDescriptionObj();
			$productDetailObject->setProductsId($productId);
			$productDetailObject->setProperties($params['POST']['product_detail'][0]);
			$productDetailObject->insert();

			$productToCategoryObject = new ProductToCategoryObj();
			$productToCategoryObject->setProductsId($productId);
			$productToCategoryObject->setProperties($params['POST']['categories'][0]);
			$productToCategoryObject->insert();

			$productContactPersonObject = new ProductContactPersonObj();
			$productContactPersonObject->setProductsId($productId);
			$productContactPersonObject->setCustomersId($userId);
			$productContactPersonObject->setProperties($params['POST']['contact_person'][0]);
			$productContactPersonObject->insert();

			$fields = $params['POST']['products_image'];
			foreach ( $fields as $k => $v){
				$productImageObject = new ProductImageObj();
				$productImageObject->setProperties($v);
				$productImageObject->setProductsId($productId);
				$productImageObject->insert();
			}
			unset($params);
			return array(
				'data' => array(
					'id' => $productId
				)
			);
		}
	}

	public function put($params){

	}

	public function delete($params){

	}

}

