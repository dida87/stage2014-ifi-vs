<?php
/* @var $this ProteinController */
/* @var $model Protein */

$this->breadcrumbs=array(
	'Proteins'=>array('index'),
	$model->name=>array('view','id'=>$model->protein_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Protein', 'url'=>array('index')),
	array('label'=>'Create Protein', 'url'=>array('create')),
	array('label'=>'View Protein', 'url'=>array('view', 'id'=>$model->protein_id)),
	array('label'=>'Manage Protein', 'url'=>array('admin')),
);
?>

<h1>Update Protein <?php echo $model->protein_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>