<?php 
session_start();
if($_GET['action'] === 'logout')
{
    setcookie ("al", "", time() - 3600, '/', 'poise.designdeveloprealize.com', 0, 1);
}

if(!(isset($_COOKIE['al']) || $_COOKIE['al'] != ''))
{
	if(array_key_exists('login', $_POST))
	{
		//query the DB
        $conn = mysqli_connect("designdeveloprealize.com", "designde_poise", "vindicator", "designde_poise");
        if (!$conn) {
            die('Could not connect to database: '.mysqli_error());
        }

        $query = "SELECT `primary`, `additional` FROM `staff` WHERE `username` = '" . $_POST['username'] . "' AND `password` = '" .
                  $_POST['password'] . "'";

        $result = mysqli_query($conn, $query);

        $result1 = mysqli_fetch_array($result, MYSQLI_ASSOC);

        if(!is_array($result1)) {
            echo("Error: Incorrect Username/Password <br />");
        }
        $level = $result1['primary'] . "," . $result1['additional'];

        //Cookie has the level set
        setcookie('al', $level, time() + 3600, '/', 'poise.designdeveloprealize.com', 0, 1);

        header('Location: paxppl.php');
	} else {
?>
<div align="center">
    <form action="log.php" method="post">
        Username:
        <input type="text" name="username" />
        <br />
        Password:
        <input type="password" name="password" />
        <br />
        <input type="submit" name="login" value="Log In" />
    </form>
</div>
<?php
	}
} else {
	header('Location: paxppl.php');
}
?>