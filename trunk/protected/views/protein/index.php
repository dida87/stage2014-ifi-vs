<?php
/* @var $this ProteinController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Proteins',
);

$this->menu=array(
	//array('label'=>'Create Protein', 'url'=>array('create')),
	array('label'=>'Manage Protein', 'url'=>array('admin')),
);
?>
<h1>Proteins</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
