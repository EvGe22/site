//1. set sliderDiv width 
//2. image when click prev/next button
var sliderDiv;
var images;
var imageNumber;
var pagers;
var prev, next;
var currentPostion = 0;
var currentImage = 0;
var interval;


function init(){
	sliderDiv = document.getElementById('image_slider');
	images = sliderDiv.children;
	imageNumber = images.length;
	prev = document.getElementById("prev");
	next = document.getElementById("next");
	generatePager(imageNumber);
	
	prev.onclick = function(){ onClickPrev();};
	next.onclick = function(){ onClickNext();};

	slideTo(0);
	interval = setInterval(autoSlide,4000);
}



function slideTo(imageToGo){
	console.log();
	images[currentImage].style.display = "none";
	pagers[currentImage].style.background = "black";

	images[imageToGo].style.display = "block";
	pagers[imageToGo].style.background = "white";

	currentImage = imageToGo;

}

function onClickPrev(){
	if (currentImage == 0){
		slideTo(imageNumber - 1);
	} 		
	else{
		slideTo(currentImage - 1);
	}	
	clearInterval(interval);
	interval = setInterval(autoSlide,4000);	
}

function onClickNext(){
	if (currentImage == imageNumber - 1){
		slideTo(0);
	}		
	else{
		slideTo(currentImage + 1);
	}		
	clearInterval(interval);
	interval = setInterval(autoSlide,4000);
}

function autoSlide(argument) {
	if (currentImage == imageNumber - 1){
		slideTo(0);
	}		
	else{
		slideTo(currentImage + 1);
	}		
}

function generatePager(imageNumber){	
	var pageNumber;
	var pagerDiv = document.getElementById('pager');
	for (i = 0; i < imageNumber; i++){
		var li = document.createElement('li');
		pagerDiv.appendChild(li);
		// add event inside a loop, closure issue.
		li.onclick = function(i){
			return function(){
				slideTo(i);
			}
		}(i);
	}	
	var computedStyle = document.defaultView.getComputedStyle(li, null);
	//border width 1px; offsetWidth = 22
	var liWidth = parseInt(li.offsetWidth);
	var liMargin = parseInt(computedStyle.margin.replace('px',""));
	pagerDiv.style.width = parseInt((liWidth + liMargin * 2) * imageNumber) + 'px';
	pagers = pagerDiv.children;
	console.log(pagers.length);

}
window.onload = init;
