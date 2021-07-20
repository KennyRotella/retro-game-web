var Background = function(){
	this.x1Pos = 0;
	this.x2Pos = 0;
	this.x1Vel = 3;
	this.x2Vel = 1;
	this.layer1 = new Image();
	this.layer2 = new Image();
	this.layer1.src = 'Background/layer1.png';
	this.layer2.src = 'Background/layer2.png';
}

Background.prototype.transition = function(){
	if(marco.x > canvas.width/2 && this.x1Pos < this.layer1.width - canvas.width - 20){
		this.x1Pos += this.x1Vel;
		this.x2Pos += this.x2Vel;
		
		marco.x = canvas.width/2;
		
		nemico1.x -= this.x1Vel;
		nemico1.bolla.x -= this.x1Vel;
		
		nemico2.x -= this.x1Vel;
		nemico2.bolla.x -= this.x1Vel;
		
		nemico3.x -= this.x1Vel;
		nemico3.bolla.x -= this.x1Vel;
		
		nemico4.x -= this.x1Vel;
		nemico4.bolla.x -= this.x1Vel;
		
		nemico5.x -= this.x1Vel;
		nemico5.bolla.x -= this.x1Vel;
		
		nemico6.x -= this.x1Vel;
		nemico6.bolla.x -= this.x1Vel;
		
		nemico7.x -= this.x1Vel;
		nemico7.bolla.x -= this.x1Vel;
	}
}