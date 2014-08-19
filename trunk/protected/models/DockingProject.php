<?php

/**
 * This is the model class for table "docking_project".
 *
 * The followings are the available columns in table 'docking_project':
 * @property integer $project_id
 * @property integer $map_id
 * @property integer $user_id
 * @property string $project_name
 * @property integer $waiting_job
 * @property integer $running_job
 * @property integer $completed_job
 * @property integer $failed_job
 * @property integer $protein_id
 * @property string $dpf_file
 * @property integer $ligand_id
 *
 * The followings are the available model relations:
 * @property Ligand[] $ligands
 * @property Ligand $ligand
 * @property Map $map
 * @property Protein $protein
 * @property User $user
 */
class DockingProject extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'docking_project';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('map_id, user_id, protein_id, ligand_id', 'required'),
			array('map_id, user_id, waiting_job, running_job, completed_job, failed_job, protein_id, ligand_id', 'numerical', 'integerOnly'=>true),
			array('project_name, dpf_file', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('project_id, map_id, user_id, project_name, waiting_job, running_job, completed_job, failed_job, protein_id, dpf_file, ligand_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'ligands' => array(self::MANY_MANY, 'Ligand', 'docking_ligand(project_id, ligand_id)'),
			'ligand' => array(self::BELONGS_TO, 'Ligand', 'ligand_id'),
			'map' => array(self::BELONGS_TO, 'Map', 'map_id'),
			'protein' => array(self::BELONGS_TO, 'Protein', 'protein_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
		);
	}
        
        //Function
        //function to get list of ligand
        public function getListLigand(){
            return CHtml::listData(Ligand::model()->findAll(), 'ligand_id', 'file_name');
        }
                
        //function get list protein
        public function getListProtein(){
            return Chtml::listData(Protein::model()->findAll(), 'protein_id', 'file_name');
        }
        
        //fucntion to get list of map parameter
        public function getListMap(){
            return CHtml::listData(Map::model()->findAll(), 'map_id', 'map_file_name');
        }
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'project_id' => 'Project',
			'map_id' => 'Map',
			'user_id' => 'User',
			'project_name' => 'Project Name',
			'waiting_job' => 'Waiting Job',
			'running_job' => 'Running Job',
			'completed_job' => 'Completed Job',
			'failed_job' => 'Failed Job',
			'protein_id' => 'Protein',
			'dpf_file' => 'Dpf File',
			'ligand_id' => 'Ligand',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('project_id',$this->project_id);
		$criteria->compare('map_id',$this->map_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('project_name',$this->project_name,true);
		$criteria->compare('waiting_job',$this->waiting_job);
		$criteria->compare('running_job',$this->running_job);
		$criteria->compare('completed_job',$this->completed_job);
		$criteria->compare('failed_job',$this->failed_job);
		$criteria->compare('protein_id',$this->protein_id);
		$criteria->compare('dpf_file',$this->dpf_file,true);
		$criteria->compare('ligand_id',$this->ligand_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DockingProject the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
