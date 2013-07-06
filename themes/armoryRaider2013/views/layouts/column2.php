<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
	
	<div class="content-wrapper">
		<div class="content-column-wide">
				<?php echo $content; ?>
		</div><!-- content -->
	</div><!-- /content_wrapper -->
			
	<div class="half-sidebar">
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