<?php

class Purchases implements ICRUD {

	private $db;

	public function __construct($db) {
		$this->db = $db;
	}


	public function add(IItem $item) {
		$sql = '
			INSERT INTO purchases (name, date_added, email, phone, product_title, product_price,product_id) 
			VALUES (
				"'.$item->name.'",
				"'.date('Y-m-d H:i:s').'",
				"'.$item->email.'",
				"'.$item->phone.'",
				"'.$item->product_title.'",
				"'.$item->product_price.'",
				"'.$item->product_id.'"
			)
		';
		mysqli_query($this->db, $sql);
	}

	public function update($id, IItem $item) {}

	public function updateApproved($id) {

		$sql = '
			UPDATE purchases 
			SET 
			is_approved = 1
			WHERE id = ' . $id;

		mysqli_query($this->db, $sql);

	}


	public function delete($id) {

		$sql = '
			DELETE FROM purchases WHERE id = '. $id;

		mysqli_query($this->db, $sql);

	}

	public function get($id) {

		$sql = '
			SELECT * FROM purchases 
			WHERE id = '.$id;

		$res = mysqli_query($this->db, $sql);
		return mysqli_fetch_assoc($res);

	}

	public function getAll() {

		$sql = 'SELECT * FROM purchases';
		$res = mysqli_query($this->db, $sql);
		$result = array();
		while ( $row = mysqli_fetch_assoc($res) ) {
			$result[] = $row;
		}

		return $result;

	}

	public function getAllData() {

		$sql = 'SELECT * FROM products INNER JOIN purchases ON products.id = purchases.product_id';
		$res = mysqli_query($this->db, $sql);
		$result = array();
		while ( $row = mysqli_fetch_assoc($res) ) {
			$result[] = $row;
		}

		return $result;
	}

}