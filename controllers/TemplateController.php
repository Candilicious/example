<?php 
class HistoryController extends Controller  {
		//обновление массива шаблонов при необходимости
	public function TemplateUpdate ($array_templates) {
		foreach ($array_templates as $template ) {
			//если название из Sendgreen не соответствует имени в базе данных
			if($Sendgrid->Get_Name_template($template['name'])!=$Template->getName($template)) {
				//обновить название
				$Template->UpdateName($template, $Sendgrid->Get_Name_template($template));
			}
		}
	}
}