<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

	<div class="content-wrapper">
		<div class="content-column">
			<?php echo $content; ?>
			<div class="clearbox"></div>
		</div><!-- event_body -->
	</div><!-- /content_wrapper -->
	
	<div class="sidebar">
		<div class="portlet">
			<div class="portlet-decoration">
				<div class="portlet-title"><?php echo Yii::t('locale', 'Your Characters'); ?></div>
			</div>
			Da Fare:
			<ul>
				<li>Riscrivere la classe RaiderEvents in modo che possa ricavarmi tutte le informazioni sull'evento direttamente dall'oggetto</li>
				<li>Aggiunta massiva eventi</li>
				<li>Rilocalizzare tutta l'applicazione con Yii:t() e Yii::app()->DateFormatter</li>
				<li>Modificare il RaiderCalendar con la localizzazione della lingua ed i pulsanti per cambiare il mese</li>
				<li>Modulo sidebar con la lista dei characters ed il tasto aggiungi character "extensions.RaiderExt.CharacterList"</li>
				<li>Pagina con la visualizzazione degli eventi del giorno "event/showDay"</li>
				<li>Pagina con la visualizzazione dell'evento, lista degli iscritti, possibilit&agrave; di iscriversi al raid "event/show"</li>
				<li>Modifica al DB con aggiunta tabella "commenti" per la gestione di tutti i commenti, eliminare campi non pi&ugrave; necessari da altre tabelle</li>
				<li>Modulo prossimi eventi</li>
				<li>Modificare wall in home page in modo che peschi dalla tabella "dashboard" e ristilizzare (riscrivere in definitiva)</li>
				<li>Gestore di eventi che vada a scrivere nella tabella "dashboard"</li>
				<li>Gestore di eventi per le comunicazioni via mail</li>
			</ul>
			Tipi di Evento:
			<ol>
				<li>Iscrizione Utente</li>
				<li>Aggiunta PG</li>
				<li>Creazione Evento</li>
				<li>Iscrizione al Raid</li>
				<li>Conferma partecipanti al raid da parte del RaidLeader</li>
				<li>Aggiunta Nuovo Raid</li>
				<li>Cambio immagine del profilo</li>
				</ol>
			<div class="portlet-content">
				<?php echo CHtml::link('Add Character +', Yii::app()->createUrl('/character/create')); ?>
			</div>
		</div>
	</div><!-- sidebar -->

<?php $this->endContent(); ?>