<html>
    <head>
        <script type="text/javascript">
        function getCalendar() {
        //alert("cal" );
        $.post("/calendar/getMonth.php",
        { 
               
        },
        function(data) {
            //alert(data);
            document.getElementById("cal").innerHTML = data;
                 
        },
        "text"
    );
        //hideAddContact();
    }
    

         $(document).ready(function() {
        getCalendar();
         
    });
    

        </script>   
    
    </head>
    <body>
        <span id="cal">
            
            
            
        </span>
        
        
        
        
        
        
    </body>
    
</html>