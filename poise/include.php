<?php  
function rebuild_calc($infra = 0, $tech = 0)
{
    $infra = (int)$infra;
    $tech  = (int)$tech;
    $icost = 0;
    $tcost = 0;
    //we need to group infra in the thousands
    $infra = round($infra, -3);

    switch($infra)
    {
        case 1000:
            $icost = 4164888;
            break;
        case 2000:
            $icost = 19494389;
            break;
        case 3000:
            $icost = 44942373;
            break;
        case 4000:
            $icost = 87581658;
            break;
        case 5000:
            $icost = 160556155;
            break;
        case 6000:
            $icost = 294201072;
            break;
        case 7000:
            $icost = 452130347;
            break;
        default:
            $icost = 0;
    }

    if($tech < 500)
    {
        $tcost = 0;
    } elseif($tech >= 500 && $tech < 1000)
    {
        $tcost = 24511380;
    } elseif($tech >= 1000 && $tech < 1500)
    {
        $tcost = 92331380;
    } elseif($tech >= 1500 && $tech < 2000)
    {
        $tcost = 205751380;
    } elseif($tech >= 2000 && $tech < 2500)
    {
        $tcost = 339551380;
    } elseif($tech >= 2500 && $tech < 3000)
    {
        $tcost = 512971380;
    } else {
        $tcost = 706771380;
    }

    return $icost + $tcost;
}

function table($level)
{
    if(in_array('1', $level))
    {
        return array("timestamp" => "Timestamp", "rulername" => "Ruler Name", "nationstrength" => "Nation Strength", "infra" => "Infra", "tech" => "Tech", "nukes" => "Nukes", "warchest" => "Warchest", "spies" => "Spies", "mp" => "MP", "sdi" => "SDI", "pent" => "PENT", "wrc" => "WRC", "fafb" => "FAFB", "aadn" => "AADN", "hnms" => "HNMS", "warpeace" => "War/Peace", "brigade" => "Brigade", "tier" => "Tier", "compliance" => "Compliance Level");
    } elseif(in_array('2', $level))
    {
        return array("timestamp" => "Timestamp", "rulername" => "Ruler Name", "nationstrength" => "Nation Strength", "infra" => "Infra", "tech" => "Tech", "nukes" => "Nukes", "warchest" => "Warchest", "spies" => "Spies", "mp" => "MP", "sdi" => "SDI", "pent" => "PENT", "wrc" => "WRC", "fafb" => "FAFB", "aadn" => "AADN", "hnms" => "HNMS", "warpeace" => "War/Peace", "brigade" => "Brigade", "tier" => "Tier", "compliance" => "Compliance Level");
    }elseif(in_array('3', $level))
    {
        return array("timestamp" => "Timestamp", "rulername" => "Ruler Name", "nationstrength" => "Nation Strength", "infra" => "Infra", "tech" => "Tech", "nukes" => "Nukes", "warchest" => "Warchest", "spies" => "Spies", "mp" => "MP", "sdi" => "SDI", "pent" => "PENT", "wrc" => "WRC", "fafb" => "FAFB", "aadn" => "AADN", "hnms" => "HNMS", "warpeace" => "War/Peace", "brigade" => "Brigade", "tier" => "Tier", "compliance" => "Compliance Level");
    }elseif(in_array('4', $level))
    {
        return array("timestamp" => "Last Sign In", "rulername" => "Ruler Name", "nationstrength" => "Nation Strength", "infra" => "Infra", "tech" => "Tech", "nukes" => "Nukes",  "mp" => "MP", "sdi" => "SDI", "pent" => "PENT", "wrc" => "WRC", "fafb" => "FAFB", "aadn" => "AADN", "hnms" => "HNMS", "warpeace" => "War/Peace", "brigade" => "Brigade", "compliance" => "Warchest Compliant");
    }
}
function JC_View($b, $f, $o)
{
    $querystr = "SELECT timestamp, rulername, nation_id, nationstrength, infra, tech, nukes, mp, sdi, pent, wrc, fafb, aadn, hnms, warpeace, brigade, compliance FROM member_latest";

    /*if(strlen($b) > 0) {
        $querystr .= " WHERE brigade='".$b."'";
    }
    $querystr .= " ORDER BY ".$f." ".$o;*/

    return $querystr;
}

function SC_View($b, $f, $o)
{
    $querystr = "SELECT timestamp, rulername, nation_id, nationstrength, infra, tech, nukes, warchest, spies, mp, sdi, pent, wrc, fafb, aadn, hnms, warpeace, brigade, tier, compliance FROM member_latest";

    /*if(strlen($b) > 0) {
        $querystr .= " WHERE brigade='".$b."'";
    }
    $querystr .= " ORDER BY ".$f." ".$o;*/

    return $querystr;
}

function HC_View($b, $f, $o)
{
    $querystr = "SELECT timestamp, rulername, nation_id, nationstrength, infra, tech, nukes, warchest, spies, mp, sdi, pent, wrc, fafb, aadn, hnms, warpeace, brigade, tier, compliance FROM member_latest";

    /*if(strlen($b) > 0) {
        $querystr .= " WHERE brigade='".$b."'";
    }
    $querystr .= " ORDER BY ".$f." ".$o;*/

    return $querystr;
}

function GV_View($b, $f, $o)
{
    $querystr = "SELECT timestamp, rulername, nation_id, nationstrength, infra, tech, nukes, warchest, spies, mp, sdi, pent, wrc, fafb, aadn, hnms, warpeace, brigade, tier, compliance FROM member_latest";

    /*if(strlen($b) > 0) {
        $querystr .= " WHERE brigade='".$b."'";
    }
    $querystr .= " ORDER BY ".$f." ".$o;*/

    return $querystr;
}

function choose_view($t, $b = '', $f = '', $o = '')
{
    $tmp = '';

    if(isset($_COOKIE['al']))
    {
        $tmp = explode(',', $_COOKIE['al']);

        if($t == '0')
        {
            return table($tmp);
        } else {
            if(in_array('1', $tmp))
            {
                return GV_View($b, $f, $o);
            } elseif(in_array('2', $tmp))
            {
                return HC_View($b, $f, $o);
            } elseif(in_array('3', $tmp))
            {
                return SC_View($b, $f, $o);
            } elseif(in_array('4', $tmp))
            {
                return JC_View($b, $f, $o);
            }
        }
    }
}

function show_instruction()
{
echo '
    <br />
    <br />
    <h1>How to input your data</h1>
    <p>
        At the top of the nation page, select "Extended Display".
    </p>
    <img src="http://i240.photobucket.com/albums/ff112/hazardousdoc/signintut1.jpg" />
    <p>
        Then, right click on an empty part of the page, and select "Page Source" or "View Page Source".  The picture depicts what you might see if you are using Firefox, but this applies to Internet Explorer and Google Chrome as well.
    </p>
    <img src="http://i240.photobucket.com/albums/ff112/hazardousdoc/signintut2.jpg" />
    <p>
        You should then have a new window open up.  Copy everything that you see in this window (an easy way is to right click, and hit "Select all").
    </p>
    <img src="http://i240.photobucket.com/albums/ff112/hazardousdoc/signintut3.jpg" />
    <p>
        Then paste everything into the empty space.  Make sure to select your brigade!  When you are done, hit the submit button.  If you receive any errors, let a member of your Brigade staff know!
    </p>
    <img src="http://i240.photobucket.com/albums/ff112/hazardousdoc/signintut4.jpg" />
    </p>';
}