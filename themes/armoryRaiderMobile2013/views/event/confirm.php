<?php
/* @var $this CharacterController */
/* @var $model Character */
?>

<h4><?php echo Yii::t('locale', 'Confirm deletion event page'); ?></h4>

<div class="well">
	<p><?php echo Yii::t('locale','Do you really want to delete the event ? Related entries will be deleted, too.'); ?></p>
	
	<div class="btn-group">
		<?php echo CHtml::link(Yii::t('locale', 'Yes'), array('event/delete', 'id'=>$model->id), array('class'=>'btn')); ?>
		<?php echo CHtml::link(Yii::t('locale', 'No'), $returnUrl, array('class'=>'btn')); ?>
	</div>
	
	<span class="label label-important">
		<?php echo Yii::t('locale', 'Attention, You cannot undo this action !!!'); ?>
	</span>
</div>