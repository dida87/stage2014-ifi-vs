<?php
/* @var $this MapController */
/* @var $model Map */

$this->breadcrumbs=array(
	'Maps'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Map', 'url'=>array('index')),
	array('label'=>'Manage Map', 'url'=>array('admin')),
);
?>

<h1>Create Map</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>