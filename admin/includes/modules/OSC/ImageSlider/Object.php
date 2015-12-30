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
				'id',
				'text',
				'image',
				'link',
				'sort_order'
			)
		);

		return parent::toArray($args);
	}

	public function load( $params = array() ){
		$q = $this->dbQuery("
			SELECT
				text,
				link,
				status,
				image,
				sort_order
			FROM
				image_slider
			WHERE
				id = '" . (int)$this->getId() . "'	
		");

		if( ! $this->dbNumRows($q) ){
			throw new \Exception(
				"404: Image not found",
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
				name = '" . $this->dbEscape( $this->getName() ) . "'
			WHERE
				id = '" . (int)$this->getId() . "'
		");
		
	}
	
	public function insert()
	{
		$this->dbQuery("
			INSERT INTO
				image_slider
			(
				text,
				link,
				image,
				sort_order,
				create
			)
				VALUES
			(
				'" . $this->dbEscape($this->getText()) . "',
				'" . $this->dbEscape($this->getLink()) . "',
				'" . $this->dbEscape($this->getImage()) . "',
				'" . $this->dbEscape($this->getSortOrder()) . "',
				NOW()
			)
		");
		$this->setId($this->dbInsertId());
	}

	public function setSortOrder( $string ){
		$this->sortOrder = (string)$string;
	}

	public function getSortOrder(){
		return $this->sortOrder;
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

	public function setText( $string ){
		$this->text = (string)$string;
	}
	
	public function getText(){
		return $this->text;
	}
	
}
