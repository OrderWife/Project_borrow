<?php 

session_start();
include 'connect_book.php';
$majorid = @$_GET['mjID'];
$todate = @$_GET['dateY'];
$XX = $todate;
//$XX = "".+$todate;
$XX = $XX[2] .+ $XX[3] .+ $majorid;

$newIDbook = $XX;

$sql = "SELECT bookid FROM `book` WHERE bookid LIKE '$XX%' ORDER BY bookid DESC LIMIT 1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result, MYSQLI_NUM);
if($row[0] == "")
{
  //echo "null<BR>";
  $newIDbook .= "001";
 ?>
  <input class="form-control" type="text" name="bookid" value="<?php  echo  $newIDbook; ?>">
 <?php 
}
else
{
  //echo $row[0];
  $tempRow = "".+$row[0];
  $tempRow = $tempRow[3] .+$tempRow[4] .+$tempRow[5];
  $numId = intval($tempRow)+1;
  $numId = "".+$numId;
  //echo strlen($numId);
  $srtL = strlen($numId);
  for($j = 3 - $srtL,$c = 0; $c < $j; $c++)
  {
      $newIDbook .= '0';
  }
  $newIDbook .= $numId;
  //echo $row[0];echo "  Old!";
  //echo "<BR>";
 ?>
<input class="form-control" type="text" name="bookid" value="<?php echo  $newIDbook; ?>">
 <?php
}  



?>