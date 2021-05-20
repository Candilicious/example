<?php
class Template extends Model
{
	function __construct () {parent::__construct();}
	//привязать новый email пользователю
	public function addTemplate ($id_template_sendgrid, $name_template) {
		$sql = "insert into Template (`id_template_sendgrid`,`name_template`) values(?,?)";
		$data=[$id_template_sendgrid, $name_template];
	    return $this->db->query($sql, $data);
	}

	public function checkTemplate ($id_template_sendgrid) {
		if($id = $this->db->query('SELECT `id_template` FROM `Template` WHERE `id_template_sendgrid`=?', [$id_template_sendgrid], 'el')) {return true;}
	return false;
	}

	public function getId($id_template_sendgrid) {
		return $this->db->query('SELECT `id_template` FROM `Template` WHERE `id_template_sendgrid`=?', [$id_template_sendgrid], 'el');
	}
	public function getName($id_template_sendgrid) {
		return $this->db->query('SELECT `name_template` FROM `Template` WHERE `id_template_sendgrid`=?', [$id_template_sendgrid], 'el');
	}
	public function UpdateName($id_template_sendgrid, $new_name) {
		return $this->db->query('UPDATE `Template` SET `name_template`=? WHERE `id_template_sendgrid`=?', [$name_template, $id_template_sendgrid]);
	}
}