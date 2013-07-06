<?php
/* @var $this CharacterController */
/* @var $model Character */
?>

<h4><?php echo Yii::t('locale', 'Confirm deletion character page'); ?></h4>

<div class="well">
	<p><?php echo sprintf(Yii::t('locale','Do you really want to delete character <strong>%s</strong> ? The whole entries, raid subscription included, will be deleted, too!'), $model->name); ?></p>
	
	<div class="btn-group">
		<?php echo CHtml::link(Yii::t('locale', 'Yes'), array('character/delete', 'id'=>$model->id), array('class'=>'btn')); ?>
		<?php echo CHtml::link(Yii::t('locale', 'No'), $returnUrl, array('class'=>'btn')); ?>
	</div>
	
	<span class="label label-important">
		<?php echo Yii::t('locale', 'Attention, You cannot undo this action !!!'); ?>
	</span>
</div>