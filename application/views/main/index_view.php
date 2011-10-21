<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php     	
$this->load->view('header/blueprint_css.php');  
$this->load->view('header/common_css.php');  
?>
<style>
#account_menu{
text-align:right;
font-size:14px;
font-weight:bold;
padding-top:20px;	
}
#main_section{
margin-top:5px;
}
#main_section div.middle{
height:auto;	
}
			
#main_section div#parent_tabs{
					width:700px;
					clear:both;
					height:auto;
					margin:0px 0px 0px 20px;
					padding-bottom:20px;
					padding-top:10px;
}			
#main_section div#parent_tabs li{
		float:left;
		width:100px;
		border:1px dotted gray;
		margin-right:10px;
		margin-bottom:5px;
		text-align:center;
		padding:5px
}		
#main_section div#parent_tabs li.carousel{
		background:orange;
}		
#main_section div#parent_tabs li.nu_spotlight{
		background:lightgreen;
}	
#main_section div#parent_tabs li.feature{
		background:yellow;
}				
#main_section div.children_tabs{
		width:700px;
		clear:both;
		height:auto;
		margin:0px 0px 0px 20px;
		padding-bottom:20px;
}

#main_section div.children_tabs li{
		float:left;
		width:100px;
		border:1px dotted gray;
		margin-right:10px;
		text-align:center;
		padding:5px
}

iframe#iframe_src{
width:600px;
height:690px;	
}

</style>
<script type="text/javascript" language="Javascript" src = "<?php echo  base_url();   ?>js/jquery.js"></script>
</head>

<html>


<body>
<div  id='account_menu' class='container'  >
<a href='<?php echo base_url()    ?>index.php/home/logout'>Log Outta Here</a>
</div>
<div  id='main_section'  class='container  rounded_bg' >
	<div class="top">
		<div class="sub_top">&nbsp;</div>
	</div>
  <div class="middle"     >



		<div  id='parent_tabs'>
			
  		<ul>
  			<li  class='carousel'>
  				<a href='<?php   echo base_url()  ?>index.php/main/index/carousel'>
  					Carousel
  				</a>
  			</li>
  			<li  class='nu_spotlight ' >
  				<a href='<?php   echo base_url()  ?>index.php/main/index/nu_spotlight'>
  				Nu Spotlight
  				</a>
  			</li>
  			
  			<li  class='feature ' >
  				<a href='<?php   echo base_url()  ?>index.php/main/index/feature'>
  				Features
  				</a>
  			</li>
  			
  			<li  class='calendar ' >
  				<a href='<?php   echo base_url()  ?>index.php/main/index/calendar'>  				Calendar
  				</a>
  			</li>
  		</ul>
			
		</div>

<?php if( $data['segment3'] == 'carousel'){?>


  	<div class='children_tabs' >
  		
  		<ul>
  			<li  class='items ' >
  				<a href='<?php   echo base_url()  ?>index.php/main/index/carousel/items'>
  					Items
  				</a>
  			</li>
  			<li  class='sets ' >
  				<a href='<?php   echo base_url()  ?>index.php/main/index/carousel/sets'>
  				Sets
  				</a>
  			</li>
  		</ul>
  		
  	</div>


<?php }elseif( $data['segment3'] == 'nu_spotlight') {?>

  	<div class='children_tabs' >
  		
  		<ul>
  			<li  class='items ' >
  				<a href='<?php   echo base_url()  ?>index.php/main/index/nu_spotlight/items'>
  					Items
  				</a>
  			</li>
  			<li  class='sets ' >
  				<a href='<?php   echo base_url()  ?>index.php/main/index/nu_spotlight/sets'>
  				Sets
  				</a>
  			</li>

  		</ul>
  		
  	</div>
  	
  	

  	

<?php }elseif($data['segment3'] == 'calendar'){ 

		$this->load->view('main/calendar/index.php');

}; 

		
if( isset($data['segment4'])){   
	
			switch ( $data['segment4'] ) {
	
		    case 'items':
	
					$this->load->view('main/'.$data['segment3'].'/items/index.php');
				
		    break;
		    
		    case 'sets':
	
					$this->load->view('main/'.$data['segment3'].'/sets/index.php');
				
		    break;
		    

		
			}
			
};
		

		
		?>

	</div>
	<div class="bottom"><div class="sub_bottom">&nbsp;</div></div>
</div>	

</body>

<div id="fancy_zoom_div">
				

		<iframe id="iframe_src" 
			frameborder="0" scrolling=no src=""   >
			
		    <p>Your browser does not support iframes.</p>
		    
		</iframe>				

</div>	

</html>


<script type="text/javascript" language="Javascript">
	
	
	
	$(document).ready(function() {

			$('#parent_tabs li.<?php echo  $data['segment3']   ?>').css({border:'2px solid gray'})
			
			<?php if( isset( $data['segment4'])  ){?>
				
						$('.children_tabs li.<?php echo  $data['segment4']   ?>').css({background:'lightgray'})
						
			<?php } ?>

  });
    

</script>
<?php  $this->load->view('footer/fancy_zoom.php');   ?>