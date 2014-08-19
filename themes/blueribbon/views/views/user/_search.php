<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'protein_login'); ?>
		<?php echo $form->textField($model,'protein_login'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ligand_login'); ?>
		<?php echo $form->textField($model,'ligand_login'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'docking_login'); ?>
		<?php echo $form->textField($model,'docking_login'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->