<?php

/**
 * This is the model class for table "userattributes".
 *
 * The followings are the available columns in table 'userattributes':
 * @property integer $id
 * @property integer $user_id
 * @property integer $guildrole_id
 * @property string $portrait
 * @property string $second_email
 * @property string $phone_number
 * @property string $site_URL
 * @property string $last_login
 * @property string $locale
 * @property string $timezone
 * @property integer $is_raidleader
 *
 * The followings are the available model relations:
 * @property User $user
 * @property Guildrole $guildrole
 */
class Userattributes extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Userattributes the static model class
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
		return 'userattributes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, guildrole_id', 'required'),
			array('user_id, guildrole_id, is_raidleader', 'numerical', 'integerOnly'=>true),
			array('portrait, second_email, phone_number, site_URL, locale, timezone', 'length', 'max'=>45),
			array('last_login', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, guildrole_id, portrait, second_email, phone_number, site_URL, last_login, locale, timezone, is_raidleader', 'safe', 'on'=>'search'),
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
			'guildrole' => array(self::BELONGS_TO, 'Guildrole', 'guildrole_id'),
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
			'guildrole_id' => Yii::t('locale','Guild role'),
			'portrait' => 'Portrait',
			'second_email' => 'Second Email',
			'phone_number' => 'Phone Number',
			'site_URL' => 'Site Url',
			'last_login' => 'Last Login',
			'locale' => Yii::t('locale', 'Language'),
			'timezone' => Yii::t('locale', 'Timezone'),
			'is_raidleader' => Yii::t('locale', 'User is a Raidleader ?'),
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
		$criteria->compare('guildrole_id',$this->guildrole_id);
		$criteria->compare('portrait',$this->portrait,true);
		$criteria->compare('second_email',$this->second_email,true);
		$criteria->compare('phone_number',$this->phone_number,true);
		$criteria->compare('site_URL',$this->site_URL,true);
		$criteria->compare('last_login',$this->last_login,true);
		$criteria->compare('locale',$this->locale,true);
		$criteria->compare('timezone',$this->timezone,true);
		$criteria->compare('is_raidleader',$this->is_raidleader);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}