<!DOCTYPE html>
<html>
<head> <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
* {
box-sizing: border-box;
}
body {
margin: 0;
font-family: Arial;
font-size: 17px;
}
#myVideo {
position: fixed;
right: 0;
bottom: 0;
min-width: 100%; 
min-height: 100%;
}
.content {
position: fixed;
top: 0;
background: rgba(0, 0, 0, 0.5);
color: #f1f1f1;
width: 100%;
padding: 20px;
}
img{
	width: 80px;
	float: right;
}
/* .auto{
    margin: auto;
    margin: -3.5% 27%; 
}
.bop{
    margin: -4% 46%; 
 
} */
.a{
    float:left;
}
.b{
    float:left;
    margin-top:0.4%;;

}
.c{
    float:left;
    margin-top:0.4%;;

}
</style>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
  
function getDataFromDb()
{
	$.ajax({ 
				url: "load.php" ,
				type: "POST",
				data: ''
			})
}

setInterval(getDataFromDb, 10000);   // 1000 = 1 second
</script>

<script>
$(document).ready(function(){
    $('#auto').load('load.php');
    refresh();

});

function refresh()
{
    setTimeout(function(){
        $('#auto').fadeOut('slow').load('load.php').fadeIn('slow');
        refresh();

    },4000);
}




</script>


</head>
<body>
<div id="wrapper">
<div id="video-player-prototype" class="video-player" style="display:none">
<video id="myVideo" src="">
Your browser does not support the <code>video</code> element.
</video>
</div>
</div>
<div class="content">
<img src="/images/logo.png" alt="">
<h1><div class="a">ยอดเงินบริจาครวม​ ณ ขณะนี้  &nbsp;</div><div class="b" id="auto"></div>&nbsp;&nbsp;&nbsp;<div class="c"><small>&nbsp;บาท</small></div> </h1>
<p>ระบบลงทะเบียนผู้บริจาคเงินให้โรงพยาบาลเจ้าพระยาอภัยภูเบศรเพื่อขอรับใบอนุโมทนาบัตร
โรงพยาบาลเจ้าพระยาอภัยภูเบศร</p> 
</div>
<script>
/*
--------------------------------------------------------------------------
JAVASCRIPT VIDEO PRESENTATION
Shows a bunch of HTML5 videos in a presentation style.
Keyboard shortcuts:
- left/right or PgUp/PgDn: go to previous/next video
- space: toggle pause/play for current video
- A: toggle autoplay
- L: toggle loop
- C: toggle HTML5 controls
The settings will be saved in localStorage and overridden from there.
Author: Werner Robitza
--------------------------------------------------------------------------
*/
$(document).ready(function() {
// --------------------------------------------------------------------------
// Set the paths to the individual films here.
// Recommended format: H.264 in MP4 container, with MOOV atom at the
// beginning
var films = [
"/vdo/abhai.mp4",
"/vdo/bnk48.mp4",
]
// if set to true, start playback immediately
var autoplay = true
// if set to true, loop presentation
var loop = true
// show HTML5 controls
var controls = false
// --------------------------------------------------------------------------
// DO NOT CHANGE ANYTHING BELOW THIS LINE
// override settings from localStorage
if (localStorage.getItem('loop') != null) {
loop = JSON.parse(localStorage.getItem('loop'))
console.log("Loaded 'loop' as " + localStorage.getItem('loop') + " from localStorage")
}
if (localStorage.getItem('autoplay') != null) {
autoplay = JSON.parse(localStorage.getItem('autoplay'))
console.log("Loaded 'autoplay' as " + localStorage.getItem('autoplay') + " from localStorage")
}
if (localStorage.getItem('controls') != null) {
controls = JSON.parse(localStorage.getItem('controls'))
console.log("Loaded 'controls' as " + localStorage.getItem('controls') + " from localStorage")
}
function playNextVideo() {
playVideoAtIndex(currentIndex + 1)
}
function stopAndHideAllVideos() {
$('.video-player').hide()
$('.video-player').each(function(){
var video = $(this).find('video').first().get(0)
video.currentTime = 0
video.pause()
})
}
function playVideoAtIndex(index) {
stopAndHideAllVideos()
// if the end has been reached
if (index > maxIndex) {
// if looping was enabled, start again
if (loop) {
playVideoAtIndex(0)
}
return
}
if (index < 0) {
return
}
if (index == 0) {
currentVideo = $('#video-player-' + index).fadeIn('slow')
} else {
currentVideo = $('#video-player-' + index).show()
}
$(currentVideo).find('video').first().get(0).play()
currentIndex = index
}
function togglePauseAtIndex(index) {
currentVideo = $('#video-player-' + index)
videoPlayer = $(currentVideo).find('video').first().get(0)
if (videoPlayer.paused)
videoPlayer.play()
else
videoPlayer.pause()
}
function toggleControls() {
if (controls)
$('#wrapper').find('video').attr('controls', 'controls')
else
$('#wrapper').find('video').removeAttr('controls')
}
// MAIN SCRIPT
// --------------------------------------------------------------------------
var index = 0
films.forEach(function(film) {
console.log("Loading film " + film)
video = $('#video-player-prototype').clone()
video.attr('id', 'video-player-' + index)
video.find('video').first().attr('src', film)
$('#wrapper').append(video)
videoPlayer = video.find('video').first().get(0)
videoPlayer.addEventListener('ended', function(){
playNextVideo()
})
index = index + 1
})
var maxIndex = index - 1
var currentIndex = -1
var currentVideo = $('#video-player-prototype')
// if autoplay was enabled, start right away
if (autoplay) {
playVideoAtIndex(0)
}
toggleControls()
// --------------------------------------------------------------------------
// keyboard event listeners
var KEYCODE_LEFT = 37
var KEYCODE_RIGHT = 39
var KEYCODE_PGUP = 33
var KEYCODE_PGDN = 34
var KEYCODE_SPACE = 32
var KEYCODE_A = 65
var KEYCODE_C = 67
var KEYCODE_L = 76
$(document).keydown(function(e) {
console.log("Key pressed " + e.keyCode)
switch(e.which) {
case KEYCODE_LEFT:
case KEYCODE_PGUP:
if (currentIndex < 0) {
console.log("Not able to go left.")
}
playVideoAtIndex(currentIndex - 1)
break
case KEYCODE_RIGHT:
case KEYCODE_PGDN:
if (currentIndex >= maxIndex) {
console.log("Not able to go right.")
}
playVideoAtIndex(currentIndex + 1)
break
case KEYCODE_SPACE:
togglePauseAtIndex(currentIndex)
break
case KEYCODE_C:
controls = !controls
console.log("Set 'controls' to " + controls)
localStorage.setItem('controls', controls)
toggleControls(controls)
break
case KEYCODE_L:
loop = !loop
console.log("Set 'loop' to " + loop)
localStorage.setItem('loop', loop)
break
case KEYCODE_A:
autoplay = !autoplay
console.log("Set 'autoplay' to " + autoplay)
localStorage.setItem('autoplay', autoplay)
break
default: return
}
e.preventDefault()
})
})
</script>

