<?php
/* @var $this LigandController */
/* @var $model Ligand */
/* @var $form CActiveForm */
?>
<style type="text/css">
    .divFormFloatLeft
    {
        float: left;
    }
    .divFormFloatRight
    {
        float: left;
        margin-left: 70px;
    }
    
</style>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ligand-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'file_name'); ?>
		<?php echo $form->textField($model,'file_name',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'file_name'); ?>
	</div>
        <div class="row">
                <input id="fileToUpload" type="file" name="fileToUpload" size="40" onchange="ligandFileOnchange()" style="" />
                <div id="successRepoft" style="float: left; display: none;">
                    <img src="../first_yii/assets/icon-archive/success-icon.png" >
                </div>
                <div id="unsuccessRepoft" style="float: left; display: none;">
                    <img src="../first_yii/assets/icon-archive/unsuccess-icon.png" >
                </div>
                <!--<input id="Ligand_file_name" name="Ligand[file_name]" type="hidden" value="">-->
        
        </div>
      

	<div class="row ">
		<?php echo $form->labelEx($model,'mw'); ?>
		<?php echo $form->textField($model,'mw'); ?>
		<?php echo $form->error($model,'mw'); ?>
	</div>

	<div class="row ">
		<?php echo $form->labelEx($model,'hd'); ?>
		<?php echo $form->textField($model,'hd'); ?>
		<?php echo $form->error($model,'hd'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ha'); ?>
		<?php echo $form->textField($model,'ha'); ?>
		<?php echo $form->error($model,'ha'); ?>
	</div>

	<div class="row t">
		<?php echo $form->labelEx($model,'log_p'); ?>
		<?php echo $form->textField($model,'log_p'); ?>
		<?php echo $form->error($model,'log_p'); ?>
	</div>

	<div class="row t">
		<?php echo $form->labelEx($model,'psa'); ?>
		<?php echo $form->textField($model,'psa'); ?>
		<?php echo $form->error($model,'psa'); ?>
	</div>

	<div class="row ">
		<?php echo $form->labelEx($model,'ic50_hep'); ?>
		<?php echo $form->textField($model,'ic50_hep'); ?>
		<?php echo $form->error($model,'ic50_hep'); ?>
	</div>

	<div class="row ">
		<?php echo $form->labelEx($model,'ic50_rd'); ?>
		<?php echo $form->textField($model,'ic50_rd'); ?>
		<?php echo $form->error($model,'ic50_rd'); ?>
	</div>

	<div class="row ">
		<?php echo $form->labelEx($model,'ic50_fi'); ?>
		<?php echo $form->textField($model,'ic50_fi'); ?>
		<?php echo $form->error($model,'ic50_fi'); ?>
	</div>

	<div class="row ">
		<?php echo $form->labelEx($model,'plant_specie'); ?>
		<?php echo $form->textField($model,'plant_specie',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'plant_specie'); ?>
	</div>

	<div class="row ">
		<?php echo $form->labelEx($model,'plant_part'); ?>
		<?php echo $form->textField($model,'plant_part',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'plant_part'); ?>
	</div>

	<div class="row ">
		<?php echo $form->labelEx($model,'reference'); ?>
		<?php echo $form->textField($model,'reference',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'reference'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'classification'); ?>
		<?php echo $form->textField($model,'classification',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'classification'); ?>
	</div>

	<div class="row ">
		<?php echo $form->labelEx($model,'bioactivity'); ?>
		<?php echo $form->textField($model,'bioactivity',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'bioactivity'); ?>
	</div>

	<div class="row ">
		<?php echo $form->labelEx($model,'remark'); ?>
		<?php echo $form->textField($model,'remark',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'remark'); ?>
	</div>

	<br />
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
                <?php echo CHtml::resetButton('Reset'); ?>
        </div>

<?php $this->endWidget(); ?>

</div><!-- form -->