<html>
<head>
<title>Enemy nation to TAC thread</title>
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
    
    function removecommas($str) {
        return str_replace(",", "", $str);
    }
    
    $source = $_POST['source'];
    
    if(strlen($source) == 0) {
        echo "<h1>Please enter the source code!</h1>";
        exit(1);
    }
    
    $html = substr($source, strpos($source, "<body"));
    $nationhtml = substr($html, strpos($html, "Nation Information"));

    // Nation ID
    $pos = strpos($nationhtml, "Nation_ID=")+10;
    $length = strpos($nationhtml, "\"", $pos) - $pos;
    //echo "Length: ".$length."<br>";
    $nationid = trim(substr($nationhtml, $pos, $length), "\\\"");
//    echo "Nation ID: ".$nationid."<br>";
        
    // Ruler name
    $rulername = findField($nationhtml, "Ruler:");
//    echo "Ruler name: ".$rulername."<br>";
    
    // Nation name
    $nationname = findField($nationhtml, "Nation Name:");
//    echo "Nation name: ".$nationname."<br>";
    
    // Alliance Affiliation
    $aa = findField($nationhtml, "Alliance Affiliation</a>:");
//    echo "AA: ".$aa."<br>";
    
    // Tech
    $tech = removecommas(findField($nationhtml, "Technology</a>:"));
//    echo "Tech: ".$tech."<br>";
    
    // Infra
    $infra = removecommas(findField($nationhtml, "Infrastructure</a>:"));
//    echo "Infra: ".$infra."<br>";
    
    // War/Peace mode
    // Custom because the <img> tag opener gets in the way
    $pos = strpos($nationhtml, "\">", strpos($nationhtml, "War/Peace Preference")) + 2;
    $length = strpos($nationhtml, "\">", $pos) - $pos;
    $field = trim(substr($nationhtml, $pos, $length));
    $warpeace = trim(substr($field, strpos($field, "images/")+7, 5), ".g");
//    echo "War/Peace mode: ".$warpeace."<br>";
    
    // Wonders
    // Custom because wonders are apparently special enough to warrant a table within a table *cringe*
    $pos = strpos($nationhtml, "\">", strpos($nationhtml, "National Wonders")) + 2;
    $length = strpos($nationhtml, "</table>", $pos) - $pos;
    $field = trim(substr($nationhtml, $pos, $length));
    $listpos = strpos($field, "<td>", strpos($field, "<td>")) + 4;
    $listlength = strpos($field, "</td>", $listpos) - $listpos;
    $wonders = trim(substr($field, $listpos, $listlength));
    $wonderlist = "";
    $wonderlist .= (strpos($wonders, "Manhattan Project") !== false) ? "MP, " : "";
    $wonderlist .= (strpos($wonders, "Strategic Defense Initiative") !== false) ? "SDI, " : "";
    $wonderlist .= (strpos($wonders, "Pentagon") !== false) ? "PENT, " : "";
    $wonderlist .= (strpos($wonders, "Weapons Research Complex") !== false) ? "WRC, " : "";
    $wonderlist .= (strpos($wonders, "Hidden Nuclear Missile Silo") !== false) ? "HNMS, " : "";
    $wonderlist .= (strpos($wonders, "Foreign Air Force Base") !== false) ? "FAFB, " : "";
    $wonderlist .= (strpos($wonders, "Anti-Air Defense Network") !== false) ? "AADN, " : "";
    if(strlen($wonderlist) == 0) {
        $wonderlist = "No Wonders, ";
    }
//    echo "National Wonders: ".$wonderlist."<br>";
    
    // Nation Strength
    $nationstrength = findField($nationhtml, "Nation Strength</a>:");
    $ns = (strpos($nationstrength, "(") !== false) ? trim(substr($nationstrength, 0, strpos($nationstrength, "("))) : trim($nationstrength);
//    echo "Nation Strength: ".$nationstrength."<br>";
    
    // Nuke count
    $nukes = findField($nationhtml, "Nuclear Weapons</a>:");
//    echo "Nukes: ".$nukes."<br>";
    
    // Create TAC thread
    $header = "[tr][td][center][b]Nation[/b][/center][/td][td] [/td][td][center][b]Ruler[/b][/center][/td][td] [/td][td][center][b]Strength[/b][/center][/td][td] [/td][td][center][b]Infra[/b][/center][/td][td] [/td][td][center][b]Tech[/b][/center][/td][td] [/td][td][center][b]Nukes[/b][/center][/td][td][center][b]Mode[/b][/center][/td][td][center][b]Alliance[/b][/center][/td][/tr]";
    
    
    
    
    // Topic content
    echo "<h1>Topic Content</h1>";
    $topiccontent = "[center][table]".$header;
    $topiccontent .= "[tr][td][center][nation=".$nationid."]".$nationname."[/nation][/center][/td][td] [/td]";
    $topiccontent .= "[td][center]".$rulername."[/center][/td][td] [/td]";
    $topiccontent .= "[td][center]".$ns."[/center][/td][td] [/td]";
    $topiccontent .= "[td][center]".$infra."[/center][/td][td] [/td]";
    $topiccontent .= "[td][center]".$tech."[/center][/td][td] [/td]";
    $topiccontent .= "[td][center]".$nukes."[/center][/td]";
    $topiccontent .= "[td][center][img]http://blizzard.liberta-bg.net/images/".$warpeace.".gif[/img][/center][/td]";
    $topiccontent .= "[td][center]".$aa."[/center][/td]";
    $topiccontent .= "[/tr][/table][/center]";
    echo $topiccontent;
    
    // Topic subject (title)
    echo "<h1>Topic Subject</h1>";
    $topicsubject = $ns." NS: ".$nationname." [XXX slots available]";
    echo $topicsubject;
    
    // Topic description
    echo "<h1>Topic Description</h1>";
    $topicdescription = $wonderlist.$nukes." Nukes";
    echo $topicdescription;
    
//    $topic = "[b]Topic Subject:[/b][code]".$topicsubject."[/code]<br><br>[b]Topic Description:[/b][code]".$topicdescription."[/code]<br><br>[b]Topic Content:[/b][code]".$topiccontent."[/code]<br>";
    

?>
</body>
</html>