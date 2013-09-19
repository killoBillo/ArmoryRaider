<?php 
class RaiderFunctions {
	
	
	
	/**
	 * Si occupa di dirmi se l'utente loggato è un admin.
	 * Controllo sulla tabella Authassignment del modulo Rights se all'utente è assegnato un itemname = 'admin'.
	 * @return bool
	 */
	public static function isAdmin() {
		$authAss = Authassignment::model()->findAll('itemname like :itemname AND userid = :userid', array(':itemname'=>'admin',':userid'=>"".Yii::app()->user->getId().""));
		return !empty($authAss);
	}
	

	/**
	 * Si occupa di dirmi se l'utente loggato è un raidleader.
	 * Controllo sulla tabella userattributes se il campo is_raidleader è = 1;
	 * E' possibile passare l'id utente in quanto viene usata anche sul component
	 * UserIdentity.php dove Yii::app()->user->id ancora non è valorizzato.
	 * 
	 * Torna true anche se l'utente è un admin o il GM.
	 * @return bool
	 */
//	public static function isRaidleader() { DEPRECATA
//		$authAss = Authassignment::model()->findAll('itemname like :itemname AND userid = :userid', array(':itemname'=>'raidleader',':userid'=>"".Yii::app()->user->getId().""));
//		return (!empty($authAss) || self::isAdmin());
//	}
	public static function isRaidleader($userid = null) {
		if(isset($userid))
			$id = $userid;
		else 
			$id = Yii::app()->user->id;

		$user = User::model()->findByPk($id);

		if(!empty($user))
			$user = $user->profile->is_raidleader;
		else 
			return false;
			
		return ($user == true || self::isAdmin() || self::isGM());
	}

	/**
	 * Mi restituisce un array di models di User che sono Raidleader su Userattributes
	 * comoda per passarla a CHtml::listData nel form di creazione di un evento.
	 * 
	 * Es: CHtml::listData(RaiderFunctions::getRaidleaders(), 'id', 'username');
	 */
//	public static function getRaidleaders() {
//		$users = array();
//		$authAss = Authassignment::model()->findAll('itemname like :itemname', array(':itemname'=>'Raidleader'));
//		foreach ($authAss as $k=>$model) {
//			$users[] = $model->users;
//		}
//		
//		return $users;
//	}
	public static function getRaidleaders() {
		$users = array();
		$userAttr = Userattributes::model()->findAll('is_raidleader = :is_raidleader', array(':is_raidleader'=>1));
		
		foreach ($userAttr as $k=>$model) {
			$users[] = $model->user;
		}
		
		return $users;
	}
	
	
	
	/**
	 * Mi restituisce un array di models di Characters, utilizzabile per creare una dropDownList
	 * 
	 * Es: CHtml::listData(RaiderFunctions::getCharacters(), 'id', 'name');
	 */
	public static function getCharacters() {
		return $characters = Character::model()->findAll('user_id = :userid', array(':userid'=>Yii::app()->user->id));
	}
	
	
	
	/**
	 * Passato un model mi restituisce il percorso alla cartella
	 * delle immagini per quel model, torna la basepath delle img se nn si passano
	 * parametri.
	 * 
	 * Es: RaiderFunctions::getImagesFolderPath($user) == 'C:\wamp\www\yiiraider\images\user\<username>'.
	 * 	   RaiderFunctions::getImagesFolderPath($raid) == 'C:\wamp\www\yiiraider\images\raid\<raidname>'.	
	 * @param unknown_type $model
	 */
	public static function getImagesFolderPath($model = null){
		$folder = '/'.strtolower(get_class($model));
		
		if($model) {
			if(get_class($model) == 'User')
				$folder.= (isset($model->portrait_URL)) ? '/'.strtolower(preg_replace('/[\s]+/','_',$model->username)) : '' ;
			else
				$folder.= '/'.strtolower(preg_replace('/[\s]+/','_',$model->name));
		}
		
		$path = str_replace('protected', 'images', Yii::app()->basePath);
		
		return $path .= ($model) ? $folder : '';
	}
	
	
	
