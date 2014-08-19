<?php
/* @var $this LigandController */
/* @var $model Ligand */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ligand-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'file_name'); ?>
		<?php echo $form->textField($model,'file_name',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'file_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mw'); ?>
		<?php echo $form->textField($model,'mw'); ?>
		<?php echo $form->error($model,'mw'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hd'); ?>
		<?php echo $form->textField($model,'hd'); ?>
		<?php echo $form->error($model,'hd'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ha'); ?>
		<?php echo $form->textField($model,'ha'); ?>
		<?php echo $form->error($model,'ha'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'log_p'); ?>
		<?php echo $form->textField($model,'log_p'); ?>
		<?php echo $form->error($model,'log_p'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'psa'); ?>
		<?php echo $form->textField($model,'psa'); ?>
		<?php echo $form->error($model,'psa'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ic50_hep'); ?>
		<?php echo $form->textField($model,'ic50_hep'); ?>
		<?php echo $form->error($model,'ic50_hep'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ic50_rd'); ?>
		<?php echo $form->textField($model,'ic50_rd'); ?>
		<?php echo $form->error($model,'ic50_rd'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ic50_fi'); ?>
		<?php echo $form->textField($model,'ic50_fi'); ?>
		<?php echo $form->error($model,'ic50_fi'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'plant_specie'); ?>
		<?php echo $form->textField($model,'plant_specie',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'plant_specie'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'plant_part'); ?>
		<?php echo $form->textField($model,'plant_part',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'plant_part'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'reference'); ?>
		<?php echo $form->textField($model,'reference',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'reference'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'classification'); ?>
		<?php echo $form->textField($model,'classification',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'classification'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bioactivity'); ?>
		<?php echo $form->textField($model,'bioactivity',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'bioactivity'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'remark'); ?>
		<?php echo $form->textField($model,'remark',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'remark'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->