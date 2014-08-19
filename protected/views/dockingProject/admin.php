<?php
/* @var $this DockingProjectController */
/* @var $model DockingProject */

$this->breadcrumbs=array(
	'Docking Projects'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List DockingProject', 'url'=>array('index')),
	//array('label'=>'Create DockingProject', 'url'=>array('create')),
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

<h1><i>Docking Projects</i></h1>
<br />

<?php echo CHtml::button('Advanced Search',array(
    'style'=> 'width:140px; height:30px; border-radius:15px;',
    'class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<br />
<br />
<br />
<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(// the dialog
    'id' => 'dialogClassroom',
    'options' => array(
        'title' => 'Docking Project',
        'autoOpen' => false,
        'modal' => true,
        'width' => 550,
        'height' => 450,
    ),
));
?>
<div class="divForForm"></div>
<?php $this->endWidget(); ?>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'docking-project-grid',
        'htmlOptions'=>array('style'=>'width:1000px;'),
        'pager' => array('cssFile' => Yii::app()->baseUrl . '/css/gridViewStyle/gridView.css'),
        'cssFile' => Yii::app()->baseUrl . '/css/gridViewStyle/gridView.css',        
	//'summaryText' => 'Yiiplayground is showing you {start} - {esnd} of {count} cool records'        
        'htmlOptions' => array('class' => 'grid-view rounded'),
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'project_id',
                'project_name',
                 array(
                    'header'=> 'DPF file',
                    'name' => 'dpf_file',
                    'filter'=> CHtml::listData(DockingProject::model()->findAll(),'project_id', 'dpf_file'),
                 ),
		   array(
                   'header'=> 'Ligand',
                   'name'=> 'ligand_id', 
                   'value' => '$data->ligand->file_name',
                   'filter'=> DockingProject::getListLigand(),
                ),
                array(
                    'header' => 'Protein',
                    'name'=> 'protein_id',
                    'value'=> '$date->protein->file_name',
                    'filter' => DockingProject::getListProtein(),
                ),
            
		array(
                  'header' => 'Map Parameter',
                  'name' => 'map_id',
                  'value' => '$data->map->map_file_name',
                  'filter' => DockingProject::getListMap(),
                ),
		//'project_name',
		//'waiting_job',
		//'running_job',
		/*
		'completed_job',
		'failed_job',
		'protein_id',
		'dpf_file',
		'ligand_id',
		*/
		array(
                    'header' => 'Operations',
		    'class'=>'CButtonColumn',
                    'template'=> '{view} {update} {delete}',
                    'buttons'=> array(
                        'update'=> array(
                            'visible'=> '(isset(Yii::app()->user->docking_login) && Yii::app()->user->docking_login)',
                            'click' => 'function(){updateClassroom(this); $("#dialogClassroom").dialog("open");return false;}',
                        ),
                        'delete'=> array(
                            'visible'=> '(isset(Yii::app()->user->docking_login) && Yii::app()->user->docking_login)'
                        )
                    )
		),
	),
)); 

class MyClass {

    public static function myMethod($data, $row, $component) {
        //the $data is the ActiveRecord Model collection from the dataProvider
        //the $row is the data row
        //the $component is the CGridColumn object for each columns
        // return the result you want
        return $row + 1;
    }

}
?>
<br />
<br />
<?php
if(isset(Yii::app()->user->docking_login) && Yii::app()->user->docking_login){
    echo CHtml::button('Add project', array(
        'style'=> 'width : 140px; height : 30px; border-radius : 15px;',
        'onclick' => "{addClassroom(); $('#dialogClassroom').dialog('open');}"
    ));
}
 else {
     echo "You have to login to manage docking project !!";
}
?>

<script type="text/javascript" src="../first_yii/assets/js_uploadfile/ajaxfileupload.js"></script>
<script type="text/javascript">
    // ajax upload image to server
    function ajaxFileUpload()
    {
        // add code validate here...
        $fileUp = $('input[name=fileToUpload]').val();
        if($fileUp == '') return;

        $.ajaxFileUpload
        (
        {
            url:'protected/views/dockingProject/doajaxfileupload.php',
            secureuri:false,
            fileElementId:'fileToUpload',
            async: false,
            dataType: 'json',
            //data:{
            //    name:'logan', 
            //    id:'id'
            //},
            success: 
            function (data, status)
            {
                if(typeof(data.error) != 'undefined')
                {
                    if(data.error != '')
                    {
                        $("#unsuccessRepoft").show();
                    }
                    else
                    {
                        $('#Docking_dpf_file').val(data.msg);
                        $("#successRepoft").show();
                    }
                }
            }
            ,
            error: function (data, status, e)
            {
                $("#unsuccessRepoft").show();
            }
        }
    )

        return ;

    }
    
    // here is the magic
    function addClassroom()
    {
        $.ajax({
            url: 'index.php?r=dockingProject/create',
            type: 'post',
            dataType: 'json',
            data: $(this).serialize(),
            success: function(data){
                if (data.status == 'failure')
                {
                    $('#dialogClassroom div.divForForm').html(data.div);
                    // Here is the trick: on submit-> once again this function!
                    $('#dialogClassroom div.divForForm form').submit(
                    addClassroom
                    );
                }
                else
                {
                    //$('#dialogClassroom div.divForForm').html(data.div);
                    $.fn.yiiGridView.update('docking-project-grid');
                    //setTimeout("$('#dialogClassroom').dialog('close')",3000);
                    
                    $('#dialogClassroom').dialog('close');
                    alert('insert success');
                }
            }
        });
        return false; 
    }
    function updateClassroom(control)
    {
        $.ajax({
            url: $(control).attr('href'),
            type: 'post',
            dataType: 'json',
            data: $(this).serialize(),
            success: function(data){
                if (data.status == 'failure')
                {
                    $('#dialogClassroom div.divForForm').html(data.div);
                    //Here is the trick: on submit-> once again this function!
                    $('#dialogClassroom div.divForForm form').submit(_updateClassroom);
                }
                else
                {
                    $('#dialogClassroom div.divForForm').html(data.div);
                    $.fn.yiiGridView.update('docking-project-grid');
                    setTimeout("$('#dialogClassroom').dialog('close')",3000);
                }
            }
        });
        return false; 
    }
    
    function _updateClassroom()
    {
        $.ajax({
            url: 'index.php?r=dockingProject/update&id=0',
            type: 'post',
            dataType: 'json',
            data: $(this).serialize(),
            success: function(data){
                if (data.status == 'failure')
                {
                    $('#dialogClassroom div.divForForm').html(data.div);
                    $('#dialogClassroom div.divForForm form').submit(_updateClassroom);
                    //Here is the trick: on submit-> once again this function!
                }
                else
                {
                    //$('#dialogClassroom div.divForForm').html(data.div);
                    $.fn.yiiGridView.update('docking-project-grid');
                    //setTimeout("$('#dialogClassroom').dialog('close')",3000);
                    
                    $('#dialogClassroom').dialog('close');
                    alert('update success');
                }
            }
        });
        return false;
        
    }
    
    function dockingFileOnchange()
    {
        ajaxFileUpload();
        //$("#successRepoft").show();
    }
    
</script>

 