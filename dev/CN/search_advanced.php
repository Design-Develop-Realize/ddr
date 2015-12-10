<?
  session_start();
  session_register("denyreason_session");
  session_register("loginattempt_session");
  session_register("MM_Username_session");
?>
<!--#include file="connection.php" -->
<!--#include file="inc_header.php" -->
<? if request.form("resources") <> "" then

teamselect = request.form("team")

MyString = request.form("resources")
MyString = replace(MyString, "+","'")
MyString = replace(MyString, ", ",",")

set rsSearch = Server.CreateObject("ADODB.Recordset")
rsSearch.ActiveConnection = MM_conn_STRING
rsSearch.Source = "SELECT count(*) as total from nation where  Nation_Team = '"& teamselect &"' AND (resource1 in ("+  MyString +") or resource2 in ("+  MyString +"))                               "  
rsSearch.CursorType = 0
rsSearch.CursorLocation = 2
rsSearch.LockType = 3
rsSearch.Open()
response.write(rsSearch("Total"))

end if
%>


<form method="POST">
	<p><input type="checkbox" name="resources" value="+cattle+"> cattle</p>
	<p><input type="checkbox" name="resources" value="+pigs+"> pigs</p>
	<p><input type="checkbox" name="resources" value="+fish+"> fish</p>
	<p><input type="checkbox" name="resources" value="+oil+"> oil</p>
	<p><select size="1" name="team">
	<option>Red</option>
	<option>Black</option>
	<option>Blue</option>
	</select></p>
	<p><br>
	<input type="submit" value="Submit" name="B1"></p>
</form>
