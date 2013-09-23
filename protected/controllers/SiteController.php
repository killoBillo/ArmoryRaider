<?php

class SiteController extends RaiderController
{
	
	public $layout='//layouts/column2Home';
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		if(!Yii::app()->user->isGuest) {

		// recupero i prossimi 10 eventi
		$eventList =  RaiderEvents::getLastEvents(10);
		$this->render('index', array(
						'events'=>$eventList,
		));
		
		}else
			$this->actionLogin();
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$this->layout = '//layouts/column2Login';
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
	
	
	
	public function actionRegister() {
		$this->layout = '//layouts/column2Login';
		$model = new RegisterForm;
		
		
		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='register-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		
		// collect user input data
		if(isset($_POST['RegisterForm']))
		{
			$post = $_POST['RegisterForm'];
//			var_dump($post);
			$post['password'] = $post['verifypassword'] = md5($post['password']);
			$model->attributes= $post;
//			var_dump($model->attributes);exit;
			
			// validate user input and redirect to the login page if valid
			if($model->validate() && $model->saveModel()) {
				/**
				 * creo una riga vuota per l'utente nella tabella userattributes, che poi imposterà nel suo profilo.
				 * imposto soltanto i campi:
				 * user_id con l'id dell'utente
				 * role_id con il ruolo di default, che ha id 2
				 * locale = config->locale.
				 * timezone = config->timezone.
				 */
				$config = Config::model()->findByPk(1);
				$modelUser = User::model()->findByAttributes(array('username'=>$model->username));
				$modelUserAttr = new Userattributes();
				$attributes = array(
					'user_id'		=>$modelUser->id,
					'guildrole_id'	=>2,
					'locale'		=>$config->locale,
					'timezone'		=>$config->timezone,
				);
				
				$modelUserAttr->attributes = $attributes;
				$modelUserAttr->save();
				
				// invio la mail di attivazione dell'account e redirigo alla home
				$this->sendActivationEmail();
				$this->redirect(Yii::app()->getHomeUrl());
			}
		}	
			
		// display the register page
		$this->render('register',array('model'=>$model));		
	}
	
	private function sendActivationEmail() {
		$model = new User();
		$model = User::model()->findByAttributes(array('username'=>$_POST['RegisterForm']['username']));

		// email params building		
		$name = Yii::app()->name.' Register Module';
		$subject = 'Activate your account';
		$activation_key = md5($_POST['RegisterForm']['username']);
		$url = 'http://'.Yii::app()->request->getServerName();
		$url .= CController::createUrl('site/activate', array('activation_key'=>$activation_key, 'id'=>$model->id));
		$body = Yii::t('locale', 'Welcome to the Armory Raider, click the activation link below to activate your account.<br>');
		$body.= "Activation link : <a href='".$url."'> LINK </a>";
		
		RaiderFunctions::sendMail($name, $model->email, $subject, $body);
		Yii::app()->user->setFlash('register',Yii::t('locale', 'An Email has been sent to you. Check your inbox to activate this account.'));
	}
	
	
	public function actionActivate() {
		if(isset($_GET['activation_key'])) {
			$key = $_GET['activation_key'];
			$id = $_GET['id'];
			
			$model = User::model()->findByPk($id);
			if($model->activation_key == $key) {
				$model->setAttribute('status', 1);
				// per aggirare la regola del password confirm, trovare modo corretto nelle prossime release
				$model->setAttribute('repeat_password', $model->password);
				
				if($model->validate() && $model->save()) {
					Yii::app()->user->setFlash('register',Yii::t('locale' ,'CONGRATULATIONS, your account has been activated! You can login with your credentials.'));	
					$this->redirect(Yii::app()->homeUrl);
				}
			}
		}
	}
	
	
	
