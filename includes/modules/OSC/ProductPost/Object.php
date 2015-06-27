<?php

namespace OSC\ProductPost;

use
	Aedea\Core\Database\StdObject as DbObj
;

class Object extends DbObj {
		
	protected
		$customersId
		, $vehiclesType
		, $vehiclesBrand
		, $vehiclesModel
		, $vehiclesSeat
		, $postTitle
		, $image
		, $imageThumbnail
		, $machinCc
		, $transmission
		, $yearOfManufacture
		, $description
		, $price
		, $contactName
		, $productsView
	;
	
	public function toArray( $params = array() ){
		$args = array(
			'include' => array(
				'id',
				'customers_id',
				'vehicles_type',
				'vehicles_brand',
				'vehicles_model',
				'vehicles_seat',
				'post_title',
				'image',
				'image_thumbnail',
				'machin_cc',
				'transmission',
				'year_of_manufacture',
				'description',
				'price',
				'contact_name',
				'products_view',
			)
		);

		return parent::toArray($args);
	}

	public function __construct( $params = array() ){
// 		parent::__construct($params);
		
// 		$this->fields = new FieldsCol;
	}

	public function load( $params = array() ){
		$q = $this->dbQuery("
			SELECT
				customers_id,
				vehicles_type,
				vehicles_brand,
				vehicles_model,
				vehicles_seat,
				post_title,
				image,
				image_thumbnail,
				machin_cc,
				transmission,
				year_of_manufacture,
				description,
				price,
				contact_name,
				products_view
			FROM
				post_products
			WHERE
				id = '" . (int)$this->getId() . "'	
		");
		
		if( ! $this->dbNumRows($q) ){
			throw new \Exception(
				"404: Products Post not found",
				404
			);
		}
		
		$this->setProperties($this->dbFetchArray($q));
		
// 		$this->fields->setFilter('template_id', $this->getId());
// 		// @todo: filter by status (passed as param?)
// 		$this->fields->populate();
	}
	
	public function updateStatus() {
		if( !$this->getId() ) {
			throw new Exception("save method requires id");
		}
		$q = $this->dbQuery("
			UPDATE
				post_products
			SET 
				status = '" . (int)$this->getStatus() . "'
			WHERE
				id = '" . (int)$this->getId() . "'
		");
	}
	
	public function updatePostProductView() {
		if( !$this->getId() ) {
			throw new Exception("save method requires id");
		}
		$q = $this->dbQuery("
			UPDATE
				post_products
			SET
				products_view = '" . (int)$this->getProductsView() + 1 . "'
			WHERE
				id = '" . (int)$this->getId() . "'
		");
	}
	
	public function delete(){
		if( !$this->getId() ) {
			throw new Exception("delete method requires id to be set");
		}
		$this->dbQuery("
			DELETE FROM
				post_products
			WHERE
				id = '" . (int)$this->getId() . "'
		");
	}

	public function update(){
		if( !$this->getId() ) {
			throw new Exception("save method requires id");
		}		
		$this->dbQuery("
			UPDATE
				post_products
			SET
				vehicles_brand = '" . (int)$this->getVehiclesBrand() . "',
				vehicles_model = '" . (int)$this->getVehiclesModel() . "',
 				vehicles_type = '" . (int)$this->getVehiclesType() . "',
 				vehicles_seat = '" . (int)$this->getVehiclesSeat() . "',
				post_title = '" . $this->dbEscape( $this->getPostTitle() ) . "',
				image = '" . $this->dbEscape( $this->getImage() ) . "',
				image_thumbnail = '" . $this->dbEscape( $this->getImageThumbnail() ) . "',
				machin_cc = '" . $this->dbEscape( $this->getMachinCc() ) . "',
				transmission = '" . $this->dbEscape( $this->getTransmission() ) . "',
				year_of_manufacture = '" . $this->dbEscape( $this->getYearOfManufacture() ) . "',
				description = '" . $this->dbEscape( $this->getDescription() ) . "',
				price = '" . (int)$this->getPrice() . "',
				contact_name = '" . $this->dbEscape( $this->getContactName() ) . "'
			WHERE
				id = '" . (int)$this->getId() . "'
		");
		
	}
	
	public function insert(){	
		$this->dbQuery("
			INSERT INTO
				post_products
			(
				vehicles_brand,
				vehicles_type,
				vehicles_model,
				vehicles_seat,
				post_title,
				image,
				image_thumbnail,
				machin_cc,
				transmission,
				year_of_manufacture,
				description,
				price,
				contact_name,
				created
			)
				VALUES
			(
				'" . (int)$this->getVehiclesBrand() . "',
				'" . (int)$this->getVehiclesType() . "',
				'" . (int)$this->getVehiclesModel() . "',
				'" . (int)$this->getVehiclesSeat() . "',
 				'" . $this->dbEscape( (int)$this->getPostTitle() ) . "',
				'" . $this->dbEscape( (int)$this->getImage() ) . "',
 				'" . $this->dbEscape( $this->getImageThumbnail() ) . "',
 				'" . $this->dbEscape( $this->getMachinCc() ) . "',
				'" . $this->dbEscape( $this->getTransmission() ) . "',
				'" . $this->dbEscape( $this->getYearOfManufacture() ) . "',
				'" . $this->dbEscape( $this->getDescription() ) . "',
				'" . (int)$this->getPrice() . "',
				'" . $this->dbEscape( $this->getContactName() ) . "',
				NOW()
			)
		");	
		$this->setId( $this->dbInsertId() );
	}
	
	public function setCustomersId( $int ){
		$this->customersId = (int)$int;
	}
	
	public function getCustomersId(){
		return $this->customersId;
	}
	
	public function setVehiclesBrand( $int ){
		$this->vehiclesBrand = (int)$int;	
	}
	
	public function getVehiclesBrand(){
		return $this->vehiclesBrand;
	}
	
	public function setVehiclesModel( $int ){
		$this->vehiclesModel = (int)$int;
	}
	
	public function getVehiclesModel(){
		return $this->vehiclesModel;
	}
	
	public function setVehiclesSeat( $int ){
		$this->vehiclesSeat = (int)$int;
	}
	
	public function getVehiclesSeat(){
		return $this->vehiclesSeat;
	}
		
	public function getVehiclesType(){
		return $this->vehiclesType;
	}

	public function setVehiclesType( $int ){
		$this->vehiclesType = (int)$int;
	}
	
	public function setPostTitle( $string ){
		$this->postTitle = (string)$string;
	}
	
	public function getPostTitle(){
		return $this->postTitle;
	}
	
	public function setImage( $string ){
		$this->image = (string)$string;
	}
	
	public function getImage(){
		return $this->image;
	}
	
	public function setImageThumbnail( $string ){
		$this->imageThumbnail = (string)$string;
	}
	
	public function getImageThumbnail(){
		return $this->imageThumbnail;
	}
	public function setMachinCc( $string ){
		$this->machinCc = (string)$string;
	}
	
	public function getMachinCc(){
		return $this->machinCc;
	}
	
	public function setTransmission( $string ){
		$this->transmission = (string)$string;
	}
	
	public function getTransmission(){
		return $this->transmission;
	}
	
	public function setYearOfManufacture( $string ){
		$this->yearOfManufacture = (string)$string;
	}
	
	public function getYearOfManufacture(){
		return $this->yearOfManufacture;
	}
	
	public function setDescription( $string ){
		$this->description = (string)$string;
	}
	
	public function getDescription(){
		return $this->description;
	}
	
	public function setPrice( $int ){
		$this->price = (int)$int;
	}
	
	public function getPrice(){
		return $this->price;
	}
	
	public function setContactName( $string ){
		$this->contactName = (string)$string;
	}
	
	public function getContactName(){
		return $this->contactName;
	}
	
	public function setProductsView( $int ){
		$this->productsView = (int)$int;
	}
	
	public function getProductsView(){
		return $this->productsView;
	}

}
