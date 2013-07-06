<div id="sidebar" class="sidebar span3 pull-left">
	<div class="row-fluid">
		<div class="span12">
			<?php 
				$this->widget('ext.RaiderExt.UserWidget',array('userid'=>Yii::app()->user->id)); 
			?>		
		</div><!-- /span12 -->
	</div><!--  /row-fluid -->

	<div class="row-fluid">
		<div class="span12">
			<?php 
				$this->widget('ext.RaiderExt.CharactersList',array('userid'=>Yii::app()->user->id)); 
			?>		
		</div><!-- /span12 -->
	</div><!--  /row-fluid -->
	
	<div class="row-fluid">
		<div class="span12">
			<?php 
				$this->widget('ext.RaiderExt.ComingEvents',array('numEvents'=>5)); 
			?>		
		</div><!-- /span12 -->
	</div><!--  /row-fluid -->	
	
<!--	<div class="row-fluid">-->
<!--		<div class="span12">-->
<!--			<br>-->
<!--			<br>-->
<!--			Da Fare:-->
<!--			<ul>-->
<!--				<li><strike>Riscrivere la classe RaiderEvents in modo che possa ricavarmi tutte le informazioni sull'evento direttamente dall'oggetto.</strike></li>-->
<!--				<li><strike>Rilocalizzare tutta l'applicazione con Yii:t() e Yii::app()->DateFormatter.</strike></li>-->
<!--				<li><strike>Modificare il RaiderCalendar con la localizzazione della lingua ed i pulsanti per cambiare il mese.</strike></li>-->
<!--				<li><strike>Modulo sidebar con la lista dei characters ed il tasto aggiungi character "extensions.RaiderExt.CharacterList".</strike></li>-->
<!--				<li><strike>Modulo sidebar myProfile.</strike></li>-->
<!--				<li><strike>Permettere iscrizione di utenti di altre gilde, aggiungendo automaticamente le gilde.</strike></li>-->
<!--				<li>Pagina gestione profilo.</li>				-->
<!--				<li>Pagina admin gestione configurazione raider.</li>-->
<!--				<li>Menu definitivo per utente/raid leader/admin.-->
<!--					<ul>-->
<!--						<li>menu raidleader:-->
<!--							<ul>-->
<!--								<li>gestione del CRUD delle gilde</li>-->
<!--								<li>gestione del CRUD dei raid</li>-->
<!--							</ul>-->
<!--						</li>-->
<!--					</ul>-->
<!--				</li>-->
<!--				<li><strike>Popup/popover per gli eventi nel calendario.</strike></li>-->
<!--				<li><strike>Pagina con la visualizzazione degli eventi del giorno "event/viewDay".</strike></li>-->
<!--				<li><strike>Pagina con la visualizzazione dell'evento, lista degli iscritti, possibilit&agrave; di iscriversi al raid "event/view" e "event/signup".</strike></li>-->
<!--				<li>Modifica al DB con aggiunta tabella "commenti" per la gestione di tutti i commenti, eliminare campi non pi&ugrave; necessari da altre tabelle.</li>-->
<!--				<li><strike>Modulo prossimi eventi.</strike></li>-->
<!--				<li>Modificare wall in home page in modo che peschi dalla tabella "dashboard" e ristilizzare (riscrivere in definitiva).</li>-->
<!--				<li>Aggiunta massiva eventi.</li>-->
<!--				<li>Gestore di eventi che vada a scrivere nella tabella "dashboard".</li>-->
<!--				<li>Gestore di eventi per le comunicazioni via mail.</li>-->
<!--			</ul>-->
<!--			Tipi di Evento:-->
<!--			<ol>-->
<!--				<li>Iscrizione Utente.</li>-->
<!--				<li>Aggiunta PG.</li>-->
<!--				<li>Creazione Evento.</li>-->
<!--				<li>Iscrizione al Raid.</li>-->
<!--				<li>Conferma partecipanti al raid da parte del RaidLeader.</li>-->
<!--				<li>Aggiunta Nuovo Raid.</li>-->
<!--				<li>Cambio immagine del profilo.</li>-->
<!--				</ol>-->
<!--				-->
<!--		</div> /span12 -->
<!--	</div>  /row-fluid -->
	 
</div><!-- sidebar -->