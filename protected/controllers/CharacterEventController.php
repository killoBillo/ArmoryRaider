<?php

class CharacterEventController extends RaiderController
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
		$model=new CharacterEvent;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CharacterEvent']))
		{
			$model->attributes=$_POST['CharacterEvent'];
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
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CharacterEvent']))
		{
			$model->attributes=$_POST['CharacterEvent'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		// imposto il returnUrl alla pagina dalla quale provengo.
		$returnUrl = Yii::app()->request->urlReferrer;
				
		$this->loadModel($id)->delete();
		
		$this->redirect($returnUrl);		

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
//		if(!isset($_GET['ajax']))
//			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('CharacterEvent');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new CharacterEvent('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['CharacterEvent']))
			$model->attributes=$_GET['CharacterEvent'];

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
		$model=CharacterEvent::model()->findByAttributes(array('id'=>$id));
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='character-event-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	
	public function actionSignup($id) 
	{
		/**
		 * Controllo se l'evento è scaduto.
		 */
		$event = Event::model()->findByPk($id);
		$event_date = new DateTime($event->event_date);
		$today = new DateTime();
		$expired = ($today > $event_date);
		
		/**
		 * controllo che l'utente non si sia già iscritto, per 
		 * evitare trick da barra degli URL da utenti più smanettoni
		 * Se utente già iscritto "sparo" un'eccezione http.
		 */ 
		if(!RaiderFunctions::isAlreadyMember($id)) {
			$model = new CharacterEvent;
			// recupero dal DB tutti i pg dell'utente per passarli alla dropDownList
			$characters = RaiderFunctions::getCharacters();		
	
			if(isset($_POST['CharacterEvent']))
			{
				// Inizio procedura di aggiornamento del PG dall'armory
				if(isset($_POST['CharacterEvent']['char_id'])) {
					$armory = new RaiderArmory($_POST['CharacterEvent']['char_id']);
					
					// setto  i valori che mi servono per recuperare il PG dall'armory
					$armory->setRegion(RaiderFunctions::getRegion());
					$armory->setNameRealm($armory->getModel()->name, RaiderFunctions::getRealm());
		
					// recupero il ruolo (o i ruoli) dal DB
					$armory->setRoles($armory->getCharacterRole());			
					
					// aggiorno i valori del character recuperandoli dall'armory
					$armory->getCharacter();
					
					// se trovo il PG ed è valido aggiorno il PG con i nuovi dati dell'armory
					if($armory->isValid()) {
						// salvo il PG aggiornato
						$armory->saveModel();
					}
				}
				// Fine procedura aggiornamento PG dall'armory			
				
				// iscrivo il PG all'evento, aggiornato o meno, in caso l'armory sia offline, devo cmq permettere l'iscrizione ai raid.
				$model->attributes=$_POST['CharacterEvent'];
				if($model->save())
					$this->redirect(array('event/show','id'=>$model->event_id));
			}		
			
			
			$this->render('signup',array(
				'id'=>$id,
				'model'=>$model,
				'characters'=>$characters,
				'expired'=>$expired,
			));
			
		}else{
			throw new CHttpException(403,Yii::t('locale', 'Already member of that event, don\'t try to be clever ;-]'));
		}		
	}

	
	
	public function actionToggleAvailable($id) 
	{
		$model = $this->loadModel($id);
		
		// imposto il returnUrl alla pagina dalla quale provengo.
		$returnUrl = Yii::app()->request->urlReferrer;
		
		if($model->available_flag)
			$model->available_flag = 0;
		else
			$model->available_flag = 1;
		
		if($model->save())
			$this->redirect($returnUrl);
	}
	
	
	public function actionToggleHolder($id) {
		$model = $this->loadModel($id);
		
		// imposto il returnUrl alla pagina dalla quale provengo.
		$returnUrl = Yii::app()->request->urlReferrer;
		
		if($model->holder_flag)
			$model->holder_flag = 0;
		else
			$model->holder_flag = 1;
		
		if($model->save())
			$this->redirect($returnUrl);		
	}
	
	
	public function actionModifyComment($id) {
		$model = $this->loadModel($id);
		
		if(isset($_POST['CharacterEvent'])){
			$model->setAttributes($_POST['CharacterEvent']);
			
			if($model->save())
				$this->redirect(array('event/show','id'=>$model->event_id));			
		}
		
		$this->render('modifyComment', array('model'=>$model));
	}
	
	public function actionModifyRole($id) {
		$model = $this->loadModel($id);	
		
		if(isset($_POST['CharacterEvent'])){
			$model->setAttributes($_POST['CharacterEvent']);
			
			if($model->save())
				$this->redirect(array('event/show','id'=>$model->event_id));			
		}
		
		$this->render('modifyRole', array('model'=>$model));		
	}
}
