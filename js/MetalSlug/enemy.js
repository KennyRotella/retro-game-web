var Enemy = function(xPos,yPos,vel){
	this.x = xPos;
	this.y = yPos;
	this.frame = new Array();
	this.enemyAnimation = new Animation(0,25,1,'Enemy/');
	this.healthPoints = 4;
	this.died = false;
	this.bolla = new Bubble(vel);
}

Enemy.prototype.checkBullet = function(){
	for(var i=0; i<5; i++){
		if(marco.bullet[i].x > this.x && !marco.bullet[i].exploded && marco.bullet[i].y > this.y){
			marco.bullet[i].exploded = true;
			this.healthPoints--;
			if(this.healthPoints == 0) this.died = true;
		}
	}
}

Enemy.prototype.mechanics = function(){
	if(!this.died){
		if(marco.x > this.x) marco.died = true;
		this.checkBullet();
		drawAnimation(this.enemyAnimation,this.x,this.y);
		this.bolla.shotBubble(this);
		this.bolla.checkPlayerCollision(marco);
	}
}

var Bubble = function(vel){
	this.x;
	this.y;
	this.velocity = vel;
	this.exploded = false;
	this.frame = new Image();
	this.frame.src = 'Bubble/0.png';
	this.sync = 25;
	this.delay = 50;
	this.countDelay = this.delay;
}

Bubble.prototype.shotBubble = function(enemy){
	if(this.sync > 0) this.sync--;
	else{ 
		if(this.countDelay <= 0){
			this.exploded = false;
			this.countDelay = this.delay;
			this.x = enemy.x;
			this.y = enemy.y+15;
		} 
		this.countDelay--;
	}
	if(!this.exploded){
		ctx.drawImage(this.frame,this.x,this.y,this.frame.width-2,this.frame.height-2);
		this.x -= this.velocity;
	}
}

Bubble.prototype.checkPlayerCollision= function(player){
	if(this.x > player.x && this.x < player.x + player.width - 20)
	if(this.y > player.y && this.y < player.y + player.height - 12){
		player.died = true;
		this.exploded = true;
	}
}
