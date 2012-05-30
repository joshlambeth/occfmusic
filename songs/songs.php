<html>

    <!--
            This uses a jQuery Tools
    -->

    <head> 
        <title>OCCF Songs</title> 

        <!-- include the Tools -->


<!--        <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js"></script>
 tab styling 
        <link rel="stylesheet" type="text/css" href="/css/tabs.css?<?php date() ?>" />-->

        <style type="text/css">
            .ui-selecting {
                background: silver;
            }
            .ui-selected {
                background: lightgrey;
            }
            .ui-state-hover {
                background: gainsboro;
            }

            .selected {
                background: lightgrey;
            }

            .unselected {
                background: white;
            }

            .songInput {
                width: 250px;
            }
        </style>


        <script type="text/javascript">
          

            function getAllSongs() {
                //alert("getallcontacts");
                
                $.post("/songs/getAllSongsHandler.php",
                {  },
                function(data) {  
                    //alert(data);
                    var songsArray = eval(data);
                    for (var i = 0; i < songsArray.length; i++) {
                        var row = document.getElementById("songList").insertRow(i); 
                        var cell = row.insertCell(0);
                        cell.innerHTML = songsArray[i].songs_title;    
                        cell.className = "tdItem";
                        cell.id = "song-" + songsArray[i].songs_key;
                       
                    }
                    $(".tdItem").hover(
                    function () {
                        $(this).addClass('ui-state-hover');
                    }, 
                    function () {
                        $(this).removeClass('ui-state-hover');
                    });
                    
                    $(".tdItem").click(function() {
                        $(this).parent().parent().children().children().removeClass("selected");
                        $(this).addClass("selected");
                        updateCurrentSong($(this));
                        document.getElementById("updateSong").style.display = 'none';
                        document.getElementById("editSong").style.display = 'block';
                        document.getElementById("deleteSong").style.display = 'block';
                        document.getElementById("saveSong").style.display = 'none';
                    });
                },
            
                "text"
            );
                  
            }

            function saveSong() {
                //alert(document.getElementById("visibility").checked );
                $.post("/songs/addSongsHandler.php",
                { 
                    title: document.getElementById("title").value, 
                    writer: document.getElementById("writer").value,
                    performer: document.getElementById("performer").value,
                    publisher: document.getElementById("publisher").value,
                    copyrightDate: document.getElementById("copyrightDate").value,
                    key: document.getElementById("key").value,
                    submittedBy: document.getElementById("submittedBy").value,
                    notes: document.getElementById("notes").value,
                    url: document.getElementById("url").value,
                    mp3Url: document.getElementById("mp3Url").value,
                    slidesUrl: document.getElementById("slidesUrl").value,
                    date: document.getElementById("date").value,
                    visibility: document.getElementById("visibility").checked   
                },
                function(data) {
                    //alert(data);
                    document.getElementById("songList").innerHTML = "";
                    getAllSongs(); 
                    showUpload(false);
                    getSongById(data)
                },
                "text"
            );
                //hideAddContact();
            }
            
            function editSong (){
                isFormReadOnly(false);
                document.getElementById("updateSong").style.display = 'block';
                document.getElementById("editSong").style.display = 'none';
                document.getElementById("deleteSong").style.display = 'none';
                document.getElementById("saveSong").style.display = 'none';
                
                showUpload(true);
                
            }
            
            function updateSong() {
                var sure = confirm("Are you sure you want to edit song?");
                if (sure) {
                    var songKey = document.getElementById("id").value;
                    //alert(songKey);
                    //deleteAllInstrumentsFromContact(contactKey);
                    
                    $.post("/songs/editSongsHandler.php",
                    { 
                        id: document.getElementById("id").value,
                        title: document.getElementById("title").value, 
                        writer: document.getElementById("writer").value,
                        performer: document.getElementById("performer").value,
                        publisher: document.getElementById("publisher").value,
                        copyrightDate: document.getElementById("copyrightDate").value,
                        key: document.getElementById("key").value,
                        submittedBy: document.getElementById("submittedBy").value,
                        notes: document.getElementById("notes").value,
                        url: document.getElementById("url").value,
                        mp3Url: document.getElementById("mp3Url").value,
                        slidesUrl: document.getElementById("mp3Url").value,
                        date: document.getElementById("date").value,
                        visibility: document.getElementById("visibility").checked   
                    },
                    function(data) {
                        //alert(data);
                        //saveContactInstrumentAssociations();
                        document.getElementById("songList").innerHTML = "";
                        getAllSongs();      
                
                    },
                    "text"
                );
                                   
            
                }
                else {
                     
                }
            }
            
            
            function updateCurrentSong(selectedObject) {
                //getContactById(selectedObject);
                var id = selectedObject.attr("id").split("-")[1];
                getSongById(id);
                
                //getAllInstrumentsFromContact(id);
                //alert(id);
                
            }
            
            function getSongById (selectedObject) {
                $.post("/songs/getSongFromIdHandler.php",
                { id: selectedObject },
                function(data) {  
                    //alert(data);
                    var songsArray = eval(data);
                    for (var i = 0; i < songsArray.length; i++) {
                        document.getElementById('title').value = songsArray[i].songs_title;
                        document.getElementById('writer').value = songsArray[i].songs_writer;
                        document.getElementById('performer').value = songsArray[i].songs_performer;
                        document.getElementById('publisher').value = songsArray[i].songs_publisher;
                        document.getElementById('copyrightDate').value = songsArray[i].songs_copyright_date;
                        document.getElementById('key').value = songsArray[i].songs_key_of;
                        document.getElementById('submittedBy').value = songsArray[i].songs_submitted_by;
                        document.getElementById('notes').value = songsArray[i].songs_notes;
                        document.getElementById('urlLink').href = songsArray[i].songs_url;
                        document.getElementById('mp3UrlLink').href = songsArray[i].songs_mp3_url;
                        document.getElementById('slidesUrlLink').href = songsArray[i].songs_slides_url;
                        document.getElementById('urlLink').innerHTML = songsArray[i].songs_url;
                        document.getElementById('mp3UrlLink').innerHTML = songsArray[i].songs_mp3_url;
                        document.getElementById('slidesUrlLink').innerHTML = songsArray[i].songs_slides_url;
                        document.getElementById('date').value = songsArray[i].songs_date;                       
                        document.getElementById('id').value = songsArray[i].songs_key;
                        
                        showUpload(false);
                        
                        if ( songsArray[i].songs_visible == "1") {
                            
                            document.getElementById('visibility').checked = true;
                        }
                        else {
                            document.getElementById('visibility').checked = false;
                        }
                        //document.getElementById('visibility').value = contactsArray[i].contact_visibility;
                        
                        isFormReadOnly(true);
                        showUpload(false);
                       
                    }
                    
                },
            
                "text"
            );
                             
            }
            
            function isFormReadOnly(isReadOnly) {
                document.getElementById('title').readOnly = isReadOnly;
                document.getElementById('writer').readOnly = isReadOnly;
                document.getElementById('performer').readOnly = isReadOnly;
                document.getElementById('publisher').readOnly = isReadOnly;
                document.getElementById('copyrightDate').readOnly = isReadOnly;
                document.getElementById('key').readOnly = isReadOnly;
                document.getElementById('submittedBy').readOnly = isReadOnly;
                document.getElementById('notes').readOnly = isReadOnly;
                document.getElementById('url').disabled = isReadOnly;
                document.getElementById('mp3Url').disabled = isReadOnly;
                document.getElementById('slidesUrl').disabled = isReadOnly;
                document.getElementById('urlUpload').disabled = isReadOnly;
                document.getElementById('mp3UrlUpload').disabled = isReadOnly;
                document.getElementById('slidesUrlUpload').disabled = isReadOnly;
                document.getElementById('date').readOnly = isReadOnly;
                document.getElementById('visibility').disabled = isReadOnly;
                //        var instruments = document.getElementsByName('instruments');
                //        for (var i = 0; i < instruments.length; i++)
                //        {
                //            instruments[i].disabled = isReadOnly;
                //        }
            }
            
            function showUpload(isVisible) {
                if (isVisible) {
                    document.getElementById('url').style.display="block";
                    document.getElementById('mp3Url').style.display="block";
                    document.getElementById('slidesUrl').style.display="block";
                    document.getElementById('urlUpload').style.display="block";
                    document.getElementById('mp3UrlUpload').style.display="block";
                    document.getElementById('slidesUrlUpload').style.display="block";
                }
                else {
                    document.getElementById('url').style.display="none";
                    document.getElementById('mp3Url').style.display="none";
                    document.getElementById('slidesUrl').style.display="none";
                    document.getElementById('urlUpload').style.display="none";
                    document.getElementById('mp3UrlUpload').style.display="none";
                    document.getElementById('slidesUrlUpload').style.display="none";
                }
            }
        
            function showAddSong() {
                document.getElementById("add").style.display="block";
            }
        
            function hideAddSong() {
                document.getElementById("add").style.display="none";
            }

           
            
            function clearForm() {
                document.getElementById('title').value = '';
                document.getElementById('writer').value = '';
                document.getElementById('performer').value = '';
                document.getElementById('publisher').value = '';
                document.getElementById('copyrightDate').value = '';
                document.getElementById('key').value = '';
                document.getElementById('submittedBy').value = '';
                document.getElementById('notes').value = '';
                document.getElementById('url').value = '';
                document.getElementById('mp3Url').value = '';
                document.getElementById('slidesUrl').value = '';
                document.getElementById('date').value = '';
                document.getElementById('visibility').checked = false;
                //        var instruments = document.getElementsByName('instruments');
                //        for (var i = 0; i < instruments.length; i++)
                //        {
                //            instruments[i].checked = false;
                //        }
            }        
       
            $(document).ready(function() {
                getAllSongs();
                //getAllInstruments();
         
            });

            function addSong() {
                clearForm();
                isFormReadOnly(false);
                document.getElementById("updateSong").style.display = 'none';
                document.getElementById("editSong").style.display = 'none';
                document.getElementById("deleteSong").style.display = 'none';
                document.getElementById("saveSong").style.display = 'block';
                showUpload(true);
        
            }  
            
            
            function startUrlUpload(){
                document.getElementById('url_upload_process').style.display = 'block';
                return true;
            }
            
            function stopMp3UrlUpload(success){
                var result = '';
                if (success == 1){
                    document.getElementById('mp3_url_result').innerHTML =
                        '<span class="msg">The file was uploaded successfully!</span><br/><br/>';
                }
                else {
                    document.getElementById('mp3_url_result').innerHTML = 
                        '<span class="emsg">There was an error during file upload!</span><br/><br/>';
                }
                document.getElementById('mp3_url_upload_process').style.display = 'none';
                return true;   
            }
            
            function stopSlidesUrlUpload(success){
                var result = '';
                if (success == 1){
                    document.getElementById('slides_url_result').innerHTML =
                        '<span class="msg">The file was uploaded successfully!</span><br/><br/>';
                }
                else {
                    document.getElementById('slides_url_result').innerHTML = 
                        '<span class="emsg">There was an error during file upload!</span><br/><br/>';
                }
                document.getElementById('slides_url_upload_process').style.display = 'none';
                return true;   
            }
            
            function stopUrlUpload(success){
                var result = '';
                if (success == 1){
                    document.getElementById('url_result').innerHTML =
                        '<span class="msg">The file was uploaded successfully!</span><br/><br/>';
                }
                else {
                    document.getElementById('url_result').innerHTML = 
                        '<span class="emsg">There was an error during file upload!</span><br/><br/>';
                }
                document.getElementById('url_upload_process').style.display = 'none';
                return true;   
            }

        </script>

    </head>  

    <body>


        <input type="button" value="Add Song +" onclick="showAddSong()"/><br/><br/>
        <!--<input type="button" value="Hide Contact +" onclick="hideAddContact()"/>-->



        <div id="add" style="diplay:none;position:absolute;background-color:#ffffff;border-top:none;border-left:none;border-color:lightgrey;width:550px; height: 220px; margin-left: auto; margin-right: auto; left:215px; top:10px;">


            Song:  

            <table style="position: absolute; left: 600px; top: -8px">
                <tr>
                    <td><input type="button" id="saveSong" name="saveSong" value="Save" onclick="saveSong()" style="display: none;" /></td>
                    <td><input type="button" id="editSong" name="editSong" value="Edit" onclick="editSong()" /></td>
                    <td><input type="button" id="updateSong" name="updateSong" value="Update" onclick="updateSong()" style="display: none;" /></td>
                    <td><input type="button" id="deleteSong" name="deleteSong" value="Delete" onclick="deleteSong()" /></td>
                    <!--<td><input type="button" id="cancelContact" name="cancelContact" value="Cancel" onclick="hideAddContact()" /></td>-->
                </tr>
            </table>


            <table width="800px">

                <tr>
                    <td>title</td>
                    <td><input type="input" id="title" name="title" value="" class="songInput" /></td>
                    <td>writer</td>
                    <td><input type="input" id="writer" name="writer" value="" class="songInput" /></td>
                </tr>
                <tr>
                    <td>performer</td>
                    <td><input type="input" id="performer" name="performer" value="" class="songInput" /></td>            
                    <td>publisher</td>
                    <td><input type="input" id="publisher" name="publisher" value="" class="songInput"/></td>
                </tr>
                <tr>
                    <td>copyright date</td>
                    <td><input type="input" id="copyrightDate" name="copyrightDate" value="" class="songInput" /></td>
                    <td>key</td>
                    <td><input type="input" id="key" name="key" value="" class="songInput" /></td>
                </tr>
                <tr>
                    <td>submitted by</td>
                    <td><input type="input" id="submittedBy" name="submittedBy" value="" class="songInput" /></td>
                    <td>notes</td>
                    <td><input type="input" id="notes" name="notes" value="" class="songInput" /></td>
                </tr>

                <tr>  

                    <td>date</td>
                    <td><input type="input" id="date" name="date" value="" class="songInput" /></td>
                    <td>visibility</td>
                    <td><input type="checkbox" id="visibility" name="visibility" value="" class="contactInput" /></td>
                </tr>               
            </table>
            <br><br>

            <form action="/songs/uploadUrl.php" method="post" enctype="multipart/form-data" target="upload_url_target" onsubmit="startUrlUpload();" >
                url: <a id="urlLink"></a><br>
                <input type="file" id="url" name="url" value="" class="songInput" />
                <input type="submit" id="urlUpload" name="urlUpload" value="Upload"  />
            </form>
            <p id="url_upload_process" style="display:none;">Loading...<br/><img src="/songs/loader.gif" /></p>
            <p id="url_result"></p>
            <iframe id="upload_url_target" name="upload_url_target" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>

            <br><br>
            
            <form action="/songs/uploadMp3Url.php" method="post" enctype="multipart/form-data" target="upload_mp3_url_target" onsubmit="startMp3UrlUpload();" >
                mp3 url: <a id="mp3UrlLink"></a><br>
                <input type="file" id="mp3Url" name="mp3Url" value="" class="songInput" />
                <input type="submit" id="mp3UrlUpload" name="mp3UrlUpload" value="Upload"  />
            </form>
            <p id="mp3_url_upload_process" style="display:none;">Loading...<br/><img src="/songs/loader.gif" /></p>
            <p id="mp3_url_result"></p>
            <iframe id="upload_mp3_url_target" name="upload_mp3_url_target" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>
            <br><br>
            
            <form action="/songs/uploadSlidesUrl.php" method="post" enctype="multipart/form-data" target="upload_slides_url_target" onsubmit="startSlidesUrlUpload();" >
            slides url: <a id="slidesUrlLink"></a><br>
            <input type="file" id="slidesUrl" name="slidesUrl" value="" class="songInput" />
            <input type="submit" id="slidesUrlUpload" name="slidesUrlUpload" value="Upload"  />
            </form>
            <p id="slides_url_upload_process" style="display:none;">Loading...<br/><img src="/songs/loader.gif" /></p>
            <p id="slides_url_result"></p>
            <iframe id="upload_slides_url_target" name="upload_slides_url_target" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>
            <br/><br>
            <input type="hidden" id="id" name="id" value=""/>


            <br><br>
            <!--            Instruments:<br>
                        <br>
                        <span id="instruments">
                        </span>-->
            <br><br>


        </div>

        Current Songs:<br><br> 

        <span id="currentSongs" style="overflow-y:scroll;overflow-x:hidden ;height:100%;background-color:whitesmoke;position:absolute;width:200px;top:0px;left:0px;">

            <input type="button" value="Add Song" onclick="addSong()" />
            <table id="songList" style="width:200px;" >

            </table>

        </span>




    </body>
</html> 