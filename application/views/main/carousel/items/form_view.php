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
form#image_carousel_item_form{
font-size:16px;
}
form#image_carousel_item_form input[type=text]{
padding:6px 5px;
width:490px;	
}
form#image_carousel_item_form input[name=link]{
width:250px;	
}
form#image_carousel_item_form table#main {
width:100%;
margin:30px 0px 0px 0px;	
}
form#image_carousel_item_form table#main td.main_table{
padding-top:5px;
padding-bottom:5px;	
}

form#image_carousel_item_form table#main div.image_assets{
margin-top:25px;
}
form#image_carousel_item_form div#image_carousel_item_hero{
	background-image: url(<?php echo base_url();    ?>uploads/carousel_items_images/<?php  	echo $data['carousel_items'][0]['hero_carousel_items_image_id'] ?>/image_tiny.png);
	background-repeat: no-repeat;
	border:1px dotted gray;
	width:317px;
	height:194px;
	margin-left: 10px;
}
form#image_carousel_item_form div#image_carousel_item_right_tab{
	background-image: url(<?php echo base_url();    ?>uploads/carousel_items_images/<?php  	echo $data['carousel_items'][0]['right_tab_carousel_items_image_id'] ?>/image_tiny.png);
	background-repeat: no-repeat;
	border:1px dotted gray;
	width:77px;
	height:90px;
	margin-left: 12px;
}

form#image_carousel_item_form div#image_carousel_item_tune_in{
	background-image: url(<?php echo base_url();    ?>uploads/carousel_items_images/<?php  	echo $data['carousel_items'][0]['tune_in_carousel_items_image_id'] ?>/image_tiny.png);
	background-repeat: no-repeat;
	border:1px dotted gray;
	width:300px;
	height:200px;
	margin-left: 12px;
}

form#image_carousel_item_form div.image_div div.icon_container{
	display:none;
	width:99%;
	height:26px;
	padding-top:5px;
	padding-right:5px;
	background:white;
	filter:alpha(opacity=75);    /* ie  */
	-moz-opacity:0.75;    /* old mozilla browser like netscape  */
	-khtml-opacity: 0.75;    /* for really really old safari */
	opacity: 0.75;    /* css standard, currently it works in most modern browsers like firefox,  */
}

form#image_carousel_item_form div.image_div div.icon_container div.icon{
	width:20px;
	height:20px;
	margin-right:5px;
	float:right;
}
form#image_carousel_item_form div.image_div div.icon_container div.change_pic{
	background:lightblue;	
}
form#image_carousel_item_form div.image_div div.icon_container div.facebook{
	background:orange;	
}
form#image_carousel_item_form div.image_div div.icon_container div.video{
	background:gray;	
}

form#image_carousel_item_form #textarea_div{
width:100%;
height: 180px;
margin:0px 0px 0px 0px;
padding:10px 0px 0px 0px;
}
form#image_carousel_item_form #submit{
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
</head>

<html>



<body >
<form id='image_carousel_item_form'>
		<table  id='main'>
			<tr>
				<td  class='main_table ' > Name
				</td>
				<td  class='main_table '><input name="name" id="" type="text" value="<?php echo $data['carousel_items'][0]['name']    ?>">
				</td>
			</tr>
			<tr>
				<td  class='main_table '> Page Link
				</td>
				<td  class='main_table '>
					<input name="page_link" id="" type="text" value="<?php echo $data['carousel_items'][0]['page_link']    ?>">
					&nbsp;&nbsp;&nbsp;New Window:<input <?php   echo ($data['carousel_items'][0]['launch'] == 1? " checked ": "" )  ?> name="launch" id="launch" type="checkbox" value="1">
				</td>
			</tr>


			<tr>
				<td class='main_table image_assets' colspan=2>
					<div  class=' image_assets' >
						
						
							<div image_type='hero' image_type_id='1' class='float_left image_div'  id='image_carousel_item_hero' carousel_items_image_id='<?php  	echo $data['carousel_items'][0]['hero_carousel_items_image_id'] ?>'>
							</div>
							
							<div  image_type='right_tab' image_type_id='6' class='float_left image_div'   id='image_carousel_item_right_tab'  carousel_items_image_id='<?php  	echo $data['carousel_items'][0]['right_tab_carousel_items_image_id'] ?>'>
								
							</div>	
							
							
							<div  image_type='tune_in' image_type_id='3' class='float_left image_div'   id='image_carousel_item_tune_in'  carousel_items_image_id='<?php  	echo $data['carousel_items'][0]['tune_in_carousel_items_image_id'] ?>'>
								
							</div>	
							
												
					</div>

				</td>
			</tr>	
			
			<tr>
				<td   colspan=2>
					<div>
						<input name="" id="submit" type="button" value="submit">
					</div>
				</td>
			</tr>	
			
		</table>
</form>
</body>

