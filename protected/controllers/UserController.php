<?php

class UserController extends RaiderController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2Page';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array('rights', );
	}
	
	public function allowedActions() { 
		return ''; 
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new User;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$ok = false;
		$model=$this->loadModel($id);
		$modelAttr = $model->profile;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		if(isset($_POST['User']))
		{
			$_POST['User']['repeat_password'] = $model->password;
			$model->attributes=$_POST['User'];
			if($model->save())
				$ok = true;
		}
		
		if(isset($_POST['Userattributes'])) {
			$modelAttr->attributes= $_POST['Userattributes'];
			if($modelAttr->save() && $ok)
				$this->redirect(array('admin'));
		}

		$this->render('update',array(
			'model'=>$model,
			'modelAttr'=>$modelAttr,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('User');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=User::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	
	public function actionProfile() {
		$model=$this->loadModel(Yii::app()->user->id);
		$modelUserAttr = Userattributes::model()->findByAttributes(array('user_id'=>Yii::app()->user->id));
		
		if(isset($_POST['User'])) {
			
			// controllo se è stata uploadata una nuova img utente
			if(!empty($_FILES['User']['name']['portrait_URL']))
				$_POST['User']['portrait_URL'] = $_FILES['User']['name']['portrait_URL'];
			else 
				$_POST['User']['portrait_URL'] = $model->portrait_URL;
				
			// controllo se è stata cambiata la password
			if(!empty($_POST['User']['password'])) {
				$_POST['User']['password'] = md5($_POST['User']['password']);
				$_POST['User']['repeat_password'] = md5($_POST['User']['repeat_password']);
			}else{
				$_POST['User']['password'] = $_POST['User']['repeat_password'] = $model->password;
			}
	
				
			$model->setAttributes($_POST['User']);
			$model->img = CUploadedFile::getInstance($model, 'portrait_URL');
			
			$modelUserAttr->setAttributes($_POST['Userattributes']);
			if($model->save()) {
				if($modelUserAttr->save()) {
					// aggiorno la lingua di localizzazione nel caso l'utente l'abbia cambiata, altrimenti dovrebbe rieseguire la login.
					Yii::app()->session['locale'] = (isset($modelUserAttr->locale)) ? $modelUserAttr->locale : Yii::app()->session['locale'] ;
					$this->redirect(Yii::app()->homeUrl);
				}
			}
		}
		
		$this->render('profile',array(
			'model'=>$model,
			'modelUserAttr'=>$modelUserAttr,
		));		
	}
	
	
	
	
	public function actionRaidleader() {
		$modelUserAttr = new Userattributes();
		
		if(isset($_POST['Userattributes'])) {
			$modelUserAttr = Userattributes::model()->findByAttributes(array('user_id'=>$_POST['Userattributes']['user_id']));
			
			if(isset($_POST['submit'])) {
				$modelUserAttr->is_raidleader = $_POST['Userattributes']['is_raidleader'];
				if($modelUserAttr->save())
					$this->redirect(Yii::app()->homeUrl);
			}
		}
			
		$this->render('raidleader',array(
			'modelUserAttr'=>$modelUserAttr,
		));			
	}
}
