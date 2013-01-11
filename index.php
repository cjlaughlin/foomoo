<!DOCTYPE html>
<html>
	<head>
		<script src="js/jquery-1.8.3.min.js"></script>
		<link rel="stylesheet" href="style/stylesheets/iphone.css">
		<script type="text/javascript" src="//use.typekit.net/fni7ssq.js"></script>
		<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
	</head>

	<body>
		<div id="wrapper">	
			<div id="food"></div>
			<div id="mood"></div>
		</div> <!-- wrapper -->
	<script>
		$(document).ready(function() {

			$('div').each(function(index) {
				if (this.id == 'wrapper'){
					return;
				}else{
					$(this).text(this.id);
				};
			});//div.each put ID as text

		}); //document.ready


	</script>

	</body>
</html>

