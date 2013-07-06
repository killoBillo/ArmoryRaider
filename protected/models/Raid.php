<?php

/**
 * This is the model class for table "raid".
 *
 * The followings are the available columns in table 'raid':
 * @property integer $id
 * @property string $name
 * @property integer $level
 * @property string $img
 * @property integer $number_of_players
 * @property string $description
 * @property string $color
 * @property integer $is_heroic
 * @property integer $is_active
 *
 * The followings are the available model relations:
 * @property Event[] $events
 */
class Raid extends RaiderActiveRecord
{
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Raid the static model class
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
		return 'raid';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'unique'),
			array('name, level, number_of_players, is_heroic, is_active', 'required'),
			array('level, number_of_players, is_heroic, is_active', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			array('description', 'length', 'max'=>500),
			array('color', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, level, img, number_of_players, description, color, is_heroic, is_active', 'safe', 'on'=>'search'),
			array('img', 'file','types'=>'jpg, gif, png', 'on'=>'insert'),
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
			'events' => array(self::HAS_MANY, 'Event', 'raid_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'level' => 'Level',
			'img' => 'Img',
			'number_of_players' => 'Number Of Players',
			'description' => 'Description',
			'color' => 'Color',
			'is_heroic' => 'Is Heroic',
			'is_active' => 'Is Active',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('level',$this->level);
		$criteria->compare('img',$this->img,true);
		$criteria->compare('number_of_players',$this->number_of_players);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('color',$this->color,true);
		$criteria->compare('is_heroic',$this->is_heroic);
		$criteria->compare('is_active',$this->is_active);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}