<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php     	$this->load->view('header/blueprint_css.php');  ?>
<?php     	$this->load->view('header/common_css.php');  ?>
<style>
#logo_div{
width:800px;	
margin-top:30px;
}
table{
width:700px;
margin-top:20px;
margin-left:50px;
border-top:	1px solid black;
border-left:1px solid black;
}
table td{
text-align:center;
width:50%;
border-right:1px solid black;
border-bottom:1px solid black;
font-size:30px;	
}
table #list_table td{
	font-size:12px;
}
</style>
<script type="text/javascript" language="Javascript" src = "<?php echo  base_url();   ?>js/jquery.js"></script>
</head>

<html>

<body>

<div  id='logo_div'>
<center><img src='http://mynuvotv.com/assets/images/logo-header-HOMEPAGE.png'/></center>
</div>
<div  id='count_div'>
	<table>
		<tr>
			<td colspan=2   style='background:lightgray'  >
				Real-time Impressions for <?php echo $website_data['date']    ?>
			</td>

		</tr>		
		
		<tr>
			<td>Unique Visitors
			</td>
			<td id='unique_views_td'>
			</td>
		</tr>
		<tr>
			<td>Total Visitors
			</td>
			<td id='total_views_td'>
			</td>
		</tr>		
		<tr>
			<td>Unique Ad Buys
			</td>
			<td id='unique_adbuys_td'>
			</td>
		</tr>	
		<tr>
			<td>Total Ad Buys
			</td>
			<td id='total_adbuys_td'>
			</td>
		</tr>			
				
	</table>
	

</div>
<div  id='list_div'>
	<table  id='list_table'>
	<?php  
	foreach( $website_data['counts'] as  $data ){?>
		<tr>
			<td><?php echo $data[0]->ip_address    ?>
			</td>
			<td><?php echo $data[0]->city    ?>, <?php echo $data[0]->state    ?>
			</td>
	<?php     
	}?>
	<table>
</div>
</body>


<script type="text/javascript" language="Javascript">
$(document).ready(function() {
	
		setInterval(function (){
			
				$.post("<?php echo base_url() ?>index.php/counter/get_unique_views",{
				},function(data) {
					$('#unique_views_td').text(data)
				});	
				
				$.post("<?php echo base_url() ?>index.php/counter/get_total_page_views",{
				},function(data) {
					$('#total_views_td').text(data)
				});				
				
				$.post("<?php echo base_url() ?>index.php/counter/get_unique_adbuys_views",{
				},function(data) {
					$('#unique_adbuys_td').text(data)
				});			
				
				$.post("<?php echo base_url() ?>index.php/counter/get_total_adbuy_views",{
				},function(data) {
					$('#total_adbuys_td').text(data)
				});												
					
				
		}, 1000)

	
});		

</script>
</html>

