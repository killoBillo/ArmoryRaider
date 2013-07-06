<?php
/* @var $this UserattributesController */
/* @var $data Userattributes */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('guildrole_id')); ?>:</b>
	<?php echo CHtml::encode($data->guildrole_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('portrait')); ?>:</b>
	<?php echo CHtml::encode($data->portrait); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('second_email')); ?>:</b>
	<?php echo CHtml::encode($data->second_email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone_number')); ?>:</b>
	<?php echo CHtml::encode($data->phone_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('site_URL')); ?>:</b>
	<?php echo CHtml::encode($data->site_URL); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('last_login')); ?>:</b>
	<?php echo CHtml::encode($data->last_login); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('locale')); ?>:</b>
	<?php echo CHtml::encode($data->locale); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('timezone')); ?>:</b>
	<?php echo CHtml::encode($data->timezone); ?>
	<br />

	*/ ?>

</div>