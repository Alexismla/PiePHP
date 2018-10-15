<?php

namespace Controller;

use \Core\Controller;
use \Model\UserModel;
use \Core\Entity;


class UserController extends Controller
{
	public function __construct()
	{
		$this->entity = new Entity();
	}

	public function registerAction()
	{
		$this->render('register');
		if (isset($_POST['email']) && isset($_POST['password']))
			{
				$user = new \Model\UserModel($params);
				if ($user->CheckEmail()) {
					$this->entity->create();
					header('location:login');
				}
				else {
					echo 'email deja pris';
				}
			
		}



		// if (isset($_POST['submit'])) {
		// 	if (isset($_POST['password']) && isset($_POST['email'])) {
		// 		$login = new UserModel();
		// 		$login->create($_POST['email'],$_POST['password']);

		// 	}	
	}

	public function loginAction()
	{
		$this->render('login');
		if (isset($_POST['email']) && isset($_POST['password']))
			{
			$this->entity->find();
			echo 'Inscription Reussite';
			header('location:profil');
		}
	}

	public function profilAction()
	{
		$this->render('profil');
		
	}

}
