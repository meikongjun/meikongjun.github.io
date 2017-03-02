var a = document.getElementById("ul_two");
var b = document.getElementsByClassName("img4");
var c = document.getElementById("divs");
var d = document.getElementsByClassName("btn");
var e = document.getElementsByClassName("divs")[0];
var f = document.getElementById("divs1");
var g = document.getElementById("divs2");
var h = document.getElementById("divs3");
// var i = document.getElementById("btn1");
    for(var i = 0; i < b.length;i++){
        (function (i) {
            b[i].onclick = function () {
                switch(i){
                    case 0 :
                        c.style.visibility = "visible";
                    break;
                    case 1 :
                        f.style.visibility = "visible";
                    break;
                    case 2 :
                        g.style.visibility = "visible";
                        break;
                    case 3 :
                        h.style.visibility = "visible";
                        break;
                }
            }
        })(i)
    }
    for(var i= 0;i < d.length;i++){
        d[i].onclick = function () {
            // $(this).parent().css({visibility:"hidden"})
            this.parentNode.style.visibility = "hidden";
        }
    }




