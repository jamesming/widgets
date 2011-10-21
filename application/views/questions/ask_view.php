<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php     	$this->load->view('header/blueprint_css.php');  ?>
<?php     	$this->load->view('header/common_css.php');  ?>
<style>
body{
font-size:14px;	
background:white;	
}
div.main{
margin-top:10px;		
}
div.main input#email{
width:600px;
height:20px;
}	

div#list_of_questions div.question_div{
margin-top:20px;
width:599px;	
}	
	
div#list_of_questions textarea{
width:599px;	
}
</style>

<script type="text/javascript" language="Javascript" src = "<?php echo  base_url();   ?>js/jquery.js"></script>
</head>

<html>

<body>

<form 
	id='form0' 
	name='form0'
	action='<?php echo base_url()    ?>index.php/questions/submit_answers'
	method='post'
	>
<div   class='main container'  >
	<div>
		<div>Please enter your email. <small><small>(required)</small></small>
		</div>
		<input id="email" name="email" type="" value="">
	</div>
	<div id='list_of_questions'>
			<?php foreach( $data['questions']   as  $question){?>

				<div  class='question_div ' >
					<?php echo $question->question;    ?>
				</div>
				<div>
					<textarea name='<?php echo $question->id    ?>'></textarea>
				</div>

			<?php } ?>
	</div>
	<div>
		<input  id="submit" type="button" value="submit">
	</div>
</div>
</form>


</body>


<script type="text/javascript" language="Javascript">
	$('#submit').click(function(event) {
		if( $('#email').val() == ''){
			alert('Email is required.');
		}else{
			$('#form0').submit();			
		};

	});	
</script>
</html>

