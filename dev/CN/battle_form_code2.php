<?
  session_start();
  session_register("denyreason_session");
  session_register("loginattempt_session");
  session_register("MM_Username_session");
  session_register("MM_UserAuthorization_session");
  session_register("activity_session");
?>
<!--#include file="connection.php" -->
<!--#include file="inc_header.php" -->
<? ' *** Restrict Access To Page: Grant or deny access to this page
MM_authorizedUsers=""
MM_authFailedURL="login.asp?login=1"
MM_grantAccess=false
If Session("MM_Username") <> "" Then
  If (true Or CStr(Session("MM_UserAuthorization"))="") Or _
         (InStr(1,MM_authorizedUsers,Session("MM_UserAuthorization"))>=1) Then
    MM_grantAccess = true
  End If
End If
If Not MM_grantAccess Then
  MM_qsChar = "?"
  If (InStr(1,MM_authFailedURL,"?") >= 1) Then MM_qsChar = "&"
  MM_referrer = Request.ServerVariables("URL")
  if (Len(Request.QueryString()) > 0) Then MM_referrer = MM_referrer & "?" & Request.QueryString()
  MM_authFailedURL = MM_authFailedURL & MM_qsChar & "accessdenied=" & Server.URLEncode(MM_referrer)
  Response.Redirect(MM_authFailedURL)
