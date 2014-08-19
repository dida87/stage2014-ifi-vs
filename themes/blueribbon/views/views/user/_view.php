<?php
/* @var $this UserController */
/* @var $data User */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->user_id), array('view', 'id'=>$data->user_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('protein_login')); ?>:</b>
	<?php echo CHtml::encode($data->protein_login); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ligand_login')); ?>:</b>
	<?php echo CHtml::encode($data->ligand_login); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('docking_login')); ?>:</b>
	<?php echo CHtml::encode($data->docking_login); ?>
	<br />


</div>