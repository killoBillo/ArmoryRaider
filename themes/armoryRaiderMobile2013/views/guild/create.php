<?php
/* @var $this GuildController */
/* @var $model Guild */

$this->breadcrumbs=array(
	'Guilds'=>array('index'),
	'Create',
);

$this->layout = '//layouts/column2';
?>

<h1><?php echo Yii::t('locale', 'Setup a Guild'); ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>