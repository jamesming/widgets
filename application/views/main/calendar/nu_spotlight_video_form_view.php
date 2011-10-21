<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php   
//  	
$this->load->view('header/blueprint_css.php');  
$this->load->view('header/common_css.php');  
?>
<style>
body{
background:white;		
}



				a{
				text-decoration:underline;
				color:blue;	
				}
				a:hover{
				color:lightblue;	
				}
				#instruction{
				margin-left:20px;
				font-weight:bold;
				padding-top:30px;	
				clear:both;
				}
form#videos_text_content_form{
font-size:16px;
}
form#videos_text_content_form input[type=text]{
padding:6px 5px;
width:490px;	
}
form#videos_text_content_form input[name=link]{
width:250px;	
}
form#videos_text_content_form table#main {
width:100%;
margin:30px 0px 0px 0px;	
}
form#videos_text_content_form table#main td.main_table{
padding-top:5px;
padding-bottom:5px;	
}

form#videos_text_content_form table#main div.image_assets{
margin-top:25px;
}

form#videos_text_content_form #textarea_div{
width:100%;
height: 180px;
margin:0px 0px 0px 0px;
padding:10px 0px 0px 0px;
}
form#videos_text_content_form #submit{
width:70px;	
}

#dialog{
display:none;	
}
				
#dialog iframe#iframe_src_for_image{
	padding: 5px; 
	border: 1px solid lightgray;
	width:350px;
	height:50px;
	margin-top:13px;
	margin-left:5px;
}
</style>
<script type="text/javascript" language="Javascript" src = "<?php echo  base_url();   ?>js/jquery.js"></script>		

</head>

<html>



<body >
<?php     
$this->load->view('main/calendar/nav_bar.php'); 
?>


	

	
	
		<div  class='clearfix '  id='instruction'>
			
			<?php if(  count($data['nu_spotlight_videos_calendars'])==1){?>
			
			<a id="remove">Remove</a> this content for Bright Cove Video 
			
			<?php } ?>

			
			
			
			<big><?php echo $data['month']. '/' . $data['day'] . '/' .   $data['year']. '</big>';  ?>
		</div>
<form id='videos_text_content_form'  class='clearfix ' >
		<table  id='main'>

			<tr>
				<td  class='main_table '> Title
				</td>
				<td  class='main_table '><input name="title" id="title" type="text" value="">
				</td>
			</tr>

			<tr   style='display:none'  >
				<td  class='main_table ' > Link
				</td>
				<td  class='main_table ' nowrap>
					<input name="link" id="link" type="text" value="">
					&nbsp;&nbsp;Launches New Window&nbsp;&nbsp;&nbsp;<input name="launch" type="checkbox" value="1">
				</td>
			</tr>
			
			
			<tr>
				<td   class='main_table ' colspan=2>
					<div  id='textarea_div'   >
							<textarea  class=' clearfix' name='blurb' id='text_area'><?php  echo $data['nu_spotlight_videos_calendars'][0]->blurb   ?></textarea>
					</div>
				</td>
			</tr>	

			
			<tr>
				<td   colspan=2>
					<div>
						<input id="submit" type="button" value="submit">
					</div>
				</td>
			</tr>	
			
		</table>
</form>
</body>

</html>

<?php 
   
$this->load->view('javascript/htmlbox_wsiwyg.php');  

?>

	
<script type="text/javascript" language="Javascript">
	

	$(document).ready(function() {
		
		
		
			<?php if( count($data['nu_spotlight_videos_calendars'])  ){?>
				
				$('#title').val('<?php  echo $data['nu_spotlight_videos_calendars'][0]->title   ?>');
				$('#link').val('<?php  echo $data['nu_spotlight_videos_calendars'][0]->link   ?>');
				//$('#text_area').html('');
				
			<?php } ?>
		
		


				$('#main td:nth-child(odd)').css({
					'text-align':'right',
					'padding-right':'9px',
					'padding-top':'8px',
					'width':'15%'
				})

			
				mbox = $("#text_area").css({
						height:"100px",
						width:"100%"
						}).htmlbox({
				    toolbars:[
					    [
						// Cut, Copy, Paste
						"separator","cut","copy","paste",
						// Undo, Redo
						"separator","undo","redo",
						// Bold, Italic, Underline, Strikethrough, Sup, Sub
						"separator","bold","italic","underline","strike","sup","sub",
						// Left, Right, Center, Justify
						"separator","justify","left","center","right",
						// Ordered List, Unordered List, Indent, Outdent
						"separator","ol","ul","indent","outdent",
						// Hyperlink, Remove Hyperlink, Image
						"separator","link","unlink","image"
						
						],
						[// Show code
						"separator","code",
				        // Formats, Font size, Font family, Font color, Font, Background
				        "separator","formats","fontsize","fontfamily",
						"separator","fontcolor","highlight",
						],
						[
						//Strip tags
						"separator","removeformat","striptags","hr","paragraph",
						// Styles, Source code syntax buttons
						"separator","quote","styles","syntax"
						]
					],
					skin:"gray"
				});
				
				
				setTimeout(function() { 											
						mbox.set_text( $('#text_area').text()   );
				}, 100);
				
				
				$('#submit').css({cursor:'pointer'}).click(function(event) {
					
						$("#text_area").val( mbox.get_html() );


						$.post("<?php echo base_url(). 'index.php/main/update_video_text_content';    ?>",{
							set_what_array: $('#videos_text_content_form').serialize(),
							month:'<?php  echo $data['month']    ?>',
							day:'<?php echo $data['day']     ?>',
							year:'<?php echo $data['year']     ?>',
							nu_spotlight_videos_calendar_id: <?php  echo $data['nu_spotlight_videos_calendar_id']   ?>
							},function(data) {
	
								// 	alert(data);
								window.parent.location.reload();
								
						});	
				
				
				});	
				
				
				$('#remove').click(function(event) {
						$.post("<?php echo base_url(). 'index.php/main/delete_video_text_content';    ?>",{
							nu_spotlight_videos_calendar_id: <?php  echo $data['nu_spotlight_videos_calendar_id']   ?>
							},function(data) {
	
								// 	alert(data);
								window.parent.location.reload();
								
						});								
				});	
				
  });
    



</script>

<?php


