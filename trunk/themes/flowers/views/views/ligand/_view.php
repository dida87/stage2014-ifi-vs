<?php
/* @var $this LigandController */
/* @var $data Ligand */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ligand_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ligand_id), array('view', 'id'=>$data->ligand_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('file_name')); ?>:</b>
	<?php echo CHtml::encode($data->file_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mw')); ?>:</b>
	<?php echo CHtml::encode($data->mw); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hd')); ?>:</b>
	<?php echo CHtml::encode($data->hd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ha')); ?>:</b>
	<?php echo CHtml::encode($data->ha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('log_p')); ?>:</b>
	<?php echo CHtml::encode($data->log_p); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('psa')); ?>:</b>
	<?php echo CHtml::encode($data->psa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ic50_hep')); ?>:</b>
	<?php echo CHtml::encode($data->ic50_hep); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ic50_rd')); ?>:</b>
	<?php echo CHtml::encode($data->ic50_rd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ic50_fi')); ?>:</b>
	<?php echo CHtml::encode($data->ic50_fi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('plant_specie')); ?>:</b>
	<?php echo CHtml::encode($data->plant_specie); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('plant_part')); ?>:</b>
	<?php echo CHtml::encode($data->plant_part); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reference')); ?>:</b>
	<?php echo CHtml::encode($data->reference); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('classification')); ?>:</b>
	<?php echo CHtml::encode($data->classification); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bioactivity')); ?>:</b>
	<?php echo CHtml::encode($data->bioactivity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('remark')); ?>:</b>
	<?php echo CHtml::encode($data->remark); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	*/ ?>

</div>