	public function actionResetpassword($id = null) {
		$this->layout = '//layouts/column2Login';
		
		/**
		 *  se non è settato l'id, vuol dire che non abbiamo cliccato sul link nella mail
		 *  quindi la procedura inizia dal principio:
		 *  - chiedo la mail
		 *  - verifico che sia associata ad una utenza
		 *  - se lo è, verifico che non ci sia già una richiesta con
		 *    il campo activated a 0, se c'è riuso la stessa password 
		 *  - se non c'è, scrivo le info sulla tabella "reset_password" 
		 *    ed invio la mail con il link per il reset. 
		 */
		if(!isset($id)) {
			$model =  new User;
			
			if(isset($_POST['User']['email'])) {
				if(!empty($_POST['User']['email'])) {
					$email = $_POST['User']['email'];
					$user = User::model()->findAll("email like :email", array(':email'=>$email));
					
					if(!empty($user)) {
						// imposto un flag a false
						$ok = false;
						// controllo se esiste su DB una richiesta da tale utente, non ancora attivata
						$resetPsw = ResetPassword::model()->findAll("user_id = :user_id AND activated = 0", array(':user_id'=>$user[0]->id));
						
						// se esiste recupero l'id e setto il flag a true
						if(!empty($resetPsw)) {
							$id = $resetPsw[0]->id;
							$ok = true;
						// se non esiste, la creo
						}else{
							$attributes = array(
								'user_id'=>$user[0]->id,
								'psw_temp'=>RaiderFunctions::generateRandomString(),
								'activated'=>0,
								'data_richiesta'=>date('Y-m-d H:i:s'),
							);
							
							$resetPsw = new ResetPassword();
							$resetPsw->setAttributes($attributes);
							
							if($resetPsw->validate() && $resetPsw->save()) {
								// se riesco a scrivere la richiesta su db, metto il flag a true e recupero l'idù
								$id = $resetPsw->id;
								$ok = true;
							}							
						}
	
						// se il flag è true invio la mail e torno alla login.
						if($ok) {
							// costruisco i paramentri per la mail		
							$name = Yii::app()->name.' Reset Password Module';
							$subject = 'Reset your password';
							$url = 'http://'.Yii::app()->request->getServerName();
							$url .= CController::createUrl('site/reset', array('id'=>$id));
							$body = Yii::t('locale', 'A reset password has been required for this email address, click the link below to reset your password, or ignore this email');
							$body.= "Reset link : <a href='".$url."'> LINK </a>";
							
							//invio la mail
							RaiderFunctions::sendMail($name, $user[0]->email, $subject, $body);
							
							Yii::app()->user->setFlash('register',Yii::t('locale' ,'An Email has been sent to you. Check your inbox to reset your password.'));	
							$this->redirect(Yii::app()->homeUrl);
						}					
					}else
						// se non trovo l'account segnalo l'accaduto all'utente 
						Yii::app()->user->setFlash('resetpsw_err',Yii::t('locale', 'Account not found'));
				}else 
					// se il modulo è stato inviato vuoto o mal compilato
					Yii::app()->user->setFlash('resetpsw_err',Yii::t('locale', 'Insert a valid email address'));
				
			}
		
			// visualizzo la vista di reset della password
			$this->render('resetpassword', array('model'=>$model));			
			
		/**
		 * se arriva l'id vuol dire che è stato cliccato il link nella email
		 * quindi:
		 * - metto 1 sul campo "activate" della tabella reset_password
		 * - sostituisco la password nella tabella user
		 * - invio l'email con la nuova password all'utente 
		 * - nel caso in cui venga passato un id già attivato, segnalo la cosa all'utente.
		 */ 
		}else{
			$resetPsw = ResetPassword::model()->findByPk($id);
			$model = User::model()->findByPk($resetPsw->user_id);
			
			// se la richiesta è già stata attivata, segnalo la cosa all'utente
			if($resetPsw->activated) {
				Yii::app()->user->setFlash('resetpsw_err',Yii::t('locale', 'Request expired or already used'));
				$this->render('resetpassword', array('model'=>$model));
			// altrimenti imposto ad 1 il campo activated, modifico la password dell'utente ed invio l'email		
			}else{
				$resetPsw->activated = 1;
				$resetPsw->data_attivazione = date('Y-m-d H:i:s');
				$model->password = $model->repeat_password = md5($resetPsw->psw_temp);
				
				// se salvo correttamente i model, invio la mail e ridireziono alla login
				if($resetPsw->save() && $model->save()) {
					// costruisco i paramentri per la mail		
					$name = Yii::app()->name.' Reset Password Module';
					$subject = 'Reset your password';
					$body = sprintf(Yii::t('locale', 'HI! your new password is: %s, change it in your profile as soon as you can.'), $resetPsw->psw_temp);
					
					//invio la mail
					RaiderFunctions::sendMail($name, $model->email, $subject, $body);
					
					Yii::app()->user->setFlash('register',Yii::t('locale' ,'A new password has been sent to you. Check your inbox.'));	
					$this->redirect(Yii::app()->homeUrl);					
				}
			}
		}
	}
	
	
}