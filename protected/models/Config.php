<?php

/**
 * This is the model class for table "config".
 *
 * The followings are the available columns in table 'config':
 * @property integer $id
 * @property string $timezone
 * @property string $locale
 * @property string $armory_region
 * @property string $armory_realm
 * @property string $brand
 * @property string $debug_mode
 * @property string $event_notification_active
 * @property string $welcome_message
 * @property string $template
 */
class Config extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Config the static model class
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
		return 'config';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('timezone, locale, armory_region, armory_realm', 'required'),
			array('timezone, locale, armory_region, armory_realm, brand, debug_mode, event_notification_active, template', 'length', 'max'=>45),
			array('welcome_message', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, timezone, locale, armory_region, armory_realm, brand, debug_mode, event_notification_active, welcome_message, template', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'timezone' => Yii::t('locale', 'Timezone'),
			'locale' => Yii::t('locale', 'Language'),
			'armory_region' => 'Armory Region',
			'armory_realm' => 'Armory Realm',
			'brand' => 'Brand',
			'debug_mode' => 'Debug Mode',
			'event_notification_active' => 'Event Notification Active',
			'welcome_message' => 'Welcome Message',
			'template' => 'Template',
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
		$criteria->compare('timezone',$this->timezone,true);
		$criteria->compare('locale',$this->locale,true);
		$criteria->compare('armory_region',$this->armory_region,true);
		$criteria->compare('armory_realm',$this->armory_realm,true);
		$criteria->compare('brand',$this->brand,true);
		$criteria->compare('debug_mode',$this->debug_mode,true);
		$criteria->compare('event_notification_active',$this->event_notification_active,true);
		$criteria->compare('welcome_message',$this->welcome_message,true);
		$criteria->compare('template',$this->template,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}