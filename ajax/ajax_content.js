    function showReport(elmnt)
    {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function()
        {
            if(this.readyState == 4 && this.status == 200)
                {
                    document.getElementsByClassName("inputs")[0].innerHTML = this.responseText;
                }
        };
            xmlhttp.open("GET", "/dziennik/reports/"+elmnt.value+".php",true);
            xmlhttp.send();
       
    };

        function showForm(elmnt)
    {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function()
        {
            if(this.readyState == 4 && this.status == 200)
                {
                    document.getElementsByClassName("inputs")[0].innerHTML = this.responseText;
                }
        };
            xmlhttp.open("GET", "/dziennik/form/"+elmnt.value+".php",true);
            xmlhttp.send();
       
    };
        