<?php
class RequireLogin extends CBehavior
{
	
	public function attach($owner)
	{
	    $owner->attachEventHandler('onBeginRequest', array($this, 'handleBeginRequest'));
	}

	
	
	public function handleBeginRequest($event)
	{
		/**
		 * Se l'utente non è loggato permetto l'accesso soltanto alle seguenti action:
		 * - site/login
		 * - site/register
		 * - site/resetPassword
		 */ 
	    if (Yii::app()->user->isGuest && (!isset($_GET['r']) || !in_array($_GET['r'],array('site/login', 'site/register', 'site/resetpassword')))) {
        	Yii::app()->user->loginRequired();
    	}
	}

	
	
}
?>
