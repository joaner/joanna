// system.js


function __show(){
	var self = this;
	
	this.navElement = document.getElementById('header-nav');
	this.navOffset = {
		top:  this.navElement.offsetTop,
		left: this.navElement.offsetLeft
		};

	this.nav = function(e){
		if( document.body.scrollTop >= self.navOffset.top ){
			self.navElement.style.position = 'fixed';
			self.navElement.style.top = '0px';
			self.navElement.style.left = self.navOffset.left + 'px';
			self.navElement.style.zIndex = 100;
		}else{
			self.navElement.style.position = 'static';
			self.navElement.style.zIndex = 1;
		}
	}
}


var show;

window.onload = function(){
	show = new __show();
	window.onscroll = show.nav;
}
