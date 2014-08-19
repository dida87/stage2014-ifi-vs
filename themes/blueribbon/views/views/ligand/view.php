<?php
/* @var $this LigandController */
/* @var $model Ligand */

$this->breadcrumbs=array(
	'Ligands'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Ligand', 'url'=>array('index')),
	array('label'=>'Create Ligand', 'url'=>array('create')),
	array('label'=>'Update Ligand', 'url'=>array('update', 'id'=>$model->ligand_id)),
	array('label'=>'Delete Ligand', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ligand_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ligand', 'url'=>array('admin')),
);
?>

<h1>View Ligand #<?php echo $model->ligand_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ligand_id',
		'name',
		'file_name',
		'mw',
		'hd',
		'ha',
		'log_p',
		'psa',
		'ic50_hep',
		'ic50_rd',
		'ic50_fi',
		'plant_specie',
		'plant_part',
		'reference',
		'classification',
		'bioactivity',
		'remark',
		'user_id',
	),
)); ?>
