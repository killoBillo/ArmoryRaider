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
//	var_dump(Yii::app()->user->id, Yii::app()->user->getName());
//	var_dump(Yii::app()->locale->getLanguage(Yii::app()->getLanguage()));
//	var_dump(Yii::app()->messages->basePath);
//	var_dump(Yii::app()->locale->getLocaleIDs());

//	$roles=Rights::getAssignedRoles(Yii::app()->user->Id); // check for single role
//	foreach($roles as $role) {
//		echo $role->name."<br>";
//	}
	
	
	$armory =  new D3BattlenetArmory('eu', 'killo', '2539');
	$career = $armory->getCareer();
	$heroes = $career->getAllCharacters();
	
	echo $career->getBattleTag();
	echo ' count heroes: '.count($heroes);
	var_dump($career->getLastUpdate());
	
	// $character = $armory->getCharacter(3454);
	// echo $character->getName().' '.$character->getClass();
	// echo $character->getCharacterUrl();
	// echo '<img class="img-rounded" src="'.$character->getPortraitUrl().'" width="40" height="40" style="border:1px solid #333">';
	// var_dump($character->getSkills());
	
	$this->widget('ext.RaiderExt.DashboardEvents',array('events'=>$events)); 
 ?>
