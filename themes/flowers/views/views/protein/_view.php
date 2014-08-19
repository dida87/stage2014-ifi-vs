<?php
/* @var $this ProteinController */
/* @var $data Protein */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('protein_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->protein_id), array('view', 'id'=>$data->protein_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('file_name')); ?>:</b>
	<?php echo CHtml::encode($data->file_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />


</div>