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

/**
 * D3BattlenetArmory API tests, remove these lines
 */
//  $armory =  new D3BattlenetArmory('eu', 'killo', '2539');
//	$career = $armory->getCareer();
//	$heroes = $career->getAllCharacters();
//	$character = $armory->getCharacter(139492);
//
//	$items = $character->getItems();
//	$item = $character->getItem($items['head']['tooltipParams']);
//
//	echo $item->getName();
//	echo "<img src='".$item->getIconUrl()."' >";
?>




<?php
	$this->widget('ext.RaiderExt.DashboardEvents',array('events'=>$events)); 
 ?>


<?php
//<!-- BOTTOM BAR -->
//<div class="bottombar">
//    <div class="bottombar-inner">
//        <div class="row-fluid">
//            <span class="bottombar-button"><i class="icon icon-home"></i></span>
//            <span class="bottombar-button"><i class="icon icon-calendar"></i></span>
//            <span class="bottombar-button"><i class="icon icon-tags"></i></span>
//            <span class="span3"><i class="icon icon-puzzle-piece"></i></span>
//        </div>
//    </div>
//</div><!-- /bottombar -->
//<!-- /BOTTOM BAR -->
?>