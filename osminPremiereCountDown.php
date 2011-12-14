<style>
body{
font-family:'Helvetica Neue', Arial, Helvetica, sans-serif;
width:174px;		
background:url(images/Osmin_Coundown_Banner.jpg) no-repeat;
}
#timer_block{
    background: none repeat scroll 0 0 white;
    margin-left: 49px;
    margin-top: 198px;
    padding: 9px 13px 0 17px;
    width: 168px;
}
.countdown_block{
   background: none repeat scroll 0 0 black;
    color: white;
    float: left;
    font-size: 16px;
    height: 21px;
    margin-right: 0;
    padding-left: 8px;
    padding-right: 3px;
    padding-top: 0px;
    width: 21px;
}
.comma{
    float: left;
    font-size: 18px;
    font-weight: bold;
    padding-left: 2px;
    width: 9px;
    position: relative;
    top: 6px;
}
.countdown_label{
background: transparent;
color: black;
font-size: 11px;
padding: 0px;
height: 17px;
text-align: center;
width: 32px;
font-weight: bold;
}
.until{
	font-size:13px;
clear:both;	
text-align:center;
font-weight:bold;
}
</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.js"></script>
<script type="text/javascript" language="Javascript" src = "js/jquery_countdown.js"></script>

<script type="text/javascript" language="Javascript">
$(document).ready(function() { 
	

				if( 	 getTimeZone() == 8 	  // Pacific Coast
						|| getTimeZone() == 5){   // Eastern
					airtime = 21; // 9pm
				}else if(getTimeZone() == 6){ // Central
					airtime = 20;  // 8pm
				}else if(getTimeZone() == 7){ // Mountain
					airtime = 19;  // 7pm
				};

				month = 0; // Should be 10 for October but javascript takes it down one number

				var austDay = new Date();
				austDay = new Date(
					2012, 
					month, 
					13, // day of month
					airtime, 
					0 // minutes
					);
				
				$('#defaultCountdown').countdown({
					until: austDay, 
    			layout: "<div  class=' countdown_block' >{dn}</div><div  class='comma ' >,</div><div  class=' countdown_block' >{hnn}</div><div  class='comma ' >,</div><div  class=' countdown_block' >{mnn}</div><div  class='comma ' >,</div><div  class=' countdown_block' >{snn}</div>"})
});


function getTimeZone(){
var localTime = new Date();
return localTime.getTimezoneOffset()/60 ;
}

</script>
	<body>
		<div  id='timer_block' >
			
				<div  >
					<span id='defaultCountdown'></span>
				</div>
				<div   style='clear:both;'  >
					<div  class='countdown_block countdown_label' >
						Days
					</div>
					<div  class='comma ' >
						&nbsp;
					</div>
					<div  class='countdown_block  countdown_label' >
						Hours
					</div>
					<div  class='comma ' >
						&nbsp;
					</div>
					<div  class='countdown_block  countdown_label' >
						Min
					</div>
					<div  class='comma ' >
						&nbsp;
					</div>
					<div  class='countdown_block  countdown_label' >
						Secs
					</div>
				</div>
				<div  class='until '  >
				</div>			
		</div>

</body>

