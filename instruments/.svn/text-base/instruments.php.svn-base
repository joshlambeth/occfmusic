<html>

<!--
	This uses a jQuery Tools
-->

<head>
	<title>OCCF Instruments</title>

	<!-- include the Tools -->
	<!--<script type="text/javascript" src="http://cdn.jquerytools.org/1.2.6/full/jquery.tools.min.js"></script>-->
        <!-- tab styling -->
<!--        <link rel="stylesheet" type="text/css" href="/css/tabs.css?<?php date() ?>" />-->

        <script type="text/javascript">  

        function getAllInstruments() {
            //alert("getallinstruments");
            $.post("/instruments/getAllInstrumentsHandler.php",
            {  },
            function(data) {
                //alert(data);
                var instrumentsArray = eval(data);
                var text = '<table style="width:600px;">';
                for (var i = 0; i < instrumentsArray.length; i++) {
                    if ((i % 4) == 0) { text += "<tr>"; }
                    text += "<td>" + instrumentsArray[i].instrument_name + "</td>";
                    if ((i % 4) == 3) { text += "</tr>"; }
                }
                text += "</table>"
                document.getElementById("currentInstruments").innerHTML = text;
            }, 
            "text"
            );

        }

        function saveInstrument() {
             $.post("/instruments/addInstrumentHandler.php",
             { instrument: document.getElementById("addInstrument").value },
            function(data) {
                getAllInstruments();
                //alert(data);
                
            },
            "text"
            );
        }

        window.onload=getAllInstruments();
        
        </script>


</head>

<body>

    <br>
 Add Instrument:
 <input type="input" id="addInstrument" name="addInstrument" value=""/>
 <input type="button" id="saveInstrument" name="saveInstrument" value="Save" onclick="saveInstrument()" /><br/><br>

 Current Instruments: <br/><br/>

 <span id="currentInstruments">

 </span>



</body>
</html>