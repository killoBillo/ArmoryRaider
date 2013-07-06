<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_id;
	private $user;
	
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
 		$user = User::model()->findByAttributes(array('username'=>$this->username));
		
        if ($user===null) { // No user was found!
//            $this->errorCode=self::ERROR_USERNAME_INVALID;
			$this->errorCode=Yii::t('locale', 'Username not found');
        }
        // $user->Password refers to the "password" column name from the database
        else if($user->password !== md5($this->password))
        {   
//            $this->errorCode=self::ERROR_PASSWORD_INVALID;
			$this->errorCode=Yii::t('locale', 'Invalid password');
        }
        else if($user->status != 1)
        {
        	$this->errorCode="Utente non attivato.";
        }
        else { // User/pass match
        	
        	$this->_id = $user->id;        	
        	$this->setUser($user);
//        	$this->_name = $user->name.' '.$user->surname;
//        	$this->_surname = $user->surname;
//        	$this->_username = $user->username;
//        	$this->_fullname = $user->name.' '.$user->surname;
        	
        	/**
        	 * ASSEGNO I RUOLI ALL'UTENTE CHE LOGGA
        	 */
        	if(RaiderFunctions::isGM($this->id))
        		// assegno	ruolo GM se l'utente è GM :]
        		Rights::assign('Guildmaster', $this->id);
        	elseif(RaiderFunctions::isRaidleader($this->id))
        		// assegno ruolo raidleader se l'utente è un raidleader
        		Rights::assign('Raidleader', $this->id);
        	else 
	        	// assegno il ruolo guest all'utente che logga.
    	    	Rights::assign('Authenticated', $this->id);
        
        	// implementare l'assegnazione automatica del ruolo GuildMaster se l'utente è il Guild Master.
        	

        	/**
        	 * METTO IN SESSIONE ALCUNI PARAMETRI
        	 * 
        	 * Yii::app()->session['config'] 	verifica che sia stata configurata l'app.
        	 * Yii::app()->session['guild'] 	verifica che sia stata configurata almeno una gilda.
        	 * Yii::app()->session['brand'] 	la scritta nella zona "logo" della nav-bar.
        	 * Yii::app()->session['locale']	la lingua in uso.
        	 */ 
        	$config = Config::model()->findByPk(1);
        	$guild = Guild::model()->findByPk(1);
        	
        	if(!empty($config)) {
        		Yii::app()->session['config'] = true;
        		Yii::app()->session['brand'] = CHtml::encode($config->brand);
        	}else{ 
        		Yii::app()->session['config'] = false;
        		Yii::app()->session['brand'] = CHtml::encode(Yii::app()->name);
        	}

        	if(!empty($guild))
        		Yii::app()->session['guild'] = true;
        	else 
        		Yii::app()->session['guild'] = false;
        		
        	
        	if(isset($user->profile->locale))
        		Yii::app()->session['locale'] = $user->profile->locale;
        	elseif(isset($config->locale))
        		Yii::app()->session['locale'] = $config->locale;
        	else
        		Yii::app()->session['locale'] = Yii::app()->language;
        	
			 
        	
        	$this->errorCode=self::ERROR_NONE;
        }       
        return !$this->errorCode; 
	}
	
	
	
	public function getUser() {
		return $this->user;
	}
	
	
	public function setUser(CActiveRecord $user) {
		$this->user = $user->attributes;
	}
	
	
    public function getId()
    {
        return $this->_id;
    }
      
    
}