<?php
/* @var $this ProteinController */
/* @var $model Protein */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'protein_id'); ?>
		<?php echo $form->textField($model,'protein_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>50)); ?>
        </div>
       
	<div class="row">
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
	</div>
      
	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
                <?php echo CHtml::button('Cancel'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->