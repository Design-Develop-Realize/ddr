<?php
session_start();

if(!isset($_COOKIE['al']))
{
    header('Location: index.php');
}
?>
<html>
<head>
<title>POISE 2.0 Overview</title>
</head>
<style>
* {
    font-family: Verdana,Helvetica,sans-serif;
    font-size: 10pt;
}
body, table {
    text-align: center;
}
table {
    margin: auto;
}
table.filter {
    text-align: left;
}
tr {
    background-color: #eee;
}
tr.head {
    background-color: #000;
    color: #fff;
}
tr.head a {
    color: #fff;
}
tr.odd {
    background-color: #ccc;
}
td.selectedheader {
    font-weight: bold;
}
</style>
<body>
<strong>You are currently logged in at level: <?php echo $_COOKIE['al'][0]; ?></strong> [<a href="log.php?action=logout">Log Out</a>]
<h1>Brigade data</h1>
<form action="" method="GET">
    <input type="hidden" name="action" value="wcformoverview" />
    <?php 
        $field = isset($_GET['field']) ? $_GET['field'] : "nationstrength";
        $order = isset($_GET['order']) ? $_GET['order'] : "desc";
        echo "<input type=\"hidden\" name=\"field\" value=".$field." />";
        echo "<input type=\"hidden\" name=\"order\" value=".$order." />";
     ?>
    
    <!-- Filter part of form --> 
    <table class="filter">
    <tr>
        <td><strong>Select brigade</strong></td>
        <td>
            <select name="brigade">
                <option value="">All Brigades</option>
                <option value="Amber"<?php if(isset($_GET['brigade']) && $_GET['brigade'] == "Amber") echo " selected"; ?>>Amber</option>
                <option value="Black Marsh"<?php if(isset($_GET['brigade']) && $_GET['brigade'] == "Black Marsh") echo " selected"; ?>>Black Marsh</option>
                <option value="Tyga"<?php if(isset($_GET['brigade']) && $_GET['brigade'] == "Tyga") echo " selected"; ?>>Tyga</option>
                <option value="Unistrut"<?php if(isset($_GET['brigade']) && $_GET['brigade'] == "Unistrut") echo " selected"; ?>>Unistrut</option>
            </select>
        </td>
    </tr>
    
    <!-- Nation Strength between X and Y -->
    <tr>
        <td><strong>Nation Strength between</strong></td>
        <td><input type="text" name="nsLow"<?php if(isset($_GET['nsLow'])) echo " value=\"".$_GET['nsLow']."\""; ?>/> and <input type="text" name="nsHigh"<?php if(isset($_GET['nsHigh'])) echo " value=\"".$_GET['nsHigh']."\""; ?> /></td>
    </tr>
    
    <!-- Infra between X and Y -->
    <tr>
        <td><strong>Infrastructure between</strong></td>
        <td><input type="text" name="infraLow"<?php if(isset($_GET['infraLow'])) echo " value=\"".$_GET['infraLow']."\""; ?> /> and <input type="text" name="infraHigh"<?php if(isset($_GET['infraHigh'])) echo " value=\"".$_GET['infraHigh']."\""; ?> /></td>
    </tr>
    
    <!-- Tech between X and Y -->
    <tr>
        <td><strong>Technology between</strong></td>
        <td><input type="text" name="techLow"<?php if(isset($_GET['techLow'])) echo " value=\"".$_GET['techLow']."\""; ?> /> and <input type="text" name="techHigh"<?php if(isset($_GET['techHigh'])) echo " value=\"".$_GET['techHigh']."\""; ?> /></td>
    </tr>
    
    <!-- Spies between X and Y -->
    <tr>
        <td><strong>Spy Count between</strong></td>
        <td><input type="text" name="spiesLow"<?php if(isset($_GET['spiesLow'])) echo " value=\"".$_GET['spiesLow']."\""; ?> /> and <input type="text" name="spiesHigh"<?php if(isset($_GET['spiesHigh'])) echo " value=\"".$_GET['spiesHigh']."\""; ?> /></td>
    </tr>
    
    <!-- Warchest compliant 0/1/2 -->
    <tr>
        <td><strong>Warchest Compliance level</strong></td>
        <td><input type="radio" name="compliance" id="c0" value="0"<?php if(isset($_GET['compliance']) && $_GET['compliance'] == "0") echo " checked"; ?>> <label for="c0">Non-compliant</label></input><br />
        <input type="radio" name="compliance" id="c1" value="1"<?php if(isset($_GET['compliance']) && $_GET['compliance'] == "1") echo " checked"; ?>> <label for="c1">Warchest-compliant, without rebuild cost</label></input><br />
        <input type="radio" name="compliance" id="c2" value="2"<?php if(isset($_GET['compliance']) && $_GET['compliance'] == "2") echo " checked"; ?>> <label for="c2">Fully warchest-compliant</label></input></td>
    </tr>
    
    <!-- Military Wonders Y/N -->
    <tr>
        <td><strong>Military Wonders</strong></td>
        <td>
            <input type="checkbox" id="mp" name="mp" value="mp"<?php if(isset($_GET['mp'])) echo " checked"; ?> /> <label for="mp">Manhattan Project (MP)</label><br />
            <input type="checkbox" id="sdi" name="sdi" value="sdi"<?php if(isset($_GET['sdi'])) echo " checked"; ?> /> <label for="sdi">Strategic Defense Initiative (SDI)</label><br />
            <input type="checkbox" id="pent" name="pent" value="pent"<?php if(isset($_GET['pent'])) echo " checked"; ?> /> <label for="pent">Pentagon (PENT)</label><br />
            <input type="checkbox" id="wrc" name="wrc" value="wrc"<?php if(isset($_GET['wrc'])) echo " checked"; ?> /> <label for="wrc">Weapons Research Complex (WRC)</label><br />
            <input type="checkbox" id="fafb" name="fafb" value="fafb"<?php if(isset($_GET['fafb'])) echo " checked"; ?> /> <label for="fafb">Foreign Air Force Base (FAFB)</label><br />
            <input type="checkbox" id="aadn" name="aadn" value="aadn"<?php if(isset($_GET['aadn'])) echo " checked"; ?> /> <label for="aadn">Anti-Air Defense Network (AADN)</label><br />
            <input type="checkbox" id="hnms" name="hnms" value="hnms"<?php if(isset($_GET['hnms'])) echo " checked"; ?> /> <label for="hnms">Hidden Nuclear Missile Silo (HNMS)</label>
        </td>
    </tr>
    
    <!-- War/Peace mode -->
    <tr>
        <td><strong>War/Peace mode</strong></td>
        <td>
            <input type="radio" name="warpeace" id="war" value="war"<?php if(isset($_GET['warpeace']) && $_GET['warpeace'] == "war") echo " checked"; ?>> <label for="war">War</label></input><br />
            <input type="radio" name="warpeace" id="peace" value="peace"<?php if(isset($_GET['warpeace']) && $_GET['warpeace'] == "peace") echo " checked"; ?>> <label for="peace">Peace</label></input>
        </td>
    </tr>
    
    <!-- Tier 1/2/3/4 -->
    <tr>
        <td><strong>Tier</strong></td>
        <td>
            <input type="radio" name="tier" id="t1" value="1"<?php if(isset($_GET['tier']) && $_GET['tier'] == "1") echo " checked"; ?>> <label for="t1">Tier 1</label></input><br />
            <input type="radio" name="tier" id="t2" value="2"<?php if(isset($_GET['tier']) && $_GET['tier'] == "2") echo " checked"; ?>> <label for="t2">Tier 2</label></input><br />
            <input type="radio" name="tier" id="t3" value="3"<?php if(isset($_GET['tier']) && $_GET['tier'] == "3") echo " checked"; ?>> <label for="t3">Tier 3</label></input><br />
            <input type="radio" name="tier" id="t4" value="4"<?php if(isset($_GET['tier']) && $_GET['tier'] == "4") echo " checked"; ?>> <label for="t4">Tier 4</label></input>
        </td>
    </tr>
    
    </table>
    <!-- End filter part of form -->

    <br />
    <input type="submit" value="Submit" />