	/**
	 * Questa funzione si occupa della generazione dei thumbNails 
	 * tramite l'estensione thumbnailer. 
	 */
	public static function thumbGen($width, $height, $src, $blured = false) {
		// trovo il nome del file sorgente con la seguente regexp.
		$pattern = '([\w-\.\ ]+\.+(?i)(jpg|png|gif|bmp)$)';
		preg_match($pattern, $src, $filename, PREG_OFFSET_CAPTURE);
		
		// modifico il path eliminando il nome del file sorgente.
		$path = str_replace($filename[0][0], '', $src);
		
		// assegno il nome al thumbnail
		$thumbName = $path.'thumb'.$width.'x'.$height.'-'.$filename[0][0];

		$phpThumb = Yii::app()->thumbnailer;
		$phpThumb->resetObject();
		
	    $phpThumb->setSourceFilename($src);
	    
	    $phpThumb->setParameter('q', 90);
	    $phpThumb->setParameter('w', $width);
	    $phpThumb->setParameter('h', $height);
	    $phpThumb->setParameter('zc', 1);
	    if($blured) {
	        $phpThumb->setParameter('fltr', 'blur|15');
	    }
	
	    
	    if (!$phpThumb->GenerateThumbnail()) {
	        new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	    }
	
	    if (!$phpThumb->RenderToFile($thumbName)) {
	        new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	    }

	}

	
	/**
	 * Questa funzione si occupa di dirmi se un utente 
	 * è già iscritto ad un evento con uno qualsiasi dei suoi pg.
	 */
	public static function isAlreadyMember($eventid) {
		$char_event = CharacterEvent::model()->findAll('event_id = :eventid', array(':eventid'=>$eventid));
		$charsId = array();
		
		foreach ($char_event as $k=>$model) {
			$charsId[] = $model->char_id;
		}			
		
		$criteria =  new CDbCriteria();
		$criteria->condition = 'user_id = :userid';
		$criteria->params = array(':userid'=>Yii::app()->user->id);
		$criteria->addInCondition('id', $charsId, 'AND');
		
		$characters = Character::model()->findAll($criteria); 
		
		if(!empty($characters))
			return true;
		else
			return false;
	}
	
	
	
	
	/**
	 * Controllo se il PG è dell'utente loggato
	 */
	 public static function isMinePg($idPG){
	 	$char = Character::model()->findAll('id = :id AND user_id = :user_id', array(':id'=>$idPG, ':user_id'=>Yii::app()->user->id));

	 	if(!empty($char))
	 		return true;
	 	else 
	 		return false;
	 }
	 
	 
	 /**
	  * Questa funzione mi restituisce il valore del campo armory_realm della tabella config
	  */
	 public static function getRealm() {
		return Config::model()->findByPk(1)->armory_realm;	 	
	 }
	 
	 
	 /**
	  * Questa funzione mi restituisce il valore del campo armory_region della tabella config
	  */
	 public static function getRegion() {
		return Config::model()->findByPk(1)->armory_region;	 	
	 }

	 
	 
	 /**
	  * Questa funzione crea un array nel formato 'it_it'=>'italiano'
	  * per i linguaggi dell'applicazione.
	  */
	 public static function getLocaleArray() {
	 	// inserisco il linguaggio di default dell'applicazione 'inglese britannico'
	 	$locale = array(Yii::app()->sourceLanguage=>Yii::app()->locale->getLanguage(Yii::app()->sourceLanguage));
	 	
	 	// apro la 'risorsa' cartella /protected/messages
	 	$handle = opendir(Yii::app()->messages->basePath);
	    /* This is the correct way to loop over the directory. */
	    while (false !== ($entry = readdir($handle))) {
	    	if ($entry != "." && $entry != "..") {	    	
	 			$locale[$entry] = Yii::app()->locale->getLanguage($entry);
	    	}
	    }	 	
	    // chiudo la risorsa
	 	closedir($handle);

	 	return $locale;
	 }
	 
	 
	 
	 /**
	  * Questa funzione mi dice se l'utente è un Guild Master,
	  * controllo su userattributes se guildrole_id = 1. 
	  */
	 public static function isGM($userid =  NULL) {
	 	if(isset($userid))
	 		$id = $userid;
	 	else
	 		$id = Yii::app()->user->id;
		
	 	$user = User::model()->findByPk($id); 
	 		
	 	return (!empty($user) && $user->profile->guildrole_id == 1) ? true : false ;
	 	
	 }
	 
	 
	 
	 /**
	  * Questa funzione mi genera una stringa casuale di n caratteri
	  * usata per il reset password
	  */
	 public static function generateRandomString($length = 8) {
		$password = '';
		$possibleChars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
		$i = 0; 
		    
		while ($i < $length) { 
			$char = substr($possibleChars, mt_rand(0, strlen($possibleChars)-1), 1);
		        
		    if (!strstr($password, $char)) { 
		      $password .= $char;
		      $i++;
		    }
		}
		
		return $password;
	 }
	 
	 
	 
	 
	 /**
	  * Utilizzo questa funzione per inviare le email
	  */
	 public static function sendMail($name, $email, $subject, $body) {
	 	$name='=?UTF-8?B?'.base64_encode($name).'?=';
	 	$subject='=?UTF-8?B?'.base64_encode($subject).'?=';
	 	
		$headers = 'MIME-Version: 1.0'."\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
		$headers .= "From: $name <{".Yii::app()->params['adminEmail']."}>\r\n";	
		$headers .= "Reply-To: {".Yii::app()->params['adminEmail']."}\r\n";
		
		mail($email, $subject, $body, $headers);	 	
	 }
	 
}

?>