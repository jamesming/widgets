<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php     	$this->load->view('header/blueprint_css.php');  ?>
<?php     	$this->load->view('header/common_css.php');  ?>
<style>
textarea#question{
width:600px;
height:60px;	
}
ul#list_of_questions li{
border:1px solid gray;
margin-top:5px;	
}
</style>

<script type="text/javascript" language="Javascript" src = "<?php echo  base_url();   ?>js/jquery.js"></script>
</head>

<html>

<body>


<div   class=' container' >

	<textarea  name="question" id="question" ></textarea><br />
	<input id="submit" type="submit" value="submit">
</div>
<div   class=' container'  >
	<ul id='list_of_questions'>
	</ul>
</div>



</body>


<script type="text/javascript" language="Javascript">
$(document).ready(function() {
	
	$('#submit').click(function(event) {

					$.post("<?php echo base_url(). 'index.php/questions/insert_questions';    ?>",{
					question: $('#question').val()
					},function(data) {
					
								$('#list_of_questions').html(data);
					
					
					});	
		
	});	


	$.post("<?php echo base_url(). 'index.php/questions/show_list_of_questions';    ?>",{},
	function(data) {
	
				$('#list_of_questions').html(data);
	
	
	});		

});		


</script>
</html>

