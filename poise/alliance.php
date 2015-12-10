<html>
<head>
<title>NpO Alliance Screen Parser</title>
</head>
<body>
<style>
    body {
        text-align: center;
    }
</style>
<form action="#" method="POST">
    Please paste <strong>HTML source code</strong>:<br />
    <textarea name="source" rows="20" cols="100"></textarea><br />
    <input type="hidden" name="sekrit" />
    <input type="submit" value="Submit" />
</form>
<?php
    if(!isset($_POST['sekrit'])) {
        exit(0);
    }

    function showHTML($code) {
        echo "<textarea rows=25 cols=100>".$code."</textarea><br />";
    }
    
    function findField($string, $name) {
        $pos = strpos($string, "\">", strpos($string, $name)) + 2;
        $length = strpos($string, "<", $pos) - $pos;
        return trim(substr($string, $pos, $length));
    }
    
    function debugVar($name, $var) {
        echo "DEBUG: ".$name." = |".$var."|<br />";
    }
    
    function removecommas($str) {
        return str_replace(",", "", $str);
    }
    
    
    $source = $_POST['source'];
    
    if(strlen($source) == 0) {
        echo "<h1>Please enter the source code!</h1>";
        exit(1);
    }
    if(strpos($source, "<html>") === false) {
        echo "<h1>Please enter HTML source code!</h1>";
        exit(1);
    }
    
    $pages = explode("<html>", $source);
    
    
    $counter = 0;
    $querystr = "INSERT INTO alliances (nation_id, nation, alliance, nuclear, infra, tech, mode, ns) VALUES ";
    
    // Start loop for each page
    foreach($pages as $page) {
        if(strlen(trim($page)) == 0) { // Empty because of explosion
            continue;
        }
        
        // Extract important stuff from page
        $body = substr($page, strpos($page, "<body"));
        $nationshtml = substr($page, strpos($page, "<title>"));
    
        // Alliance name
        $pos= strpos($nationshtml, "<title>") + 7;
        $alliance = substr($nationshtml, $pos, strpos($nationshtml, "</title>") - $pos);
    
        // Grab the table with nations
        $pagePos = strpos($nationshtml, "&nbsp;Page:");
    
        $firstTrPos = strpos($nationshtml, "<tr>", $pagePos) + 4;
    
        $pos = strpos($nationshtml, "<tr", $firstTrPos);
    
        $length = strpos($nationshtml, "</table>", $pos) - $pos;
        $nations = substr($nationshtml, $pos, $length);
        
        // Start while loop
        while(strpos($nations, "<tr") !== false) {
            // Start new value entry
            $querystr .= "(";
            
            // Nation ID
            $pos = strpos($nations, "ID=") + 3;
            $length = strpos($nations, "\"", $pos) - $pos;
            $nation_id = trim(substr($nations, $pos, $length), "\\\"");
            $querystr .= "$nation_id,";
            
            // Nation Ruler
            $pos = strpos($nations, ">", strpos($nations, "<a")) + 1;
            $length = strpos($nations, "</a>", $pos) - $pos;
            $nation = trim(substr($nations, $pos, $length));
            $querystr .= "'".$nation."',";
            
            // Alliance
            $querystr .= "'".$alliance."',";
            
            // Nukes
            $pos = strpos($nations, "Nukes: ");
            if($pos !== false) { // Nation has nukes
                $pos += 7;
                $length = strpos($nations, ">", $pos) - $pos;
                $nukes = trim(substr($nations, $pos, $length), "\\\"");
                $querystr .= "$nukes,";
            }
            else { // No nukes
                $querystr .= "0,";
            }
    
            // NS, infra, tech, mode, all at once!        
            $pos = strpos($nations, "</td></center>", strpos($nations, "images/teams"));
            $length = strpos($nations, "</tr>", $pos) - $pos;
            $manythings = trim(substr($nations, $pos, $length));
            $manythingsplosion = explode("</td></center><td><center>", $manythings);
    
            $ns = $manythingsplosion[1];
            $infra = $manythingsplosion[2];
            $tech = $manythingsplosion[3];
            $mode = (strpos($manythingsplosion[4], "war") !== false) ? "war" : "peace";
            $querystr .= removecommas($infra).",".removecommas($tech).",'".$mode."',".removecommas($ns);
            
        
            $counter++;
            if(strpos($nations, "<tr", 3) !== false) {
                $nations = substr($nations, strpos($nations, "<tr", 3));
            }
            else {
                $nations = "";
            }
            
            $querystr .= "),";
        }
    }
    
//    echo $counter." nations added<br /><br />";
    $querystr = substr($querystr, 0, -1);
//    echo $querystr."<br><br>";
    

//    exit(0);
    // DB connection
    /////////////////
    
    // Init connection to DB
    $conn = mysqli_connect("designdeveloprealize.com", "designde_poise", "vindicator", "designde_poise");
    if (!$conn) {
        die('Could not connect to database: '.mysqli_error());
    }

    //echo $querystr."<br />";
    $result = mysqli_query($conn, $querystr);
    if(!$result) {
        die("Error: ".mysqli_error($conn)."<br />");
    }
        
    // Close connection
    mysqli_close($conn);
    
    echo "<h2>The information has been succesfully entered! ".$counter." nations added.</h2>";
    
?>

</body>
</html>