<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

<?php 
//		if(!empty($this->breadcrumbs)) {
//			echo "<div id='breadcrumbs' class='lite-shadow'>";		
//			$this->widget('zii.widgets.CBreadcrumbs', array(
//					'links'=>$this->breadcrumbs,
//			)); 
//			echo "</div>";				
//		}
?><!-- breadcrumbs -->	


<div id="content" class="content span12">
	
	<!-- Contenuto di una pagina qualsiasi -->	
	<div id="content-single-page" class="span12">
		<?php echo $content; ?>
	</div><!-- /content-under-calendar -->
	
	<div class="clearbox"></div>
</div><!-- content -->

<?php $this->endContent(); ?>