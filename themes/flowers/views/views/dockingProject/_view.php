<?php
/* @var $this DockingProjectController */
/* @var $data DockingProject */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('project_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->project_id), array('view', 'id'=>$data->project_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('map_id')); ?>:</b>
	<?php echo CHtml::encode($data->map_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('project_name')); ?>:</b>
	<?php echo CHtml::encode($data->project_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('waiting_job')); ?>:</b>
	<?php echo CHtml::encode($data->waiting_job); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('running_job')); ?>:</b>
	<?php echo CHtml::encode($data->running_job); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('completed_job')); ?>:</b>
	<?php echo CHtml::encode($data->completed_job); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('failed_job')); ?>:</b>
	<?php echo CHtml::encode($data->failed_job); ?>
	<br />

	*/ ?>

</div>