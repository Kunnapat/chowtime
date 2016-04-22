<html>
<head>
<title>PHP & MySQL Tutorial</title>
</head>
<body>
<?php
$objConnect = mysql_connect("localhost","root","root") or die("Error Connect to Database");
$objDB = mysql_select_db("chowtime");
$strSQL = "SELECT * FROM events";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
?>
<table width="600" border="1">
  <tr>
    <th width="91"> <div align="center">Event ID </div></th>
    <th width="98"> <div align="center">Event Name </div></th>
	<th width="198"> <div align="center">Start Date </div></th>
    <th width="198"> <div align="center">End Date </div></th>
    <th width="198"> <div align="center">Organiser</div></th>
    <th width="198"> <div align="center">Type </div></th>
    <th width="398"> <div align="center">Description </div></th>
      
  </tr>
<?php
while($objResult = mysql_fetch_array($objQuery))
{
?>
  <tr>
    <td><div align="center"><?php echo $objResult["event_id"];?></div></td>
    <td><?php echo $objResult["ename"];?></td>
    <td><div align="center"><?php echo $objResult["start_date"];?></div></td>
	<td><?php echo $objResult["end_date"];?></td>
    <td><?php echo $objResult["organizer"];?></td>
    <td><?php echo $objResult["type"];?></td>
    <td><?php echo $objResult["description"];?></td>
  </tr>
<?php
}
?>
</table>
<?php
mysql_close($objConnect);
?>
</body>
</html>