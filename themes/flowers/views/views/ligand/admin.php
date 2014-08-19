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
            'header' => 'Update',
            'class' => 'CButtonColumn',
            'template' => '{update}',
            'buttons' => array
                (
                'update' => array(
                    'click' => 'function(){updateClassroom(this); $("#dialogClassroom").dialog("open");return false;}',
                ),
                
            )
        ),
       
        array(
            'header' => 'Delete Ligand',
            'class' => 'CButtonColumn',
            'template' => '{delete}',
        ),
        array(
            'header' => 'View Ligand',
            'class' => 'CButtonColumn',
            'template' => '{view}',
            'buttons' => array
                (
                'update' => array(
                    'click' => 'function(){viewClassroom(this); $("#dialogClassroom").dialog("open");return false;}',
                ),
                
            )
        ),
	),
)); 

class MyClass {
 
    public static function myMethod($data, $row, $component) {
        //the $data is the ActiveRecord Model collection from the dataProvider
        //the $row is the data rowb><?php 
        //the $component is the CGridColumn object for each columns
        // return the result you want
        return $row + 1;
    }

}
?>

<?php echo CHtml::button('Add ligand', // the link for open the dialog
        array(
    //'style' => 'cursor: pointer; text-decoration: underline;',
      'style'=> 'width: 120px; border-radius: 10px;',
      'onclick' => "{addClassroom(); $('#dialogClassroom').dialog('open');}"
));
?>

<?php echo CHtml::button('Advanced Search',array(
     'style'=> 'width: 140px; border-radius: 15px;',
    'class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
   
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
            url:'protected/views/ligand/doajaxfileupload.php',
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
                        $('#Ligand_file_name').val(data.msg);
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
            url: 'index.php?r=ligand/create',
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
                    $.fn.yiiGridView.update('ligand-grid');
                    //setTimeout("$('#dialogClassroom').dialog('close')",3000);
                    
                    $('#dialogClassroom').dialog('close');
                    alert('insert success');
                }
            }
        });
        return false; 
    }
    function updateClassroom(control)
    {updateClassroom
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
                    $.fn.yiiGridView.update('ligand-grid');
                    setTimeout("$('#dialogClassroom').dialog('close')",3000);
                }
            }
        });
        return false; 
    }
    
    function _updateClassroom()
    {
        $.ajax({
            url: 'index.php?r=ligand/update&id=0',
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
                    $.fn.yiiGridView.update('ligand-grid');
                    //setTimeout("$('#dialogClassroom').dialog('close')",3000);
                    
                    $('#dialogClassroom').dialog('close');
                    alert('update success');
                }
            }
        });
        return false;
        
    }
    function viewClassroom(control)
    {
        $.ajax({
             url: 'index.php?r=ligand/view',
            type: 'post',
            dataType: 'json',
            data: $(this).serialize(),
          success: function(data){
                if (data.status == 'failure')
                {
                    $('#dialogClassroom div.divForForm').html(data.div);
                    // Here is the trick: on submit-> once again this function!
                    $('#dialogClassroom div.divForForm form').submit(
                    viewClassroom
                    );
                }
                else
                {
                    //$('#dialogClassroom div.divForForm').html(data.div);
                    $.fn.yiiGridView.update('ligand-grid');
                    //setTimeout("$('#dialogClassroom').dialog('close')",3000);
                    
                    $('#dialogClassroom').dialog('close');
                }
            }   
        });
        return false; 
    }
       
    function ligandFileOnchange()
    {
        ajaxFileUpload();
        //$("#successRepoft").show();
    }
    
</script>
