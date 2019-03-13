<?php




?>


<!DOCTYPE html>
<html>
<body>

<canvas id="demo" width="200" height="100">
Your browser does not support the HTML5 canvas tag.</canvas>

<script>
var ctx = demo.getContext('2d'),
    txt = 'Hello background';

drawTextBG(ctx, txt, '32px arial', 50, 50);

/// expand with color, background etc.
function drawTextBG(ctx, txt, font, x, y) {
    
    ctx.save();
    ctx.font = font;
    ctx.textBaseline = 'top';
    ctx.fillStyle = '#f50';
    
    var width = ctx.measureText(txt).width;
    ctx.fillRect(x, y, width, parseInt(font, 10));
    
    ctx.fillStyle = '#000';
    ctx.fillText(txt, x, y);
    
    ctx.restore();
}
</script>










<canvas width="640" height="480" id="game" style="display: block; margin-left: auto;         margin-right: auto; border: 1px solid black;" Your Browser is not compatible with this game.     We recommend Google Chrome, Mozilla Firefox, or Opera.></canvas>
<script>
var game_canvas = document.getElementById("game");
var game_context = game_canvas.getContext("2d");
var swedishflagbg = new Image();
swedishflagbg.src = "https://www.freelogodesign.org/Content/img/logo.png";
swedishflagbg.onload = function() {
game_context.drawImage(swedishflagbg, 0, 0);
}
game_context.fillStyle="#000000";
game_context.font="35px Ubuntu";
game_context.textAlign="center";
game_context.textBaseline="top";
game_context.fillText("How Well Do You Know Your Swedish?", 320, 0);    
</script>


</body>
</html>



<script>
	





</script>

jujsahdkjhsa

<canvas id="demo" width=400 height=100></canvas>