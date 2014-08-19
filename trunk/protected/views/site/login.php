<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle = Yii::app()->name . ' - Login';
$this->breadcrumbs = array(
    'Login',
);
?>

<style type="text/css">
    .lblLogin {
        font-size: 14px !important;
    }
    .inputLogin{
        width: 250px;
        height: 25px;
        
    }
    #containLogin
    {
        margin-left: auto;margin-right: auto; width: 310px; border: 2px solid #94C; border-radius: 5px 5px 5px 5px;
        margin-top: 100px;
        padding: 10px 0px;
    }
</style>

<div id="containLogin" style="">

    <div class="form" style="margin-left: auto; margin-right: auto; width: 258px;">
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'login-form',
            'enableClientValidation' => true,
            'clientOptions' => array(
                'validateOnSubmit' => true,
            ),
                ));
        ?>


        <div class="row">
            <?php echo $form->labelEx($model, 'username', array('class' => 'lblLogin')); ?>
            <?php echo $form->textField($model, 'username', array('class' => 'inputLogin')); ?>
            <?php echo $form->error($model, 'username'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model, 'password', array('class' => 'lblLogin')); ?>
            <?php echo $form->passwordField($model, 'password', array('class' => 'inputLogin')); ?>
            <?php echo $form->error($model, 'password'); ?>
        </div>

        <div class="row rememberMe">
            <?php echo $form->checkBox($model, 'rememberMe'); ?>
            <?php echo $form->label($model, 'rememberMe'); ?>
            <?php echo $form->error($model, 'rememberMe'); ?>
        </div>

        <div class="row buttons" style="margin-top: 10px; text-align: right;">
            <?php echo CHtml::submitButton('Login'); ?>
        </div>
        
        <?php
        echo CHtml::link('New User',// the link for open the dialog
        array(
          '/user/register',
         'style' => 'cursor: pointer; text-decoration: underline;',
         //'onclick' => "{addClassroom(); $('#dialogClassroom').dialog('open');}"
));
?>
        <?php $this->endWidget(); ?>
    </div><!-- form -->
</div>
