<?php
/* @var $this DockingProjectController */
/* @var $model DockingProject */

$this->breadcrumbs=array(
	'Docking Projects'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List DockingProject', 'url'=>array('index')),
	array('label'=>'Create DockingProject', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#docking-project-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Docking Projects</h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'docking-project-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'project_id',
		'map_id',
		'user_id',
		'project_name',
		'waiting_job',
		'running_job',
		/*
		'completed_job',
		'failed_job',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
