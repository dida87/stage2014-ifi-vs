<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'register',
);
?>

<h1>Register User</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>