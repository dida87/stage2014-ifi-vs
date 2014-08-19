<?php
/* @var $this MapController */
/* @var $model Map */

$this->breadcrumbs=array(
	'Maps'=>array('index'),
	$model->map_id=>array('view','id'=>$model->map_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Map', 'url'=>array('index')),
	array('label'=>'Create Map', 'url'=>array('create')),
	array('label'=>'View Map', 'url'=>array('view', 'id'=>$model->map_id)),
	array('label'=>'Manage Map', 'url'=>array('admin')),
);
?>

<h1>Update Map <?php echo $model->map_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>