<?php

class DockingProjectController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','refresh', 'docking', 'download'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('*'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
        
	public function actionCreate() {
        $model = new DockingProject;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['DockingProject'])) {
            $model->attributes = $_POST['DockingProject'];
//            if(isset($_SESSION['upload_ligand']))
//            {
//            }
//            $model->file_name = 'abc.txt'; //$_SESSION['upload_ligand'];
            if ($model->save())
            {
                if (Yii::app()->request->isAjaxRequest) {
                    echo CJSON::encode(array(
                        'status' => 'success',
                        'div' => "Docking project has successfully added"
                    ));
                    exit;
                }
                else
                {
                    $this->redirect(array('view', 'id' => $model->ligand_id));
                }
            }
                
        }

        if (Yii::app()->request->isAjaxRequest) {
            echo CJSON::encode(array(
                'status' => 'failure',
                'div' => $this->renderPartial('_form', array('model' => $model), true)));
            exit;
        } else {
            $this->render('create', array(
                'model' => $model,
            ));
        }
    }
        
         public function actionUpdate($id) {
        // post from update.
        if(0 == $id)
        {
            if(isset($_SESSION['id_update_dockingProject']))
                $id = $_SESSION['id_update_dockingProject'];
            else
                throw new Exception('update error');
        }
        $model = $this->loadModel($id);
        

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['DockingProject'])) {
            $model->attributes = $_POST['DockingProject'];
            if ($model->save())
            {
                if (Yii::app()->request->isAjaxRequest) {
                    echo CJSON::encode(array(
                        'status' => 'success',
                        'div' => "Docking project successfully added"
                    ));
                    exit;
                }
                else
                {
                    $this->redirect(array('view', 'id' => $model->ligand_id));
                }
            }
//            else
//            {
//                echo CJSON::encode(array(
//                        'status' => 'unsuccess',
//                        'div' => ""
//                    ));
//                    exit;
//            }
        }

        if (Yii::app()->request->isAjaxRequest) {
            $_SESSION['id_update_dockingProject'] = $id;
            echo CJSON::encode(array(
                'status' => 'failure',
                'div' => $this->renderPartial('_form', array('model' => $model), true)));
            exit;
        } else {
            $this->render('create', array(
                'model' => $model,
            ));
        }
    }

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('DockingProject');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new DockingProject('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['DockingProject']))
			$model->attributes=$_GET['DockingProject'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return DockingProject the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=DockingProject::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param DockingProject $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='docking-project-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
