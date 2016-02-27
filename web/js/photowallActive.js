$(document).ready(function(){
PhotoWall.init({
el: '#gallery' // Gallery element
,zoom: true // Use zoom
,zoomAction: 'mouseenter' // Zoom on action
,zoomTimeout: 500 // Timeout before zoom
,zoomDuration: 100 // Zoom duration time
,showBox: true // Enavle fullscreen mode
,showBoxSocial: true // Show social buttons
,padding: 10 // padding between images in gallery
,lineMaxHeight: 150 // Max set height of pictures line
// (may be little bigger due to resize to fit line)
});

/*

Photo object consist of:

{ // big image src,width,height and also image id
id:
,img: //src
,width:
,height:
,th:{
src: //normal thumbnail src
zoom_src: //zoomed normal thumbnail src
zoom_factor: // factor of image zoom
,width: //width of noraml thumbnail
,height: //height of noraml thumbnail
}
};

*/

var PhotosArray = new Array(
{id:1,img:'http://huitoto.olympe.in/web/img/slider1/example/001.jpg',width:500,height:400,
th:{src:'http://huitoto.olympe.in/web/img/slider1/example/001.jpg',width:80,height:40,
zoom_src:'http://huitoto.olympe.in/web/img/slider1/example/001.jpg',zoom_factor:4
}
}/*,
{id:2,img:'img_big2.jpg',width:500,height:400,
th:{src:'img_small2.jpg',width:50,height:40,
zoom_src:'img_zoomed2.jpg',zoom_factor:4
}
},
{id:3,img:'img_big3.jpg',width:500,height:400,
th:{src:'img_small3.jpg',width:50,height:40,
zoom_src:'img_zoomed3.jpg',zoom_factor:4
}
},
{id:4,img:'img_big4.jpg',width:500,height:400,
th:{src:'img_small4.jpg',width:50,height:40,
zoom_src:'img_zoomed4.jpg',zoom_factor:4
}
}*/
);

PhotoWall.load(PhotosArray);
});