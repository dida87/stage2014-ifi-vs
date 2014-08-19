<?php
/* @var $this LigandController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ligands',
);

$this->menu=array(
	//array('label'=>'Create Ligand', 'url'=>array('create')),
	array('label'=>'Manage Ligand', 'url'=>array('admin')),
);
?>

<h1>Ligands</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
        'cssFile'=> '/css/list.css',
        //'summaryText'=>'Page {page} of {pages}',
        'template'=>'{items} {summary} {pager}',
        'pager'=>array(
        'class'=>'CLinkPager',
        'header'=>'',
   ), 
	'itemView'=>'_view',
)); ?>
