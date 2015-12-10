<?php
        class chart{
		public $box;
		public $cat = array("grains" => 0, 
							"veggies" => 0, 
							"fruit" => 0, 
							"protein" => 0, 
							"dairy" => 0, 
							"fats" => 0, 
							"water" => 0);
							

		public $weekday = array(1 => "Monday",
					 2 => "Tuesday",
					 3 => "Wednesday",
					 4 => "Thursday",
					 5 => "Friday",
					 6 => "Saturday",
					 7 => "Sunday");
		 
		public function day($day){
			
			 switch($day)
			 {
			 	case $this->weekday[1]:
					echo "monday";
					break;
				case $this->weekday[2]:
					echo "tuesday";
					break;
				case $this->weekday[3]:
					echo "wednesday";
					break;
				case $this->weekday[4]:
					echo "thursday";
					break;
				case $this->weekday[5]:
					echo "friday";
					break;
				case $this->weekday[6]:
					echo "sat";
					break;
				case $this->weekday[7]:
					echo"sun";
			 }
			  
		}
		
		public function dispbar($amt){
			if($amt > 12)
		{
			$amt = 12;
		}
		while($amt > 0)
		{
			echo "<img src='bar.jpg' /> ";
			
			$amt--;
		}
		}
	}
    
    
	
	$s = 0;
	$oz = 0;
	$tsp = 0;
	
	$test = new chart;
	
	if(array_key_exists('submit', $_POST))
	{
		/*var_dump($_POST);*/
		$grain = (int)$_POST['grain'];
		$veg = (int)$_POST['veg'];
		$fruit = (int)$_POST['fruit'];
		$protein = (int)$_POST['protein'];
		$dairy = (int)$_POST['dairy'];
		$fats = (int)$_POST['fats'];
		$water = (int)$_POST['water'];
		//TIME TO DO STUFF, ACCESS WITH THE FOLLOWING
		echo "<div id='chart'>";
		
		echo "Grain: ";
		$test->dispbar($grain);
		
		echo "<br/> Vegetable: ";
		$test->dispbar($veg);
		
		echo "<br/> Fruit: ";
		$test->dispbar($fruit);
		
		echo "<br/> Protein: ";
		$test->dispbar($protein);
		
		echo "<br/> Dairy: ";
		$test->dispbar($dairy);
		
		echo "<br/> Fats: ";
		$test->dispbar($fats);
		
		echo "<br/> Water: ";
		$test->dispbar($water);
		
		echo "</div>";
	} else {
	

?>

<!doctype html>
<html lang="en">
	<head>
		<title>wow bootcamp prototype</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link type="text/css" href="jquery/css/sunny/jquery-ui-1.8.21.custom.css" rel="stylesheet" />
		<script type="text/javascript" src="jquery/js/jquery-1.7.2.min.js"></script>
		<script type="text/javascript" src="jquery/js/jquery-ui-1.8.21.custom.min.js"></script>

		<style>

			#chart{width:590px;margin:0 auto;}
			p label{display:inline-block; width:120px;}
			p input{width:90px;}
	
			/*demo page css*/

			body{ font: 72.5% "Trebuchet MS", sans-serif; margin: 50px;}
			.demoHeaders { margin-top: 2em; }
			#dialog_link {padding: .4em 1em .4em 20px;text-decoration: none;position: relative;}
			#dialog_link span.ui-icon {margin: 0 5px 0 0;position: absolute;left: .2em;top: 50%;margin-top: -8px;}
			ul#icons {margin: 0; padding: 0;}
			ul#icons li {margin: 2px; position: relative; padding: 4px 0; cursor: pointer; float: left;  list-style: none;}
			ul#icons span.ui-icon {float: left; margin: 0 4px;}
		</style>

<script type="text/javascript">
			$(function(){
				// Accordion
				$("#accordion").accordion({ header: "h3" });

				// Tabs
				$('#tabs').tabs();

				// Dialog
				$('#dialog').dialog({
					autoOpen: false,
					width: 600,
					buttons: {
						"Ok": function() {
							$(this).dialog("close");
						},
						"Cancel": function() {
							$(this).dialog("close");
						}
					}
				});

				// Dialog Link
				$('#dialog_link').click(function(){
					$('#dialog').dialog('open');
					return false;
				});


				// Datepicker
				$('#datepicker').datepicker({
					inline: true
				});

				// Slider
				$('#slider').slider({
					range: true,
					values: [17, 67]
				});

				// Progressbar
				$("#progressbar").progressbar({
					value: 20
				});

				//hover states on the static widgets
				$('#dialog_link, ul#icons li').hover(
					function() { $(this).addClass('ui-state-hover'); },
					function() { $(this).removeClass('ui-state-hover'); }
				);
			});
		</script>

	</head>
	<body>
		<div id="chart">
		<div id="tabs">

			<ul>
				<li><a href="#tabs-1">Monday</a></li>
				<li><a href="#tabs-2">Tuesday</a></li>
				<li><a href="#tabs-3">Wednesday</a></li>
				<li><a href="#tabs-4">Thursday</a></li>
				<li><a href="#tabs-5">Friday</a></li>
				<li><a href="#tabs-6">Saturday</a></li>
				<li><a href="#tabs-7">Sunday</a></li>
			</ul>

			<div id="tabs-1"><form action="" method="post">
			<p><label for ="grain">Grains:</label><input type="text" id="grain" name="grain"/></p>
			<p><label for ="veg">Vegetables:</label><input type="text" id="veg" name="veg"/></p>
			<p><label for ="fruit">Fruit:</label><input type="text" id="fruit" name="fruit"/></p>
			<p><label for ="protein">Protein:</label><input type="text" id="protein" name="protein"/></p>
			<p><label for ="dairy">Dairy:</label><input type="text" id="dairy" name="dairy"/></p>
			<p><label for ="fats">Fats:</label><input type="text" id="fats" name="fats"/></p>
			<p><label for ="water">Water:</label><input type="text" id="water" name="water"/></p> 
			<p><input type="submit" name="submit" value="All Done!"/></p>
		</form></div>

			<div id="tabs-2">Phasellus mattis tincidunt nibh. Cras orci urna, blandit id, pretium vel, aliquet ornare, felis. Maecenas scelerisque sem non nisl. Fusce sed lorem in enim dictum bibendum.</div>

			<div id="tabs-3">Nam dui erat, auctor a, dignissim quis, sollicitudin eu, felis. Pellentesque nisi urna, interdum eget, sagittis et, consequat vestibulum, lacus. Mauris porttitor ullamcorper augue.</div>

<div id="tabs-4">Phasellus mattis tincidunt nibh. Cras orci urna, blandit id, pretium vel, aliquet ornare, felis. Maecenas scelerisque sem non nisl. Fusce sed lorem in enim dictum bibendum.</div>

			<div id="tabs-5">Nam dui erat, auctor a, dignissim quis, sollicitudin eu, felis. Pellentesque nisi urna, interdum eget, sagittis et, consequat vestibulum, lacus. Mauris porttitor ullamcorper augue.</div>
			
			<div id="tabs-6">Phasellus mattis tincidunt nibh. Cras orci urna, blandit id, pretium vel, aliquet ornare, felis. Maecenas scelerisque sem non nisl. Fusce sed lorem in enim dictum bibendum.</div>

			<div id="tabs-7">Nam dui erat, auctor a, dignissim quis, sollicitudin eu, felis. Pellentesque nisi urna, interdum eget, sagittis et, consequat vestibulum, lacus. Mauris porttitor ullamcorper augue.</div>
		</div>

		
		
		</div>
	</body>
</html>
<?php } ?>