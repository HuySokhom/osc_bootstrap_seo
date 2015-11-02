<?php

namespace OSC\ImageSlider;

use
	Aedea\Core\Database\StdObject as DbObj
;

class Object extends DbObj {
		
	protected
		$text
		, $image
		, $link
		, $sortOrder
	;
	
	public function toArray( $params = array() ){
		$args = array(
			'include' => array(
				'text',
				'image',
				'link',
				'status',
				'sort_order'
			)
		);
		return parent::toArray($args);
	}

	public function load( $params = array() ){
		$q = $this->dbQuery("
			SELECT
				id,
				text,
				image,
				link,
				status,
				sort_order
			FROM
				image_order
			WHERE
				id = '" . (int)$this->getId() . "'	
		");
		
		if( ! $this->dbNumRows($q) ){
			throw new \Exception(
				"404: Image Slider not found",
				404
			);
		}
		
		$this->setProperties($this->dbFetchArray($q));
	}
	
	public function delete(){
		if( !$this->getId() ) {
			throw new Exception("delete method requires id to be set");
		}
		$this->dbQuery("
			DELETE FROM
				image_slider
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
				image_slider
			SET
				text = '" . $this->dbEscape( $this->getText() ) . "',
				link = '" . $this->dbEscape( $this->getLink() ) . "',
				image = '" . $this->dbEscape( $this->getImage() ) . "',
				sort_order = '" . $this->dbEscape( $this->getSortOrder() ) . "'
			WHERE
				id = '" . (int)$this->getId() . "'
		");
	}
	
	public function updateStatus(){
		if( !$this->getId() ) {
			throw new Exception("save method requires id");
		}
		$this->dbQuery("
			UPDATE
				image_slider
			SET
				status = '" . $this->getStatus() . "'
			WHERE
				id = '" . (int)$this->getId() . "'
		");
	}
	
	public function insert(){	
		$this->dbQuery("
			INSERT INTO
				image_slider
			(
				text,
				link,
				image,
				sort_order,
				status,
				created
			)
				VALUES
			(
				'" . $this->dbEscape( $this->getText() ) . "',
				'" . $this->dbEscape( $this->getLink() ) . "',
				'" . $this->dbEscape( $this->getImage() ) . "',
				'" . $this->dbEscape( $this->getSortOrder() ) . "',
				'" . $this->dbEscape( $this->getStatus() ) . "',
				NOW()
			)
		");	
		$this->setId( $this->dbInsertId() );
	}
	
	public function setText( $string ){
		$this->text = (string)$string;
	}
	
	public function getText(){
		return $this->text;
	}
	
	public function setLink( $string ){
		$this->link = (string)$string;
	}
	
	public function getLink(){
		return $this->link;
	}
	
	public function setImage( $string ){
		$this->image = (string)$string;
	}
	
	public function getImage(){
		return $this->image;
	}
	
	public function setSortOrder( $ing ){
		$this->sortOrder = (int)$int;
	}
	
	public function getSortOrder(){
		return $this->sortOrder;
	}
	
}
