<?php
/* @var $this DockingProjectController */
/* @var $model DockingProject */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'project_id'); ?>
		<?php echo $form->textField($model,'project_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'map_id'); ?>
		<?php echo $form->textField($model,'map_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'project_name'); ?>
		<?php echo $form->textField($model,'project_name',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'waiting_job'); ?>
		<?php echo $form->textField($model,'waiting_job'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'running_job'); ?>
		<?php echo $form->textField($model,'running_job'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'completed_job'); ?>
		<?php echo $form->textField($model,'completed_job'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'failed_job'); ?>
		<?php echo $form->textField($model,'failed_job'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'protein_id'); ?>
		<?php echo $form->textField($model,'protein_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dpf_file'); ?>
		<?php echo $form->textField($model,'dpf_file',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ligand_id'); ?>
		<?php echo $form->textField($model,'ligand_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->