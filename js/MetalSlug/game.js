function play(){
	if(!win){
		ctx.drawImage(sfondo.layer2,sfondo.x2Pos,0,304,259,0,-52,304,259); //img,sx,sy,swidth,sheight,x,y,width,height
		ctx.drawImage(sfondo.layer1,sfondo.x1Pos,0,304,220,0,0,304,224);
		
		nemico1.mechanics();
		nemico2.mechanics();
		nemico3.mechanics();
		nemico4.mechanics();
		nemico5.mechanics();
		nemico6.mechanics();
		nemico7.mechanics();
		
		marco.mechanics();
		
		sfondo.transition();
		if(!marco.died){
			for(var i=0; i<5; i++){
				marco.bullet[i].shot();
				marco.bullet[i].checkCollision();
			}
		}
		if(marco.died && marco.dyingDelay >= 0){
			drawAnimation(marco.playerDying,marco.x,marco.y);
			marco.dyingDelay--;
		}else if(marco.dyingDelay < 0) ctx.drawImage(marco.playerDying.frame[9],marco.x,marco.y,60,60);
		
		checkWin();
	} else {
		ctx.drawImage(sfondo.layer2,sfondo.x2Pos,0,304,259,0,-52,304,259); //img,sx,sy,swidth,sheight,x,y,width,height
		ctx.drawImage(sfondo.layer1,sfondo.x1Pos,0,304,220,0,0,304,224);
		drawAnimation(marco.playerVictory,marco.x,marco.y);
	}
}
function keyDownHandler(e){
	var key=e.which; 
	switch(key){
		case 65	: marco.direction = 'sinistra'; break;
		case 68	: marco.direction = 'destra'; break;
		case 32	: 
			if(marco.yCollision){
				marco.jump = true; 
				marco.playerJumpingL.currentFrame = 0;
				marco.playerJumpingR.currentFrame = 0;
			}
			break;
	}
}

function keyUpHandler(e){
	var key=e.which; 
	switch(key){
		case 65	: if(marco.direction == 'sinistra') marco.direction='l'; break;
		case 68	: if(marco.direction == 'destra') marco.direction='r'; break;
	}
}

function clickHandler(e){
	marco.shooting = true;
	marco.currentBullet = (marco.currentBullet + 1)%5;
	marco.shootingDelay = 3;
}

function checkWin(){
	if(nemico1.died && nemico2.died && nemico3.died && nemico4.died && nemico5.died && nemico6.died && nemico7.died)
		win = true;
}

//
//ESECUZIONE
//

window.addEventListener('keydown',keyDownHandler);
window.addEventListener('keyup',keyUpHandler);
window.addEventListener('click',clickHandler);

var canvas; //variabili globali
var ctx;
var intervalID; 
var marco = new Player(10,135); 
var sfondo = new Background;
var win = false;

var nemico1 = new Enemy(600,165,3);
var nemico2 = new Enemy(800,165,3);
var nemico3 = new Enemy(1000,165,3);
var nemico4 = new Enemy(1200,165,3);
var nemico5 = new Enemy(1300,165,2);
var nemico6 = new Enemy(1400,165,2);
var nemico7 = new Enemy(1450,165,2);

window.onload = function(){
	canvas = document.getElementById('gioco');
	ctx = canvas.getContext('2d');
	intervalID = setInterval(play,1000/30);
}

