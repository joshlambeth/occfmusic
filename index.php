<!DOCTYPE html>

<html>

    <!--
            This uses a jQuery Tools 
    -->

    <head>
        <title>OCCF Music</title>

        <!-- include the Tools -->
        <!--<script src="http://cdn.jquerytools.org/1.2.6/full/jquery.tools.min.js"></script>-->


        <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js"></script>




        <!-- standalone page styling (can be removed) -->
        <link rel="stylesheet" type="text/css" href="/css/standalone.css"/>	

        <!-- tab styling -->
        <link rel="stylesheet" type="text/css" href="/css/tabs.css?<?php date() ?>" />

    </head>

    <body style="background-color:teal">

        <?php
        require_once('../occfConnect.php');
        echo "Welcome to occf music";
        ?>

        <br /><br />

        <!-- the tabs -->
        <span id="tabs" class="tabView">
            <ul class="tab" >
                <li ><a href="/calendar/calendar.php">Calendar</a></li>
                <li><a href="/songs/songs.php" >Songs</a></li>
                <li><a href="/contacts/contacts.php" >Contacts</a></li>
                <li><a href="/instruments/instruments.php" >Instruments</a></li>

            </ul>

<!--            <span class="panes">
                <div id="calendar" class="pane">calendar</div> 
                <div id="songs" class="pane">songs</div>
               <div id="contacts" class="pane"></div>
                <div id="instruments" class="pane"></div>
            </span>-->
 

        </span>
        <!-- This JavaScript snippet activates those tabs -->
        <script>
            $(function() {
                $( "#tabs" ).tabs();
                //$( "#tabs" ).tabs("span.panes div");
                //$("ul.tabs").tabs("div.panes > div");
            });
        </script>




    </body>

</html>
