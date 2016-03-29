<html>
<head>
<title>PHP & MySQL Tutorial</title>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//check Null value
function fncSubmit()
{
 if(document.frmAdd.txtProfID.value == "")
 {
  alert('Please input Professor ID');
  document.frmAdd.txtProfID.focus();
  return false;
 } 
 if(document.frmAdd.txtProfName.value == "")
 {
  alert('Please input Professor Name');
  document.frmAdd.txtProfName.focus();  
  return false;
 }
 if(document.frmAdd.txtSalary.value == "")
 {
  alert('Please input Salary');
  document.frmAdd.txtSalary.focus();  
  return false;
 }
 
 document.form1.submit();
}
//-->
</script>
</head>
<body>
<form action="addSave.php" name="frmAdd" method="post" onSubmit="JavaScript:return fncSubmit();">
Select #Record : 
<select name="menu1" onChange="MM_jumpMenu('parent',this,0)">
<?php
for($i=1;$i<=50;$i++)
{
 if($_GET["Line"] == $i)
 {
  $sel = "selected";
 }
 else
 {
  $sel = "";
 }
?>
 <option value="<?php echo $_SERVER["PHP_SELF"];?>?Line=<?php echo $i;?>" <?php echo $sel;?>><?php echo $i;?></option>
<?php
}
?>
</select>
<table width="600" border="1">
  <tr>
    <th width="91"> <div align="center">Professor ID </div></th>
    <th width="160"> <div align="center">Professor Name </div></th>
    <th width="198"> <div align="center">Salary </div></th>
    
  </tr>
  <?php
  $line = $_GET["Line"];
  if($line == 0){$line=1;}
  for($i=1;$i<=$line;$i++)
  {
  ?>
  <tr>
    <td><div align="center"><input type="text" name="txtProfID<?php echo $i;?>" size="5"></div></td>
    <td><input type="text" name="txtProfName<?php echo $i;?>" size="20"></td>
    <td><input type="number" name="txtSalary<?php echo $i;?>" size="20"></td>
 
 </td>
  </tr>
  <?php
  }
  ?>
  </table>
  <input type="submit" name="submit" value="submit">
  <input type="hidden" name="hdnLine" value="<?php echo $i;?>">
  </form>
</body>
</html>