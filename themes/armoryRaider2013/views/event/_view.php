<?php
/* @var $this EventController */
/* @var $data Event */
?>

<div class="view">
	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('raid_id')); ?>:</b>
	<?php echo CHtml::encode($data->raid_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('raid_leader_id')); ?>:</b>
	<?php echo CHtml::encode($data->raid_leader_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('event_date')); ?>:</b>
	<?php echo CHtml::encode($data->event_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('creation_date')); ?>:</b>
	<?php echo CHtml::encode($data->creation_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />


</div>