<?php

/**
 * This is the model class for table "reset_password".
 *
 * The followings are the available columns in table 'reset_password':
 * @property integer $id
 * @property integer $user_id
 * @property string $psw_temp
 * @property integer $activated
 * @property string $data_richiesta
 * @property string $data_attivazione
 *
 * The followings are the available model relations:
 * @property User $user
 */
class ResetPassword extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ResetPassword the static model class
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
		return 'reset_password';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, psw_temp', 'required'),
			array('user_id, activated', 'numerical', 'integerOnly'=>true),
			array('psw_temp', 'length', 'max'=>45),
			array('data_richiesta, data_attivazione', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, psw_temp, activated, data_richiesta, data_attivazione', 'safe', 'on'=>'search'),
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
			'psw_temp' => 'Psw Temp',
			'activated' => 'Activated',
			'data_richiesta' => 'Data Richiesta',
			'data_attivazione' => 'Data Attivazione',
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
		$criteria->compare('psw_temp',$this->psw_temp,true);
		$criteria->compare('activated',$this->activated);
		$criteria->compare('data_richiesta',$this->data_richiesta,true);
		$criteria->compare('data_attivazione',$this->data_attivazione,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}