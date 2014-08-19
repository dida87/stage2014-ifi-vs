<?php
/* @var $this LigandController */
/* @var $model Ligand */

$this->breadcrumbs = array(
    'Ligands' => array('index'),
    'Manage',
);

$this->menu = array(
    //array('label' => 'List Ligand', 'url' => array('index')),
    //array('label' => 'Create Ligand', 'url' => array('create')),
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
<h1><i> Ligand </i> </h1>
<br />
<?php echo CHtml::button('Advanced Search',array(
    'style'=> 'width: 140px; border-radius: 15px; height:30px;',
    'class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div>

<br />
<br/>
<br />

<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(// the dialog
    'id' => 'dialogClassroom',
    'options' => array(
        'title' => 'Ligand',
        'autoOpen' => false,
        'modal' => true,
        'width' => 550,
        'height' => 620,
    ),
));
?>
<div class="divForForm"></div>
<?php $this->endWidget(); ?>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'ligand-grid',
     'htmlOptions'=>array('style'=>'width:1000px;'),
     'pager' => array('cssFile' => Yii::app()->baseUrl . '/css/gridViewStyle/gridView.css'),
     'cssFile' => Yii::app()->baseUrl . '/css/gridViewStyle/gridView.css',        
	//'summaryText' => 'Yiiplayground is showing you {start} - {esnd} of {count} cool records'        
      'htmlOptions' => array('class' => 'grid-view rounded'),
      'dataProvider' => $model->search(),
//	'filter'=>$model,
    'columns' => array(
//		'ligand_id',
        array(
            'header' => 'Index',
            'name' => 'id',
            // an array of class and method wich will be called with call_user_func_array
            'value' => array('MyClass', 'myMethod'),
            'htmlOptions' => array('width' => '40px')
        ),
        'name',
        'file_name',
        'mw',
        'hd',
        'ha',
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
        // array(
          //   'name' => 'user_id',
          //   'value' => '$data->user->name',
          // 'filter' => Ligand::getUser(),
         //),
        //'user_id',
        /*
          'remark',
         */
        array(
            'header' => 'Operations',
            'class' => 'CButtonColumn',
            'template' => '{update} {delete} {view}',
            'buttons' => array
                (
                'update' => array(
                    'visible'=> '(isset(Yii::app()->user->ligand_login) && Yii::app()->user->ligand_login)',
                    'click' => 'function(){updateClassroom(this); $("#dialogClassroom").dialog("open");return false;}',
                ),
                'delete'=>array(
                    'visible' => '(isset(Yii::app()->user->ligand_login) && Yii::app()->user->ligand_login)'
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
<br>
<br>
<?php
if (isset(Yii::app()->user->ligand_login) && Yii::app()->user->ligand_login){
echo CHtml::button('Add Ligand', // the link for open the dialog
        array(
    //'style' => 'cursor: pointer; text-decoration: underline;',
        'style'=> 'width : 140px; border-radius : 15px; height : 30px;',
        'onclick' => "{addClassroom(); $('#dialogClassroom').dialog('open');}"
));
}
else{
    echo "You have to login to manage ligand!!!";
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
    
    function ligandFileOnchange()
    {
        ajaxFileUpload();
        //$("#successRepoft").show();
    }
    
</script>