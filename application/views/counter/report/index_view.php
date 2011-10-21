<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php     	$this->load->view('header/blueprint_css.php');  ?>
<?php     	$this->load->view('header/common_css.php');  ?>
<style>
table{
width:700px;
margin-top:50px;
margin-left:50px;
border-top:	1px solid black;
border-left:1px solid black;
}
table td{
width:50%;
border-right:1px solid black;
border-bottom:1px solid black;
font-size:30px;	
}
#page_views_div{
	color:black;
	text-align:center;
		
}</style>
<script type="text/javascript" language="Javascript" src = "<?php echo  base_url();   ?>js/jquery.js"></script>
</head>

<html>

<body>


<div  id='count_div'>
	<table>
		<tr>
			<td>Unique Visitors
			</td>
			<td id='page_views_div'>
			</td>
		</tr>
	</table>
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

