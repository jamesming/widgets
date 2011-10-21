<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php     	$this->load->view('header/blueprint_css.php');  ?>
<?php     	$this->load->view('header/common_css.php');  ?>
<style>
#page_views_div{
	font-size:50px;
	color:black;
	text-align:center;
		
}</style>
<script type="text/javascript" language="Javascript" src = "<?php echo  base_url();   ?>js/jquery.js"></script>
</head>

<html>

<body>


<div  id='count_div'>
	<h1>Unique Visitors to mynuvotv.com</h1>
	<div  id='page_views_div'>
	</div>
</div>

</body>


<script type="text/javascript" language="Javascript">
$(document).ready(function() {
	
		setInterval(function (){
				$.post("<?php echo base_url() ?>index.php/counter/get_unique_page_views",{
				},function(data) {
		
					$('#page_views_div').text(data)
				
				});	
		}, 1000)

	
});		

</script>
</html>