</form>

<?php
include_once('include.php');
    if(!isset($_GET['action'])) {
        exit(0);
    }  
    
    function removecommas($str) {
        return str_replace(",", "", $str);
    }
    
    // Init DB connection
    $conn = mysqli_connect("designdeveloprealize.com", "designde_poise", "vindicator", "designde_poise");
    //$conn = mysqli_connect("localhost", "root", "", "npo");
    if (!$conn) {
        die('Could not connect to database: '.mysqli_error());
    }
    
    // Set POST vars
    $brigade = $_GET['brigade'];
    $field = $_GET['field'];
    $order = $_GET['order'];
    
    // Acquire member info
    $querystr = choose_view('1', $brigade, $field, $order);
    
    // Filter options
    $filterstr = "";
    
    // Brigade
    if(strlen($brigade) > 0) {
        $filterstr .= " AND brigade='".$brigade."'";
    }
    
    // NS
    $nsLow = trim(removecommas($_GET['nsLow']));
    $nsHigh = trim(removecommas($_GET['nsHigh']));
    if(strlen($nsLow) > 0 || strlen($nsHigh) > 0) {
        $filterstr .= " AND nationstrength >= " . ((strlen($nsLow) > 0) ? ($nsLow) : (0));
        $filterstr .= " AND nationstrength <= " . ((strlen($nsHigh) > 0) ? ($nsHigh) : (999999));
    }
    
    // Infra
    $infraLow = trim(removecommas($_GET['infraLow']));
    $infraHigh = trim(removecommas($_GET['infraHigh']));
    if(strlen($infraLow) > 0 || strlen($infraHigh) > 0) {
        $filterstr .= " AND infra >= " . ((strlen($infraLow) > 0) ? ($infraLow) : (0));
        $filterstr .= " AND infra <= " . ((strlen($infraHigh) > 0) ? ($infraHigh) : (99999));
    }
    
    // Tech
    $techLow = trim(removecommas($_GET['techLow']));
    $techHigh = trim(removecommas($_GET['techHigh']));
    if(strlen($techLow) > 0 || strlen($techHigh) > 0) {
        $filterstr .= " AND tech >= " . ((strlen($techLow) > 0) ? ($techLow) : (0));
        $filterstr .= " AND tech <= " . ((strlen($techHigh) > 0) ? ($techHigh) : (99999));
    }
    
    // Spies
    $spiesLow = trim(removecommas($_GET['spiesLow']));
    $spiesHigh = trim(removecommas($_GET['spiesHigh']));
    if(strlen($spiesLow) > 0 || strlen($spiesHigh) > 0) {
        $filterstr .= " AND spies >= " . ((strlen($spiesLow) > 0) ? ($spiesLow) : (0));
        $filterstr .= " AND spies <= " . ((strlen($spiesHigh) > 0) ? ($spiesHigh) : (800));
    }
    
    // WC Compliance
    $filterstr .= (isset($_GET['compliance'])) ? (" AND compliance = ".$_GET['compliance']) : "";
    
    // Wonders
    $filterstr .= (isset($_GET['mp'])) ? " AND mp = 1" : "";
    $filterstr .= (isset($_GET['sdi'])) ? " AND sdi = 1" : "";
    $filterstr .= (isset($_GET['pent'])) ? " AND pent = 1" : "";
    $filterstr .= (isset($_GET['wrc'])) ? " AND wrc = 1" : "";
    $filterstr .= (isset($_GET['fafb'])) ? " AND fafb = 1" : "";
    $filterstr .= (isset($_GET['aadn'])) ? " AND aadn = 1" : "";
    $filterstr .= (isset($_GET['hnms'])) ? " AND hnms = 1" : "";
    
    // War/Peace mode
    $filterstr .= (isset($_GET['warpeace'])) ? (" AND warpeace='".$_GET['warpeace']."'") : "";
    
    // Tier
    $filterstr .= (isset($_GET['tier'])) ? (" AND tier = ".$_GET['tier']) : "";
    
    // End filter options
    
    // Fix the first AND and turn into WHERE, if filter applies
    if(strlen($filterstr) > 0) {
        $filterstr = substr_replace($filterstr, " WHERE", 0, 4);
    }
    
    // Add filter, and ordering
    $querystr .= $filterstr . " ORDER BY ".$field." ".$order;
    
