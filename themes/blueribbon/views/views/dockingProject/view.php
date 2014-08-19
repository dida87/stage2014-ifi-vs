<?php
/* @var $this DockingProjectController */
/* @var $model DockingProject */

$this->breadcrumbs=array(
	'Docking Projects'=>array('index'),
	$model->project_id,
);

$this->menu=array(
	array('label'=>'List DockingProject', 'url'=>array('index')),
	array('label'=>'Create DockingProject', 'url'=>array('create')),
	array('label'=>'Update DockingProject', 'url'=>array('update', 'id'=>$model->project_id)),
	array('label'=>'Delete DockinYou may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>gProject', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->project_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DockingProject', 'url'=>array('admin')),
);
?>

<h1>View DockingProject <?php echo $model->project_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'project_id',
		'map_id',
		'user_id',
		'project_name',
		'waiting_job',
		'running_job',
		'completed_job',
		'failed_job',
	),
)); ?>
