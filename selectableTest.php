<html>

    <!--
            This uses a jQuery Tools
    -->

    <head> 
        <title>OCCF Contacts</title> 

        <!-- include the Tools -->


        <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js"></script>


        
        	<!-- standalone page styling (can be removed) -->
	<link rel="stylesheet" type="text/css" href="/css/standalone.css"/>	


	
	<!-- tab styling -->
	<link rel="stylesheet" type="text/css" href="/css/tabs.css" />
	
	
	<!-- tab pane styling -->
	<style>
	
/* tab pane styling */
.panes div {
	display:none;		
	padding:15px 10px;
	border:1px solid #999;
	border-top:0;
	height:400px;
	font-size:14px;
	background-color:#fff;
}
        </style>
        
        <style type="text/css">
            .ui-selecting {
                background: silver;
            }
            .ui-selected {
                background: gray;
            }
        </style>
        <script>
            $(document).ready(function() {
                var row = document.getElementById("order").insertRow(0);
                
                for (var i = 0; i < 4; i++ ) {
                    var cell = row.insertCell(i);
                    cell.innerHTML = "cell" + i;
                    cell.className = "tdItem";
                }
                $('#order').selectable({filter: ".tdItem"}); 

            });
        </script>

    </head>  

    <body >

        <ul class="tabs">
            <li><a href="#">Calendar</a></li>
            <li><a href="#">Songs</a></li>
            <li><a href="#">Contacts</a></li>
            <li><a href="#">Instruments</a></li>
        </ul>

        <div class="panes">
            <div></div>
            <div ></div>
            <div >
                <table  id="order" >

                </table>
            </div>
            <div ></div>
        </div>



        <!-- This JavaScript snippet activates those tabs -->
        <script>

            // perform JavaScript after the document is scriptable.
            $(function() {
                // setup ul.tabs to work as tabs for each div directly under div.panes
                $("ul.tabs").tabs("div.panes > div");
         
            });
        </script>

    </body>
</html>
