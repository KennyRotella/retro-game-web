var Player = function(xPos,yPos){
	this.width = 60;
	this.height = 60;
	this.x = xPos;
	this.y = yPos;
	this.xVelocity = 3;
	this.yVelocity = 0;
	this.gravity = 0;
	this.direction = 'r';
	this.jump = true;
	this.xCollision = false;
	this.yCollision = false;
	this.shooting = false;
	this.shootingDelay = 0;
	this.bullet = new Array();
	this.currentBullet = 0;
	this.died = false;
	this.dyingDelay = 19;
	for(var i=0; i<5; i++){
		this.bullet[i] = new Bullet();
	}
	//Walking
	this.playerWalkingL = new Animation(4,16,1,'PlayerWalkingLeft/');
	this.playerWalkingR = new Animation(4,16,1,'PlayerWalkingRight/');
	this.playerStandingL = new Animation(0,4,3,'PlayerWalkingLeft/');
	this.playerStandingR = new Animation(0,4,3,'PlayerWalkingRight/');
	this.playerJumpingL = new Animation(32,38,3,'PlayerWalkingLeft/');
	this.playerJumpingR = new Animation(32,38,3,'PlayerWalkingRight/');
	//Shooting
	this.playerWalkingLS = new Animation(4,16,1,'PlayerWalkingLeftShooting/');
	this.playerWalkingRS = new Animation(4,16,1,'PlayerWalkingRightShooting/');
	this.playerStandingLS = new Animation(0,4,1,'PlayerWalkingLeftShooting/');
	this.playerStandingRS = new Animation(0,4,1,'PlayerWalkingRightShooting/');
	this.playerJumpingLS = new Animation(32,38,2,'PlayerWalkingLeftShooting/');
	this.playerJumpingRS = new Animation(32,38,2,'PlayerWalkingRightShooting/');
	
	this.playerDying = new Animation(0,10,1,'PlayerDying/');
	this.playerVictory = new Animation(0,5,1,'PlayerVictory/');
}

Player.prototype.checkCollision = function(){
	if(this.x + this.width >= canvas.width){
		this.x = canvas.width - this.width;
		this.xCollision = true;
	}
	else if(this.x <= 0){
		this.x = 0 ;
		this.xCollision = true;
	}
	
	if(this.y + this.height >= canvas.height){
		this.y = canvas.height - this.height;
		this.yCollision = true;
	} else if(this.y <= 0){
		this.y = 0;
		this.yCollision = true;
	}
}

Player.prototype.mechanics = function(){
	if(!marco.died){
	if(!this.yCollision){
		switch(this.direction){
			case 'l':
			case 'sinistra': 
				if(this.shooting) drawAnimation(marco.playerJumpingLS,marco.x,marco.y); 
				else drawAnimation(marco.playerJumpingL,marco.x,marco.y);
				break;
			case 'r':
			case 'destra': 
				if(this.shooting) drawAnimation(marco.playerJumpingRS,marco.x,marco.y);
				else drawAnimation(marco.playerJumpingR,marco.x,marco.y);
				break;
		}
	} else switch(this.direction){ 
		case 'l': 
			if(this.shooting) drawAnimation(marco.playerStandingLS,marco.x,marco.y);
			else drawAnimation(marco.playerStandingL,marco.x,marco.y);
			break;
		case 'r': 
			if(this.shooting) drawAnimation(marco.playerStandingRS,marco.x,marco.y);
			else drawAnimation(marco.playerStandingR,marco.x,marco.y);
			break;
		case 'sinistra': 
			if(this.shooting) drawAnimation(marco.playerWalkingLS,marco.x,marco.y);
			else drawAnimation(marco.playerWalkingL,marco.x,marco.y);
			break;
		case 'destra': 
			if(this.shooting) drawAnimation(marco.playerWalkingRS,marco.x,marco.y); 
			else drawAnimation(marco.playerWalkingR,marco.x,marco.y);
			break;
	}
	
	switch(this.direction){
		case 'sinistra'	: this.x -= this.xVelocity; break;
		case 'destra'	: this.x += this.xVelocity; break;
	}
	if(this.jump){
		this.jump = false;
		this.yCollision = false;
		this.yVelocity = 11;
		this.gravity = 1;
	}
	}
	
	if(this.shootingDelay > 0){
		this.shootingDelay--;
	} else if(this.shooting){
		this.bullet[this.currentBullet].exploded = false;
		this.bullet[this.currentBullet].x = this.x + 30;
		this.bullet[this.currentBullet].y = this.y + 25;
		this.bullet[this.currentBullet].direction = this.direction;
		this.shooting = false;
	}
	
	this.yVelocity -= this.gravity;
	this.y -= this.yVelocity;
	
	this.checkCollision();
	if(this.yCollision){
		this.gravity = 0;
		this.yVelocity = 0;
	}
}

var Bullet = function(){
	this.x;
	this.y;
	this.direction;
	this.velocity = 20;
	this.exploded = true;
	this.frame = new Image();
	this.frame.src = 'BulletExplosion/0.png';
}

Bullet.prototype.shot = function(){
	if(!this.exploded){
		ctx.drawImage(this.frame,this.x,this.y,this.frame.width/2,this.frame.height/2);
		if(this.direction == 'destra' || this.direction == 'r')
			this.x += this.velocity;
		else if(this.direction == 'sinistra' || this.direction == 'l')
			this.x -= this.velocity;
	}
}

Bullet.prototype.checkCollision = function(){
	if(this.x > canvas.width){
		this.exploded = true;
		this.x=0
	}
	else if(this.x < 0){
		this.exploded = true;
		this.x=0
	}	
}