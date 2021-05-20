<?php
class Send {
	private $api_key;
	private $sg;

	public function Set_api_key($api_key) {
		$this->api_key=$api_key;
	}

	public function Get_api_key() {
		echo $this->api_key;
	}

	function __construct ($api_key) {
		$this->api_key=$api_key;
		$this->sg = new \SendGrid($api_key);
	}

	//получить массив шаблонов
	public function Get_template() {
		try 
		{
			$query_params = ['generations' => 'dynamic'];
			$response = $this->sg->client->templates()->get(null, $query_params);
			$template=$response->body();
			$array_template=json_decode($template, true);
			return $array_template;
		} catch (Exception $e) 
		{
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
	}

	//отправить письмо
	function Send_letter ($emailFrom, $descriptionFrom, $arrayEmailTo, $templateId, $subject) {
		$email = new \SendGrid\Mail\Mail(); 
		$email->setFrom($emailFrom, $descriptionFrom);
		$email->setSubject($subject);
		//если требуется отправить только одному пользователю
		$count_array=count($arrayEmailTo);
		if($count_array==1) {
			$email->addTo($arrayEmailTo[0]);
		}
		else {
			$email->addTo($arrayEmailTo[0]);
			for($i=1;$i<$count_array;$i++) {$email->addBcc($arrayEmailTo[$i]);}
		}
		
		$email->setTemplateId($templateId);
		try {
			$response = $this->sg->send($email);
			/*print $response->statusCode() . "\n";
			print_r($response->headers());
			print $response->body() . "\n";*/
		} catch (Exception $e) {
			echo 'Caught exception: '. $e->getMessage() ."\n";
			return false;
		}
	}

	//получить название шаблона
	public function Get_Name_template($id_template) {
		$templates=$this->Get_template();
		for($i=0;$i<count($templates["templates"]);$i++) 
		{
			if($templates['templates'][$i]['id']==$id_template) {
				return $templates['templates'][$i]['name'];
			}
		}
		return null;
	}
}