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
form#image_nu_spotlight_item_form{
font-size:16px;
}
form#image_nu_spotlight_item_form input[type=text]{
padding:6px 5px;
width:490px;	
}
form#image_nu_spotlight_item_form input[name=link]{
width:250px;	
}
form#image_nu_spotlight_item_form table#main {
width:100%;
margin:30px 0px 0px 0px;	
}
form#image_nu_spotlight_item_form table#main td.main_table{
padding-top:5px;
padding-bottom:5px;	
}

form#image_nu_spotlight_item_form table#main div.image_assets{
margin-top:25px;
}
form#image_nu_spotlight_item_form div#image_nu_spotlight_item_feature{
	background-image: url(<?php echo base_url();    ?>uploads/nu_spotlight_items_images/<?php  	echo $data['nu_spotlight_items'][0]['feature_nu_spotlight_items_image_id'] ?>/image.png);
	background-repeat: no-repeat;
	border:1px dotted gray;
	width:242px;
	height:222px;
	margin-left: 72px;
}
form#image_nu_spotlight_item_form div#image_nu_spotlight_item_thumb{
	background-image: url(<?php echo base_url();    ?>uploads/nu_spotlight_items_images/<?php  	echo $data['nu_spotlight_items'][0]['thumb_nu_spotlight_items_image_id'] ?>/image.png);
	background-repeat: no-repeat;
	border:1px dotted gray;
	width:69px;
	height:37px;
	margin-left: 82px;
}
form#image_nu_spotlight_item_form #textarea_div{
width:100%;
height: 180px;
margin:0px 0px 0px 0px;
padding:10px 0px 0px 0px;
}
form#image_nu_spotlight_item_form #submit{
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
<form id='image_nu_spotlight_item_form'>
		<table  id='main'>
			<tr>
				<td  class='main_table ' > Name
				</td>
				<td  class='main_table '><input name="name" id="" type="text" value="<?php echo $data['nu_spotlight_items'][0]['name']    ?>">
				</td>
			</tr>
			<tr>
				<td  class='main_table '> Title
				</td>
				<td  class='main_table '><input name="title" id="" type="text" value="<?php echo $data['nu_spotlight_items'][0]['title']    ?>">
				</td>
			</tr>

			<tr>
				<td  class='main_table ' > Link
				</td>
				<td  class='main_table ' nowrap>
					<input name="link" id="" type="text" value="<?php echo $data['nu_spotlight_items'][0]['link']    ?>">
					&nbsp;&nbsp;Launches New Window&nbsp;&nbsp;&nbsp;<input <?php if($data['nu_spotlight_items'][0]['launch']==1){echo ' checked '; };    ?>name="launch" type="checkbox" value="1">
				</td>
			</tr>
			
			
			<tr>
				<td   class='main_table ' colspan=2>
					<div  id='textarea_div'   >
							<textarea  class=' clearfix' name='blurb' id='text_area'><?php echo $data['nu_spotlight_items'][0]['blurb']    ?></textarea>
					</div>
				</td>
			</tr>	






			<tr>
				<td class='main_table image_assets' colspan=2>
					<div  class=' image_assets' >
							<div image_type='feature' image_type_id='4' class='float_left image_div'  id='image_nu_spotlight_item_feature' nu_spotlight_items_image_id='<?php  	echo $data['nu_spotlight_items'][0]['feature_nu_spotlight_items_image_id'] ?>'>
							</div>
							
							<div  image_type='thumb' image_type_id='5' class='float_left image_div'   id='image_nu_spotlight_item_thumb'  nu_spotlight_items_image_id='<?php  	echo $data['nu_spotlight_items'][0]['thumb_nu_spotlight_items_image_id'] ?>'>
								
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
$this->load->view('javascript/htmlbox_wsiwyg.php');  

?>

	
<script type="text/javascript" language="Javascript">
	

	$(document).ready(function() {
		
		
				$('.image_div').css({cursor:'pointer'}).click(function(event) {
		
					open_dialogue_upload_image(
					 $(this).attr('nu_spotlight_items_image_id'),
					 $(this).attr('image_type'),
					 $(this).attr('image_type_id')
					);
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
				
				
  });
    



function submit_inputs(close_fancyzoom){

					$("#text_area").val( mbox.get_html() );
	
					$.post("<?php echo base_url(). 'index.php/main/ajax_update';    ?>",{
						table:'nu_spotlight_items',
						crud:'update',
						set_what_array: $('#image_nu_spotlight_item_form').serialize(),
						id:'<?php echo $data['nu_spotlight_items'][0]['id']    ?>'
						},function(xml) {

							//var db_response = $(xml).find('db_response').text();
							if( close_fancyzoom == 1){
															window.parent.location.reload();
							};
							
							// window.parent.$('body').click();
							
					});	
	
}	

function open_dialogue_upload_image( nu_spotlight_items_image_id, image_type, image_type_id ){

		submit_inputs(close_fancyzoom=0);

		if( nu_spotlight_items_image_id == null){
			nu_spotlight_items_image_id = 0;
		};

		$("#iframe_src_for_image")
		.css({width:'350px',height:'80px'})
		.attr('src','<?php echo base_url();    ?>index.php/main/upload_nu_spotlight_image_form?nu_spotlight_item_id=<?php echo $data['nu_spotlight_items'][0]['id']    ?>&nu_spotlight_items_image_id=' + nu_spotlight_items_image_id +'&image_type='+image_type +'&image_type_id='+image_type_id);

			
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
	

</script>

<?php


