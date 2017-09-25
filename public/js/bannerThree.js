var banner = $('.bannerThree');
var W = banner.attr('bWidth')?banner.attr('bWidth'):0;
var H = banner.attr('bHeight')?banner.attr('bHeight'):0;
typeof(Number(W))
banner.css('width', (Number(W) != 0)?W + 'px':'100%');
banner.css('height', H + 'px');
var imgs = Array();
$(banner.children('img')).each(function(i, n){
	imgs[i] = $(n).attr('src');
});
var w = (Number(W) != 0)?W + 'px':'100%';
banner.html('<img class="_img" src="" style="width: '+ w +'; height: '+ H +'px;"/>');
var item = 0;
$('._img').attr('src', imgs[0]);

var Inte;
function bannerThreeAction()
{
	clearInterval(Inte);
	Inte = setInterval(function(){
		if(item >= imgs.length)
		{
			item = 0;
		}
		$('._img').attr('src', imgs[item]);
		item ++;
	}, 2000);
}
bannerThreeAction();
banner.append('<span class="glyphicon glyphicon-chevron-left"></span>');
banner.append('<span class="glyphicon glyphicon-chevron-right"></span>');
banner.children('.glyphicon').css('line-height', H+'px');

$(banner.children('.glyphicon-chevron-left')).on('click', function(){
	item = (item-1 < 0)?imgs.length-1:item-1;
	$('._img').attr('src', imgs[item]);
	bannerThreeAction();
});
$(banner.children('.glyphicon-chevron-right')).on('click', function(){
	item = (item+1 == imgs.length)?0:item+1;
	$('._img').attr('src', imgs[item]);
	bannerThreeAction();
});

banner.hover(
  	function(){
  		banner.children('.glyphicon').fadeIn(1000);
  	},
  	function(){
  		banner.children('.glyphicon').fadeOut(1000);
  	}
);