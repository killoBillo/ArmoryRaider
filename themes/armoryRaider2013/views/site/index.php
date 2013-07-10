<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<?php if(Yii::app()->user->hasFlash('guildCreated')): ?>
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<?php echo Yii::app()->user->getFlash('guildCreated'); ?>
	</div>
<?php endif; 


//	var_dump('linguaggio configurazione: ',Config::model()->findByPk(1)->locale);
//	var_dump('linguaggio utente: ',User::model()->findByPk(Yii::app()->user->id)->profile->locale);
//	var_dump('linguaggio applicazione: ',Yii::app()->getLanguage());
//	var_dump(Yii::app()->getLocaleDataPath());
//	var_dump(Yii::app()->user->id, Yii::app()->user->username);
//	var_dump(Yii::app()->locale->getLanguage(Yii::app()->getLanguage()));
//	var_dump(Yii::app()->messages->basePath);
//	var_dump(Yii::app()->locale->getLocaleIDs());

//	$roles=Rights::getAssignedRoles(Yii::app()->user->Id); // check for single role
//	foreach($roles as $role) {
//		echo $role->name."<br>";
//	}
	
	$this->widget('ext.RaiderExt.DashboardEvents',array('events'=>$events)); 
 ?>