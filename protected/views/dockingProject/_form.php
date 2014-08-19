<?php
/* @var $this DockingProjectController */
/* @var $model DockingProject */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'docking-project-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'project_name'); ?>
		<?php echo $form->textField($model,'project_name',array('size'=>40,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'project_name'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'dpf_file'); ?>
		<?php echo $form->textField($model,'dpf_file',array('size'=>40,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'dpf_file'); ?>
	</div>
        <div class="row">
                <input id="fileToUpload" type="file" name="fileToUpload" size="40" onchange="dockingFileOnchange()" style="" />
                <div id="successRepoft" style="float: left; display: none;">
                    <img src="../first_yii/assets/icon-archive/success-icon.png" >
                </div>
                <div id="unsuccessRepoft" style="float: left; display: none;">
                    <img src="../first_yii/assets/icon-archive/unsuccess-icon.png" >
                </div>
                <!--<input id="Ligand_file_name" name="Ligand[file_name]" type="hidden" value="">-->
        
        </div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'ligand_id'); ?>
		<?php echo $form->dropDownList($model, 'ligand_id', CHtml::listData(Ligand::model()->findAll(), 'ligand_id', 'file_name')); ?>
		<?php echo $form->error($model,'ligand_id'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'protein_id'); ?>
		<?php  echo $form->dropDownList($model, 'protein_id', CHtml::listData(Protein::model()->findAll(), 'protein_id', 'file_name')); ?>
		<?php echo $form->error($model,'protein_id'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'map_id'); ?>
		<?php echo $form->dropDownList($model, 'map_id', CHtml::listData(Map::model()->findAll(), 'map_id', 'map_file_name')); ?>
		<?php echo $form->error($model,'map_id'); ?>
	</div>
        <br />
        <br />
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
                <?php echo CHtml::resetButton('Reset');  ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->