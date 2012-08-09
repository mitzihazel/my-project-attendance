<html>
<head>
	<style type="text/css">
	p.2
	{
		font-size:28px;
	}
	p.1
	{
		font-size:18px;
	}
	</style>
</head>
<body>
	<a href="index.html"><img src="ban.jpg" width="100%"></a>
	<p class="2" align="center"><b>Welcome to Prasad V Potluri Siddhartha Institute of Technology Student Information System</b></P>
<?php
$con = mysql_connect("localhost","root","");
if(!$con){
	die("can not connect : ".mysql_error());
}
mysql_select_db("att",$con);
if(isset($_POST['update'])){
$UpdateQuery = "UPDATE  `att`.`3s2` SET  `cg` =  '$_POST[cg]' WHERE  cg='$_POST[hidden]' and id='$_POST[id]'";

mysql_query($UpdateQuery,$con);
};
$sql = "SELECT id,cg FROM 3s2";
$myData = mysql_query($sql,$con);
echo "<table border=0 align=center>
<tr>
<th>ID</th>
<th>Attended</th>
</tr>";
while($record = mysql_fetch_array($myData)){
echo "<form action=postcg3s2.php method=post>";
echo "<tr>";
echo "<td>" . "<input type=text name=id value="  . $record['id'] . " </td>";
echo "<td>" . "<input type=text name=cg value=" . $record['cg'] . " </td>";
echo "<td>" . "<input type=hidden name=hidden value=" . $record['cg'] . " </td>";
echo "<td>" . "<input type=submit name=update value=update" . " </td>";
echo "</tr>";
echo "</form>";
}
echo "</table>";
mysql_close($con);
?>
</body>
</html>