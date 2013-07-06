<?php

/**
 * This is the model class for table "character".
 *
 * The followings are the available columns in table 'character':
 * @property integer $id
 * @property integer $user_id
 * @property integer $class_id
 * @property integer $race_id
 * @property integer $gender_id
 * @property integer $faction_id
 * @property integer $guild_id
 * @property string $name
 * @property integer $level
 * @property string $title
 * @property string $item_level
 * @property string $portrait_URL
 * @property string $armory_URL
 * @property integer $is_main
 *
 * The followings are the available model relations:
 * @property User $user
 * @property Class $class
 * @property Faction $faction
 * @property Gender $gender
 * @property Race $race
 * @property Guild $guild
 * @property CharacterEvent[] $characterEvents
 * @property Role[] $roles
 * @property Spec[] $specs
 */
class Character extends RaiderActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Character the static model class
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
		return 'character';
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
			array('user_id, class_id, race_id, gender_id, faction_id', 'required'),
			array('user_id, class_id, race_id, gender_id, faction_id, guild_id, level, is_main', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>45),
			array('title, portrait_URL, armory_URL', 'length', 'max'=>255),
			array('item_level', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, class_id, race_id, gender_id, faction_id, guild_id, name, level, title, item_level, portrait_URL, armory_URL, is_main', 'safe', 'on'=>'search'),
			// Con questa regola valido i model secondari
//			array('character_has_spec', 'ValidateSubModels'),
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
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			'class' => array(self::BELONGS_TO, 'Class', 'class_id'),
			'faction' => array(self::BELONGS_TO, 'Faction', 'faction_id'),
			'gender' => array(self::BELONGS_TO, 'Gender', 'gender_id'),
			'race' => array(self::BELONGS_TO, 'Race', 'race_id'),
			'guild' => array(self::BELONGS_TO, 'Guild', 'guild_id'),
			'characterEvents' => array(self::HAS_MANY, 'CharacterEvent', 'char_id'),
			'roles' => array(self::MANY_MANY, 'Role', 'character_has_role(character_id, role_id)'),
			'specs' => array(self::MANY_MANY, 'Spec', 'character_has_spec(character_id, spec_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => 'User',
			'class_id' => 'Class',
			'race_id' => 'Race',
			'gender_id' => 'Gender',
			'faction_id' => 'Faction',
			'guild_id' => 'Guild',
			'name' => 'Name',
			'level' => 'Level',
			'title' => 'Title',
			'item_level' => 'Item Level',
			'portrait_URL' => 'Portrait Url',
			'armory_URL' => 'Armory Url',
			'is_main' => 'Is Main',
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
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('class_id',$this->class_id);
		$criteria->compare('race_id',$this->race_id);
		$criteria->compare('gender_id',$this->gender_id);
		$criteria->compare('faction_id',$this->faction_id);
		$criteria->compare('guild_id',$this->guild_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('level',$this->level);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('item_level',$this->item_level,true);
		$criteria->compare('portrait_URL',$this->portrait_URL,true);
		$criteria->compare('armory_URL',$this->armory_URL,true);
		$criteria->compare('is_main',$this->is_main);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}