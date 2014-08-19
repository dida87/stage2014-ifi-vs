<?php

/**
 * This is the model class for table "ligand".
 *
 * The followings are the available columns in table 'ligand':
 * @property integer $ligand_id
 * @property string $name
 * @property string $file_name
 * @property double $mw
 * @property integer $hd
 * @property integer $ha
 * @property double $log_p
 * @property double $psa
 * @property double $ic50_hep
 * @property double $ic50_rd
 * @property double $ic50_fi
 * @property string $plant_specie
 * @property string $plant_part
 * @property string $reference
 * @property string $classification
 * @property string $bioactivity
 * @property string $remark
 * @property integer $user_id
 *
 * The followings are the available model relations:
 * @property DockingProject[] $dockingProjects
 * @property User $user
 */
class Ligand extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Ligand the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ligand';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('user_id', 'required'),
			array('hd, ha, user_id', 'numerical', 'integerOnly'=>true),
			array('mw, log_p, psa, ic50_hep, ic50_rd, ic50_fi', 'numerical'),
			array('name, file_name, plant_specie, plant_part, reference, classification, bioactivity, remark', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ligand_id, name, file_name, mw, hd, ha, log_p, psa, ic50_hep, ic50_rd, ic50_fi, plant_specie, plant_part, reference, classification, bioactivity, remark, user_id', 'safe', 'on'=>'search'),
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
			'dockingProjects' => array(self::MANY_MANY, 'DockingProject', 'docking_ligand(ligand_id, project_id)'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
		);
	}
        
        //function to get user by name
         public function getUser(){
            return CHtml::listData(User::model()->findAll(),'user_id', 'name');            
        }
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ligand_id' => 'Ligand',
			'name' => 'Name',
			'file_name' => 'File Name',
			'mw' => 'Mw',
			'hd' => 'Hd',
			'ha' => 'Ha',
			'log_p' => 'Log P',
			'psa' => 'Psa',
			'ic50_hep' => 'Ic50 Hep',
			'ic50_rd' => 'Ic50 Rd',
			'ic50_fi' => 'Ic50 Fi',
			'plant_specie' => 'Plant Specie',
			'plant_part' => 'Plant Part',
			'reference' => 'Reference',
			'classification' => 'Classification',
			'bioactivity' => 'Bioactivity',
			'remark' => 'Remark',
			'user_id' => 'User',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('ligand_id',$this->ligand_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('file_name',$this->file_name,true);
		$criteria->compare('mw',$this->mw);
		$criteria->compare('hd',$this->hd);
		$criteria->compare('ha',$this->ha);
		$criteria->compare('log_p',$this->log_p);
		$criteria->compare('psa',$this->psa);
		$criteria->compare('ic50_hep',$this->ic50_hep);
		$criteria->compare('ic50_rd',$this->ic50_rd);
		$criteria->compare('ic50_fi',$this->ic50_fi);
		$criteria->compare('plant_specie',$this->plant_specie,true);
		$criteria->compare('plant_part',$this->plant_part,true);
		$criteria->compare('reference',$this->reference,true);
		$criteria->compare('classification',$this->classification,true);
		$criteria->compare('bioactivity',$this->bioactivity,true);
		$criteria->compare('remark',$this->remark,true);
		$criteria->compare('user_id',$this->user_id);
               // $criteria->with = 'protein';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}