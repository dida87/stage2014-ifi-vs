<?php
/* @var $this LigandController */
/* @var $model Ligand */

$this->breadcrumbs=array(
	'Ligands'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Ligand', 'url'=>array('index')),
	array('label'=>'Manage Ligand', 'url'=>array('admin')),
);
?>

<h1>Create Ligand</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>