/*window.addEventListener("click",function(){
                                    let elementTarget = event.target;
                                    if(elementTarget.className == "button"){
                                        const x = document.querySelectorAll(".visibility_form");
                                        if(x.length > 0){

                                            for(let y=0; y < x.length;y++) {
                                                x[y].classList.remove("visibility_form");
                                            }
                                        }

                                        document.getElementById(elementTarget.value.slice(4)+"s").className = "visibility_form";
                                    }
                                });
window.addEventListener("click",function(){
                            let elementTarget = event.target;
                            if(elementTarget.className == "button1"){
                                let x = elementTarget.value;
                                document.getElementsByClassName("menu")[0].innerHTML = '<a href="index.php">Powrót</a><div id="dynamic_menu" w3-include-html="menu/menu_'+x+'.html"></div>';
                                includeHTML();
                            }
});*/

window.addEventListener("click",function(){
                            let elementTarget = event.target;
                            if(elementTarget.className == "hamburger-menu" || elementTarget.className == "bar" || elementTarget.className == "hamburger-animate"){
                                if(document.getElementsByClassName("menu")[0].classList.contains("hamburger-menu-active"))
                                    {
                                        document.getElementsByClassName("menu")[0].classList.remove("hamburger-menu-active");
                                        document.getElementsByClassName("menu")[0].classList.add("hamburger-menu-hidden");
                                    }
                                else
                                    {
                                        document.getElementsByClassName("menu")[0].classList.remove("hamburger-menu-hidden");
                                        document.getElementsByClassName("menu")[0].classList.add("hamburger-menu-active");
                                    }
                               
                            }
});

window.addEventListener("click",function(){
                        let elementTarget = event.target;
                        if(elementTarget.className == "button" || elementTarget.className == "button2")
                            {
                                var z = document.querySelector(".active");
                                if(z)
                                {
                                    z.classList.remove("active");
                                }
                                    var x = elementTarget.parentNode;
                                    x.classList.add("active"); 
                            }
});

window.addEventListener("click",function(){
                        let elementTarget = event.target;
                        if(elementTarget.className == "button" || elementTarget.className == "button2")
                            {
                                var z = document.querySelector(".active");
                                if(z)
                                {
                                    z.classList.remove("active");
                                }
                                    var x = elementTarget.parentNode;
                                    x.classList.add("active"); 
                            }
});

window.addEventListener("click",function(){
                        let elementTarget = event.target;
                        if(elementTarget.className == "hamburger-animate" || elementTarget.className == "bar")
                            {
                                return;
                            }
                        if(elementTarget.className == "hamburger-menu" || elementTarget.className == "bar")
                            {
                                document.getElementsByClassName("hamburger-menu")[0].classList.add("hamburger-animate");
                                setTimeout(function(){document.getElementsByClassName("hamburger-menu")[0].classList.remove("hamburger-animate")}, 1500);
                            }
});

function pop_up(event)
{
    var x = event.screenX;
    var y = event.screenY;
    var x1 = event.offsetX;
    var y1 = event.offsetY;
    
    var x = x-x1-140;
    var y = y-y1-78;
    
    document.getElementsByClassName("pop-up")[0].style.left = x+"px";
    document.getElementsByClassName("pop-up")[0].style.top = y+"px";
    document.getElementsByClassName("pop-up")[0].style.opacity = "1";
    document.getElementsByClassName("pop-up")[0].style.transition = "opacity 1s ease-in-out";
    document.getElementsByClassName("pop-up")[0].style.visibility = "visible";
}

function pop_upOut(event)
{
    setTimeout(function(){document.getElementsByClassName("pop-up")[0].style.opacity = "0";
    document.getElementsByClassName("pop-up")[0].style.transition = "1s ease-in-out";
    document.getElementsByClassName("pop-up")[0].style.visibility = "hidden";},1000);
}

window.addEventListener("click",function(){
                        let elementTarget = event.target;
                        if(elementTarget.value != "show_student" && elementTarget.value != "show_class")
                            {
                                document.getElementsByClassName("dropdown__class")[0].style.display = "none";
                                document.getElementsByClassName("dropdown_student")[0].style.display = "none";
                            }
                        if(elementTarget.value == "show_student")
                            {
                                if(document.getElementsByClassName("dropdown__class")[0].style.display == "block")
                                    {
                                        document.getElementsByClassName("dropdown__class")[0].style.display = "none";
                                    }
                                document.getElementsByClassName("dropdown_student")[0].style.display = "block";
                            }
                        if(elementTarget.value == "show_class")
                            {
                                    if(document.getElementsByClassName("dropdown_student")[0].style.display == "block")
                                    {
                                        document.getElementsByClassName("dropdown_student")[0].style.display = "none";
                                    }
                                document.getElementsByClassName("dropdown__class")[0].style.display = "block";

                            }
                        
})
