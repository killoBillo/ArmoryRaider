<?php

/**
 * This is the model class for table "character_event".
 *
 * The followings are the available columns in table 'character_event':
 * @property integer $id
 * @property integer $event_id
 * @property integer $char_id
 * @property integer $role_id
 * @property integer $available_flag
 * @property integer $holder_flag
 * @property string $comment
 * @property string $comment_date
 *
 * The followings are the available model relations:
 * @property Armoryraider.character $char
 * @property Armoryraider.event $event
 * @property Armoryraider.role $role
 */
class CharacterEvent extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CharacterEvent the static model class
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
		return 'character_event';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('event_id, char_id, role_id', 'required'),
			array('event_id, char_id, role_id, available_flag, holder_flag', 'numerical', 'integerOnly'=>true),
			array('comment', 'length', 'max'=>500),
			array('comment_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, event_id, char_id, role_id, available_flag, holder_flag, comment, comment_date', 'safe', 'on'=>'search'),
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
			'char' => array(self::BELONGS_TO, 'Character', 'char_id'),
			'event' => array(self::BELONGS_TO, 'Event', 'event_id'),
			'role' => array(self::BELONGS_TO, 'Role', 'role_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'event_id' => 'Event',
			'char_id' => Yii::t('locale', 'Character'),
			'role_id' => Yii::t('locale', 'Role'),
			'available_flag' => Yii::t('locale', 'Set as available'),
			'holder_flag' => 'Holder Flag',
			'comment' => Yii::t('locale' ,'Comment'),
			'comment_date' => 'Comment Date',
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
		$criteria->compare('event_id',$this->event_id);
		$criteria->compare('char_id',$this->char_id);
		$criteria->compare('role_id',$this->role_id);
		$criteria->compare('available_flag',$this->available_flag);
		$criteria->compare('holder_flag',$this->holder_flag);
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('comment_date',$this->comment_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}