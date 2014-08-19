<?php
/* @var $this MapController */
/* @var $model Map */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>


	<div class="row">
		<?php echo $form->label($model,'protein_id'); ?>
		<?php echo $form->dropDownList($model, 'protein_id', CHtml::listData(Protein::model()->findAll(), 'protein_id', 'name'));?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'map_file_name'); ?>
		<?php echo $form->textField($model,'map_file_name',array('size'=>40,'maxlength'=>100)); ?>
	</div>

	

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->