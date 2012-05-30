/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


            function getAllContacts() {
                //alert("getallcontacts");
                
                $.post("contacts/getAllContactsHandler.php",
                {  },
                function(data) {  
                    //alert(data);
                    var contactsArray = eval(data);
                    for (var i = 0; i < contactsArray.length; i++) {
                        var row = document.getElementById("contactList").insertRow(i); 
                        var cell = row.insertCell(0);
                        cell.innerHTML = contactsArray[i].contact_first_name;
                        cell.className = "tdItem";
                        
                    }
                    
                },
            
                "text"
            );
                  
            }

            function saveContact() {
                //alert(document.getElementById("visibility").checked );
                $.post("contacts/addContactsHandler.php",
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
                    getAllContacts();       

                },
                "text"
            );
                hideAddContact();
            }
        
            function showAddContact() {
                document.getElementById("add").style.display="block";
            }
        
            function hideAddContact() {
                document.getElementById("add").style.display="none";
            }

            //window.onload=getAllContacts();
            
            //$('#order').selectable({filter: ".tdItem"}); 

       
   
