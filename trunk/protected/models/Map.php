<?php

/**
 * This is the model class for table "map".
 *
 * The followings are the available columns in table 'map':
 * @property integer $map_id
 * @property integer $protein_id
 * @property string $map_file_name
 * @property string $file_tar_gz
 *
 * The followings are the available model relations:
 * @property DockingProject[] $dockingProjects
 * @property Protein $protein
 */
class Map extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'map';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('protein_id', 'required'),
			array('protein_id', 'numerical', 'integerOnly'=>true),
			array('map_file_name, file_tar_gz', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('map_id, protein_id, map_file_name, file_tar_gz', 'safe', 'on'=>'search'),
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
			'dockingProjects' => array(self::HAS_MANY, 'DockingProject', 'map_id'),
			'protein' => array(self::BELONGS_TO, 'Protein', 'protein_id'),
		);
	}
        
        public function getListProtein(){
            return CHtml::listData(Protein::model()->findAll(), 'name');
                
        }
        public function getMapFile($key=null){
            if($key!==null)
                return self::$map_file_name{$key};
            return self::$map_file_name;
            
        }
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'map_id' => 'Map',
			'protein_id' => 'Protein',
			'map_file_name' => 'Map File Name',
			'file_tar_gz' => 'File Tar Gz',
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

		$criteria->compare('map_id',$this->map_id);
		$criteria->compare('protein_id',$this->protein_id);
		$criteria->compare('map_file_name',$this->map_file_name,true);
		$criteria->compare('file_tar_gz',$this->file_tar_gz,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Map the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
