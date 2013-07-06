<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/mainLogin'); ?>
<div class="event_body">
		<?php echo $content; ?>
</div><!-- content -->
<div class="sidebar">
	<h3 class="title">Still not a member?!</h3>
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'Operations',
		));
		$this->widget('zii.widgets.CMenu', array(
			'id'=>'operations',
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
	?>
</div><!-- sidebar -->
<?php $this->endContent(); ?>