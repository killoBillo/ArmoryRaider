<?php

/**
 * RegisterForm class.
 * RegisterForm is the data structure for keeping
 * user register form data. It is used by the 'register' action of 'SiteController'.
 */
class RegisterForm extends CFormModel
{
	public $name;
	public $surname;
	public $username;
	public $email;
	public $password;
	public $verifypassword;

	private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('username', 'unica'),
			array('name, surname, username, email, password, verifypassword', 'required'),
			array('password, verifypassword', 'length', 'min'=>5, 'max'=>32),
			array('verifypassword', 'compare', 'compareAttribute'=>'password'),
		);
	}
	
	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'verifypassword'=>'Password',
		);
	}

	
	public function unica($attribute,$params){
		if(!$this->hasErrors())
		{
			$this->_identity = User::model()->findByAttributes(array('username'=>$this->username));
			if(!empty($this->_identity))
				$this->addError('username', 'Username already taken.');
		}
	}
	
	
	public function saveModel() {
		$user = new User();

		$attributes = array(
			'name'				=>$this->name,
			'surname'			=>$this->surname,
			'username'			=>$this->username,
			'password'			=>$this->password,
			// controllo già effettuato in site/register, passo la stessa password per superare i controlli del model User.
			'repeat_password'	=>$this->password,
			'email'				=>$this->email,
			'portrait_URL'		=>'',
			'creation_date'		=>date('Y-m-d H:i:s'),
			'status'			=>0,
			'activation_key'	=>md5($this->username),
		);
		
		$user->attributes = $attributes;

		if($user->validate()) {
			return $user->save();
		}else{
			return FALSE;
		}
		
	}


}
