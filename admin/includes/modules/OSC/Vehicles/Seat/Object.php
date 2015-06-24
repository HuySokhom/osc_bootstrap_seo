<?php

namespace OSC\Vehicles\Seat;

use
	Aedea\Core\Database\StdObject as DbObj
;

class Object extends DbObj {
		
	protected
		$seatCount
	;
	
	public function toArray( $params = array() ){
		$args = array(
			'include' => array(
				'id',
				'seat_count'
			)
		);

		return parent::toArray($args);
	}

	public function load( $params = array() ){
		$q = $this->dbQuery("
			SELECT
				id,
				seat_count
			FROM
				vehicle_seats
			WHERE
				id = '" . (int)$this->getId() . "'	
		");
		
		if( ! $this->dbNumRows($q) ){
			throw new \Exception(
				"404: Vehicle Seats not found",
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
				vehicle_seats
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
				vehicle_seats
			SET
				seat_count = '" . $this->dbEscape( $this->getName() ) . "'
			WHERE
				id = '" . (int)$this->getId() . "'
		");
		
	}
	
	public function insert(){	
		$this->dbQuery("
			INSERT INTO
				vehicle_seats
			(
				seat_count,
				created
			)
				VALUES
			(
				'" . $this->dbEscape( $this->getSeatCount() ) . "',
				NOW()
			)
		");	
		$this->setId( $this->dbInsertId() );
	}
	
	public function SetSeatCount( $int ){
		$this->seatCount = (int)$int;
	}
	
	public function getSeatCount(){
		return $this->seatCount;
	}
	
}
