<?php
/* @var $this DockingProjectController */
/* @var $model DockingProject */

$this->breadcrumbs=array(
	'Docking Projects'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DockingProject', 'url'=>array('index')),
	array('label'=>'Manage DockingProject', 'url'=>array('admin')),
);
?>

<h1>Create DockingProject</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>