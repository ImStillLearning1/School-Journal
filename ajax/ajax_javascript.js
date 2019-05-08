//Dynamicznie dla Uczniów
    function checkValue(elmnt)
    {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function()
        {
            if(this.readyState == 4 && this.status == 200)
                {
                    document.getElementsByName("student")[0].innerHTML = this.responseText;
                    document.getElementsByName("student")[1].innerHTML = this.responseText;
                }
        };
            xmlhttp.open("GET", "../dziennik/form/values.php?q="+elmnt.value,true);
            xmlhttp.send();
       
    };
        
    //Dynamicznie dla Nauczycieli
    function checkValueTeachers(elmnt)
    {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function()
        {
            if(this.readyState == 4 && this.status == 200)
                {
                    document.getElementsByName("teacherDyn")[0].innerHTML = this.responseText;
                    document.getElementsByName("teacherDyn")[1].innerHTML = this.responseText;
                    document.getElementsByName("teacherDyn")[2].innerHTML = this.responseText;
                }
        };
            xmlhttp.open("GET", "../dziennik/form/values.php?subjectValue="+elmnt.value,true);
            xmlhttp.send();
       
    };