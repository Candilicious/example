<?php
class Contact extends Model
{
	function __construct () {parent::__construct();}
	//привязать новый email пользователю
	public function addContact ($name_contact='') {
		if($name_contact=='') {
			$sql = "insert into Contact values(DEFAULT,DEFAULT)";
			 $this->db->query($sql, []);
		}
		else {
			$sql = "insert into Contact (`name_contact`) values(?)";
			$data=[$name_contact];
			$this->db->query($sql, $data);
		}
	    return $this->db->query('SELECT LAST_INSERT_ID()', [], 'el');
	}

	public function checkContact ($name_contact) {
		if($id = $this->db->query('SELECT `id_contact` FROM `Contact` WHERE `name_contact`=?', [$name_contact], 'el')) {return true;}
	return false;
	}

	public function getId($id_contact) {
		return $this->db->query('SELECT `id_contact` FROM `Contact` WHERE `id_contact`=?', [$id_contact], 'el');
	}
	public function getListContacts() {
		return $this->db->query('SELECT e.email, c.id_contact, c.name_contact FROM `Email` e LEFT JOIN `Contact` c ON e.id_contact= c.id_contact Order BY c.id_contact', [], 'assoc');
	}
}