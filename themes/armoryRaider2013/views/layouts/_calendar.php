<?php 
	Yii::app()->clientScript->registerScript('toggleCalendar', "
	$('.close-calendar').click(function(){
		$('#main-calendar').slideUp(500);
		$('.show-calendar').slideDown(200);
		return false;
	});
	$('.show-calendar').click(function(){
		$('#main-calendar').slideDown(500);
		$('.show-calendar').slideUp(200);
		return false;
	});	
	");
	
	
	Yii::app()->clientScript->registerScript('datepicker', "
		$('#dpMonths').datepicker();
	");
	
	
//	Yii::app()->clientScript->registerScript('popovers', "
//		$('.notify-icon').popover({
//			trigger: 'hover',
//			placement: 'bottom',
//			container: 'body',
//			html: true,
//			title: '".Yii::t('locale', 'Planned events')."',
//			content: function() {
//				return $(this).find('.popover-content').html();
//			}
//		});
//	");
			
?>

<div id="wrapper-calendario" class="span9">
	<div class="viewport span12">

		<?php 
		
			// se non è passato alcun valore in get, assegno a $date la stringa con la data di "oggi".
			if(!isset($_GET['date']))
				$date = date('Y-m-d');
			else 
				$date = $_GET['date'];
		
			
				
			$this->widget('ext.RaiderExt.Calendar',
					array(
						'date'		=>$date,
						'template'	=>'squared',
						'emptyDays' =>true,
			  		)
			); 
		?>
		
	</div><!-- /viewport -->
</div><!-- /wrapper-calendario -->		
