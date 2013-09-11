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
//		var_dump( $model, $_POST['RegisterForm']['username']);exit;

		// email params building		
		$name = Yii::app()->name.' Register Module';
		$subject = 'Activate your account';
		$activation_key = md5($_POST['RegisterForm']['username']);
		$url = 'http://'.Yii::app()->request->getServerName();
		$url .= CController::createUrl('site/activate', array('activation_key'=>$activation_key, 'id'=>$model->id));
		$body = Yii::t('locale', 'Welcome to the Armory Raider, click the activation link below to activate your account.<br>');
		$body.= "Activation link : <a href='".$url."'> LINK </a>";
		//encoding email contents & headers	
		$name='=?UTF-8?B?'.base64_encode($name).'?=';
		$subject='=?UTF-8?B?'.base64_encode($subject).'?=';
		
		$headers = 'MIME-Version: 1.0'."\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
		$headers .= "From: $name <{".Yii::app()->params['adminEmail']."}>\r\n";	
		$headers .= "Reply-To: {".Yii::app()->params['adminEmail']."}\r\n";
		
//		$headers="From: $name <{".Yii::app()->params['adminEmail']."}>\r\n".
//			"Reply-To: {".Yii::app()->params['adminEmail']."}\r\n".
//			"MIME-Version: 1.0\r\n".
//			"Content-type: text/plain; charset=UTF-8";
	
		mail($model->email,$subject,$body,$headers);
		Yii::app()->user->setFlash('register',Yii::t('locale', 'An Email has been sent to you. Check your inbox to activate this account.'));
//		$this->refresh();		
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
	
	
}