<!DOCTYPE html>

<html>

    <!--
            This uses a jQuery Tools 
    -->

    <head>
        <title>Create setlist</title>


        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js"></script>

        <style>
            .highlight {
                width: 300px;
                height:18px;
            }
            .highlight:hover {
                background-color: gray; 
            }

            .titleInfo {
                float: left;
                width: 200px;
                height:18px;
            }

            .writerInfo {
                float: left;
                width: 100px;
                height:18px;
            }

            .setlistInfo {
                width: 100px;
                height:18px;
            }

            .setlistInfo:hover {
                background-color: gainsboro;
            }


        </style>

        <script type="text/javascript">
            
            function launchAddPopup() {
                document.getElementById('addSetlistPopup').style.display = 'block';
            }
            
            function closeAddPopup() {
                document.getElementById('addSetlistPopup').style.display = 'none';
            }
            
            function getCurrentSetlist() {
               
                clearSetlist();
                //alert("getCurrentSetlist");
                $.post("/setLists/getAllSetlistsHandler.php",
                {  },
                function(data) {
                    //alert(data);
                    var setlistsArray = eval(data);
                    for(var i = 0; i < setlistsArray.length; i++) {
                        
                        var row = document.createElement('div');
                        row.id = "slrow-" + setlistsArray[i].set_list_key;
                        row.className = "ui-widget-header";
                        //row.className = "setlistInfo";
                        row.setAttribute('onclick', 'getSongsFromSetlist("' + setlistsArray[i].set_list_key + '")');
                        row.innerHTML = setlistsArray[i].set_list_name;
                        document.getElementById("currentSetlists").appendChild(row);
                        
                        $(function() {
                            $( "#slrow-"+ setlistsArray[i].set_list_key).droppable({
                                activeClass: "ui-state-hover",
                                hoverClass: "ui-state-active",
                                //accept: ":not(.ui-sortable-helper)",
                                //accept: ".song",
                                drop: function( event, ui ) {
                                    
                                    addSongtoSetlist($(this).attr('id').split("-")[1], ui.draggable.attr('id').split("-")[1]);
                                    //alert(ui.draggable.attr('id'));
                                    //ui.draggable.innerHTML;
                                    $( this ).addClass( "ui-state-highlight" )
                                    //.find( "p" )
                                    //.html( "Dropped!" );
                                }
                            });                           
                        });                       
                    }
                
                }, 
                "text"
            );
            }
            
            function getAllSongs() {
               
                clearSongs();
                //alert("getCurrentSetlist");
                $.post("/songs/getAllSongsHandler.php",
                {  },
                function(data) {
                    //alert(data);
                    var songsArray = eval(data);
                    for(var i = 0; i < songsArray.length; i++) {
                        
                        var row = document.createElement('div');
                        row.id = "row-" + songsArray[i].songs_key;
                        row.className = "ui-widget-content";
                        row.className = "highlight";
                        
                        document.getElementById("songs").appendChild(row);
                         
                        var title = document.createElement('span');
                        title.innerHTML = songsArray[i].songs_title; 
                        title.className = "titleInfo";
                        title.style.width = "200px";
                        document.getElementById("row-" + songsArray[i].songs_key).appendChild(title);     
                        
                        var writer = document.createElement('span');
                        writer.innerHTML = songsArray[i].songs_writer; 
                        writer.className = "writerInfo";
                        writer.style.width = "100px";
                        document.getElementById("row-" + songsArray[i].songs_key).appendChild(writer);
                        //document.getElementById("row-" + songsArray[i].songs_key).onclick = function() { getSongsFromSetlist(songsArray[i].songs_key);};
                                                     
                        //                        $(function() { 
                        //                            $( "#row-"+ songsArray[i].songs_key).draggable({ 
                        //                                connectToSortable: "#songs", 
                        //                                helper: "clone",
                        //                                revert: "invalid"
                        //                            });       
                        //                        });                  
                    } 
                    $(function() { 
                        
                        $("#songs").sortable({
                            revert: true
                        });
                        $(".highlight").draggable({ 
                            connectToSortable: "#songs", 
                            helper: "clone",
                            revert: "invalid"
                
                        });
                        
                        $(".highlight").disableSelection();
                         
                         
                    });
                }, 
                "text"
            );
            }
            
            function getSongsFromSetlist(setlistId) {
                clearSongs();
                //alert("getCurrentSetlist");
                $.post("/setLists/getSongsFromSetlistHandler.php",
                { setlistId: setlistId },
                function(data) {
                    //alert(data);
                    var songsArray = eval(data);
                    for(var i = 0; i < songsArray.length; i++) {
                        
                        var row = document.createElement('div');
                        row.id = "row-" + songsArray[i].songs_key;
                        row.className += "ui-widget-content";
                        row.className += " highlight";
                        row.className += " song"
                        //row.onclick = function() { getSongsFromSetlist(songsArray[i].songs_key);};
                        document.getElementById("songs").appendChild(row);
                         
                        var title = document.createElement('span');
                        title.innerHTML = songsArray[i].songs_title; 
                        title.className = "titleInfo";
                        title.style.width = "200px";
                        document.getElementById("row-" + songsArray[i].songs_key).appendChild(title);     
                        
                        var writer = document.createElement('span');
                        writer.innerHTML = songsArray[i].songs_writer; 
                        writer.className = "writerInfo";
                        writer.style.width = "100px";
                        document.getElementById("row-" + songsArray[i].songs_key).appendChild(writer);
                        //document.getElementById("row-" + songsArray[i].songs_key).onclick = function(){ getSongsFromSetlist(songsArray[i].songs_key);};
                                    
                        $(function() {   
                            $("#songs").sortable({
                                revert: true
                            });
                            
                            $( "#row-"+ songsArray[i].songs_key).draggable({  
                                helper: "clone",
                                revert: "invalid"
                            }); 
                            $( "#row-"+ songsArray[i].songs_key).sortable({  
                                //                                helper: "clone",
                                //                                revert: "invalid"
                            });                        
                        });    
                    }    
                }, 
                "text"
            );
            
            
            }
            
            function createSetlist() {
                $.post("/setLists/addSetlistHandler.php",
                { 
                    setlistName: document.getElementById("setlistName").value,
                    setlistCreator: document.getElementById("setlistCreator").value
                },
                function(data) {
                    //alert(data);
                    closeAddPopup();
                    getCurrentSetlist();
                    document.getElementById("setlistName").value = "";
                    document.getElementById("setlistCreator").value = "";
                }, 
                "text"
            );
                
            }
            
            function addSongtoSetlist(setlist, song) {
                //alert( setlist + " " + song);
                $.post("/setLists/addSetlistSongsAssociationHandler.php",
                { 
                    setlistId: setlist,
                    songsId: song
                },
                function(data) { 
                    //alert(data);
                   
                }, 
                "text"
            );
            }
            
            function launchEditPopup() {
                document.getElementById('editPopup').style.display = 'block';
                
            }
            
            function saveEditChanges() {           
                //save changes;
                document.getElementById('editPopup').style.display = 'none';
            }
            
            function cancelEditChanges() {           
                document.getElementById('editPopup').style.display = 'none';
            }
            
            
            function clearSetlist() {
                //                for(var i = document.getElementById("setlistTable").rows.length; i > 0;i--)
                //                {
                //                    document.getElementById("setlistTable").deleteRow(i -1);
                //                }
                document.getElementById("currentSetlists").innerHTML = "";
              
            }
            
            function clearSongs() {
                document.getElementById("songs").innerHTML = "";
                
            }
            
            $(document).ready(function() {
                getCurrentSetlist();
                getAllSongs();
                $("#currentSetlists").sortable({

                });
                $("#songs").sortable({
                    revert: true
                });
                $(".highlight").draggable({ 
                    connectToSortable: "#songs", 
                    helper: "clone",
                    revert: "invalid"
                
                });
                
                $("#editPopup").draggable({});
           
                $("#songs").disableSelection();
                $(".highlight").disableSelection();
         
            });
            
        </script>

    </head>

    <body >

        <span id="addSetlistPopup" style="display:none;position:absolute;width:200px;height:150px;background-color: white; top:30px; left:100px; border:solid black 1px; padding:15px;z-index: 10 ">
            SetList Name: <br>
            <input id="setlistName" name="setlistName"/><br><br>
            Created By: <br>
            <input id="setlistCreator" name="setlistCreator"/><br><br>
            <input type="button" value="add" onclick="createSetlist()">
            <input type="button" value="close" onclick="closeAddPopup()">

        </span>

        <input type="button" value="Add Setlist" onclick="launchAddPopup()" />

        <div onclick="getAllSongs()" class="setlistInfo" style="position: absolute; left: 5px; top: 40px; width: 200px">All Songs</div>

        <div style="position: absolute; left: 5px; top: 70px; width: 200px">Setlists: </div>

        <span id="currentSetlists" style="position: absolute; left: 5px; top: 90px; width: 200px">

        </span>

        <div style="position: absolute; left: 205px; top: 10px; ">
            <span>Setlist </span><input type="button" value="Edit Setlist" onclick="launchEditPopup()" /><br>
            
            <br>


            <span id="songs">


            </span>

        </div>


        <div id="editPopup" style="display:none;border-style:solid;border-width:1px;border-color:#000000;width:500px;height:400px;z-index:10;background-color:white">
            <span>Setlist </span><input type="button" value="Save Changes" onclick="saveEditChanges()"/><input type="button" value="Cancel" onclick="cancelEditChanges()"/><br>
            <span>Name:</span><br>
            <input type="text" /><br><br> 


        </div>





    </body>
</html>
