<?php 

class History extends Model
{
	function __construct () {parent::__construct();}
	//история отправок
	public function getHistory () {
		return $this->db->query('SELECT c.name_contact, e.email, h.datetime FROM `History` h LEFT JOIN `Email` e ON h.id_email=e.id_email LEFT JOIN `Contact` c ON c.id_contact=e.id_contact', [], 'assoc');
	}

	//добавить запись в историю
	public function addHistrory ($id_email, $id_template) {
		$sql = "insert into History (`id_email`,`datetime`,`id_template`) values(?,NOW(),?)";
		$data=[$id_email, $id_template];
	    return $this->db->query($sql, $data);
	}
}