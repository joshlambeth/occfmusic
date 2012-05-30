<html>

<!--
	This is a jQuery Tools standalone demo. Feel free to copy/paste.
	                                                         
	http://flowplayer.org/tools/demos/
	
	Do *not* reference CSS files and images from flowplayer.org when in production  

	Enjoy!
-->

<head>
	<title>jQuery Tools standalone demo</title>

	<!-- include the Tools -->
	<script src="http://cdn.jquerytools.org/1.2.6/full/jquery.tools.min.js"></script>
	 

	<!-- standalone page styling (can be removed) -->
        <link rel="stylesheet" type="text/css" href="/css/standalone.css"/>	


	
	<!-- tab styling -->
	<link rel="stylesheet" type="text/css" href="/css/simpleTabs.css" />
	
	
	<!-- tab pane styling -->
	<style>
	
/* tab pane styling */
.panes div {
	display:none;		
	padding:15px 10px;
	border:1px solid #999;
	border-top:0;
	height:300px;
	font-size:14px;
	background-color:#fff;
}

	</style>
</head>

<body>



<!-- the tabs -->
<ul class="tabs">
	<li><a href="#">Calendar</a></li>
	<li><a href="#">Songs</a></li>
	<li><a href="/contacts/contacts.php">Contacts</a></li>
</ul>

<!-- tab "panes" -->
<div class="panes">
	<div>First tab content. Tab contents are called "panes"</div>
	<div>Second tab content</div>
	<div>Third tab content</div>
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