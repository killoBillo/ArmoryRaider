<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */

	$assetsUrl = Yii::app()->getAssetManager()->getPublishedUrl(RaiderFunctions::getImagesFolderPath());
	
	// img utente, se non è settata prendo quella di default
	if(empty($model->portrait_URL)) 
		$userImg = $assetsUrl.'/user/unknown.jpg';
	else
		$userImg = $assetsUrl.'/user/'.$model->username.'/'.$model->portrait_URL; 
	
	// ruolo utente, se impostato
	if(isset($model->profile->guildrole))
		$userRole = $model->profile->guildrole->label;
	else
		$userRole = Yii::t('locale', 'Not set');
		
		
	
	$form=$this->beginWidget('CActiveForm', array(
		'id'=>'user-form',
		'enableAjaxValidation'=>false,
//		'enableClientValidation'=>true,
		'htmlOptions'=>array(
			'class'=>'standard-form',
		),
	)); 
?>

	<?php echo $form->errorSummary($model, NULL, NULL, array('class'=>'alert alert-error')); ?>
		
<div class='row-fluid'>
	<div class="well span4">
		<?php echo CHtml::image($userImg, 'portrait of '.$model->username, array('class'=>'img-rounded')); ?>
	</div>
	<div class="well span5">	
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>45,'maxlength'=>45,'class'=>'input-block-level')); ?>
		<?php echo $form->error($model,'name'); ?>

		<?php echo $form->labelEx($model,'surname'); ?>
		<?php echo $form->textField($model,'surname',array('size'=>45,'maxlength'=>45,'class'=>'input-block-level')); ?>
		<?php echo $form->error($model,'surname'); ?>

		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>45,'maxlength'=>45,'class'=>'input-block-level')); ?>
		<?php echo $form->error($model,'username'); ?>
		
		<?php //echo $form->labelEx($model,'password'); ?>
		<?php //echo $form->passwordField($model,'password',array('size'=>32,'maxlength'=>32)); ?>
		<?php //echo $form->error($model,'password'); ?>

		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->emailField($model,'email',array('size'=>45,'maxlength'=>45,'class'=>'input-block-level')); ?>
		<?php echo $form->error($model,'email'); ?>
		
		<?php echo $form->labelEx($modelAttr,Yii::t('locale', 'Guild role')." [ $userRole ] "); ?>
		<?php echo $form->dropDownList($modelAttr, 'guildrole_id', CHtml::listData(Guildrole::model()->findAll(), 'id', 'label'), array('class'=>'input-block-level')); ?>
		<?php echo $form->error($modelAttr,'guildrole_id'); ?>			

		<?php //echo $form->labelEx($model,'portrait_URL'); ?>
		<?php //echo $form->textField($model,'portrait_URL',array('size'=>60,'maxlength'=>255)); ?>
		<?php //echo $form->error($model,'portrait_URL'); ?>

		<?php echo $form->labelEx($model,'creation_date'); ?>
		<?php echo $form->textField($model,'creation_date', array('value'=>$model->creation_date, 'disabled'=>'disabled', 'class'=>'input-block-level')); ?>
		<?php echo $form->error($model,'creation_date'); ?>
		
		<?php //echo $form->labelEx($model,'activation_key'); ?>
		<?php //echo $form->textField($model,'activation_key',array('size'=>32,'maxlength'=>32,'class'=>'input-block-level')); ?>
		<?php //echo $form->error($model,'activation_key'); ?>		
		
		<div class='pull-left'>
			<?php echo $form->labelEx($modelAttr,'is_raidleader'); ?>
			<div class="switch" data-on-label="<?php echo Yii::t('locale', 'Yes'); ?>" data-off-label="<?php echo Yii::t('locale', 'No'); ?>">
				<?php echo $form->checkBox($modelAttr,'is_raidleader'); ?>
				<?php echo $form->error($modelAttr,'is_raidleader'); ?>
			</div>		
		</div>
		
		<div class='pull-right'>
			<?php echo $form->labelEx($model,'status'); ?>
			<div class="switch" data-on-label="<?php echo Yii::t('locale', 'Active'); ?>" data-off-label="<i class='icon-remove'></i>">
				<?php echo $form->checkBox($model,'status'); ?>
				<?php echo $form->error($model,'status'); ?>
			</div>
		</div>
				
	</div><!-- /span5 -->

	<div class='span3 well'>
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('locale', 'Create') : Yii::t('locale', 'Save'), array('class'=>'btn btn-success')); ?>
	</div><!-- /span5 -->
</div><!-- /row-fluid -->

	<?php $this->endWidget(); ?>
	

<!-- Bootstrap Switch sources -->
<link rel="stylesheet" media="screen" href="<?php echo Yii::app()->theme->baseUrl;?>/css/bootstrapSwitch.css">
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/js/bootstrapSwitch.js"></script>
