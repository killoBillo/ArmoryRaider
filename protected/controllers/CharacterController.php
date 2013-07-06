<?php

class CharacterController extends RaiderController
{
	/**
	 * RaiderArmory object
	 */
	public $armory;
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
	 * If creation is successful, the browser will be redirected to the 'ChooseRoles' action.
	 */
	public function actionCreate($name = null, $realm = null)
	{
		$model=new CharacterForm();
		
		// se sono settati name e realm significa che il character non esiste o è freezato
		if($name && $realm){
			$model->name = urldecode($name);
			$model->realm = urldecode($realm);
			$model->addError('name', Yii::t('locale' ,'Character not found or frozen due to inactivity or Blizzard Armory out of line.'));
		}
		
		
		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='character-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		if(isset($_POST['CharacterForm']))
		{
			$model->attributes = $_POST['CharacterForm'];
			if($model->validate()){
				// invio il browser alla pagina di selezione dei ruoli
				$this->redirect(array('character/chooseRoles', 'name'=>urlencode($model->name), 'realm'=>urlencode($model->realm)));
			}
		}

		$this->render('createStep1', array('model'=>$model));
	}
	
	
	public function actionChooseRoles($name, $realm) {
		$name = urldecode($name);
		$realm = urldecode($realm);

		$model = new CharacterHasRole();
		
		if(isset($_POST['CharacterHasRole'])){
			$model->attributes = $_POST['CharacterHasRole'];
			
			// creo oggetto RaiderArmory  
			$this->armory = new RaiderArmory();
			// setto  i valori che ho recuperato dai form + la region dell'armory
			$this->armory->setRegion(RaiderFunctions::getRegion());
			$this->armory->setNameRealm($name, $realm);			
			$this->armory->setRoles($model);
			/***
			 * con questo passaggio faccio più cose:
			 * - recupero i dati del PG dall'armory,
			 * - creo i model che mi servono per la scrittura del pg su DB
			 * 	 e li popolo con i dati che ho recuperato dai form e dall'armory.
			 */ 			
			$this->armory->getCharacter();
			
			// se trovo il PG ed è valido
			if($this->armory->isValid()) {
				// salvo il model principale, così da avere l'id da scrivere nelle associative
				if ($this->armory->saveModel())
					// salvo i model secondari e se tutto va bene gestisco l'evento e ridirigo il browser alla home.
					if($this->armory->saveSubModels()) {
						// gestisco l'evento e ridireziono alla home del sito (per il momento disabilito la gestione dell'evento, verrà introdotta in future release)
//						$this->armory->getModel()->onNewEvent = array(new RaiderNotifyModelEvent, 'notify');
//						$this->armory->getModel()->onNewEvent = function() {
//							Yii::log('E\' stato aggiunto un nuovo PG.');
//						};
//						$this->armory->getModel()->eventType = 2;
//						$this->armory->getModel()->addEvent($this->armory->getModel());
						
						$this->redirect(Yii::app()->homeUrl);
					}
			}else{
				$name = urlencode($name);
				$realm = urlencode($realm);
				$error = urlencode('Character not found or frozen due to inactivity or Blizzard Armory out of line.');
				$this->redirect(array('character/create', 'name'=>$name, 'realm'=>$realm));
			}
		}
		

		$this->render('createStep2', array('model'=>$model));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
//		$model=$this->loadModel($id);
		$this->armory = new RaiderArmory($id);
		$model = $this->armory->getModel();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Character']))
		{
			$model->attributes=$_POST['Character'];
			if($model->save())
//				$this->redirect(array('view','id'=>$model->id));
				$this->redirect(array('admin'));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
	
	
	
	
	/**
	 * Chiedo la conferma prima di cancellare un PG
	 */
	public function actionConfirmDelete($id) {
		// imposto il returnUrl alla pagina dalla quale provengo, così da essere redirezionato li quando si effettua il redirect
		$returnUrl = Yii::app()->request->urlReferrer;
		
		// carico il model del PG
		$model = $this->loadModel($id);
		
		$this->render('confirm', array(
			'model'=>$model,
			'returnUrl'=>$returnUrl,
		));
	}
	
	
	
	
	/**
	 * Deletes a particular model and related models: CharacterHasRole and CharacterHasSpec
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		// imposto il returnUrl alla pagina dalla quale provengo, così da essere redirezionato li quando si effettua il redirect
//		$_POST['returnUrl'] = Yii::app()->request->urlReferrer;
		
		// cancello il character
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('site/index'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Character');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Character('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Character']))
			$model->attributes=$_GET['Character'];

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
		$model=Character::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='character-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
