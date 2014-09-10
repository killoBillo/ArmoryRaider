<div id="sidebar" class="sidebar">
	<div class="row-fluid">
		<div class="span12">
			<?php 
				$this->widget('ext.RaiderExt.UserWidget',array('userid'=>Yii::app()->user->id)); 
			?>		
		</div><!-- /span12 -->
	</div><!--  /row-fluid -->

	<div class="row-fluid">
		<div class="span12">
			<?php 
				$this->widget('ext.RaiderExt.CharactersList',array('userid'=>Yii::app()->user->id)); 
			?>		
		</div><!-- /span12 -->
	</div><!--  /row-fluid -->
	
	<div class="row-fluid">
		<div class="span12">
			<?php 
				$this->widget('ext.RaiderExt.ComingEvents',array('numEvents'=>5)); 
			?>		
		</div><!-- /span12 -->
	</div><!--  /row-fluid -->	
	 
</div><!-- sidebar -->