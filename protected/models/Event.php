<?php

/**
 * This is the model class for table "event".
 *
 * The followings are the available columns in table 'event':
 * @property integer $id
 * @property integer $raid_id
 * @property integer $raid_leader_id
 * @property string $event_date
 * @property string $creation_date
 * @property string $description
 *
 * The followings are the available model relations:
 * @property CharacterEvent[] $characterEvents
 * @property Raid $raid
 */
class Event extends RaiderActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Event the static model class
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
		return 'event';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('raid_id', 'required'),
			array('raid_id, raid_leader_id', 'numerical', 'integerOnly'=>true),
			array('event_date, creation_date, description', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, raid_id, raid_leader_id, event_date, creation_date, description', 'safe', 'on'=>'search'),
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
			'characterEvents' => array(self::HAS_MANY, 'CharacterEvent', 'event_id'),
			'raids' => array(self::BELONGS_TO, 'Raid', 'raid_id'),
			'users' => array(self::BELONGS_TO, 'User', 'raid_leader_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'raid_id' => 'Raid',
			'raid_leader_id' => 'Raid Leader',
			'event_date' => 'Event Date',
			'creation_date' => 'Creation Date',
			'description' => 'Description',
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
		$criteria->compare('raid_id',$this->raid_id);
		$criteria->compare('raid_leader_id',$this->raid_leader_id);
		$criteria->compare('event_date',$this->event_date,true);
		$criteria->compare('creation_date',$this->creation_date,true);
		$criteria->compare('description',$this->description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
}