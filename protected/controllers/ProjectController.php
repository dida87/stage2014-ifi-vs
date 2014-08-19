<?php

class ProjectController extends Controller
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
				'actions'=>array('index','view'),
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
        /*
	public function actionCreate()
	{
            $cats = Protein::model()->findAll();
            $count_cats = count($cats);
            if($count_cats > 0){
                $arr_category = array();
                foreach($cats as $cat)
                    array_push($arr_category,$cat->attributes);
            }
            
            $allLigand = Ligand::model()->findAll();
            $count_Ligand = count($allLigand);
            if($count_Ligand > 0){
                $arr_Ligand = array();
                foreach($allLigand as $cat)
                    array_push($arr_Ligand,$cat->attributes);
            }
            
            
//		$model=new Project;
//
//		// Uncomment the following line if AJAX validation is needed
//		// $this->performAjaxValidation($model);
//
//		if(isset($_POST['Project']))
//		{
//			$model->attributes=$_POST['Project'];
//			if($model->save())
//				$this->redirect(array('view','id'=>$model->project_id));
//		}

		$this->render('create'
                        ,array('modelProtein'=>$arr_category, 'modelLigand'=>$arr_Ligand,)
                );
	}
        */
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
        
        public function actionCreate() {
        $model = new Protein;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Protein'])) {
            $model->attributes = $_POST['Protein'];
            if ($model->save())
            {
                if (Yii::app()->request->isAjaxRequest) {
                    echo CJSON::encode(array(
                        'status' => 'success',
                        'div' => "Protein successfully added"
                    ));
                    exit;
                }
                else
                {
                    $this->redirect(array('view', 'id' => $model->protein_id));
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

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        // post from update.
        if(0 == $id)
        {
            if(isset($_SESSION['id_update_protein']))
                $id = $_SESSION['id_update_protein'];
            else
                throw new Exception('update error');
        }
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Protein'])) {
            $model->attributes = $_POST['Protein'];
            if ($model->save())
            {
                if (Yii::app()->request->isAjaxRequest) {
                    echo CJSON::encode(array(
                        'status' => 'success',
                        'div' => "Protein successfully added"
                    ));
                    exit;
                }
                else
                {
                    $this->redirect(array('view', 'id' => $model->protein_id));
                }
            }
        }

        if (Yii::app()->request->isAjaxRequest) {
            $_SESSION['id_update_protein'] = $id;
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
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Project']))
		{
			$model->attributes=$_POST['Project'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->project_id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
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
		$dataProvider=new CActiveDataProvider('Project');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
            
            
            
		$model=new Project('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Project']))
			$model->attributes=$_GET['Project'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
        // post ajax refresh project
        public function actionRefresh($id)
        {
//            $mydockingws = new dockingws();
            
//            $paramWaiting = new getProjectInfoWaiting($id);
//            $paramRunning = new getProjectInfoRunning($id);
//            $paramComplete = new getProjectInfoCompleted($id);
//            $paramFailed = new getProjectInfoFailed($id);
//            
//            $resWaiting = $mydockingws->getProjectInfoWaiting($paramWaiting);
//            $resRunning = $mydockingws->getProjectInfoRunning($paramRunning);
//            $resComplete = $mydockingws->getProjectInfoCompleted($paramComplete);
//            $resFailed = $mydockingws->getProjectInfoFailed($paramFailed);
            
            $model=$this->loadModel($id);
            $model->waiting_job = 1000;
            if($model->save())
                echo 'success';
            else
                echo 'failed';
            
//            echo $id;
        }
        // post ajax download result project
        public function actionDownload($id)
        {
//            $mydockingws = new dockingws();
            
//            $paramWaiting = new getProjectInfoWaiting($id);
//            $paramRunning = new getProjectInfoRunning($id);
//            $paramComplete = new getProjectInfoCompleted($id);
//            $paramFailed = new getProjectInfoFailed($id);
//            
//            $resWaiting = $mydockingws->getProjectInfoWaiting($paramWaiting);
//            $resRunning = $mydockingws->getProjectInfoRunning($paramRunning);
//            $resComplete = $mydockingws->getProjectInfoCompleted($paramComplete);
//            $resFailed = $mydockingws->getProjectInfoFailed($paramFailed);
            
            $rootPathServer = $_SERVER['SCRIPT_FILENAME'];
            $fullPathDir = substr($rootPathServer, 0, 
                            strpos($rootPathServer, 'index')).'tmp_param';
            $fullPathLigandFile = $fullPathDir.'/'.'result.rar';
            if(file_exists($fullPathLigandFile))
            {
              return Yii::app()->getRequest()->sendFile('result.rar', @file_get_contents($fullPathLigandFile));
            }
        }
        // post ajax docking
        public function actionDocking()
        {
            try
            {
                $pathToFolderTmp = '../first_yii/tmp_param/';

                $userName = Yii::app()->user->name;
                $newFile = $userName.'_'.time();
                $fileLigand = $userName.'_'.time().'.ligand.txt';
                
                $selectProtein = $_POST['protein'];
                $selectLigand = $_POST['ligand'];
                
                $objProtein = Protein::model()->findByPk($selectProtein);
                
                $arrLigand = explode(',', $selectLigand);
                $contentFileLigand = '';
                foreach ($arrLigand as $value) 
                {
                    $matchLigand = Ligand::model()->findByPk($value);
                    $contentFileLigand .= $matchLigand->file_name . ' ';
                }
                
                $protein_name = $objProtein->name;
                $firstLigand = Ligand::model()->findByPk($arrLigand[0]);
                $ligand_name = $firstLigand->name;
                
                $selectType = $_POST['type'];
                $contentFile = '';

                if('lga' == strtolower($selectType))
                {
                    $ga_run_value = $_POST['lga_1'];
                    
                    $contentFile = file_get_contents($pathToFolderTmp.'Lanmarkine genetic algorithm.dpf');
                    $contentFile = str_replace('ga_run_value', !empty($ga_run_value) ? $ga_run_value : '500', $contentFile);
                    $contentFile = str_replace('protein_name', !empty($protein_name) ? $protein_name : '', $contentFile);
                    $contentFile = str_replace('ligand_name', !empty($ligand_name) ? $ligand_name : '', $contentFile);
                    
                    $newFile .= '.lga.dpf' ;
                }
                else if('ls' == strtolower($selectType))
                {
                    $ls_1 = $_POST['ls_1'];
                    $ls_2 = $_POST['ls_2'];
                    $ls_3 = $_POST['ls_3'];
                    $ls_4 = $_POST['ls_4'];
                    $ls_5 = $_POST['ls_5'];
                    $ls_6 = $_POST['ls_6'];
                    $ls_7 = $_POST['ls_7'];
                    $ls_type = $_POST['ls_type'];
                    
                    $contentFile = file_get_contents($pathToFolderTmp.'local search.dpf');
                    $contentFile = str_replace('protein_name', !empty($protein_name) ? $protein_name : '', $contentFile);
                    $contentFile = str_replace('ligand_name', !empty($ligand_name) ? $ligand_name : '', $contentFile);
                    
                    $contentFile = str_replace('ls_1', !empty($ls_1) ? $ls_1 : '300', $contentFile);
                    $contentFile = str_replace('ls_2', !empty($ls_2) ? $ls_2 : '4', $contentFile);
                    $contentFile = str_replace('ls_3', !empty($ls_3) ? $ls_3 : '4', $contentFile);
                    $contentFile = str_replace('ls_4', !empty($ls_4) ? $ls_4 : '1', $contentFile);
                    $contentFile = str_replace('ls_5', !empty($ls_5) ? $ls_5 : '0.01', $contentFile);
                    
                    if('1' != $ls_type) $contentFile = str_replace('set_psw1', '', $contentFile);
                        
                    $newFile .= '.ls.dpf' ;
                }
                else if('ga' == strtolower($selectType))
                {
                    $ga_1 = $_POST['ga_1'];
                    $ga_2 = $_POST['ga_2'];
                    $ga_3 = $_POST['ga_3'];
                    $ga_4 = $_POST['ga_4'];
                    $ga_5 = $_POST['ga_5'];
                    $ga_6 = $_POST['ga_6'];
                    $ga_7 = $_POST['ga_7'];
                    $ga_8 = $_POST['ga_8'];
                    $ga_9 = $_POST['ga_9'];
                    $ga_10 = $_POST['ga_10'];
                    $ga_11 = $_POST['ga_11'];
                    
                    $contentFile = file_get_contents($pathToFolderTmp.'Genetic algorithm.dpf');
                    $contentFile = str_replace('protein_name', !empty($protein_name) ? $protein_name : '', $contentFile);
                    $contentFile = str_replace('ligand_name', !empty($ligand_name) ? $ligand_name : '', $contentFile);
                    
                    $contentFile = str_replace('ga_1', !empty($ga_1) ? $ga_1 : '150', $contentFile);
                    $contentFile = str_replace('ga_2', !empty($ga_2) ? $ga_2 : '2500000', $contentFile);
                    $contentFile = str_replace('ga_3', !empty($ga_3) ? $ga_3 : '27000', $contentFile);
                    $contentFile = str_replace('ga_4', !empty($ga_4) ? $ga_4 : '1', $contentFile);
                    $contentFile = str_replace('ga_5', !empty($ga_5) ? $ga_5 : '0.02', $contentFile);
                    $contentFile = str_replace('ga_6', !empty($ga_6) ? $ga_6 : '0.8', $contentFile);
                    $contentFile = str_replace('ga_7', !empty($ga_7) ? $ga_7 : '10', $contentFile);
                    $contentFile = str_replace('ga_8', !empty($ga_8) ? $ga_8 : '0.0', $contentFile);
                    $contentFile = str_replace('ga_9', !empty($ga_9) ? $ga_9 : '1.0', $contentFile);
                    $contentFile = str_replace('ga_10', !empty($ga_10) ? $ga_10 : '50', $contentFile);
                    
                    $newFile .= '.ga.dpf' ;
                }
                else if('sa' == strtolower($selectType))
                {
                    $sa_1 = $_POST['sa_1'];
                    $sa_2 = $_POST['sa_2'];
                    $sa_3 = $_POST['sa_3'];
                    $sa_4 = $_POST['sa_4'];
                    $sa_5 = $_POST['sa_5'];
                    $sa_6 = $_POST['sa_6'];
                    $sa_7 = $_POST['sa_7'];
                    $sa_8 = $_POST['sa_8'];
                    $sa_9 = $_POST['sa_9'];
                    $sa_type_1 = $_POST['sa_type_1'];
                    $sa_type_2 = $_POST['sa_type_2'];
                    
                    $contentFile = file_get_contents($pathToFolderTmp.'simulate an.dpf');
                    $contentFile = str_replace('protein_name', !empty($protein_name) ? $protein_name : '', $contentFile);
                    $contentFile = str_replace('ligand_name', !empty($ligand_name) ? $ligand_name : '', $contentFile);
                    
                    $contentFile = str_replace('sa_1', !empty($sa_1) ? $sa_1 : '10', $contentFile);
                    $contentFile = str_replace('sa_2', !empty($sa_2) ? $sa_2 : '100', $contentFile);
                    $contentFile = str_replace('sa_3', !empty($sa_3) ? $sa_3 : '50', $contentFile);
                    $contentFile = str_replace('sa_4', !empty($sa_4) ? $sa_4 : '100', $contentFile);
                    $contentFile = str_replace('sa_5', !empty($sa_5) ? $sa_5 : '1.0', $contentFile);
                    $contentFile = str_replace('sa_6', !empty($sa_6) ? $sa_6 : '1.0', $contentFile);
                    $contentFile = str_replace('sa_7', !empty($sa_7) ? $sa_7 : '1.0', $contentFile);
                    $contentFile = str_replace('sa_8', !empty($sa_8) ? $sa_8 : '0.95', $contentFile);
                    $contentFile = str_replace('sa_9', !empty($sa_9) ? $sa_9 : '1000.0', $contentFile);
                    $contentFile = str_replace('sa_type_1', !empty($sa_type_1) ? $sa_type_1 : 'm', $contentFile);
                    if('1' != $sa_type_2) $contentFile = str_replace('linear_schedule', '', $contentFile);
                    
                    $newFile .= '.sa.dpf' ;
                }
                
                file_put_contents($pathToFolderTmp.$newFile,$contentFile);
                file_put_contents($pathToFolderTmp.$fileLigand,$contentFileLigand);
                
                $rootPathServer = $_SERVER['SCRIPT_FILENAME'];
                $fullPathDir = substr($rootPathServer, 0, 
                                strpos($rootPathServer, 'index')).'tmp_param';
                $fullPathLigandFile = $fullPathDir.'/'.$fileLigand;
                $fullPathParamFile = $fullPathDir.'/'.$newFile;
                
                // call webservice...
//                $mydockingws = new dockingws();
//                $toSubmit = new submit_project($objProtein->protein_id, $fullPathLigandFile, 
//                        $objProtein->center_z, $objProtein->center_y, $objProtein->center_z, 
//                        $objProtein->size_x, $objProtein->size_y, $objProtein->size_z, 
//                        $fullPathParamFile);
//                $toReturn = $mydockingws->submit_project($toSubmit);
//                
//                $newProjectId = $toReturn->return;
                
                $newProjectName = $_POST['project_name'];
                $model = new Project;
//                $model->project_id = $newProjectId;
                $model->project_name = $newProjectName;
                if($model->save())
                {
                    echo 'success';
                }
                
            }
            catch (Exception $ex)
            {
                // handle exception here...
                echo $ex->getMessage();
//                echo 'failed';
            }
            
            
            
            
        }

        /**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Project the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Project::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Project $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='project-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
