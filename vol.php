<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<script type="text/javascript" language="Javascript">

// THIS IS CODE TO MUTE THE BRIGHT COVE PLAYER.  LOOK AT
// SEARCH FOR 'changeVolume(0)' IN THIS FILE

var initialized = false;

function returnCurrentTime() {
	currentDate = new Date();
	hours = currentDate.getHours();
	minutes = currentDate.getMinutes();
	seconds = currentDate.getSeconds();
	meridian = "am";
	if(hours > 11) { meridian = "pm"; }
	if(hours > 12) { hours -= 12; }
	if(hours == 0) { hours = 12; }
	if(minutes < 10) { minutes = "0" + minutes; }
	if(seconds < 10) { seconds = "0" + seconds; }
	return hours + ":" + minutes + "." + "<span style='font-size:8pt;'>" + seconds + "</span>" + meridian + " ";
	
}
function trace(eventString) {
	if(!initialized) { setupDisplay(); }
		
	eventString = eventString.toString();
	eventString = eventString.replace(/</g,"&lt;");
	eventString = eventString.replace(/>/g,"&gt;");
	eventString = eventString.replace(/"/g,"&quot;");
// document.getElementById('trace').innerHTML = returnCurrentTime() + eventString + "<br />\n" + document.getElementById('trace').innerHTML;
}

function track(eventString, position) {
	if(!initialized) { setupDisplay(); }
	
	eventString = eventString.toString();
	eventString = eventString.replace(/</g,"&lt;");
	eventString = eventString.replace(/>/g,"&gt;");
	eventString = eventString.replace(/"/g,"&quot;");
	
	if(position == 0 || position == null) { document.getElementById("es_tracker0").innerHTML = eventString; }
	if(position == 1) { document.getElementById("es_tracker1").innerHTML = eventString; }
	if(position == 2) { document.getElementById("es_tracker2").innerHTML = eventString; }
	
}

function setupDisplay() {
	var display = document.createElement("div");
	display.position = "absolute";
	display.id = "es_traceContainer";
		var trackContainer = document.createElement("div");
		trackContainer.position = "absolute";
		trackContainer.id = "track";
		display.appendChild(trackContainer);
			trackers = new Array();
			var tracker0 = document.createElement("div");
			tracker0.id = "es_tracker0";
			trackers.push(tracker0);
			trackContainer.appendChild(tracker0);
			var tracker1 = document.createElement("div");
			tracker1.id = "es_tracker1";
			trackers.push(tracker1);
			trackContainer.appendChild(tracker1);
			var tracker2 = document.createElement("div");
			tracker2.id = "es_tracker2";
			trackers.push(tracker2);
			trackContainer.appendChild(tracker2);
			for(i = 0; i < trackers.length; i++) {
				trackers[i].style.cssFloat = "left";
				trackers[i].style.fontFamily = "Arial,Helvetica,sans-serif";
				trackers[i].style.fontStyle = "italic";
				trackers[i].style.fontWeight = "bold";
				trackers[i].style.fontSize = "9pt";
				trackers[i].style.color = "#677072";
				trackers[i].style.padding = "5px";
			}
		var trace = document.createElement("div");
		trace.position = "absolute";
		trace.id = "trace";
		trace.style.clear = "both";
		trace.style.fontFamily = "Arial,Helvetica,sans-serif";
		trace.style.fontStyle = "normal";
		trace.style.fontSize = "9pt";
		trace.style.color = "#677072";
		trace.style.borderLeft = "solid";
		trace.style.borderTop = "solid";
		trace.style.borderWidth = "1px";
		trace.style.width = "800px";
		trace.style.padding = "5px";
		trace.style.marginTop = "20px";
		display.appendChild(trace);
//	document.getElementsByTagName("body")[0].appendChild(display);	
	initialized = true;
}

var player;
var video, content, exp, menu, ads, social;

function onTemplateLoaded(pPlayer) {
	trace("templateLoaded");

	player = bcPlayer.getPlayer(pPlayer);

	video 	= player.getModule(APIModules.VIDEO_PLAYER);
	content = player.getModule(APIModules.CONTENT);
	exp 	= player.getModule(APIModules.EXPERIENCE);
	menu 	= player.getModule(APIModules.MENU);
	ads 	= player.getModule(APIModules.ADVERTISING);
	social 	= player.getModule(APIModules.SOCIAL);


	exp.addEventListener(BCExperienceEvent.CONTENT_LOAD, onContentLoad);
	exp.addEventListener(BCExperienceEvent.TEMPLATE_READY, onTemplateReady);
	video.addEventListener(BCVideoEvent.VOLUME_CHANGE, onVolumeChange);
}


function onTemplateReady(e) {
//	trace(e.type);

	// Changes volume upon player load, more specifically, templateReady
	video.setVolume(0);
//	trace("Current Volume: " + video.getVolume());
}

// Changes volume based on external event
function changeVolume(n) {
	video.setVolume(n);
//	trace("Current Volume: " + video.getVolume());
}

function onVolumeChange(e) {
//	trace(e.type + " Current Volume: " + video.getVolume());
}

function onContentLoad(e) {
//	 trace(e.type+' test'); 
	 changeVolume(0); 
}
</script>


</head>
<body>


<!-- Start of Brightcove Player -->

<div style="display:none">

</div>

<!--
By use of this code snippet, I agree to the Brightcove Publisher T and C
found at http://corp.brightcove.com/legal/terms_publisher.cfm.
-->

<script language="JavaScript" type="text/javascript" src="http://admin.brightcove.com/js/BrightcoveExperiences.js"></script>
<script type="text/javascript" src="http://admin.brightcove.com/js/APIModules_all.js"></script>

								<object id="myExperience" class="BrightcoveExperience">
								  <param name="wmode" value="transparent" />
								  <param name="width" value="242" />
								  <param name="height" value="422" />
								  <param name="playerID" value="1154506721001" />
								  <param name="playerKey" value="AQ~~,AAAAADEdZAY~,VHcBVNPqDVshrDLVr-FIOiEabfcn5IxW" />
								  <param name="isVid" value="true" />
								  <param name="isUI" value="true" />
								  <param name="dynamicStreaming" value="true" />
								  
								</object>

<!-- End of Brightcove Player -->
<br />
<input type="button" value="Set Volume to 0%" onclick="changeVolume(0)" />
<br />
<input type="button" value="Set Volume to 50%" onclick="changeVolume(.5)" />
<br />
<input type="button" value="Set Volume to 100%" onclick="changeVolume(1)" />


</body>
</html>