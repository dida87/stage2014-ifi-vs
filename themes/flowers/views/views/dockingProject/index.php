<?php
/* @var $this DockingProjectController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Docking Projects',
);

$this->menu=array(
	array('label'=>'Create DockingProject', 'url'=>array('create')),
	array('label'=>'Manage DockingProject', 'url'=>array('admin')),
);
?>

<h1>Docking Projects</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
