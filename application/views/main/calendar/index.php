<style>
iframe#iframe_src{
width:600px;
height:450px;	
}
body#calendar_body span,body#calendar_body caption{
background:white;	
}
table.calendar_table{
	margin-top:20px;
	padding-left:20px;
	padding-right:20px;
	padding-bottom:20px;
}	
table.calendar_table .titleMonth{
font-size:20px;	
}
table.calendar_table th{
	border-bottom:1px solid darkgray;	
}
table.calendar_table td{
	width:100px;
	height:150px;
	border-right:1px solid darkgray;
	border-bottom:1px solid darkgray;
	padding-left:5px;
	padding-top:5px;
	padding-right:5px;
}	
table.calendar_table td.isToday{
	background:#EBE8ED;
}

table.calendar_table td div.top_of_td_div{
	margin-bottom:25px;
}	
		table.calendar_table td div.top_of_td_div div{
			width:20px;
			height:20px;
		}	
		table.calendar_table td div.top_of_td_div div.day_numeric{
			margin-right:83px;
		}	
		table.calendar_table td div.top_of_td_div div.launch_icon{
		    background: url("<?php echo base_url()    ?>images/launch-new-window.gif") no-repeat scroll 0 0 transparent;
		    width: 13px;
		    height: 12px;
		    margin-top: 1px;
		    cursor:pointer;
		}	
table.calendar_table td div.bottom_of_td_div{
	padding:5px;
	width:auto;
	height:60px;
}	

		table.calendar_table td div.bottom_of_td_div div.carousel_sets_booked{
			clear:both;
			text-align:center;
			height:25px;
			padding-top:5px;
			background:orange;
		}	

		table.calendar_table td div.bottom_of_td_div div.nu_spotlight_sets_booked{
			clear:both;
			text-align:center;
			height:25px;
			padding-top:5px;
			background:lightgreen;
		}	
		table.calendar_table td div.bottom_of_td_div div.nu_spotlight_videos_booked{
			clear:both;
			text-align:center;
			height:25px;
			padding-top:5px;
			background:lightblue;
		}			
		
		
.directional_control{
cursor:pointer;
font-size:30px;
color:gray;
padding:0px 15px;
background:white;
}
</style>


<body id='calendar_body'>
<form   style='display:none'   id='form0'  name="form0" action="<?php echo base_url()    ?>index.php/main/index/calendar" method="get"   >
	last	<input id="last" name="last" type="text" value="<?php  echo $data['last']  ?>"><br>
	next	<input id="next" name="next" type="text" value="<?php  echo $data['next']  ?>"><br>
	year	<input id="year" name="year" type="text" value="<?php  echo $data['year']  ?>">
	goto	<input id="goto_month" name="goto_month" type="text" value="">
</form>

<?php     

echo $this->calendar->generate_calendar(
	$data['year'] , 
	$data['month'], 
	$data['today'], 
	$day_of_the_week_is_shown = 4,   // 4 means full spelling of the day (i.e. Friday as opposed to Fri)
	$month_href = NULL, 
	$first_day = 0, 
	$data['prev_or_next']
	);

?>


</body>
<script type="text/javascript" language="Javascript">  

$(document).ready(function() {
	
	$('table.calendar_table td div.top_of_td_div div.launch_icon').each(function(e) {
			$(this).click(function(event) {	

						<?php if( $_SERVER['HTTP_HOST'] == 'cms.mynuvotv.com' ){?>
												open('http://stage.mynuvotv.com?date=' + $(this).parent().parent().attr('year') + '-' + $(this).parent().parent().attr('month') + '-' + $(this).parent().parent().attr('day')  , 1 );
						
						<?php }else{?>
												open('http://tv.localhost?date=' + $(this).parent().parent().attr('year') + '-' + $(this).parent().parent().attr('month') + '-' + $(this).parent().parent().attr('day')  , 1 );
						
						<?php } ?>

			});	
	});	

	$('table.calendar_table tr').children('td:nth-child(1)').css({'border-left':'1px solid darkgray'});
	
	
	$('table.calendar_table tr td[year="<?php echo $data['year']; ?>"] div.bottom_of_td_div').each(function(e) {
		$(this).css({cursor:'pointer'}).attr('nu_spotlight_set_id',0).attr('href','#fancy_zoom_div').fancyZoom().click(function(event) {
			$("#iframe_src").attr('src','<?php echo base_url();    ?>index.php/main/carousel_line_up_form?active=carousel_line_up&nu_spotlight_videos_calendar_id=' + $(this).attr('nu_spotlight_videos_calendar_id') + '&carousel_set_id='  +  $(this).attr('carousel_set_id') + '&nu_spotlight_set_id='  +  $(this).attr('nu_spotlight_set_id') + '&month=' + $(this).parent().attr('month') +'&day=' + $(this).parent().attr('day') + '&year=' + $(this).parent().attr('year') );
		});
	});	
	
	
	<?php  foreach( $data['carousel_sets_calendars']  as  $carousel_sets_calendar){ ?>
		
		$('table.calendar_table tr td[day="<?php echo $carousel_sets_calendar->day    ?>"] div.bottom_of_td_div')
		.attr('carousel_set_id',<?php echo $carousel_sets_calendar->carousel_set_id    ?>).append('<div  class="carousel_sets_booked " ><?php echo $carousel_sets_calendar->name    ?></div>')
	
	<?php } ?>
	
	
	<?php  foreach( $data['nu_spotlight_sets_calendars']  as  $nu_spotlight_sets_calendar){ ?>
		
		$('table.calendar_table tr td[day="<?php echo $nu_spotlight_sets_calendar->day    ?>"] div.bottom_of_td_div')
		.attr('nu_spotlight_set_id',<?php echo $nu_spotlight_sets_calendar->nu_spotlight_set_id    ?>).append('<div  class="nu_spotlight_sets_booked " ><?php echo $nu_spotlight_sets_calendar->name    ?></div>')
	
	<?php } ?>
	
	
	
	<?php  foreach( $data['nu_spotlight_videos_calendars']  as  $nu_spotlight_videos_calendar){ ?>
		
		$('table.calendar_table tr td[day="<?php echo $nu_spotlight_videos_calendar->day    ?>"] div.bottom_of_td_div')
		.attr('nu_spotlight_videos_calendar_id',<?php echo $nu_spotlight_videos_calendar->nu_spotlight_videos_calendar_id    ?>).append('<div  class="nu_spotlight_videos_booked " ><?php echo preg_replace('/\s+?(\S+)?$/', '', substr(  $nu_spotlight_videos_calendar->title  , 0, 25));    ?></div>')
	
	<?php } ?>	
	


	<?php if( $data['month'] == date("m")){
		
		
			for($i=1; $i <= $data['today'] - 1; $i++ ){?>
				
				$('table.calendar_table tr td[day="<?php echo $i    ?>"]')
				.css({background:'beige'})
			
			<?php } 
	} 
	?>

	<?php if( $data['month'] < date("m")){?>
		

				$('table.calendar_table tr td[year="<?php echo $data['year']; ?>"]')
				.css({background:'beige'})
	<?php
	} 
	?>	
	

});


function switch_month( when_month ){

	if( when_month  == 'last'){
		$('#goto_month').val( $('#last').val()  );
	}else{
		$('#goto_month').val( $('#next').val()  );
	};
	
	$('#form0').submit();
	
}


</script>		