function createHero(w,h,canvas,imageURL,completeCallback) {

    var canvasWidth = canvas.width;var context = canvas.getContext('2d');
    var canvasHeight = canvas.height;

    var x = canvasWidth/2-w/2;//飞机水平居中
    var y = canvasHeight - h - 20;//飞机垂直底部向上20像素

    var hero = new Hero(x,y,w,h,imageURL,completeCallback);

    document.onkeydown = function (event) {
        var event = event || window.event;
        switch (event.keyCode) {
            case 37 : {
                hero.left = true;
                break;
            }
            case 38 : {
                hero.up = true;
                break;
            }
            case 39 : {
                hero.right = true;
                break;
            }
            case 40 : {
                hero.down = true;
                break;
            }
        }
    }
        document.onkeyup = function (event) {
            var event = event || window.event;
            switch (event.keyCode){
                case 37 :{hero.left = false;break;}
                case 38 :{hero.up = false;break;}
                case 39 :{hero.right = false;break;}
                case 40 :{hero.down = false;break;}
            }
    }
    timer = setInterval(function () {
        if(hero.left == true)hero.x-=2;
        if(hero.up == true)hero.y-=2;
        if(hero.right == true)hero.x+=2;
        if(hero.down == true)hero.y+=2;
    },10)

    return hero;
}
function Hero(x,y,w,h,imageURL,completeCallback) {
    this.x = x;
    this.y = y;
    this.w = w;
    this.h = h;

    this.image = new Image();

    this.image.onload = function () {
        if(completeCallback){
            completeCallback(this);
        }
    }
    //添加图片源
    this.image.src = imageURL;

    //图片开关
    this.bool = true;
}
Hero.prototype.draw = function (canvas) {
    var context = canvas.getContext('2d');
    var x = this.w*this.bool;
    var w = this.w;
    var h = this.h;
    context.drawImage(this.image,x,0,w,h,this.x,this.y,w,h);

    this.bool = !this.bool;
}