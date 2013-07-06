<?php

/**
 * CharacterForm class.
 * CharacterForm is the data structure for keeping
 * character info form data. It is used by the 'create' action of 'CharacterController'.
 */
class CharacterForm extends CFormModel
{
	public $name;
	public $realm;
	public $role_id;

	private $_identity;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('name', 'unica'),
			array('name, realm', 'required'),
			array('name, realm', 'length', 'min'=>3, 'max'=>32),
		);
	}
	
	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array();
	}

	
	public function unica($attribute,$params){
		if(!$this->hasErrors())
		{
			$this->_identity = Character::model()->findByAttributes(array('name'=>$this->name));
			if(!empty($this->_identity))
				$this->addError('name', 'Character already exists.');
		}
	}
	
	
	public function saveModel() {
		var_dump('SAVE');exit;
		
		$user = new User();
		$attributes = array(
			'name'			=>$this->name,
			'surname'		=>$this->surname,
			'username'		=>$this->username,
			'password'		=>$this->password,
			'email'			=>$this->email,
			'portrait_URL'	=>'',
			'creation_date' =>date('Y-m-d H:i:s'),
			'status'		=>0,
			'activation_key'=>md5($this->username),
		);
		
		$user->attributes = $attributes;
		
		if($user->validate()) {
			return $user->save();
		}else{
			return FALSE;
		}
		
	}


}