//    echo $querystr;

    $result = mysqli_query($conn, $querystr);
    
    if(!$result) {
        die('Error fetching members: '.mysqli_error($conn));
    }

    // List member info
    echo "<br />";
    echo "<h1>".$brigade." Brigade</h1>";
    echo "<br />";
    echo "<table cellspacing=0 cellpadding=5>";
    // Create table header
    $headers = choose_view('0');
    $thead = "<tr class=\"head\">";
    foreach(array_keys($headers) as $header) {
        $headerorder = ($field == $header && $order == "desc") ? "asc" : "desc";
        $headerorderindicator = "";
        if($field == $header) {
            $headerorderindicator = ($order == "asc") ? " &uarr;" : " &darr;";
            $thead .= "<td class=\"selectedheader\">";
        }
        else {
            $thead .= "<td>";
        }
        $thead .= trim("<a href=\"?action=wcformoverview&brigade=".$brigade."&field=".$header."&order=".$headerorder."\">".$headers[$header]."</a>".$headerorderindicator);
        $thead .= "</td>";
    }
    $thead .= "</tr>";
    
    // We're done! Send it off
    echo $thead;

    $counter = 0;
    // Generate rows
    $rowcount = 0;
    while($row = $result->fetch_assoc()) {
        if($rowcount % 2 == 0) {
            echo "<tr>";
        }
        else {
            echo "<tr class=\"odd\">";
        }
        
        foreach(array_keys($row) as $key) {
            $val = $row[$key];

            if($key == "timestamp") {
                $val = date("Y-m-d", strtotime($val));
            }
            if($key == "rulername") {
                $val = "<a href=\"http://www.cybernations.net/nation_drill_display.asp?Nation_ID=".$row["nation_id"]."\" target=\"_blank\">".$val."</a>";
            }
            if($key == "nation_id") {
                continue;
            }
            if($key == "nationstrength" || $key == "warchest") {
                $val = number_format($val);
            }
            if($key == "mp" || $key == "sdi" || $key == "pent" || $key == "wrc" || $key == "fafb" || $key == "aadn" || $key == "hnms") {
                $val = ($val == 1) ? "<img src=\"tick.gif\" alt=\"war\" />" : "<img src=\"cross.gif\" alt=\"peace\" />";
            }
            if($key == "warpeace") {
                $val = ($val == "war") ? "<img src=\"war.gif\" alt=\"Yes\" />" : "<img src=\"peace.gif\" alt=\"No\" />";
            }
            if($key == 'compliance') {
                if($val == '2')
                {
                    $val = "<img src=\"tick.gif\" alt=\"Full Compliance\" />";
                } elseif($val == '1') {
                    $val = "<img src=\"mid.png\" alt=\"Half Compliance\" />";
                } else {
                    $val = "<img src=\"cross.gif\" alt=\"Not Compliant\" />";
                }
            }

            echo "<td>".$val."</td>";
        }
        
        echo "</tr>";
        $rowcount++;
        $counter++;
    }
    
    echo "</table>";
    
    $result->close();
    
    // Close connection
    mysqli_close($conn);
?>
<strong>There are <?php echo($counter);?> members signed in</strong>
<form name="export" method="POST" action="paxexp.php" target="_blank">
				<div>Export current view to: <input type="radio" name="format" value="full" checked>&nbsp;BBCode (wonders)&nbsp;<input type="radio" name="format" value="short">&nbsp;BBCode (short)&nbsp;&nbsp;&nbsp;
				<input type="hidden" name="orderby" value="" />
				<input type="hidden" name="brigade" value="<?php echo $_GET['brigade']; ?>" />
				<input type="hidden" name="filter" value="<?php echo urlencode($filterstr); ?>" />
				<input type="submit" name="submit" value="Export" /></div
</body>
</html>