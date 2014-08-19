<?php
/* @var $this ProteinController */
/* @var $model Protein */

$this->breadcrumbs=array(
	'Proteins'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Protein', 'url'=>array('index')),
	array('label'=>'Manage Protein', 'url'=>array('admin')),
);
?>

<h1>Create Protein</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>