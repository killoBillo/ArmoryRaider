<?php

class EventController extends RaiderController
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
	public function actionCreate($date) {
//		$this->calendar->setDate(new DateTime($data));
		
		$date = new DateTime($date);

		$model = new Event;
		$param = array(
			'raid_leader_id'	=>Yii::app()->user->getId(),
			'event_date'		=>$date->format('Y-m-d'),
			'creation_date'		=>date('Y-m-d H:i:s'),
		);
		
		$model->setAttributes($param);

		if(isset($_POST['Event']))
		{
			if(isset($_POST['event_hour']))
			{
				$dateHour = new DateTime($_POST['Event']['event_date'].$_POST['event_hour']);
				$_POST['Event']['event_date'] = $dateHour->format('Y-m-d H:i:s');
				$model->attributes=$_POST['Event'];
				if($model->save()) {
					$model->onNewEvent = array(new RaiderNotifyModelEvent, 'notify');
					$model->onNewEvent = function() {
						Yii::log('E\' stato pianificato un nuovo Raid. Enjoy!');
					};
					
					$model->eventType = 3;
					$model->addEvent($model);
										
//					$this->redirect(array('view','id'=>$model->id));
					$this->redirect(array('site/index'));
				}				
			}
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

		if(isset($_POST['Event']))
		{
			$oldDate = new DateTime($_POST['Event']['event_date']);
			$newHour = new DateTime($_POST['event_hour']);
			$_POST['Event']['event_date'] = $oldDate->format('Y-m-d').' '.$newHour->format('H:i:s');
			
			$model->attributes=$_POST['Event'];
			if($model->save())
				$this->redirect(array('show','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
	
	/**
	 * Chiedo la conferma prima di cancellare un evento
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
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
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
		$dataProvider=new CActiveDataProvider('Event');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Event('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Event']))
			$model->attributes=$_GET['Event'];

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
		$model=Event::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='event-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	
	

	public function actionViewDay($date) 
	{
		$eventModels = Event::model()->findAll('event_date like :event_date', array(':event_date'=>'%'.$date.'%'));
		$events = array();

		foreach ($eventModels as $k=>$model) {
			$events[] = new RaiderEvents($model->id);
		}
		
		/**
		 *  se c'è un solo evento ridireziono direttamente all'action Show.
		 *  altrimenti visualizzo tutti gli eventi del giorno.
		 */
		if(count($events) == 1) 
			$this->redirect(array('show', 'id'=>$events[0]->getId()));
		else
			$this->render('viewDay', array(
					'events'=>$events,
					'date'=>$date,
			));
	}
	
	
	/**
	 * Visualizza evento singolo
	 */
	public function actionShow($id) 
	{
		$event[] = new RaiderEvents($id);			
		
		$this->render('show', array(
			'event'=>$event,
		));
	}
	
	
	/**
	 * Lista di tutti gli eventi
	 */
	public function actionList() {
		$models = Event::model()->findAll();
		
		$this->render('list', array('models'=>$models));		
	}
	
	
	/**
	 * Lista degli eventi a cui l'utente si è iscritto
	 */
	public function actionMyEvents() {
		$chars = RaiderFunctions::getCharacters();
		$char_events = array();
		$events = array();
		
		foreach ($chars as $char) {
			$char_events[] = CharacterEvent::model()->findAll('char_id = '.$char->id);
		}
		
		foreach ($char_events as $k=>$char_event) {
			if(!empty($char_event)) {
				foreach ($char_event as $k=>$event) {
					$events[] = Event::model()->findByPk($event->event_id);
				}
			}
		}
		
		$this->render('myevents', array(
			'models'=>$events,
		));		
	}	
}
