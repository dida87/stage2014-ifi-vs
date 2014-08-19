<?php
/* @var $this MapController */
/* @var $data Map */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('map_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->map_id), array('view', 'id'=>$data->map_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('protein_id')); ?>:</b>
	<?php echo CHtml::encode($data->protein_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('map_file_name')); ?>:</b>
	<?php echo CHtml::encode($data->map_file_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('file_tar_gz')); ?>:</b>
	<?php echo CHtml::encode($data->file_tar_gz); ?>
	<br />


</div>