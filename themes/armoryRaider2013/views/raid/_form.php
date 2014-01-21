<?php
/* @var $this RaidController */
/* @var $model Raid */
/* @var $form CActiveForm */

	Yii::app()->clientScript->registerScript('wysihtml5', "
		//wysihtml5
		$('#Raid_description').wysihtml5({
			image: false
		});
	");
	
	
	// preparo il placeholder per la descrizione del raid
	$placeholderDescription = (!empty($model->description)) ? $model->description : Yii::t('locale', 'Insert description...');
	// preparo il valore per la descrizione del raid
	$valueDescription = (!empty($model->description)) ? $model->description : '';
?>

<div class="well">
<?php 
	$form=$this->beginWidget('CActiveForm', array(
		'id'=>'raid-form',
		'enableAjaxValidation'=>false,
		'htmlOptions' => array(
			'enctype' => 'multipart/form-data',
			'class'=>'',
		),

	)); 
?>

	<?php //echo $form->errorSummary($model); echo $model->getScenario();?>
	
		<?php echo $form->errorSummary($model, NULL, NULL, array('class'=>'alert alert-error')); ?>

		<?php echo $form->textField($model,'name',  array('class'=>'input-large input-block-level', 'placeholder'=>'Raid Name *')); ?>
		<?php echo $form->error($model,'name'); ?>

		<?php echo $form->textField($model,'level', array('class'=>'input-large input-block-level', 'placeholder'=>'Characters Level (ex: 90) *')); ?>
		<?php echo $form->error($model,'level'); ?>

		<?php echo $form->textField($model,'number_of_players', array('class'=>'input-large input-block-level', 'placeholder'=>'Number Of Players *')); ?>
		<?php echo $form->error($model,'number_of_players'); ?>
		
		<div>
			<?php echo $form->textField($model,'type', array('class'=>'input-large input-block-level', 'placeholder'=>'Raid type (Heroic, Normal, Flex, ...)')); ?>
			<?php echo $form->error($model,'type'); ?>
		</div>
		
		<!-- 
		<?php echo $form->textField($model,'color',array('class'=>'input-large input-block-level', 'placeholder'=>'Color')); ?>
		<?php echo $form->error($model,'color'); ?>
		 -->		

		<!-- 
		<?php echo $form->labelEx($model, Yii::t('locale', 'Heroic raid ?')); ?>
		<div class="switch" data-on-label="<?php echo Yii::t('locale', 'Yes'); ?>" data-off-label="<?php echo Yii::t('locale', 'No'); ?>">
			<?php echo $form->checkBox($model, 'is_heroic'); ?>
			<?php echo $form->error($model,'is_heroic'); ?>
		</div> 
		-->
		
		<?php echo $form->labelEx($model, Yii::t('locale', 'Active ?')); ?>
		<div class="switch" data-on-label="<?php echo Yii::t('locale', 'Yes'); ?>" data-off-label="<?php echo Yii::t('locale', 'No'); ?>">
			<?php echo $form->checkBox($model, 'is_active'); ?>
			<?php echo $form->error($model,'is_active'); ?>
		</div>
		
		<?php if($model->isNewRecord) { ?>
			<?php echo $form->labelEx($model,'Raid Image *'); ?>
			<?php echo $form->fileField($model, 'img'); ?>
			<?php echo $form->error($model,'img'); ?>
		<?php } else {?>
			<?php echo $form->labelEx($model,'img'); ?>
			<?php echo $form->textField($model,'img',array('class'=>'change-img', 'disabled'=>'disabled')); ?>
			<?php echo $form->fileField($model, 'img', array('class'=>'change-img', 'style'=>'display:none;')); ?>
			<?php echo CHtml::link(Yii::t('locale', 'Change image'),'',array('class'=>'change-img-link', 'onclick'=>'javascript:$(".change-img").toggle(200)')); ?>
			<?php echo $form->error($model,'img'); ?>
		<?php } ?>		

		<div style="margin-top: 20px;">
			<?php echo $form->labelEx($model,Yii::t('locale', 'description')); ?>
			<?php echo CHtml::textArea('Raid[description]', '', array('id'=>'Raid_description', 'class'=>'input-block-level' , 'style'=>'height:200px;','placeholder'=>$placeholderDescription, 'value'=>$valueDescription)); ?>
			<?php echo $form->error($model,'description'); ?>
		</div>
		
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('locale', 'Create') : Yii::t('locale', 'Save'), array('class'=>'btn')); ?>

<?php $this->endWidget(); ?>

<!-- Bootstrap Switch sources -->
<link rel="stylesheet" media="screen" href="<?php echo Yii::app()->theme->baseUrl;?>/css/bootstrapSwitch.css">
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/js/bootstrapSwitch.js"></script>

<!-- Bootstrap wysihtml5 sources -->
<link rel="stylesheet" media="screen" href="<?php echo Yii::app()->theme->baseUrl;?>/css/bootstrap-wysihtml5.css">
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/js/wysihtml5-0.3.0.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/js/bootstrap-wysihtml5.js"></script>

<div class="clearbox clearfix"></div>
</div><!-- /well -->