<!DOCTYPE html>

<html>

    <!--
            This uses a jQuery Tools 
    -->

    <head>
        <title>Create playlist</title>


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

            .playlistInfo {
                width: 100px;
                height:18px;
            }

            .playlistInfo:hover {
                background-color: gainsboro;
            }


        </style>

        <script type="text/javascript">
            
            function launchAddPopup() {
                document.getElementById('addPlaylistPopup').style.display = 'block';
            }
            
            function closeAddPopup() {
                document.getElementById('addPlaylistPopup').style.display = 'none';
            }
            
            function getCurrentPlaylist() {
               
                clearPlaylist();
                //alert("getCurrentPlaylist");
                $.post("/playlists/getAllPlaylistsHandler.php",
                {  },
                function(data) {
                    //alert(data);
                    var playlistsArray = eval(data);
                    for(var i = 0; i < playlistsArray.length; i++) {
                        
                        var row = document.createElement('div');
                        row.id = "slrow-" + playlistsArray[i].playlist_key;
                        row.className = "ui-widget-header";
                        //row.className = "setlistInfo";
                        row.setAttribute('onclick', 'getSongsFromPlaylist("' + playlistsArray[i].playlist_key + '")');
                        row.innerHTML = playlistsArray[i].playlist_title;
                        document.getElementById("currentPlaylists").appendChild(row);
                        
                        $(function() {
                            $( "#slrow-"+ playlistsArray[i].playlist_key).droppable({
                                activeClass: "ui-state-hover",
                                hoverClass: "ui-state-active",
                                accept: ":not(.ui-sortable-helper)",
                                drop: function( event, ui ) {
                                    
                                    addSongtoPlaylist($(this).attr('id').split("-")[1], ui.draggable.attr('id').split("-")[1]);
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
                //alert("getCurrentPlaylist");
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
                                                     
                        $(function() {
                            $( "#row-"+ songsArray[i].songs_key).draggable({ 
                                appendTo: "body", 
                                helper: "clone"
                             });
                        });
                        
                    }    
                }, 
                "text"
            );
            }
            
            function getSongsFromPlaylist(playlistId) {
                clearSongs();
                //alert("getCurrentPlaylist");
                $.post("/playlists/getSongsFromPlaylistHandler.php",
                { playlistId: playlistId },
                function(data) {
                    //alert(data);
                    var songsArray = eval(data);
                    for(var i = 0; i < songsArray.length; i++) {
                        
                        var row = document.createElement('div');
                        row.id = "row-" + songsArray[i].songs_key;
                        row.className = "ui-widget-content";
                        row.className = "highlight";
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
                            $( "#row-"+ songsArray[i].songs_key).draggable({ 
                                appendTo: "body", 
                                helper: "clone"
                             });
                        });
                        
                    }    
                }, 
                "text"
            );
            
            
            }
            
            function createPlaylist() {
            alert('createPlaylist');
                $.post("/playlists/addPlaylistHandler.php",
                { 
                    playlistTitle: document.getElementById("playlistTitle").value,
                    playlistDescription: document.getElementById("playlistDescription").value,
                    playlistCreator: document.getElementById("playlistCreator").value
                },
                function(data) {
                    alert(data);
                    closeAddPopup();
                    getCurrentPlaylist();
                    document.getElementById("playlistTitle").value = "";
                    document.getElementById("playlistDescription").value = "";
                    document.getElementById("playlistCreator").value = "";
                }, 
                "text"
            );
                
            }
            
            function addSongtoPlaylist(playlist, song) {
                //alert( setlist + " " + song);
                $.post("/playlists/addPlaylistSongsAssociationHandler.php",
                { 
                    playlistId: playlist,
                    songsId: song
                },
                function(data) { 
                    //alert(data);
                   
                }, 
                "text"
            );
            }
            
            function clearPlaylist() {
                //                for(var i = document.getElementById("setlistTable").rows.length; i > 0;i--)
                //                {
                //                    document.getElementById("setlistTable").deleteRow(i -1);
                //                }
                document.getElementById("currentPlaylists").innerHTML = "";
              
            }
            
            function clearSongs() {
                document.getElementById("songs").innerHTML = "";
                
            }
            
            $(document).ready(function() {
                getCurrentPlaylist();
                getAllSongs();
         
            });
            
        </script>

    </head>

    <body >

        <span id="addPlaylistPopup" style="display:none;position:absolute;width:200px;height:150px;background-color: white; top:30px; left:100px; border:solid black 1px; padding:15px;z-index: 10 ">
            Playlist Name: <br>
            <input id="playlistTitle" name="playlistTitle"/><br><br>
            Playlist Description: <br>
            <input id="playlistDescription" name="playlistDescription"/><br><br>
            Created By: <br>
            <input id="playlistCreator" name="playlistCreator"/><br><br>
            <input type="button" value="add" onclick="createPlaylist()">
            <input type="button" value="close" onclick="closeAddPopup()">

        </span>

        <input type="button" value="Add Playlist" onclick="launchAddPopup()" />
        
        <div onclick="getAllSongs()" class="playlistInfo" style="position: absolute; left: 5px; top: 40px; width: 200px">All Songs</div>
        
        <div style="position: absolute; left: 5px; top: 70px; width: 200px">Playlists: </div>
        <span id="currentPlaylists" style="position: absolute; left: 5px; top: 90px; width: 200px">

        </span>

        <span id="songs" style="position: absolute; left: 205px; top: 30px; ">
<!--            <table id="songsTable">


            </table>-->

        </span>




    </body>
</html>
