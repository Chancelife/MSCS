var i=-130
var intHide
var speed=5

function showmenu()
{
    clearInterval(intHide)
    intShow=setInterval("show()",5)
}

function hidemenu()
{
    clearInterval(intShow)
    intHide=setInterval("hide()",20)
}

function show()
{
    if (i<-12)
    {
        i=i+speed
        document.getElementById('myMenu').style.left=i
    }
}

function hide()
{
    if (i>-130){
        i=i-speed
        document.getElementById('myMenu').style.left=i
    }
}