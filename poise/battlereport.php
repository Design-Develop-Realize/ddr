<html>
<head>
<title>NpO Battle Report Generator</title>
</head>
<body>
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
table.report {
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

<form action="#" method="POST">
    
    <input type="hidden" name="action" value="wcformoverview" />
    <input type="hidden" name="field" value=nationstrength /><input type="hidden" name="order" value=desc />    

    <h2>Battle Report generator</h2>
    <table class="report">
    <tr>
        <td><strong>Enemy Warchest information</strong></td>
        <td><input type="radio" name="enemywc" id="ewc0" value="No information" checked><label for="ewc0">No info</label></input><br />
        <input type="radio" name="enemywc" id="ewc1" value="Spy report"><label for="ewc1">Spy report (enter warchest): </label><input type="text" name="enemywctf" id="ewctf" /></input><br />
        <input type="radio" name="enemywc" id="ewc2" value="Less than 1M stolen/destroyed in Ground Attack"><label for="ewc2">Less than 1M stolen/destroyed in Ground Attack</label></input></td>
    </tr>
    
    <tr>
        <td><strong>Your attacks against enemy</strong></td>
        <td>
            <input type="checkbox" id="ga1" name="ga1" value="ga1" /><label for="ga1">Ground Attack 1:</label>
            <input type="radio" name="ga1c" id="ga1w" value="My Victory"><label for="ga1w">Your win</label></input>
            <input type="radio" name="ga1c" id="ga1l" value="[color=red]My Defeat[/color]"><label for="ga1l">Your loss</label></input>
            <input type="radio" name="ga1c" id="ga1d" value="Draw"><label for="ga1d">Draw</label></input>
            <input type="radio" name="ga1c" id="ga1da" value="Defeat Alert"><label for="ga1da">Defeat Alert</label></input>
            <br />
            <input type="checkbox" id="ga2" name="ga2" value="ga2" /><label for="ga2">Ground Attack 2:</label>
            <input type="radio" name="ga2c" id="ga2w" value="My Victory"><label for="ga2w">Your win</label></input>
            <input type="radio" name="ga2c" id="ga2l" value="[color=red]My Defeat[/color]"><label for="ga2l">Your loss</label></input>
            <input type="radio" name="ga2c" id="ga2d" value="Draw"><label for="ga2d">Draw</label></input>
            <input type="radio" name="ga2c" id="ga2da" value="Defeat Alert"><label for="ga2da">Defeat Alert</label></input>
            <br />
            
            <input type="checkbox" id="nuke" name="nuke" value="nuke" /><label for="nuke">Nuclear Missile</label><br />
            
            <input type="checkbox" id="spy1" name="spy1" value="spy1" /><label for="spy1">Spy Op 1:</label>
            <select name="spy1op">
                <option value="Gather Intelligence">Gather Intelligence</option>
                <option value="Destroy Nukes">Target Weapons of Mass Destruction</option>
                <option value="Destroy Money">Destroy Money</option>
                <option value="Change DEFCON Level">Change DEFCON Level</option>
                <option value="Change Threat Level">Change Threat Level</option>
                <option value="Incite Government Propaganda">Incite Government Propaganda</option>
                <option value="Assassinate Enemy Spies">Assassinate Enemy Spies</option>
                <option value="Sabotage IRS Proficiency">Sabotage IRS Proficiency</option>
                <option value="Destroy Cruise Missiles">Destroy Cruise Missiles</option>
                <option value="Destroy Tanks">Destroy Tanks</option>
                <option value="Destroy Land">Destroy Land</option>
                <option value="Incite Religious Propaganda">Incite Religious Propaganda</option>
                <option value="Destroy Technology">Destroy Technology</option>
                <option value="Destroy Infrastructure">Destroy Infrastructure</option>
            </select>
            <input type="radio" name="spy1c" id="spy1s" value="Success"><label for="spy1s">Success</label></input>
            <input type="radio" name="spy1c" id="spy1t" value="Thwarted"><label for="spy1t">Thwarted</label></input>
            <br />
            
            <input type="checkbox" id="spy2" name="spy2" value="spy2" /><label for="spy2">Spy Op 2:</label>
            <select name="spy2op">
                <option value="Gather Intelligence">Gather Intelligence</option>
                <option value="Destroy Nukes">Target Weapons of Mass Destruction</option>
                <option value="Destroy Money">Destroy Money</option>
                <option value="Change DEFCON Level">Change DEFCON Level</option>
                <option value="Change Threat Level">Change Threat Level</option>
                <option value="Incite Government Propaganda">Incite Government Propaganda</option>
                <option value="Assassinate Enemy Spies">Assassinate Enemy Spies</option>
                <option value="Sabotage IRS Proficiency">Sabotage IRS Proficiency</option>
                <option value="Destroy Cruise Missiles">Destroy Cruise Missiles</option>
                <option value="Destroy Tanks">Destroy Tanks</option>
                <option value="Destroy Land">Destroy Land</option>
                <option value="Incite Religious Propaganda">Incite Religious Propaganda</option>
                <option value="Destroy Technology">Destroy Technology</option>
                <option value="Destroy Infrastructure">Destroy Infrastructure</option>
            </select>
            <input type="radio" name="spy2c" id="spy2s" value="Success"><label for="spy2s">Success</label></input>
            <input type="radio" name="spy2c" id="spy2t" value="Thwarted"><label for="spy2t">Thwarted</label></input>
            <br />
            
            <input type="checkbox" id="cm" name="cm" value="cm" /><label for="cm">2 Cruise Missiles</label><br />
            
            <input type="checkbox" id="air" name="air" value="air" /><label for="air">Air Attacks</label><br />
        </td>
    </tr>
    
    <tr>
        <td><strong>Enemy attacks against you</strong></td>
        <td>
            <input type="checkbox" id="ega1" name="ega1" value="ega1" /><label for="ega1">Ground Attack 1:</label>
            <input type="radio" name="ega1c" id="ega1w" value="My Victory"><label for="ega1w">Your win</label></input>
            <input type="radio" name="ega1c" id="ega1l" value="[color=red]My Defeat[/color]"><label for="ega1l">Your loss</label></input>
            <input type="radio" name="ega1c" id="ega1d" value="Draw"><label for="ega1d">Draw</label></input>
            <input type="radio" name="ega1c" id="ega1da" value="[color=red]Defeat Alert[/color]"><label for="ega1da">Defeat Alert</label></input>
            <br />
            <input type="checkbox" id="ega2" name="ega2" value="ega2" /><label for="ega2">Ground Attack 2:</label>
            <input type="radio" name="ega2c" id="ega2w" value="My Victory"><label for="ega2w">Your win</label></input>
            <input type="radio" name="ega2c" id="ega2l" value="[color=red]My Defeat[/color]"><label for="ega2l">Your loss</label></input>
            <input type="radio" name="ega2c" id="ega2d" value="Draw"><label for="ega2d">Draw</label></input>
            <input type="radio" name="ega2c" id="ega2da" value="[color=red]Defeat Alert[/color]"><label for="ega2da">Defeat Alert</label></input>
            <br />
            
            <input type="checkbox" id="enuke" name="enuke" value="enuke" /><label for="enuke">Nuclear Missile</label><br />
            
            <input type="checkbox" id="espy1" name="espy1" value="espy1" /><label for="espy1">Spy Op 1:</label>
            <select name="espy1op">
                <option value="Gather Intelligence">Gather Intelligence</option>
                <option value="Destroy Nukes">Target Weapons of Mass Destruction</option>
                <option value="Destroy Money">Destroy Money</option>
                <option value="Change DEFCON Level">Change DEFCON Level</option>
                <option value="Change Threat Level">Change Threat Level</option>
                <option value="Incite Government Propaganda">Incite Government Propaganda</option>
                <option value="Assassinate Enemy Spies">Assassinate Enemy Spies</option>
                <option value="Sabotage IRS Proficiency">Sabotage IRS Proficiency</option>
                <option value="Destroy Cruise Missiles">Destroy Cruise Missiles</option>
                <option value="Destroy Tanks">Destroy Tanks</option>
                <option value="Destroy Land">Destroy Land</option>
                <option value="Incite Religious Propaganda">Incite Religious Propaganda</option>
                <option value="Destroy Technology">Destroy Technology</option>
                <option value="Destroy Infrastructure">Destroy Infrastructure</option>
            </select>
            <input type="radio" name="espy1c" id="espy1s" value="Success"><label for="espy1s">Success</label></input>
            <input type="radio" name="espy1c" id="espy1t" value="Thwarted"><label for="espy1t">Thwarted</label></input>
            <br />
            
            <input type="checkbox" id="espy2" name="espy2" value="espy2" /><label for="espy2">Spy Op 2:</label>
            <select name="espy2op">
                <option value="Gather Intelligence">Gather Intelligence</option>
                <option value="Destroy Nukes">Target Weapons of Mass Destruction</option>
                <option value="Destroy Money">Destroy Money</option>
                <option value="Change DEFCON Level">Change DEFCON Level</option>
                <option value="Change Threat Level">Change Threat Level</option>
                <option value="Incite Government Propaganda">Incite Government Propaganda</option>
                <option value="Assassinate Enemy Spies">Assassinate Enemy Spies</option>
                <option value="Sabotage IRS Proficiency">Sabotage IRS Proficiency</option>
                <option value="Destroy Cruise Missiles">Destroy Cruise Missiles</option>
                <option value="Destroy Tanks">Destroy Tanks</option>
                <option value="Destroy Land">Destroy Land</option>
                <option value="Incite Religious Propaganda">Incite Religious Propaganda</option>
                <option value="Destroy Technology">Destroy Technology</option>
                <option value="Destroy Infrastructure">Destroy Infrastructure</option>
            </select>
            <input type="radio" name="espy2c" id="espy2s" value="Success"><label for="espy2s">Success</label></input>
            <input type="radio" name="espy2c" id="espy2t" value="Thwarted"><label for="espy2t">Thwarted</label></input>
            <br />
            
            <input type="checkbox" id="ecm" name="ecm" value="ecm" /><label for="ecm">2 Cruise Missiles</label><br />
            
            <input type="checkbox" id="eair" name="eair" value="eair" /><label for="eair">Air Attacks</label><br />
        </td>
    </tr>
    
    <tr>
        <td><strong>Enemy behaviour</strong></td>
        <td>
            <input type="checkbox" id="coord" name="coord" value="coord" /><label for="coord">Enemy coordinates with others</label><br />
            <input type="checkbox" id="gas" name="gas" value="gas" /><label for="gas">Enemy runs Ground Attacks</label><br />
            <input type="checkbox" id="turtle" name="turtle" value="turtle" /><label for="turtle">Enemy is turtling</label><br />
            <input type="checkbox" id="rebuy" name="rebuy" value="rebuy" /><label for="rebuy">Enemy rebuys troops immediately after being nuked</label><br />
            <input type="checkbox" id="other" name="other" value="other" /><label for="other">Other: </label><input type="text" id="othertf" name="othertf" /><br />
        </td>
    </tr>
    
    <tr>
        <td><strong>Enemy activity</strong></td>
        <td>
            <input type="checkbox" id="tod" name="tod" value="tod" /><label for="tod">Enemy attacks at particular time of day: </label><input type="text" id="todtf" name="todtf" /><br />
            <input type="checkbox" id="update" name="update" value="update" /><label for="update">Enemy is online at update</label><br />
        </td>
    </tr>
    
    </table>    
    <br />
    <input type="hidden" name="sekrit" />
    <input type="submit" value="Submit" />
</form>

<?php
    if(!isset($_POST['sekrit'])) {
        exit(0);
    }
    
    echo "<h2>Generated report:</h2>";
    
    // Enemy WC info
    $ewc = $_POST['enemywc'];
    $enemywc = "[b]Enemy Warchest info:[/b] ";
    if(strpos($ewc, "Less than") !== false) {
        $enemywc .= "[color=red]".$ewc."[/color]";
    }
    elseif(strpos($ewc, "Spy report") !== false) {
        $enemywc .= $_POST['enemywctf']." (Spy report)";
    }
    else {
        $enemywc .= $ewc;
    }
    
    // Your attacks
    $yourattacks = "[b]My attacks:[/b] ";
    $attacks = "";
    $attacks .= isset($_POST['ga1']) ? "[li]Ground attack: ".$_POST['ga1c']."[/li]<br>" : "";
    $attacks .= isset($_POST['ga2']) ? "[li]Ground attack: ".$_POST['ga2c']."[/li]<br>" : "";
    $attacks .= isset($_POST['nuke']) ? "[li]Nuclear Missile[/li]<br>" : "";
    $attacks .= isset($_POST['spy1']) ? "[li]Spy Operaton: ".$_POST['spy1op'].": ".$_POST['spy1c']."[/li]<br>" : "";
    $attacks .= isset($_POST['spy2']) ? "[li]Spy Operation: ".$_POST['spy2op'].": ".$_POST['spy2c']."[/li]<br>" : "";
    $attacks .= isset($_POST['cm']) ? "[li]2 Cruise Missiles[/li]<br>" : "";
    $attacks .= isset($_POST['air']) ? "[li]2 Aircraft Attacks[/li]<br>" : "";
    $yourattacks .= (strlen($attacks) > 0) ? ("<br>[list]<br>".$attacks."[/list]") : "No attacks run";
    
    // Enemy attacks
    $enemyattacks = "[b]Enemy attacks:[/b] ";
    $attacks = "";
    $attacks .= isset($_POST['ega1']) ? "[li]Ground attack: ".$_POST['ega1c']."[/li]<br>" : "";
    $attacks .= isset($_POST['ega2']) ? "[li]Ground attack: ".$_POST['ega2c']."[/li]<br>" : "";
    $attacks .= isset($_POST['enuke']) ? "[li]Nuclear Missile[/li]<br>" : "";
    $attacks .= isset($_POST['espy1']) ? "[li]Spy Operaton: ".$_POST['espy1op'].": ".$_POST['espy1c']."[/li]<br>" : "";
    $attacks .= isset($_POST['espy2']) ? "[li]Spy Operation: ".$_POST['espy2op'].": ".$_POST['espy2c']."[/li]<br>" : "";
    $attacks .= isset($_POST['ecm']) ? "[li]2 Cruise Missiles[/li]<br>" : "";
    $attacks .= isset($_POST['eair']) ? "[li]2 Aircraft Attacks[/li]<br>" : "";
    $enemyattacks .= (strlen($attacks) > 0) ? ("<br>[list]<br>".$attacks."[/list]") : "No attacks run";
    
    // Enemy behaviour
    $enemybehaviour = "[b]Enemy behaviour:[/b] ";
    $behaviour = "";
    $behaviour .= isset($_POST['coord']) ? "[li][color=red]Enemy coordinates with others[/color][/li]<br>" : "";
    $behaviour .= isset($_POST['gas']) ? "[li]Enemy runs Ground Attacks[/li]<br>" : "";
    $behaviour .= isset($_POST['turtle']) ? "[li]Enemy is turtling[/li]<br>" : "";
    $behaviour .= isset($_POST['rebuy']) ? "[li]Enemy rebuys troops immediately after being nuked[/li]<br>" : "";
    $behaviour .= isset($_POST['coord']) ? "[li]Other: ".$_POST['othertf']."[/li]<br>" : "";
    $enemybehaviour .= (strlen($behaviour) > 0) ? ("<br>[list]<br>".$behaviour."[/list]") : "No notable behaviour";
    
    // Enemy activity
    $enemyactivity = "[b]Enemy activity:[/b] ";
    $activity = "";
    $activity .= isset($_POST['tod']) ? "[li]Enemy attacks at particular time of day: ".$_POST['todtf']."[/li]<br>" : "";
    $activity .= isset($_POST['update']) ? "[li]Enemy is online at update[/li]<br>" : "";
    $enemyactivity .= (strlen($activity) > 0) ? ("<br>[list]<br>".$activity."[/list]") : "No notable activity";
    
    
    
    // Full report
    $report = $enemywc."<br><br>".$yourattacks."<br><br>".$enemyattacks."<br><br>".$enemybehaviour."<br><br>".$enemyactivity;
    echo $report;
 ?>

</body>
</html>