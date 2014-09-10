<?php
/* @var $this UserController */
/* @var $model User */

	Yii::app()->clientScript->registerScript('raidleader', "
		$('#Userattributes_user_id').on('change', function(){
			$('form#user-form').submit();
		});
	");
?>

<h1><?php echo Yii::t('locale', 'Manage Raidleaders'); ?></h1>

<?php echo $this->renderPartial('_formRaidleaders', array('modelUserAttr'=>$modelUserAttr)); ?>