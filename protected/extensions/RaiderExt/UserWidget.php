<?php 
/**
 * 
 * Questo widget visualizza le info user sulla sidebar con il link al profilo.
 * @author Marco Chillemi
 *
 */
class UserWidget extends CWidget {
	
	public $userid;
	private $html = '';
	
	public function init() {
		$user = User::model()->findByPk($this->userid);
		$assetsUrl = Yii::app()->getAssetManager()->getPublishedUrl(RaiderFunctions::getImagesFolderPath());
		//$userRole = $user->profile->guildrole->label;
		
		$userImgFolder = strtolower(preg_replace('/[\s]+/','_',$user->username));
		$portrait = ($user->portrait_URL) ? $userImgFolder.'/thumb50x50-'.$user->portrait_URL : 'thumb50x50-unknown.jpg';			
		
		$this->html.= "<div class='user-widget'>";
			$this->html.= "<div class='pull-left'>";
				$this->html.= CHtml::image($assetsUrl.'/user/'.$portrait, 'portrait of '.$user->username, array('height'=>50, 'width'=>50, 'class'=>'img-polaroid'));
			$this->html.= "</div>";
			
			$this->html.= "<div class='user-data pull-left'>";
				$this->html.= "<div class='username'>".$user->username."</div>";
				//$this->html.= "<div class='user-info'>$userRole</div>";
				$this->html.= "<div class='user-info'>".CHtml::link($user->name." ".$user->surname, array('user/profile'), array('class'=>'tooltip-link','data-toggle'=>'tooltip', 'title'=>Yii::t('locale', 'edit profile')))."</div>";
				
			$this->html.= "</div><!-- /user-data -->";
			
		$this->html.= "</div><!-- /userWidget -->";
		
		
		Yii::app()->clientScript->registerScript('tooltips', "
			$('.tooltip-link').tooltip({
				delay: 500,
			});
		");		
		
		echo $this->html;
	}	
}
?>