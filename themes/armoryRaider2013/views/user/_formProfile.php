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

		
	
	$form=$this->beginWidget('CActiveForm', array(
		'id'=>'user-form',
		'enableAjaxValidation'=>false,
//		'enableClientValidation'=>true,
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
		),
		'htmlOptions'=>array(
			'enctype' => 'multipart/form-data',
			'class'=>'standard-form'
		),	
	)); 
?>

	<?php echo $form->errorSummary($model, NULL, NULL, array('class'=>'alert alert-error')); ?>

	<div class='row-fluid'>	
		<div class='span4 well'>
			<div>
				<?php echo $form->labelEx($model, 'portrait_URL'); ?>
				<?php echo CHtml::image($userImg, 'portrait of '.$model->username, array('class'=>'img-rounded')); ?>
				<?php echo '<small><center>'.$model->portrait_URL.'</center></small>'; ?>
			</div>
			<br>
			<div>
				<?php echo CHtml::link(Yii::t('locale', 'Change image'),'',array('class'=>'change-img-link change-img btn', 'onclick'=>'javascript:$(".change-img").toggle(200)')); ?>
			</div>
			<div style='margin-top: 10px;'>
				<?php echo $form->fileField($model, 'portrait_URL', array('class'=>'change-img', 'style'=>'display:none;')); ?>
				<?php echo $form->error($model,'portrait_URL'); ?>
			</div>
			<div style='margin-top: 10px;'>
				<?php echo "<small><strong>".Yii::t('locale', 'Upload max file size').":</strong></small> ".ini_get('upload_max_filesize'); ?>
			</div>
				
		</div><!-- /span4 -->
			
		<div class='span5 well'>
			<?php echo $form->labelEx($model,'name'); ?>
			<?php echo $form->textField($model,'name',array('size'=>45,'maxlength'=>45, 'class'=>'input-full input-block-level')); ?>
			<?php echo $form->error($model,'name'); ?>
	
			<?php echo $form->labelEx($model,'surname'); ?>
			<?php echo $form->textField($model,'surname',array('size'=>45,'maxlength'=>45, 'class'=>'input-full input-block-level')); ?>
			<?php echo $form->error($model,'surname'); ?>
	
			<?php echo $form->labelEx($model,'username'); ?>
			<?php echo $form->textField($model,'username',array('size'=>45,'maxlength'=>45, 'class'=>'input-full input-block-level')); ?>
			<?php echo $form->error($model,'username'); ?>
	
			<?php echo $form->labelEx($model,'password'); ?>
			<?php echo $form->passwordField($model,'password',array('size'=>32,'maxlength'=>32, 'class'=>'input-full input-block-level', 'value'=>'')); ?>
			<?php echo $form->error($model,'password'); ?>
			
			<?php echo $form->labelEx($model,'password_confirm'); ?>
	 		<?php echo $form->passwordField($model,'repeat_password',array('size'=>32,'maxlength'=>32, 'class'=>'input-full input-block-level', 'value'=>'')); ?>		
			<?php echo $form->error($model,'password_confirm'); ?>
			
			<?php echo $form->labelEx($model,'email'); ?>
			<?php echo $form->emailField($model,'email',array('size'=>45,'maxlength'=>45, 'class'=>'input-full input-block-level')); ?>
			<?php echo $form->error($model,'email'); ?>
			
			<?php echo $form->labelEx($modelUserAttr,'timezone'); ?>
			<?php echo $form->dropDownList($modelUserAttr, 'timezone', $this->timezones, array('class'=>'input-block-level')); ?>
			
			<?php echo $form->labelEx($modelUserAttr, 'locale'); ?>
			<?php echo $form->dropDownList($modelUserAttr, 'locale', RaiderFunctions::getLocaleArray(), array('class'=>'input-block-level')); ?>
		</div><!-- /span5 -->
		
		<div class='span3 well'>
			<?php echo CHtml::submitButton(Yii::t('locale', 'Save profile'), array('class'=>'btn btn-success')); ?>			
		</div><!-- /span3 -->		
	</div><!--  /row-fluid -->

<?php $this->endWidget(); ?>