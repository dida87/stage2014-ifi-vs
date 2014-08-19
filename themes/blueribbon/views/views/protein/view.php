<?php
/* @var $this ProteinController */
/* @var $model Protein */

$this->breadcrumbs=array(
	'Proteins'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Protein', 'url'=>array('index')),
	array('label'=>'Create Protein', 'url'=>array('create')),
	array('label'=>'Update Protein', 'url'=>array('update', 'id'=>$model->protein_id)),
	array('label'=>'Delete Protein', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->protein_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Protein', 'url'=>array('admin')),
);
?>

<h1>View Protein #<?php echo $model->protein_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'protein_id',
		'name',
		'file_name',
		'user_id',
	),
)); ?>
