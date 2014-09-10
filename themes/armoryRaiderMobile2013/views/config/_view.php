<?php
/* @var $this ConfigController */
/* @var $data Config */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('timezone')); ?>:</b>
	<?php echo CHtml::encode($data->timezone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('locale')); ?>:</b>
	<?php echo CHtml::encode($data->locale); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('armory_region')); ?>:</b>
	<?php echo CHtml::encode($data->armory_region); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('armory_realm')); ?>:</b>
	<?php echo CHtml::encode($data->armory_realm); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('brand')); ?>:</b>
	<?php echo CHtml::encode($data->brand); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('debug_mode')); ?>:</b>
	<?php echo CHtml::encode($data->debug_mode); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('event_notification_active')); ?>:</b>
	<?php echo CHtml::encode($data->event_notification_active); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('welcome_message')); ?>:</b>
	<?php echo CHtml::encode($data->welcome_message); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('template')); ?>:</b>
	<?php echo CHtml::encode($data->template); ?>
	<br />

	*/ ?>

</div>