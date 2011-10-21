<style>
body {
	font:62.5% Arial,sans-serif;
	font-size: 13px;
	line-height: 1.35;
	color:#000000;
	
}

#header_background_div{
	border-top:3px solid lightgray;
	background:#F2F2F2;
	padding-bottom:10px;
}

#header-menu
{
	margin-top: 5px;
	text-align: right;
	font-weight: bold;
}

#header-menu li
{
	list-style: none;
	padding-left: 15px;
	display: inline;
	font-size: 15px;
}

#header-menu li a
{
	text-decoration: none;
	color:#6E6E6E;
}

#header-menu li a:hover
{
}

#old_film_background{
	border-top:3px solid lightgray;
	border-bottom:3px solid lightgray;
	background-image:url(<?php echo base_url()    ?>images/oldFilmLg.png);
	background-position:50% 0%;
	padding-bottom:20px;
}

#featuring_table {
margin-top:35px;		
}
#featuring_table td:nth-child(1),
#featuring_table td:nth-child(2){
	background-image:url(<?php  echo base_url()   ?>images/process-arrow.jpg);
	background-repeat:no-repeat;
	background-position:155px 0px;

}
#featuring_table td{
	height:100px;
	width:120px;
	padding-right:40px;

}

#featuring_table h1{
font-size:18px;
color:#585858;	
}
#featuring_table div{
font-size:12px;
color:gray;	
}
.button{
		background-image: url("<?php echo base_url()    ?>images/buttons-sprite.png");
		color: #FFFFFF;
		display: block;
		float: left;
		font-size: 20px;
		font-weight: bold;
		height: 40px;
		margin: 4px 4px 15px;
		padding-top: 7px;
		position: relative;
		text-align: center;
		text-decoration: none;
		width: 184px;
		cursor:pointer;
}	
#signup_button{			
		background-position:right top; text-shadow:-1px -1px 1px #860000;}
#signup_button:hover {
	background-position:right bottom; 
	color:#e1e1e1;
	}
#faq_button {background-position:left top; text-shadow:-2px -2px 2px #ffffff; color:#5f5f5f;}
#faq_button:hover {background-position:left bottom; color:#a1a1a1;}



.features_details_header{
		float:left;
		font-size:21px;
		color:#585858;
}

.features_details_text{
	margin-top:15px;
	float:left;
	font-size:12px;
	color:gray;	
}

a.view_screenshot{
	
    background: url("<?php echo base_url()    ?>images/screenshot.gif") no-repeat scroll 0 0 transparent;
    color: #237EBE;
    display: block;
    font-size: 12px;
    width:250px;
    height: 25px;
    line-height: 24px;
    padding-left: 25px;
    text-shadow: 0 1px 1px #FFFFFF;
    text-decoration:none;	
}

a.screens{
margin-right:63px; 
margin-top:0px; 
display:block; 
position:relative; 
float:left; 
background:#FFFFFF; 
padding:5px; 
border-radius:4px; 
-webkit-border-radius:4px; 
-moz-border-radius:4px; 
-webkit-transition:all linear 0.4s;
}
a.screens:hover {background:#CCCCCC;}
	
.col{
    float: left;
    min-height: 274px;
    padding: 12px 60px 0 38px;
    width: 200px;
    color:white;
}	
.footer_left_col, .footer_mid_col{
    border-right: 1px solid #444444;
}
.footer_left_col div:nth-child(1), .footer_mid_col div:nth-child(1){
		padding-top:10px;	
		float:left;
		font-size:15px;
		color:white;
		font-weight:bold;
}
.footer_left_col div:nth-child(2), .footer_mid_col div:nth-child(2) p{
		padding-top:10px;
		float:left;
		font-size:13px;
		color:white;
}
.footer_left_col div:nth-child(2) p{
		font-style: italic;
}
a.date{
		color:#9DBDCF;
		font-size:12px;
		font-style: normal ;
}
.col-socials a { margin-top:20px;height:76px; width:249px; display:block; padding-bottom:10px !important; }
.col-socials a.twitter-ico { background:url(<?php  echo base_url()   ?>images/twitter-ico.png) no-repeat; }
.col-socials a.facebook-ico { background:url(<?php  echo base_url()   ?>images/facebook-ico.png) no-repeat; }
.col-socials a:hover { background-position:right 0; }
</style>