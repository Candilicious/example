<?php 
include ("'/../models/Template.php");
include ("'/../models/Email.php");
class HistoryController extends Controller  { 
	public function AddHistory($template,$array_email)
	{
		$Template=new Template();
		$Email=new Email();
		$Contact=new Contact();
		$History=new History();
		$Sendgrid=new Send($_ENV['SENDGRID_API_KEY']);
		if(!($Template->checkTemplate($template))) {//проверяем существует ли шаблон с таким id
			$Template->addTemplate($template, $Sendgrid->Get_name_template($template));
		}
		
		$id_template=$Template->getId($template);
		//добавление записей в историю
		foreach ($array_email as $email ) {
			if(!($Email->checkEmail($email))) {	//если такой email еще не закреплен ни за одним пользователем
				$id_contact=$Contact->addContact();
				$id_email=$Email->addEmail($id_contact, $email);
			}
			else {$id_email=$Email->getId($email);}
			$History->addHistrory($id_email,$id_template);
		}
	}
}
