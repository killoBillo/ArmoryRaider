<nav id="navmenu">
    <h3 class="title"><?php echo Yii::t('locale', 'Main Menu')?></h3>
    <!-- my_menu menu -->
    <?php
    if(!Yii::app()->user->isGuest && isset($this->raiderMenu)) {
        $this->widget('zii.widgets.CMenu', $this->raiderMenu->getMenu());
    }
    ?>
    <!-- /my_menu menu -->
    <!-- logout menu -->
    <?php
    if(!Yii::app()->user->isGuest && isset($this->raiderMenu)) {
        $this->widget('zii.widgets.CMenu', $this->raiderMenu->getLogOutMenu());
    }
    ?>
    <!-- /logout menu -->
</nav>