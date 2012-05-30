<html>

    <!--
            This uses a jQuery Tools
    -->

    <head> 
        <title>OCCF Contacts</title> 

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

            .contactInput {
                width: 250px;
            }
        </style>


        <script type="text/javascript">
          

            function getAllContacts() {
                //alert("getallcontacts");
                
                $.post("/contacts/getAllContactsHandler.php",
                {  },
                function(data) {  
                    //alert(data);
                    var contactsArray = eval(data);
                    for (var i = 0; i < contactsArray.length; i++) {
                        var row = document.getElementById("contactList").insertRow(i); 
                        var cell = row.insertCell(0);
                        cell.innerHTML = contactsArray[i].contact_first_name;    
                        cell.className = "tdItem";
                        cell.id = "contact-" + contactsArray[i].contact_key;
                       
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
                        updateCurrentContact($(this));
                        document.getElementById("updateContact").style.display = 'none';
                        document.getElementById("editContact").style.display = 'block';
                        document.getElementById("deleteContact").style.display = 'block';
                        document.getElementById("saveContact").style.display = 'none';
                    });
                },
            
            "text"
        );
                  
        }

    function saveContact() {
        //alert(document.getElementById("visibility").checked );
        $.post("/contacts/addContactsHandler.php",
        { 
            firstName: document.getElementById("firstName").value, 
            lastName: document.getElementById("lastName").value,
            primaryPhone: document.getElementById("primaryPhone").value,
            alternatePhone: document.getElementById("alternatePhone").value,
            address: document.getElementById("address").value,
            city: document.getElementById("city").value,
            state: document.getElementById("state").value,
            zip: document.getElementById("zip").value,
            primaryEmail: document.getElementById("primaryEmail").value,
            alternateEmail: document.getElementById("alternateEmail").value,
            availability: document.getElementById("availability").value,
            visibility: document.getElementById("visibility").checked   
        },
        function(data) {
            //alert(data);
            document.getElementById("contactList").innerHTML = "";
            getAllContacts();       
        },
        "text"
    );
        //hideAddContact();
    }
            
    function editContact (){
        isFormReadOnly(false);
        document.getElementById("updateContact").style.display = 'block';
        document.getElementById("editContact").style.display = 'none';
        document.getElementById("deleteContact").style.display = 'none';
        document.getElementById("saveContact").style.display = 'none';
                
    }
            
    function updateContact() {
        var sure = confirm("Are you sure you want to edit contact?");
        if (sure) {
            var contactKey = document.getElementById("id").value;
            //alert(contactKey);
            deleteAllInstrumentsFromContact(contactKey);
                    
            $.post("/contacts/editContactsHandler.php",
            { 
                id: document.getElementById("id").value,
                firstName: document.getElementById("firstName").value, 
                lastName: document.getElementById("lastName").value,
                primaryPhone: document.getElementById("primaryPhone").value,
                alternatePhone: document.getElementById("alternatePhone").value,
                address: document.getElementById("address").value,
                city: document.getElementById("city").value,
                state: document.getElementById("state").value,
                zip: document.getElementById("zip").value,
                primaryEmail: document.getElementById("primaryEmail").value,
                alternateEmail: document.getElementById("alternateEmail").value,
                availability: document.getElementById("availability").value,
                visibility: document.getElementById("visibility").checked   
            },
            function(data) {
                //alert(data);
                 saveContactInstrumentAssociations();
            document.getElementById("contactList").innerHTML = "";
            getAllContacts();      
                
            },
            "text"
        );
                                   
            
        }
        else {
                     
        }
    }
            
            
    function updateCurrentContact(selectedObject) {
        //getContactById(selectedObject);
        var id = selectedObject.attr("id").split("-")[1];
        getContactById(id);
                
        getAllInstrumentsFromContact(id);
        //alert(id);
                
    }
            
    function getContactById (selectedObject) {
        $.post("/contacts/getContactFromIdHandler.php",
        { id: selectedObject },
        function(data) {  
            //alert(data);
            var contactsArray = eval(data);
            for (var i = 0; i < contactsArray.length; i++) {
                document.getElementById('firstName').value = contactsArray[i].contact_first_name;
                document.getElementById('lastName').value = contactsArray[i].contact_last_name;
                document.getElementById('primaryPhone').value = contactsArray[i].contact_primary_phone;
                document.getElementById('alternatePhone').value = contactsArray[i].contact_alternate_phone;
                document.getElementById('address').value = contactsArray[i].contact_address;
                document.getElementById('city').value = contactsArray[i].contact_city;
                document.getElementById('state').value = contactsArray[i].contact_state;
                document.getElementById('zip').value = contactsArray[i].contact_zip;
                document.getElementById('primaryEmail').value = contactsArray[i].contact_primary_email;
                document.getElementById('alternateEmail').value = contactsArray[i].contact_alternate_email;                       
                document.getElementById('availability').value = contactsArray[i].contact_availability;
                document.getElementById('id').value = contactsArray[i].contact_key;
                        
                        
                if ( contactsArray[i].contact_visible == "1") {
                            
                    document.getElementById('visibility').checked = true;
                }
                else {
                    document.getElementById('visibility').checked = false;
                }
                //document.getElementById('visibility').value = contactsArray[i].contact_visibility;
                        
                isFormReadOnly(true);
                       
            }
                    
        },
            
        "text"
    );
                             
    }
            
    function isFormReadOnly(isReadOnly) {
        document.getElementById('firstName').readOnly = isReadOnly;
        document.getElementById('lastName').readOnly = isReadOnly;
        document.getElementById('primaryPhone').readOnly = isReadOnly;
        document.getElementById('alternatePhone').readOnly = isReadOnly;
        document.getElementById('address').readOnly = isReadOnly;
        document.getElementById('city').readOnly = isReadOnly;
        document.getElementById('state').readOnly = isReadOnly;
        document.getElementById('zip').readOnly = isReadOnly;
        document.getElementById('primaryEmail').readOnly = isReadOnly;
        document.getElementById('alternateEmail').readOnly = isReadOnly;
        document.getElementById('availability').readOnly = isReadOnly;
        document.getElementById('visibility').disabled = isReadOnly;
        var instruments = document.getElementsByName('instruments');
        for (var i = 0; i < instruments.length; i++)
        {
            instruments[i].disabled = isReadOnly;
        }
    }
        
    function showAddContact() {
        document.getElementById("add").style.display="block";
    }
        
    function hideAddContact() {
        document.getElementById("add").style.display="none";
    }

    function getAllInstruments() {
        //alert("getallinstruments");
        $.post("/instruments/getAllInstrumentsHandler.php",
        {  },
        function(data) {
            //alert(data);
            var instrumentsArray = eval(data);
            var text = '<table style="width:800px;">';
            for (var i = 0; i < instrumentsArray.length; i++) {
                if ((i % 5) == 0) { text += "<tr>"; }
                text += '<td><input type="checkbox" id="instrument-' + instrumentsArray[i].instrument_key + '" name="instruments" /> ' + instrumentsArray[i].instrument_name + "</td>";
                if ((i % 5) == 4) { text += "</tr>"; }
            }
            text += "</table>"
            document.getElementById("instruments").innerHTML = text;
        }, 
        "text"
    );

    }
        
    function saveContactInstrumentAssociations() {
                
        var contactKey = document.getElementById('id').value;
           
        var instrumentCheckboxes =  document.getElementsByName("instruments");
           
        //alert(contactKey + " " + instrumentCheckboxes.length);
           
        for (var i=0; i < instrumentCheckboxes.length; i++) {
            if (instrumentCheckboxes[i].checked) {
               
                var instrumentKey = instrumentCheckboxes[i].id.split("-")[1];
               
                $.post("/contactInstrumentAssoc/addContactInstrumentAssociationHandler.php",
                { contactId: contactKey, instrumentId:  instrumentKey },
                function(data) {  
                    //alert(data);                        
                    
                },
            
                "text"
            );
            }
        }
        
    }


    function getAllInstrumentsFromContact(contactKey) {
          
        $.post("/contactInstrumentAssoc/getInstrumentsFromContactHandler.php",
        { contactId: contactKey},
        function(data) {  
            //alert(data); 
            var instrumentCheckboxes =  document.getElementsByName("instruments");
            for (var i=0; i < instrumentCheckboxes.length; i++) {
                instrumentCheckboxes[i].checked = false;               
            }
                            
            var instrumentsArray = eval(data);
            for (var i = 0; i < instrumentsArray.length; i++) {
                document.getElementById("instrument-" + instrumentsArray[i].instrument_key).checked = true;
            }
                    
        },
            
        "text"
    );
            
    }
            
    function deleteAllInstrumentsFromContact(contactKey) {
        //alert(contactKey);
                
        $.post("/contactInstrumentAssoc/deleteInstrumentsFromContactHandler.php",
        { contactId: contactKey},
        function(data) {  
           // alert(data);                    
        },
            
        "text"
    );
    }
            
    function clearForm() {
        document.getElementById('firstName').value = '';
        document.getElementById('lastName').value = '';
        document.getElementById('primaryPhone').value = '';
        document.getElementById('alternatePhone').value = '';
        document.getElementById('address').value = '';
        document.getElementById('city').value = '';
        document.getElementById('state').value = '';
        document.getElementById('zip').value = '';
        document.getElementById('primaryEmail').value = '';
        document.getElementById('alternateEmail').value = '';
        document.getElementById('availability').value = '';
        document.getElementById('visibility').checked = false;
        var instruments = document.getElementsByName('instruments');
        for (var i = 0; i < instruments.length; i++)
        {
            instruments[i].checked = false;
        }
    }        
       
   

    function addContact() {
        clearForm();
        isFormReadOnly(false);
        document.getElementById("updateContact").style.display = 'none';
        document.getElementById("editContact").style.display = 'none';
        document.getElementById("deleteContact").style.display = 'none';
        document.getElementById("saveContact").style.display = 'block';
        
    }  
    
     $(document).ready(function() {
        getAllContacts();
        getAllInstruments();
         
    });

        </script>

    </head>  

    <body>


        <input type="button" value="Add Contact +" onclick="showAddContact()"/><br/><br/>
        <input type="button" value="Hide Contact +" onclick="hideAddContact()"/>



        <div id="add" style="diplay:none;position:absolute;background-color:#ffffff;border-top:none;border-left:none;border-color:lightgrey;width:550px; height: 220px; margin-left: auto; margin-right: auto; left:215px; top:10px;">


            Contact:  

            <table style="position: absolute; left: 600px; top: 0px">
                <tr>
                    <td><input type="button" id="saveContact" name="saveContact" value="Save" onclick="saveContact()" style="display: none;" /></td>
                    <td><input type="button" id="editContact" name="editContact" value="Edit" onclick="editContact()" /></td>
                    <td><input type="button" id="updateContact" name="updateContact" value="Update" onclick="updateContact()" style="display: none;" /></td>
                    <td><input type="button" id="deleteContact" name="deleteContact" value="Delete" onclick="deleteContact()" /></td>
                    <td><input type="button" id="cancelContact" name="cancelContact" value="Cancel" onclick="hideAddContact()" /></td>
                </tr>
            </table>


            <table width="800px">

                <tr><td>first name</td>
                    <td><input type="input" id="firstName" name="firstName" value="" class="contactInput" /></td>
                    <td>last name</td>
                    <td><input type="input" id="lastName" name="lastName" value="" class="contactInput" /></td></tr>

                <tr><td>phone</td>
                    <td><input type="input" id="primaryPhone" name="primaryPhone" value="" class="contactInput"/></td>
                    <td>alternate phone</td>
                    <td><input type="input" id="alternatePhone" name="alternatePhone" value="" class="contactInput" /></td></tr>

                <tr><td>address</td>
                    <td><input type="input" id="address" name="address" value="" class="contactInput" /></td>
                    <td>city</td>
                    <td><input type="input" id="city" name="city" value="" class="contactInput" /></td></tr>

                <tr><td>state</td>
                    <td><input type="input" id="state" name="state" value="" class="contactInput" /></td>
                    <td>zip</td>
                    <td><input type="input" id="zip" name="zip" value="" class="contactInput" /></td></tr>

                <tr><td>email</td>
                    <td><input type="input" id="primaryEmail" name="primaryEmail" value="" class="contactInput" /></td>
                    <td>alternate email</td>
                    <td><input type="input" id="alternateEmail" name="alternateEmail" value="" class="contactInput" /></td></tr>

                <tr><td>availability</td>
                    <td><input type="input" id="availability" name="availability" value="" class="contactInput" /></td>
                    <td>visibility</td>
                    <td><input type="checkbox" id="visibility" name="visibility" value="" class="contactInput" /></td></tr>
                <br/><br>
                <input type="hidden" id="id" name="id" value=""/>

            </table>
            <br><br>
            Instruments:<br>
            <br>
            <span id="instruments">
            </span>
            <br><br>


        </div>

        Current Contacts:<br><br> 

        <span id="currentContacts" style="overflow-y:scroll;overflow-x:hidden ;height:100%;background-color:whitesmoke;position:absolute;width:200px;top:0px;left:0px;">

            <input type="button" value="Add Contact" onclick="addContact()" />
            <table id="contactList" style="width:200px;" >

            </table>

        </span>




    </body>
</html> 