End If
%>
<? if ()
{

// $rsGuestbook0 is of type "ADODB.Recordset"

  $rsGuestbook0SQL="SELECT Nation_ID FROM Nation WHERE POSTER = '"+str_replace("'","''",$rsUser__MMColParam)+"'";
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query($rsGuestbook0SQL);
?>
<? 
  $rsWarCheck__MMColParam="0";
  if (($MM_Username_session!=""))
  {
    $rsWarCheck__MMColParam=$MM_Username_session;
  } 
// $rsWarCheck is of type "ADODB.Recordset"

    echo $MM_conn_STRING;
    echo "SELECT Receiving_Nation_ID,Declaring_Nation_ID,Receiving_Nation_Peace,Declaring_Nation_Peace FROM WAR WHERE Nation_Deleted = 0 AND War_Declaration_Date >= getdate() - 8 AND War.War_Declared_By_User = '"+str_replace("'","''",$rsWarCheck__MMColParam)+"' OR War.War_Declared_ON_User = '"+str_replace("'","''",$rsWarCheck__MMColParam)+"' ORDER BY War.War_Declaration_Date DESC";
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query();
  $rsWarCheck_numRows=0;
  $activewars=0;
  if ((!($rsWarCheck_BOF==1)) && (!($rsWarCheck==0)))
  {

    while(!($rsWarCheck==0))
    {

      if (($rsWarCheck["Receiving_Nation_ID"]-$_POST["bynation"]==0 && $rsWarCheck["Declaring_Nation_ID"]-$_POST["receivingnation"]==0) || ($rsWarCheck["Receiving_Nation_ID"]-$_POST["receivingnation"]==0 && $rsWarCheck["Declaring_Nation_ID"]-$_POST["bynation"]==0))
      {

        if ($rsWarCheck["Receiving_Nation_Peace"]+$rsWarCheck["Declaring_Nation_Peace"]!=2)
        {

          $activewars=$activewars+1;
        } 

      } 

      $rsWarCheck=mysql_fetch_array($rsWarCheck_query);
      $rsWarCheck_BOF=0;

    } 
  } 

  if ($activewars==0)
  {

    $denyreason_session="You may not attack a nation that you are not at war against.";
    header("Location: "."activity_denied.asp");
  } 

  
  $rsWarCheck=null;

?>




<? 
  $lngRecordNo1=intval($_POST["receivingnation"]);
// $rsDefend is of type "ADODB.Recordset"

  $rsDefendSQL="SELECT Nation.* FROM Nation WHERE Nation_ID=".$lngRecordNo1;
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query($rsDefendSQL);
  $rsDefend_numRows=0;
?>
<? 
  $lngRecordNo2=intval($_POST["bynation"]);
// $rsAttack is of type "ADODB.Recordset"

  $rsAttackSQL="SELECT *  FROM Nation, USERS WHERE Nation.POSTER = USERS.U_ID AND Nation_ID=".$lngRecordNo2;
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query($rsAttackSQL);
  $rsAttack_numRows=0;
?>

<!--#include file="activity.php" -->

<!--#include file="battle_form_calculation2.php" -->


<?   if ($_POST["goforlaunch"]!=1)
  {

    $denyreason_session="You may not attack a nation that you are not at war against.";
    header("Location: "."activity_denied.asp");
  } 

?>


<?   if ($defendingsoldiercasualties=="" || $defendingtankcasualties=="" || $attackingsoldiercasualties=="" || $attackingtankcasualties=="")
  {

    $denyreason_session="There was a system error during the battle. Please try again.";
    header("Location: "."activity_denied.asp");
  } 

?>


<? 
// $rsSent2 is of type "ADODB.Recordset"

  $rsSent2SQL="SELECT WAR.* FROM WAR WHERE Receiving_Nation_ID= '".$_POST["bynation"]."' OR Declaring_Nation_ID= '".$_POST["bynation"]."' ";
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query($rsSent2SQL);
  $rsSent2_numRows=0;
// make sure the user who sent the battle form is actually at war with the receiver

  $counter=0;
  while(!($rsSent2_BOF==1) && !($rsSent2==0))
  {

    $counter=$counter+1;
    $rsSent2=mysql_fetch_array($rsSent2_query);
    $rsSent2_BOF=0;

  } 
  if ($rsGuestbook0["Nation_ID"]-$_POST["bynation"]!=0 || $counter==0)
  {

    $denyreason_session="You are attempting to battle with invalid user credentials.";
    header("Location: "."activity_denied.asp");
  } 

?>


<? 
// Determine battle outcome for the defender

  if ($attackingrndodds<$defendingrndodds)
  {

    $battleoutcome="Defeat";
  }
    else
  {
    if ($attackingrndodds==$defendingrndodds)
    {

      $battleoutcome="Draw";
    }
      else
    {

      $battleoutcome="Victory";
    } 

  } 

?>


<? 
// defending nation first

// $rsUpdateEntry is of type "ADODB.Recordset"

  $rsUpdateEntrySQL="SELECT Nation.* FROM Nation WHERE Nation_ID=".$lngRecordNo1;
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query($rsUpdateEntrySQL);
  $rsUpdateEntry_numRows=0;

  if (($actualdefend-$defendingsoldiercasualties)<=($actualdefend*30) || ($actualdefend-$defendingsoldiercasualties)<=($defendingcitizens/15))
  {

    //Military_Depleated") = date()    //Government_Type") = "Anarchy"    //Government_Changed") = date()  } 


  if ($defendingsoldiercasualties>($attackingsoldiercasualties*150) || $defendingtankcasualties>($attackingtankcasualties*150))
  {

    $landsgained=("Land_Purchased")*.04;
    if ($landsgained>75)
    {
      $landsgained=75;
    }
;
    } 
    if ($landsgained>0)
    {

      //Land_Purchased") = rsUpdateEntry.Fields("Land_Purchased")-landsgained    } 


    if (("Infrastructure_Purchased")>2)
    {

      $infrastructuredestroyed=("Infrastructure_Purchased")*.04;
      if ($infrastructuredestroyed>20)
      {
        $infrastructuredestroyed=20;
      }
;
      } 
      //Infrastructure_Purchased") = rsUpdateEntry.Fields("Infrastructure_Purchased")-infrastructuredestroyed    } 


    $techdestroyed=0;
    if (("Technology_Purchased")>10)
    {

      $techdestroyed=("Technology_Purchased")*.05;
      if ($techdestroyed>5)
      {
        $techdestroyed=5;
      }
;
      } 
      //Technology_Purchased") = rsUpdateEntry.Fields("Technology_Purchased")-techdestroyed     } 

  } 




  if ($battleoutcome=="Victory")
  {
//Defeat for defender

    //Money_Spent") = rsUpdateEntry.Fields("Money_Spent") + passeddefendingmoney    $defendmoneylost=$passeddefendingmoney;
  } 

  if ($battleoutcome=="Defeat")
  {
//Victory for defender

    //Money_Earned") = rsUpdateEntry.Fields("Money_Earned") + passedattackingmoney     $defendmoneygained=$passedattackingmoney;


  } 



  //Military_Defending_Casualties") = rsUpdateEntry.Fields("Military_Defending_Casualties") + defendingsoldiercasualties
  if (!isset(("Tanks_Defending")))
  {

    $numtanksdefending=0;
  }
    else
  {

    $numtanksdefending=("Tanks_Defending");
  } 

  //Tanks_Defending") = numtanksdefending - defendingtankcasualties


  
?>
 

<? 
// attacking nation second

//Dim rsUpdateEntry

//Dim rsUpdateEntrySQL

  $lngRecordNo2=intval($_POST["bynation"]);
// $rsUpdateEntry is of type "ADODB.Recordset"

  $rsUpdateEntrySQL="SELECT Nation.* FROM Nation WHERE Nation_ID=".$lngRecordNo2;
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query($rsUpdateEntrySQL);
  $rsUpdateEntry_numRows=0;


  if ($landsgained>0)
  {

    //Land_Purchased") = rsUpdateEntry.Fields("Land_Purchased") + landsgained  } 

  if ($techdestroyed>0)
  {

    //Technology_Purchased") = rsUpdateEntry.Fields("Technology_Purchased") + techdestroyed  } 


  //Military_Attacking_Casualties") = rsUpdateEntry.Fields("Military_Attacking_Casualties") + attackingsoldiercasualties  //Military_Deployed") = rsUpdateEntry.Fields("Military_Deployed") - attackingsoldiercasualties




  if (!isset(("Tanks_Deployed")))
  {

    $numtanksdeployed=0;
  }
    else
  {

    $numtanksdeployed=("Tanks_Deployed");
  } 

  //Tanks_Deployed") = numtanksdeployed - attackingtankcasualties





  if ($battleoutcome=="Victory")
  {
//Victory for the attacker

    //Money_Earned") = rsUpdateEntry.Fields("Money_Earned") + passeddefendingmoney    $attackmoneygained=$passeddefendingmoney;


  } 

  if ($battleoutcome=="Defeat")
  {
//Defeat for the attacker

    //Money_Spent") = rsUpdateEntry.Fields("Money_Spent") + passedattackingmoney    $attackmoneylost=$passedattackingmoney;
  } 



//Write the updated recordset to the database

  






//Update the battle dates in the war table

  
  $rsAttack=null;

  $lngRecordNo=intval($_POST["receivingnation"]);
  $lngRecordNo2=intval($_POST["bynation"]);
// $rsAttack is of type "ADODB.Recordset"

  $rsAttackSQL="SELECT Receiving_Nation_ID,Declaring_Nation_ID,Receiving_Attack_Date2,Receiving_Attack_Date1,Declaring_Attack_Date2,Declaring_Attack_Date1 FROM WAR WHERE (Receiving_Nation_ID = '".$lngRecordNo."' OR Declaring_Nation_ID = '".$lngRecordNo."') AND (Receiving_Nation_ID = '".$lngRecordNo2."' OR Declaring_Nation_ID = '".$lngRecordNo2."') AND (Nation_Deleted = 0) AND (Receiving_Nation_Peace + Declaring_Nation_Peace <> 2) AND (getdate() - War_Declaration_Date < 8)  ORDER BY War.War_Declaration_Date DESC";
    echo 0;
    echo 2;
    echo 3;
  $rs=mysql_query($rsAttackSQL);

  if ($rsAttack["Receiving_Nation_ID"]=$lngRecordNo2$then$receivingattack=1;
}
;
$if$rsAttack["Declaring_Nation_ID"]=$lngRecordNo2$then$declaringattack=1;
}
;
)
  {

    if ($receivingattack==1)
    {

      if (("Receiving_Attack_Date2")==time()())
      {

        $denyreason_session="You have already been involved in two ground attacks today and cannot ground attack again until tomorrow.";
        header("Location: "."activity_denied.asp");
      }
        else
      {

        if (("Receiving_Attack_Date1")==time()())
        {

          //Receiving_Attack_Date2") = date()        }
          else
        {

          //Receiving_Attack_Date1") = date()        } 

      } 

    } 

    if ($declaringattack==1)
    {

      if (("Declaring_Attack_Date2")==time()())
      {

        $denyreason_session="You have already been involved in two ground attacks today and cannot ground attack again until tomorrow.";
        header("Location: "."activity_denied.asp");
      }
        else
      {

        if (("Declaring_Attack_Date1")==time()())
        {

          //Declaring_Attack_Date2") = date()        }
          else
        {

          //Declaring_Attack_Date1") = date()        } 

      } 

    } 


//Write the updated recordset to the database

    
    
    $rsAttack=null;



    if ($battleoutcome=="Defeat")
    {
      $messagebattle="Victory";
    }
;
    } 
    if ($battleoutcome=="Victory")
    {
      $messagebattle="Defeat";
    }
;
    } 
    if ($battleoutcome=="Draw")
    {
      $messagebattle="Draw";
    }
;
    } 

// $rsAddComments is of type "ADODB.Recordset"

    $rsAddCommentsSQL="EMESSAGES";
        echo 0;
        echo 2;
        echo 3;
    $rs=mysql_query($rsAddCommentsSQL);
    $rsAddComments_numRows=0;

    

//Add a new record to the recordset

    //U_ID") = Request.Form("receivinguser")    //MESS_FROM") =  Request.Form("attackinguser")     //MESSAGE") = "You have been attacked by " & Request.Form("attackinguser")  & ". You lost " & defendingsoldiercasualties &  " soldiers and " & defendingtankcasualties &" tanks. You killed " & attackingsoldiercasualties & " soldiers and " & attackingtankcasualties &" tanks. Their forces razed " & FormatNumber(landsgained,3) & " miles of your land, stole " & FormatNumber(techdestroyed,3) &" technology, and destroyed " & FormatNumber(infrastructuredestroyed,3) & " infrastructure. Their forces looted $" & FormatNumber(attackmoneygained,2) &" from you and you gained $"& FormatNumber(defendmoneygained,2) &" in your enemy's abandoned equipment. In the end the battle was a " & messagebattle & "."    //SUBJECT") = "Battle Report"    //MESS_READ") = "False"


//Write the updated recordset to the database

    



//Reset server objects

    
    $rsUpdateEntry=null;

    
    $rsAddComments=null;


?>




<body>

<table border="1" width="100%" cellspacing="0" cellpadding="5" bgcolor="#F7F7F7" bordercolor="#000080" id="table1">
	
	
		<tr>
			<td width="100%" colspan="2" bgcolor="#000080">
			<b><font color="#FFFFFF">:. Battle Results</font></b></td>
		</tr>
	
	
		<tr>
			<td width="50%">
			Battle Type:</td>
			<td width="50%">
<?     echo $_POST["type"]; ?></td>
		</tr>
	
	
		<tr>
			<td width="50%">
			Battle Outcome:</td>
			<td width="50%">
<?     $outcome=$defendingrndodds-$attackingrndodds;
?>			
	<?     echo $battleoutcome; ?>			
			
			</td>
		</tr>
		<tr>
			<td width="50%">
			<?     echo $_POST["attackingnation"]; ?> Casualties:</td>
			<td width="50%">
			<?     echo $attackingsoldiercasualties; ?> soldiers<br>
			<?     echo $attackingtankcasualties; ?> tanks
			</td>
		</tr>
		<tr>
			<td width="50%">
			<?     echo $_POST["defendingnation"]; ?>
			Casualties:</td>
			<td width="50%">
			
			<?     echo $defendingsoldiercasualties; ?> soldiers<br>
			<?     echo $defendingtankcasualties; ?> tanks		
			
			</td>
		</tr>
<tr>
<td width="50%" valign="top">

Battle Details:</td>
<td width="50%">
<?     if ($attackingsoldiercasualties==$defendingsoldiercasualties && $outcome<0)
    {
?>
The battle was a draw in the number of lives lost, but overall at the end of the battle your army was victorious.
<?     } ?>
<?     if ($attackingsoldiercasualties==$defendingsoldiercasualties && $outcome>0)
    {
?>
The battle was a draw in the number of lives lost, but overall at the end of the battle your army was defeated.
<?     } ?>
<?     if ($attackingsoldiercasualties<$defendingsoldiercasualties && $outcome<0)
    {
?>
Your soldiers were triumphant and decisively defeated your enemy in this battle. Your soldiers owe their lives to your hard work as 
their leader.
<?     } ?>
<?     if ($attackingsoldiercasualties-$defendingsoldiercasualties<=0 && $outcome>0)
    {
?>
Your soldiers fought bravely and killed many enemy soldiers but were forced to retreat and were 
ultimately defeated in battle.
<?     } ?>
<?     if ($attackingsoldiercasualties-$defendingsoldiercasualties>=0 && $outcome<0)
    {
?>
Many of your soldiers lives were lost in this battle, even more than your enemy, but at the end of the battle 
your army was victorious.
<?     } ?>
<?     if ($attackingsoldiercasualties>$defendingsoldiercasualties && $outcome>0)
    {
?>
Your forces fought bravely but were decisively defeated in battle.
<?     } ?>


<?     if ($landsgained>0)
    {
?>
			<?       if ($outcome<0)
      {
?>
			In your victory your forces captured 
			<?       }
        else
      {
        if ($outcome>0)
        {
?>
			In your defeat your forces were still able to capture 
			<?         }
          else
        {
          if ($outcome==0)
          {
?>
			The battle was a draw and your forces captured 
			<?           } ?><?         } ?><?       } ?>
	 <?       echo $FormatNumber[$landsgained][3]; ?> miles of land from <?       echo $_POST["defendingnation"]; ?>.
	<?     }
      else
    {
?>
	There were no land spoils of war captured in this battle.
<?     } ?>


<?     if ($infrastructuredestroyed>0)
    {
?>
			<?       if ($outcome<0)
      {
?>
			They also destroyed
			<?       }
        else
      {
        if ($outcome>0)
        {
?>
			They also destroyed
			<?         }
          else
        {
          if ($outcome==0)
          {
?>
			They also destroyed
			<?           } ?><?         } ?><?       } ?>
	 <?       echo $FormatNumber[$infrastructuredestroyed][3]; ?> infrastructure within <?       echo $_POST["defendingnation"]; ?>.

	<?     }
      else
    {
?>
	There was no infrastructure destroyed in this battle.
<?     } ?>

<?     if ($techdestroyed>0)
    {
?>
			<?       if ($outcome<0)
      {
?>
			They also stole
			<?       }
        else
      {
        if ($outcome>0)
        {
?>
			They also stole
			<?         }
          else
        {
          if ($outcome==0)
          {
?>
			They also stole
			<?           } ?><?         } ?><?       } ?>
	 <?       echo $FormatNumber[$techdestroyed][3]; ?> technology from <?       echo $_POST["defendingnation"]; ?>.

	<?     }
      else
    {
?>
	There was no technology stolen in this battle.
<?     } ?>

The value of your equipment abandoned in the battle was $<?     echo $FormatNumber[$defendmoneygained][2]; ?>. 
Your forces looted $<?     echo $FormatNumber[$attackmoneygained][2]; ?> from the nation of <?     echo $_POST["defendingnation"]; ?>.


</td>
</tr>
		
		</table>

<p align="center"> <a href="nation_war_information.asp?Nation_ID=<?     echo $_POST["bynation"]; ?>">Back to your nation's War 
&amp; Battles Page</a></p>


</body>

<!--#include file="inc_footer.php" -->
</html>
<? 
$objConn->Close();
    $objConn=null;

?>  } 
} 

