<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<?php if(Yii::app()->user->hasFlash('register')): ?>

<div class="alert alert-success">
	<?php echo Yii::app()->user->getFlash('register'); ?>
</div>

<?php endif; ?>

<?php 
		$form=$this->beginWidget('CActiveForm', array(
			'id'=>'login-form',
			'enableClientValidation'=>true,
			'clientOptions'=>array(
				'validateOnSubmit'=>true,
			),
			'htmlOptions'=>array(
				'class'=>'form-signin'
			),
		)); 
?>
		<h2 class="form-signin-heading"><?php echo Yii::t('locale', 'Armory Raider'); ?></h2>
	
		<?php //echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username', array('class'=>'input-block-level', 'placeholder'=>Yii::t('locale', 'Username *'))); ?>
		<?php echo $form->error($model,'username'); ?>

		<?php //echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password', array('class'=>'input-block-level', 'placeholder'=>Yii::t('locale', 'Password *'))); ?>
		<?php echo $form->error($model,'password'); ?>
		
		<label class="checkbox">
			<?php echo $form->error($model,'rememberMe'); ?>
			<?php echo $form->checkBox($model,'rememberMe'); ?>
			<?php echo $form->label($model,'rememberMe'); ?>
		</label>
		
		<div class="btn-group">
			<?php echo CHtml::submitButton(Yii::t('locale', 'Login'), array('class'=>'btn')); ?>
			<?php echo CHtml::link(Yii::t('locale', 'Create an account'), Yii::app()->createUrl('/site/register'), array('class'=>'btn'));?>
		</div>
<?php $this->endWidget(); ?>