<?php
/**
 * Questa classe si occupa di generare il menu in base
 * alle grant assegnate all'utente tramite il modulo rights.
 * 
 * @author Marco Chillemi as killo
 * @return array
 *
 */ 
class RaiderMenu {
	private $menu;
	private $logOutMenu;
	
	
	
	function __construct() {}
	
	
	public function buildMenu() {
		$this->menu = array(
			'id'=>'mainmenu',
			'htmlOptions'=>array(
				'class'=>'nav',
			),
			'encodeLabel'=>false,
			'items'=>array(
				array('label'=>'<i class="icon-home"></i> Home', 'url'=>array('/site/index')),
			),
		);

		$this->logOutMenu = array(
			'id'=>'logout_menu',
			'htmlOptions'=>array(
				'class'=>'nav pull-right',
			),		
			'items'=>array(
				array(
					'label'=>Yii::t('locale' ,'Logout').' '.Yii::app()->user->name.' '.Yii::app()->user->surname, 
					'url'=>array('/site/logout')
				),
			),
		);
		
		// Aggiungo i menu per i raidleader e l'admin.
		if(RaiderFunctions::isRaidleader()){
			$this->menu['items'][] = array(
				'label'=>'Raidleader Menù <b class="caret"></b>',
				'url'=>'#',
				'submenuOptions' => array( 'class' => 'dropdown-menu' ),
				'items'=>array(
					// nav-header
					array('label'=>Yii::t('locale', 'Raids Options'), null, 'itemOptions'=>array('class'=>'nav-header nowrap')),
					// items
					array('label'=>Yii::t('locale', 'Create New Raid'), 'url'=>array('raid/create')),
					array('label'=>Yii::t('locale', 'Manage Raids'), 'url'=>array('raid/admin')),
					array('label'=>Yii::t('locale', 'Manage Raidleaders'), 'url'=>array('user/raidleader')),

					// divider
					array('label'=>'', null, 'itemOptions'=>array('class'=>'divider')),
					// nav-header
					array('label'=>Yii::t('locale', 'Events Options'), null, 'itemOptions'=>array('class'=>'nav-header nowrap')),
					// items
					array('label'=>Yii::t('locale', 'Manage Events'), 'url'=>array('event/admin')),

					// divider
					array('label'=>'', null, 'itemOptions'=>array('class'=>'divider')),
					// nav-header
					array('label'=>Yii::t('locale', 'Characters Options'), null, 'itemOptions'=>array('class'=>'nav-header nowrap')),
					// items
					array('label'=>Yii::t('locale', 'Manage Characters'), 'url'=>array('character/admin')),
					
					
					
				),
		        'itemOptions' => array( 'class' => 'dropdown' ),
        		'linkOptions' => array( 'class' => 'dropdown-toggle', 'data-toggle' => 'dropdown' ),			
			);
		}
		
		// Aggiungo i menu per l'admin.
		if(RaiderFunctions::isAdmin()){
			$this->menu['items'][] = array(
				'label'=>'Admin Menù <b class="caret"></b>',
				'url'=>'#',
				'submenuOptions' => array( 'class' => 'dropdown-menu' ),
				'items'=>array(
					// nav-header
					array('label'=>Yii::t('locale', 'Raider Options'), null, 'itemOptions'=>array('class'=>'nav-header nowrap')),
					// items
					array('label'=>Yii::t('locale', 'Raider Configuration'), 'url'=>array('config/update', 'id'=>1)),

					// divider
					array('label'=>'', null, 'itemOptions'=>array('class'=>'divider')),
					// nav-header
					array('label'=>Yii::t('locale', 'Users Options'), null, 'itemOptions'=>array('class'=>'nav-header nowrap')),
					// items
					array('label'=>Yii::t('locale', 'Manage Users'), 'url'=>array('user/admin')),

					// divider
					array('label'=>'', null, 'itemOptions'=>array('class'=>'divider')),
					// nav-header
					array('label'=>Yii::t('locale', 'Guilds Options'), null, 'itemOptions'=>array('class'=>'nav-header nowrap')),
					// items
					array('label'=>Yii::t('locale', 'Manage Guilds'), 'url'=>array('guild/admin')),
					array('label'=>Yii::t('locale', 'Manage Guild roles'), 'url'=>array('guildrole/admin')),
				),
		        'itemOptions' => array( 'class' => 'dropdown' ),
        		'linkOptions' => array( 'class' => 'dropdown-toggle', 'data-toggle' => 'dropdown' ),			
			);
		}
		
		
		
		// Aggiungo i menu per il GM se diverso dall'admin. (è lo stesso menù)
		if(RaiderFunctions::isGM() && !RaiderFunctions::isAdmin()){
			$this->menu['items'][] = array(
				'label'=>'Guild Master Menù <b class="caret"></b>',
				'url'=>'#',
				'submenuOptions' => array( 'class' => 'dropdown-menu' ),
				'items'=>array(
					// nav-header
					array('label'=>Yii::t('locale', 'Raider Options'), null, 'itemOptions'=>array('class'=>'nav-header nowrap')),
					// items
					array('label'=>Yii::t('locale', 'Raider Configuration'), 'url'=>array('config/update', 'id'=>1)),

					// divider
					array('label'=>'', null, 'itemOptions'=>array('class'=>'divider')),
					// nav-header
					array('label'=>Yii::t('locale', 'Users Options'), null, 'itemOptions'=>array('class'=>'nav-header nowrap')),
					// items
					array('label'=>Yii::t('locale', 'Manage Users'), 'url'=>array('user/admin')),

					// divider
					array('label'=>'', null, 'itemOptions'=>array('class'=>'divider')),
					// nav-header
					array('label'=>Yii::t('locale', 'Guilds Options'), null, 'itemOptions'=>array('class'=>'nav-header nowrap')),
					// items
					array('label'=>Yii::t('locale', 'Manage Guilds'), 'url'=>array('guild/admin')),
					array('label'=>Yii::t('locale', 'Manage Guild roles'), 'url'=>array('guildrole/admin')),
				),
		        'itemOptions' => array( 'class' => 'dropdown' ),
        		'linkOptions' => array( 'class' => 'dropdown-toggle', 'data-toggle' => 'dropdown' ),			
			);
		}
	}
	
	
	
	
	
	
	
	
	/**
	 * Funzione pubblica, restituisce l'array $this->menu
	 * Es: Yii::app()->user->raiderMenu->getMenu();
	 * @return array
	 */
	public function getMenu() {
		return $this->menu;
	}
	/**
	 * restituisce l'array $this->logOutMenu
	 * Es: Yii::app()->user->raiderMenu->getLogOutMenu();
	 * @return array
	 */
	public function getLogOutMenu() {
		return $this->logOutMenu;
	}
	
}// EOF RaiderMenu Class
?>