<div id="dialog" title="Upload Image"     > 

		<iframe id="iframe_src_for_image" frameborder="0" scrolling=no src=""  >
			
		    <p>Your browser does not support iframes.</p>
		    
		</iframe>			


</div>
</html>

<script type="text/javascript" language="Javascript" src = "<?php echo  base_url();   ?>js/jquery.js"></script>
<?php 

$this->load->view('footer/jquery_ui_for_dialog.php');    


?>

	
<script type="text/javascript" language="Javascript">
	

	$(document).ready(function() {
		

				$(".image_div").append("<div  class='icon_container ' ><div  class='icon change_pic'  >c</div></div>")
				.mouseover(function(event) {
							$(this).children('div.icon_container').show()
				})
				.mouseout(function(event) {
							$(this).children('div.icon_container').hide()
				})
				
				<?php if( $data['carousel_items'][0]['tune_in_carousel_items_image_id'] != 0 ){?>
					$(".image_div[image_type='tune_in']").children('div.icon_container').append("<div  class='icon video'  >v</div><div  class='icon facebook'  >f</div>")
				<?php } ?>

				$('.image_div div.icon_container div.change_pic')
					.css({cursor:'pointer'})
					.click(function(event) {
						open_dialogue_upload_image(
						 $(this).parent().parent().attr('carousel_items_image_id'),
						 $(this).parent().parent().attr('image_type'),
						 $(this).parent().parent().attr('image_type_id')
						);
					})
					
				$('.image_div div.icon_container div.facebook')
					.css({cursor:'pointer'})
					.click(function(event) {
						open_dialogue_facebook_link()();
					})					
		
		
				$('.image_div div.icon_container div.video')
					.css({cursor:'pointer'})
					.click(function(event) {
						open_dialogue_video_link()();
					})					
		
		
		

				$('#main td:nth-child(odd)').css({
					'text-align':'right',
					'padding-right':'9px',
					'padding-top':'8px',
					'width':'15%'
				})


				$('#submit').css({cursor:'pointer'}).click(function(event) {
					
					submit_inputs(
						close_fancyzoom = 1
					);
						
				});	
			


				
  });
    



function submit_inputs(close_fancyzoom){

					$.post("<?php echo base_url(). 'index.php/main/ajax_update';    ?>",{
						table:'carousel_items',
						crud:'update',
						set_what_array: $('#image_carousel_item_form').serialize(),
						id:'<?php echo $data['carousel_items'][0]['id']    ?>'
						},function(xml) {

							var db_response = $(xml).find('db_response').text();
							
							
							if( close_fancyzoom == 1){
															window.parent.location.reload();
							};
							
							// window.parent.$('body').click();
							
					});	
	
}	

function open_dialogue_upload_image( carousel_items_image_id, image_type, image_type_id ){

		submit_inputs(close_fancyzoom=0);

		if( carousel_items_image_id == null){
			carousel_items_image_id = 0;
		};

		$("#iframe_src_for_image")
		.css({width:'350px',height:'80px'})
		.attr('src','<?php echo base_url();    ?>index.php/main/upload_carousel_image_form?carousel_item_id=<?php echo $data['carousel_items'][0]['id']    ?>&carousel_items_image_id=' + carousel_items_image_id +'&image_type='+image_type +'&image_type_id='+image_type_id);

			
		var width_of_dialog = 410;
		var left_coord = ($(window).width()/2 - width_of_dialog/2);

		$("#dialog" ).dialog({
			position:[left_coord,200],
			height: 160,
			zIndex: -10,
			width: width_of_dialog,
			resizable: false 
			})
						
};	
	
	
function open_dialogue_facebook_link(){

		submit_inputs(close_fancyzoom=0);


		$("#iframe_src_for_image")
		.css({width:'750px',height:'400px'})
		.attr('src','<?php echo base_url();    ?>index.php/main/create_facebook_link_form?carousel_items_image_id=<?php  echo $data['carousel_items'][0]['tune_in_carousel_items_image_id']   ?>');

			
		var width_of_dialog = 795;
		var left_coord = ($(window).width()/2 - width_of_dialog/2);

		$("#dialog" ).dialog({
			position:[left_coord,10],
			height: 510,
			zIndex: -10,
			width: width_of_dialog,
			resizable: false 
			})
						
};	



function open_dialogue_video_link(){

		submit_inputs(close_fancyzoom=0);


		$("#iframe_src_for_image")
		.css({width:'750px',height:'400px'})
		.attr('src','<?php echo base_url();    ?>index.php/main/create_video_link_form?carousel_items_image_id=<?php  echo $data['carousel_items'][0]['tune_in_carousel_items_image_id']   ?>');

			
		var width_of_dialog = 795;
		var left_coord = ($(window).width()/2 - width_of_dialog/2);

		$("#dialog" ).dialog({
			position:[left_coord,10],
			height: 510,
			zIndex: -10,
			width: width_of_dialog,
			resizable: false 
			})
						
};	


function dialog_close(){
	$( "#dialog" ).dialog('close');
}
</script>

<?php


