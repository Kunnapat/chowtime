<?php
$objConnect = mysql_connect("localhost","root","root") or die("Error Connect to Database");
$objDB = mysql_select_db("chowtime");
       

$Per_Page = 10;   // Per Page

        
$Page = $_GET['page'];
if (isset($_GET['page'])) {
 $Page = $_GET['page'];
 } else {
 $Page = 1;
 }

        
$Page_Start = (($Per_Page*$Page)-$Per_Page);




//               Paging  
/*
$strSQLPage="SELECT * FROM topics ORDER by topic_id DESC";
$objQueryPage = mysql_query($strSQLPage);
$Num_Rows = mysql_num_rows($objQueryPage);        
if($Num_Rows<=$Per_Page)
{
	$Num_Pages =1;
}
else if(($Num_Rows % $Per_Page)==0)
{
	$Num_Pages =($Num_Rows/$Per_Page) ;
}
else
{
	$Num_Pages =($Num_Rows/$Per_Page)+1;
	$Num_Pages = (int)$Num_Pages;
}  

if ($Page == 1) {
    $Prev_Page = 1;
} else {
    $Prev_Page = $Page-1;
}
if ($Page == $Num_Pages) {
    $Next_Page = $Num_Pages;
} else {        
    $Next_Page = $Page+1;
}
*/

$Before_Last = $Num_Pages - 1;
$Pagination = ""; //display the page number


?>


 <?php 
                                    
		
		//pages	
		if ($Num_Pages < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($i = 1; $i <= $Num_Pages; $i++)
			{
				if ($i == $Page) { ?>
					<li><a class="active" href="webboard.php?category=<?php echo $category ?>&page=<?php echo $i ?>"><?php echo $i ?></a></li>
				<?php } else { ?>
					<li><a href="webboard.php?category=<?php echo $category ?>&page=<?php echo $i ?>"><?php echo $i ?></a></li>					
			<?php } 
		
            } 
        } elseif($Num_Pages > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($Page < 1 + ($adjacents * 2))		
			{
				for ($i = 1; $i < 4 + ($adjacents * 2); $i++)
				{
					if ($i == $Page) { ?>
						<li><a class="active" href="webboard.php?category=<?php echo $category ?>&page=<?php echo $i ?>"><?php echo $i ?></a></li>
					<?php } else { ?>
						<li><a href="webboard.php?category=<?php echo $category ?>&page=<?php echo $i ?>"><?php echo $i ?></a></li>		
				    <?php } ?>
				<li><a href="webboard.php?category=<?php echo $category ?>&page=<?php echo $Next_Page ?>">...</a></li>
				<li><a href="webboard.php?category=<?php echo $category ?>&page=<?php echo $Before_Last ?>"><?php echo $Before_Last ?></a></li>
				<li><a href="webboard.php?category=<?php echo $category ?>&page=<?php echo $Num_Pages ?>"><?php echo $Num_Pages ?></a></li>	
			 <?php } 
			//in middle; hide some front and some back
            } elseif($Num_Pages - ($adjacents * 2) > $Page && $Page > ($adjacents * 2))
			{ ?>
				<li><a href="webboard.php?category=<?php echo $category ?>&page=1">1</a></li>
				<li><a href="webboard.php?category=<?php echo $category ?>&page=2">2</a></li>
				<li><a href="webboard.php?category=<?php echo $category ?>&page=<?php echo $Next_Page ?>">...</a></li>
				<?php 
                for ($i = $Page - $adjacents; $i <= $Page + $adjacents; $i++)
				{
					if ($i == $page) { ?>
						<li><a class="active" href="webboard.php?category=<?php echo $category ?>&page=<?php echo $i ?>"><?php echo $i ?></a></li>
					<?php } else { ?>
						<li><a href="webboard.php?category=<?php echo $category ?>&page=<?php echo $i ?>"><?php echo $i ?></a></li>				
				<?php } ?>
				<li><a href="webboard.php?category=<?php echo $category ?>&page=<?php echo $Next_Page ?>">...</a></li>
				<li><a href="webboard.php?category=<?php echo $category ?>&page=<?php echo $Before_Last ?>"><?php echo $Before_Last ?></a></li>
				<li><a href="webboard.php?category=<?php echo $category ?>&page=<?php echo $Num_Pages ?>"><?php echo $Num_Pages ?></a></li>		
			 <?php } 
			//close to end; only hide early pages
            } else
			{ ?>
				<li><a href="webboard.php?category=<?php echo $category ?>&page=1">1</a></li>
				<li><a href="webboard.php?category=<?php echo $category ?>&page=2">2</a></li>
				<li><a href="webboard.php?category=<?php echo $category ?>&page=<?php echo $Next_Page ?>">...</a></li>
				<?php 
                                    for ($i = $Num_Pages - (2 + ($adjacents * 2)); $i <= $Num_Pages; $i++)
				{
                        if ($i == $Page) { ?>
						<li><a class="active" href="webboard.php?category=<?php echo $category ?>&page=<?php echo $i ?>"><?php echo $i ?></a></li>
					<?php } else { ?>
						<li><a href="webboard.php?category=<?php echo $category ?>&page=<?php echo $i ?>"><?php echo $i ?></a></li>				
				<?php }
			     }
		      }
		

	       }
        
        ?>