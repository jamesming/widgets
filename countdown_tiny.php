<style>
body{
padding:0px;
}
#defaultCountdown{
white-space:nowrap;
width: 100%;
overflow:hidden;	
margin:0px 0px 0px 0px;
padding:0px 0px 0px 0px;
margin-top:-5px;
}
.countdown_block{
    background: none repeat scroll 0 0 black;
    color: white;
    float: left;
    font-family: 'Helvetica Neue',Arial,Helvetica,sans-serif;
    font-size: 13px;
    height: 19px;
    margin-right: 0;
    padding-left: 3px;
    padding-right: 0;
    padding-top: 2px;
    width: 17px;
}
.colon{
    font-family: 'Helvetica Neue',Arial,Helvetica,sans-serif;
    float: left;
    font-size: 14px;
    font-weight: bold;
    padding-left: 2px;
    width: 9px;
    padding-right:5px;
}
.countdown_label{
    background: transparent;
    color: black;
    font-size: 9px;
    font-weight: bold;
    height: 17px;
    padding: 0;
    text-align: center;
    width: 25px
}
</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.js"></script>
<script type="text/javascript" language="Javascript" src = "/js/jquery_countdown.js"></script>

<script type="text/javascript" language="Javascript">
$(document).ready(function() { 

				if( 	 getTimeZone() == 7 	  // Pacific Coast
						|| getTimeZone() == 4){   // Eastern
					air_time = 21; // 9pm
				}else if(getTimeZone() == 5){ // Central
					air_time = 20;  // 8pm
				}else if(getTimeZone() == 6){ // Mountain
					air_time = 19;  // 7pm
				};

				month = 9; // Should be 10 for October but javascript takes it down one number

				var austDay = new Date();
				austDay = new Date(
					2011, 
					month, 
					18, // day of month
					air_time, 
					0 // minutes
					);
				
				$('#defaultCountdown').countdown({
					until: austDay, 
    			layout: "<div  class=' countdown_block' >{dn}</div><div  class='colon ' >d</div><div  class=' countdown_block' >{hnn}</div><div  class='colon ' >h</div><div  class=' countdown_block' >{mnn}</div><div  class='colon ' >m</div><div  class=' countdown_block' >{snn}</div><div  style='float:left;font-size:15px;font-weight:bold'>&nbsp;s</div>"})
});


function getTimeZone(){
var localTime = new Date();
return localTime.getTimezoneOffset()/60 ;
}

</script>
	<body>
	
	<span id='defaultCountdown'></span>
	
	<div   style='clear:both;display:none'     >
		<div  class='countdown_block countdown_label' >
			Days
		</div>
		<div  class='colon ' >
			&nbsp;
		</div>
		<div  class='countdown_block  countdown_label' >
			Hours
		</div>
		<div  class='colon ' >
			&nbsp;
		</div>
		<div  class='countdown_block  countdown_label' >
			Min
		</div>
		<div  class='colon ' >
			&nbsp;
		</div>
		<div  class='countdown_block  countdown_label' >
			Secs
		</div>
	</div>
</body>
