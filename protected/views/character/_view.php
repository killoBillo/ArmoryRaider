<?php
/* @var $this CharacterController */
/* @var $data Character */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('class_id')); ?>:</b>
	<?php echo CHtml::encode($data->class_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('race_id')); ?>:</b>
	<?php echo CHtml::encode($data->race_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gender_id')); ?>:</b>
	<?php echo CHtml::encode($data->gender_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('faction_id')); ?>:</b>
	<?php echo CHtml::encode($data->faction_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('guild_id')); ?>:</b>
	<?php echo CHtml::encode($data->guild_id); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('char_name')); ?>:</b>
	<?php echo CHtml::encode($data->char_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('level')); ?>:</b>
	<?php echo CHtml::encode($data->level); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('item_level')); ?>:</b>
	<?php echo CHtml::encode($data->item_level); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('portrait_URL')); ?>:</b>
	<?php echo CHtml::encode($data->portrait_URL); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('armory_URL')); ?>:</b>
	<?php echo CHtml::encode($data->armory_URL); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_main')); ?>:</b>
	<?php echo CHtml::encode($data->is_main); ?>
	<br />

	*/ ?>

</div>