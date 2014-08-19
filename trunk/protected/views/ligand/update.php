<?php
/* @var $this LigandController */
/* @var $model Ligand */

$this->breadcrumbs=array(
	'Ligands'=>array('index'),
	$model->name=>array('view','id'=>$model->ligand_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Ligand', 'url'=>array('index')),
	array('label'=>'Create Ligand', 'url'=>array('create')),
	array('label'=>'View Ligand', 'url'=>array('view', 'id'=>$model->ligand_id)),
	array('label'=>'Manage Ligand', 'url'=>array('admin')),
);
?>

<h1>Update Ligand <?php echo $model->ligand_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>