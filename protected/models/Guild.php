<?php

/**
 * This is the model class for table "guild".
 *
 * The followings are the available columns in table 'guild':
 * @property integer $id
 * @property string $realm
 * @property string $name
 * @property string $tag
 * @property integer $guild_master_id
 * @property integer $faction_id
 * @property string $URL
 * @property string $img
 *
 * The followings are the available model relations:
 * @property Character[] $characters
 */
class Guild extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Guild the static model class
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
		return 'guild';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, realm, faction_id, URL', 'required'),
			array('guild_master_id, faction_id', 'numerical', 'integerOnly'=>true),
			array('realm, name, tag', 'length', 'max'=>45),
			array('URL, img', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, realm, name, tag, guild_master_id, faction_id, URL, img', 'safe', 'on'=>'search'),
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
			'characters' => array(self::HAS_MANY, 'Character', 'guild_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'realm' => 'Realm',
			'name' => 'Name',
			'tag' => 'Tag',
			'guild_master_id' => 'Guild Master',
			'faction_id' => 'Faction',
			'URL' => 'Url',
			'img' => 'Img',
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
		$criteria->compare('realm',$this->realm,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('tag',$this->tag,true);
		$criteria->compare('guild_master_id',$this->guild_master_id);
		$criteria->compare('faction_id',$this->faction_id);
		$criteria->compare('URL',$this->URL,true);
		$criteria->compare('img',$this->img,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}