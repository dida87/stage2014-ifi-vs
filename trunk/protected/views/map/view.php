<?php
/* @var $this MapController */
/* @var $model Map */

$this->breadcrumbs=array(
	'Maps'=>array('index'),
	$model->map_id,
);

$this->menu=array(
	array('label'=>'List Map', 'url'=>array('index')),
	array('label'=>'Create Map', 'url'=>array('create')),
	array('label'=>'Update Map', 'url'=>array('update', 'id'=>$model->map_id)),
	array('label'=>'Delete Map', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->map_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Map', 'url'=>array('admin')),
);
?>

<h1>View Map #<?php echo $model->map_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
        'htmlOptions'=> array('style'=>'width:300px;'),
        'cssFile'=>'/css/view.css',
	'attributes'=>array(
		'map_id',
		'protein_id',
		'map_file_name',
		'file_tar_gz',
	),
)); ?>
<?php
echo CHtml::button('Back', array('onclick'=>'js:history.go(-1); returnFalse;','style'=>'font-size:14px;font-weight:bold;height:30px;'));
?>