<?php
/* @var $this DockingProjectController */
/* @var $model DockingProject */

$this->breadcrumbs=array(
	'Docking Projects'=>array('index'),
	$model->project_id=>array('view','id'=>$model->project_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List DockingProject', 'url'=>array('index')),
	array('label'=>'Create DockingProject', 'url'=>array('create')),
	array('label'=>'View DockingProject', 'url'=>array('view', 'id'=>$model->project_id)),
	array('label'=>'Manage DockingProject', 'url'=>array('admin')),
);
?>

<h1>Update DockingProject <?php echo $model->project_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>