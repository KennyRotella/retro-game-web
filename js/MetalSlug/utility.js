var Animation = function(start,end,delay1,source){
	this.frame = new Array();
	this.currentFrame = 0;
	this.delay = delay1;
	this.countDelay = 0;
	
	for(var i=start; i<end; i++){
		this.frame[i-start] = new Image;
		this.frame[i-start].src = source + i + '.png';
	}
}


function drawCanvas(img,x,y){
	ctx.drawImage(img,0,0,img.width,img.height,x,y,img.width,img.height); //img,sx,sy,swidth,sheight,x,y,width,height
}

function drawAnimation(obj,x,y){ //stampa ciclicamente un immagine per volta di un array 
	drawCanvas(obj.frame[obj.currentFrame],x,y);
	if(obj.countDelay < obj.delay){ 
		obj.countDelay++;
	} else if(obj.currentFrame >= obj.frame.length-1){
		obj.currentFrame = 0;
		obj.countDelay=0;
	} else {
		obj.currentFrame++;
		obj.countDelay=0;
	}
}