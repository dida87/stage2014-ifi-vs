<?php
/* @var $this LigandController */
/* @var $model Ligand */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ligand_id'); ?>
		<?php echo $form->textField($model,'ligand_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'file_name'); ?>
		<?php echo $form->textField($model,'file_name',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mw'); ?>
		<?php echo $form->textField($model,'mw'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hd'); ?>
		<?php echo $form->textField($model,'hd'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ha'); ?>
		<?php echo $form->textField($model,'ha'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'log_p'); ?>
		<?php echo $form->textField($model,'log_p'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'psa'); ?>
		<?php echo $form->textField($model,'psa'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ic50_hep'); ?>
		<?php echo $form->textField($model,'ic50_hep'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ic50_rd'); ?>
		<?php echo $form->textField($model,'ic50_rd'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ic50_fi'); ?>
		<?php echo $form->textField($model,'ic50_fi'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'plant_specie'); ?>
		<?php echo $form->textField($model,'plant_specie',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'plant_part'); ?>
		<?php echo $form->textField($model,'plant_part',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'reference'); ?>
		<?php echo $form->textField($model,'reference',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'classification'); ?>
		<?php echo $form->textField($model,'classification',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bioactivity'); ?>
		<?php echo $form->textField($model,'bioactivity',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'remark'); ?>
		<?php echo $form->textField($model,'remark',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->