<?php
/* @var $this MapController */
/* @var $model Map */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'map-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'protein_id'); ?>
		<?php echo $form->dropDownList($model,'protein_id', CHtml::listData(User::model()->findAll(),'user_id','name')); ?>
		<?php echo $form->error($model,'protein_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'map_file_name'); ?>
		<?php echo $form->textField($model,'map_file_name',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'map_file_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'file_tar_gz'); ?>
		<?php echo $form->textField($model,'file_tar_gz',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'file_tar_gz'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->