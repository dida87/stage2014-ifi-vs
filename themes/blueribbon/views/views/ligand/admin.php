<?php
/* @var $this LigandController */
/* @var $model Ligand */

$this->breadcrumbs=array(
	'Ligands'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Ligand', 'url'=>array('index')),
	array('label'=>'Create Ligand', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#ligand-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Ligands</h1>



<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ligand-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'ligand_id',
		'name',
		'file_name',
		'mw',
		'hd',
		'ha',
		/*
		'log_p',
		'psa',
		'ic50_hep',
		'ic50_rd',
		'ic50_fi',
		'plant_specie',
		'plant_part',
		'reference',
		'classification',
		'bioactivity',
		'remark',
		'user_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
