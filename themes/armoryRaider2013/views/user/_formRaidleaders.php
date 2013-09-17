<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
	
	$form=$this->beginWidget('CActiveForm', array(
		'id'=>'user-form',
		'enableAjaxValidation'=>false,
//		'enableClientValidation'=>true,
		'htmlOptions'=>array(
			'class'=>'standard-form',
		),
	)); 
?>

	<div class='row-fluid'>
		<div class="well span4">	
			<?php echo CHtml::label(Yii::t('locale', 'Username'), false); ?>
			<?php echo $form->dropDownList($modelUserAttr, 'user_id', CHtml::listData(User::model()->findAll(), 'id', 'username'), array('class'=>'input-block-level', 'prompt'=>Yii::t('locale', 'Select an user'))); ?>
			<?php echo $form->error($modelUserAttr,'user_id'); ?>			
		</div><!-- /span5 -->
	
		<?php if(!$modelUserAttr->isNewRecord): ?>
			<div class="well span4">	
				<div class='pull-left'>
					<?php echo $form->labelEx($modelUserAttr,'is_raidleader'); ?>
					<div class="switch" data-on-label="<?php echo Yii::t('locale', 'Yes'); ?>" data-off-label="<?php echo Yii::t('locale', 'No'); ?>">
						<?php echo $form->checkBox($modelUserAttr,'is_raidleader'); ?>
						<?php echo $form->error($modelUserAttr,'is_raidleader'); ?>
					</div>		
				</div>
			</div><!-- /span5 -->
		
			<div class='span2 well'>
				<?php echo CHtml::submitButton(Yii::t('locale', 'Save'), array('class'=>'btn btn-success', 'name'=>'submit')); ?>
			</div><!-- /span5 -->
		<?php endif; ?>
	
	</div><!-- /row-fluid -->

	<?php $this->endWidget(); ?>
	

<!-- Bootstrap Switch sources -->
<link rel="stylesheet" media="screen" href="<?php echo Yii::app()->theme->baseUrl;?>/css/bootstrapSwitch.css">
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/js/bootstrapSwitch.js"></script>
