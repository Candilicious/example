<?php
include ("Sendgrid.php");
include ("HistoryController.php");
include ("'/../models/History.php");
include ("'/../models/Contact.php");
class Form_processing extends Controller  {
	private $array_email;
	private $template;
	function __construct () {
		parent::__construct();
		if(isset($_POST["template"]) && isset($_POST["string_email"])) {
			$string_email=htmlspecialchars($_POST['string_email']); //получение строки с email
			$template=htmlspecialchars($_POST['template']); //id шаблона
			try {
				$Sendgrid=new Send($_ENV['SENDGRID_API_KEY']);
				$string_email=$this->Preparation_string_email($string_email);
				$array_email=$this->Create_array_email($string_email);
			}
			catch (Exception $ex) {
				$string_error=$ex->getMessage();
			}

			if(empty($string_error)) {//если ошибок не обнаружено
				$this->array_email=$array_email;
				$this->template=$template;
				$Sendgrid->Send_letter($_ENV['EMAIL'], $_ENV['EMAILDESCRIPTION'], $array_email,$this->template,$_ENV['SUBJECTDEFAULT']);
				$History=new HistoryController();
				$History->AddHistory($this->template,$this->array_email);

			}
		}
		$this->Print($string_email, $string_error);
	}

	public function Get_array_email() {
		return $this->array_email;
	}

	public function Get_id_template() {
		return $this->id_template;
	}

	public function Print($string_email, $string_error) {
		$Contact=new Contact();
		$array_contacts=$Contact->getListContacts();
		$Sendgrid=new Send($_ENV['SENDGRID_API_KEY']);
		$templates=$Sendgrid->Get_template(); //массив шаблонов sendgrid
		$History=new History();
		$array_history=$History->getHistory();
		echo $this->twig->render('form.html', array('templates'=>$templates,'count_templates'=>count($templates["templates"]),'string_email'=>$string_email,'string_error'=>$string_error, 'array_email'=>$this->array_email, 'id_template'=>$this->template, 'array_history'=>$array_history,'contacts'=>$array_contacts));
	} 

	//подготовка строки
	public function Preparation_string_email($string_email) {
		if(empty($string_email)) throw new Exception ("Пустая строка");
		$string_email=str_replace(array("\n",",",";","-","|"), " ", $string_email); //заменить остальные разделители кроме пробела
		$string_email = preg_replace('/\s+/', ' ', $string_email); //заменить множественные пробелы
		$string_email=trim($string_email," "); //удалить лишние проблемы в конце или в начале строки
		return $string_email;
	}

	//получение массива email адресов
	public function Create_array_email($string_email) {
		$ex_s=explode(" ", $string_email);
		$ex_s=array_unique($ex_s);
		foreach ($ex_s as $s) {
			if(!filter_var($s, FILTER_VALIDATE_EMAIL)) {
				throw new Exception ("Неверный адрес: ".$s.". Проверьте строку.");
			}
		}
		return $ex_s;
	}
}