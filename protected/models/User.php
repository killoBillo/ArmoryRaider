<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $name
 * @property string $surname
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $portrait_URL
 * @property string $creation_date
 * @property integer $status
 * @property string $activation_key
 *
 * The followings are the available model relations:
 * @property Character[] $characters
 */
class User extends RaiderActiveRecord
{
	public $repeat_password;
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
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
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, email', 'unique'),
			array('name, surname, username, email', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('name, surname, username, email', 'length', 'max'=>45),
			array('password, activation_key', 'length', 'max'=>32),
			array('portrait_URL', 'length', 'max'=>255),
			array('creation_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, surname, username, password, email, portrait_URL, creation_date, status, activation_key', 'safe', 'on'=>'search'),
			array('repeat_password', 'compare', 'compareAttribute'=>'password'),
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
			'characters' => array(self::HAS_MANY, 'Character', 'user_id'),
			// relation tra il model user e autassignment del modulo Rights.
			'authassignments'=> array(self::HAS_MANY, 'Authassignment', 'userid'),	
			// relation tra il model user e userattributes, al momento non esiste la foreign key
			'profile'=> array(self::HAS_ONE, 'Userattributes', 'user_id'),	
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => Yii::t('locale', 'Name'),
			'surname' => Yii::t('locale', 'Surname'),
			'username' => Yii::t('locale', 'Username'),
			'password' => Yii::t('locale', 'Password'),
			'password_confirm'=>Yii::t('locale', 'Password Confirm'),
			'email' => Yii::t('locale', 'Email'),
			'portrait_URL' => Yii::t('locale', 'Portrait'),
			'creation_date' => 'Creation Date',
			'status' => 'Status',
			'activation_key' => 'Activation Key',
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
		$criteria->compare('surname',$this->surname,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('portrait_URL',$this->portrait_URL,true);
		$criteria->compare('creation_date',$this->creation_date,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('activation_key',$this->activation_key,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}