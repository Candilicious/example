<?php
class Email extends Model
{
	function __construct () {parent::__construct();}
	//привязать новый email пользователю
	public function addEmail ($id_contact, $email) {
		$sql = "insert into Email (`id_contact`,`email`) values(?,?)";
		$data=[$id_contact, $email];
	    $this->db->query($sql, $data);
	    return $this->db->query('SELECT LAST_INSERT_ID()', [], 'el');
	}

	public function checkEmail ($email) {
		if($id = $this->db->query('SELECT `id_contact` FROM `Email` WHERE `email`=?', [$email], 'el')) {return true;}
	return false;
	}

	public function getId($email) {
		return $this->db->query('SELECT `id_email` FROM `Email` WHERE `email`=?', [$email], 'el');
	}
}