<?php
/*
class Onload
{
	private $login;
	public function __construct()
	{
		$this->login = & get_instance();
	}
	public function check_login()
	{
		$controller=$this->login->router->class;
		$method=$this->login->router->method;
		//echo $controller." ".$method;

		if($this->login->session->userdata("login_id") == null)
		{
			if($method != "login")
			{
				redirect("welcome/login","refresh");
//				exit();
			}
		}
		else
		{
			if($method == "login")
			{
				redirect("","refresh");
//				exit();
			}
		}
	}
}
*/
?>