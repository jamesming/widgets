<style>
				.toptab div{
					width:150px;
					height:30px;
					text-align:center;
					color:black;
					margin-left:15px;
					margin-right:5px;
					padding-top:10px;
					cursor:pointer;

				}
				.toptab div#carousel_line_up{
					background:orange;
				}	
				.toptab div#nu_spotlight_line_up{
					background:lightgreen;
				}
				.toptab div#nu_spotlight_video{
					background:lightblue;
				}			
</style>
		<div  class='toptab ' >
			<div  class=' float_left '  id='carousel_line_up'>
				Carousel Line Up
			</div>
			<div  class=' float_left '  id='nu_spotlight_line_up'>
				Nu Spotlight Line Up
			</div>
			<div  class='float_left '  id='nu_spotlight_video' >
				Nu Spotlight Video
			</div>
		</div>
		
		
<script type="text/javascript" language="Javascript">
$(document).ready(function() { 
			$('#carousel_line_up').click(function(event) {
						document.location = '<?php   echo base_url()  ?>index.php/main/carousel_line_up_form?active=carousel_line_up&nu_spotlight_videos_calendar_id=<?php echo $data['nu_spotlight_videos_calendar_id']    ?>&nu_spotlight_set_id=<?php  echo $data['nu_spotlight_set_id']   ?>&carousel_set_id=<?php  echo $data['carousel_set_id']   ?>&month=<?php  echo $data['month']   ?>&day=<?php  echo $data['day']   ?>&year=<?php  echo $data['year']   ?>';
			});		
			$('#nu_spotlight_line_up').click(function(event) {
						document.location = '<?php   echo base_url()  ?>index.php/main/nu_spotlight_line_up_form?active=nu_spotlight_line_up&nu_spotlight_videos_calendar_id=<?php echo $data['nu_spotlight_videos_calendar_id']    ?>&nu_spotlight_set_id=<?php  echo $data['nu_spotlight_set_id']   ?>&carousel_set_id=<?php  echo $data['carousel_set_id']   ?>&month=<?php  echo $data['month']   ?>&day=<?php  echo $data['day']   ?>&year=<?php  echo $data['year']   ?>';
			});		
			$('#nu_spotlight_video').click(function(event) {
						document.location = '<?php   echo base_url()  ?>index.php/main/nu_spotlight_video_form?active=nu_spotlight_video&nu_spotlight_set_id=<?php  echo $data['nu_spotlight_set_id']   ?>&nu_spotlight_videos_calendar_id=<?php echo $data['nu_spotlight_videos_calendar_id']    ?>&carousel_set_id=<?php  echo $data['carousel_set_id']   ?>&month=<?php  echo $data['month']   ?>&day=<?php  echo $data['day']   ?>&year=<?php  echo $data['year']   ?>';
			});	


			$('#<?php echo $data['active']    ?>').css({border:'2px solid gray'})
			
			
});
</script>