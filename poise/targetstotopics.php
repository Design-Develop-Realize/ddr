<html>
<head>
<title>NpO Target List to Target Threads script</title>
</head>
<body>
<style>
    form {
        text-align: center;
    }
</style>
<form action="#" method="POST">
    Please paste <strong>target list BBCode</strong>:<br />
    <textarea name="source" rows="20" cols="100"></textarea><br />
    <input type="hidden" name="sekrit" />
    <input type="submit" value="Submit" />
</form>
<?php
    if(!isset($_POST['sekrit'])) {
        exit(0);
    }
    
    function debugVar($name, $var) {
        echo "DEBUG: ".$name." = |".$var."|<br />";
    }
    
    
    $source = $_POST['source'];
    
    if(strlen($source) == 0) {
        echo "<h1>Please enter the BBCode!</h1>";
        exit(1);
    }
    
    $rows = explode("[tr]", $source);
    
    $rowheader = "[tr][td][center][b]Nation[/b][/center][/td][td][center][b]Ruler[/b][/center][/td][td] [/td][td][center][b]Strength[/b][/center][/td][td] [/td][td][center][b]Infra[/b][/center][/td][td] [/td][td][center][b]Tech[/b][/center][/td][td] [/td][td][center][b]I:T Ratio[/b][/center][/td][td] [/td][td][center][b]Nukes[/b][/center][/td][td][center][b]Mode[/b][/center][/td][td][center][b]Alliance[/b][/center][/td][/tr]";
    
//    echo "<textarea rows=\"20\" cols=\"100\">";
    for($i = 2; $i < count($rows); $i++) {
        $row = $rows[$i];
        //echo "Row ".$i.": ".$row."<br><br>";
        
        // Topic content
        $topiccontent = "[center][table]".$rowheader;
        $topiccontent .= "[tr]".str_replace("[/url][/center][/td][td][center]","[/nation][/center][/td][td][center]",str_replace("url=http://www.cybernations.net/nation_drill_display.asp?Nation_ID=", "nation=", trim($row)));
        $topiccontent .= "[/table][/center]";
        
        // Topic subject (title)
        // Nation name
        $pos = strpos($row, "]", strpos($row, "Nation_ID")) + 1;
        $length = strpos($row, "[", $pos) - $pos;
        $nationname = substr($row, $pos, $length);
        // NS
        $pos = strpos($row, "]", strpos($row, " [/td][td]") + 10) + 1;
        $length = strpos($row, "[", $pos) - $pos;
        $ns = substr($row, $pos, $length);
        $topicsubject = $ns." NS: ".$nationname." [XXX slots available]";
        
        // Topic description
        // Nukes
        $pos = strpos($row, "]", strpos($row, "[img]") - 36) + 1;
        $length = strpos($row, "[", $pos) - $pos;
        $nukes = substr($row, $pos, $length);
        $topicdescription = "&lt;Wonder Info&gt;, ".$nukes." Nukes";
        
        $topic = "[b]Topic Subject:[/b][code]".$topicsubject."[/code]<br><br>[b]Topic Description:[/b][code]".$topicdescription."[/code]<br><br>[b]Topic Content:[/b][code]".$topiccontent."[/code]<br>";
        
        echo $topic;
        
        // Echo <hr>
        echo "<br>[hr]<br><br>";
    }
//    echo "</textarea>";
    
?>

</body>
</html>