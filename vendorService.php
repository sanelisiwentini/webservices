<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <title>Search Meal Tickets</title>
  <meta charset="utf-8">
</head>
<body>
<?php

require "searchVendorA.php";
require "searchVendorB.php";
require "searchVendorC.php";

if(!empty($_GET['name']))
{
    $name=$_GET['name'];
	$price=$_GET['price'];
	$number=$_GET['number'];
?>
<h2><?php echo "Tickets: ". $name. "&nbsp;&nbsp; &nbsp;&nbsp;# of Required Tickets: ".$number. "&nbsp;&nbsp; &nbsp;&nbsp;Max Price:$ ".$price ?></h2>

<?php
		$resultA1=getProductA($name);	
		$itemsA1 = json_decode($resultA1, true);
		$countA1=count($itemsA1['posts']);	

		$resultB1=getProductB($name);
		$itemsB1 = json_decode($resultB1, true);	
		$countB1=count($itemsB1['posts']);
		
		$resultC1=getProductC($name);
		$itemsC1 = json_decode($resultC1, true);	
		$countC1=count($itemsC1['posts']);	
		
		$resultAltA=getOtherRelatedA($name);	
		$itemsAltA = json_decode($resultAltA, true);
				
		$resultAltB=getOtherRelatedB($name);	
		$itemsAltB = json_decode($resultAltB, true);
				
		$resultAltC=getOtherRelatedC($name);	
		$itemsAltC = json_decode($resultAltC, true);
?>
<h3>Available Tickets: <?php echo $countA1+$countB1+$countC1 ?></h3>
<?php	
	if ($countA1>=$number)
	{
?>
		<div onclick="document.getElementById('displayTextA1').style.display = document.getElementById('displayTextA1').style.display == 'none' ? 'block' : 'none';">
			
			<h3>Get <?php echo $number ?> tickets from Vendor A</h3>
			<div id="displayTextA1" style="display: none;">
				<?php for($i=0;$i<$number;$i++)
						{
						echo $itemsA1['posts'][$i]['name']."&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
						$".$itemsA1['posts'][$i]['price']."&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
						".$itemsA1['posts'][$i]['description']."&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
						".$itemsA1['posts'][$i]['vendorName']."<br/>";
						}
				?>
			</div>
		</div>
<?php
		if(count($itemsB1['posts'])>0||count($itemsC1['posts'])>0)
			{
?>				<h2>Tickets from other Stores</h2>
<?php		
			}
			if(count($itemsB1['posts'])>0)
			{
?>				
			<div onclick="document.getElementById('displayTextB1').style.display = document.getElementById('displayTextB1').style.display == 'none' ? 'block' : 'none';">
				<h3>Get <?php echo count($itemsB1['posts']) ?> tickets from Vendor B</h3>
				<div id="displayTextB1" style="display: none;">
					<?php foreach($itemsB1['posts']  as  $productsB1) // fetch all arrays, including nested arrays
							{
							echo $productsB1['name']."&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
							$".$productsB1['price']."&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
							".$productsB1['description']."&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
							".$productsB1['vendorName']."<br/>";      
							}
					?>
				</div>
			</div>
<?php				
			}
			if(count($itemsC1['posts'])>0)
			{
?>				
			<div onclick="document.getElementById('displayTextC1').style.display = document.getElementById('displayTextC1').style.display == 'none' ? 'block' : 'none';">
				<h3>Get <?php echo count($itemsC1['posts']) ?> tickets from Vendor C</h3>
				<div id="displayTextC1" style="display: none;">
					<?php foreach($itemsC1['posts']  as  $productsC1) // fetch all arrays, including nested arrays
						{
						echo $productsC1['name']."&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
						$".$productsC1['price']."&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
						".$productsC1['description']."&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
						".$productsC1['vendorName']."<br/>";      
						}
					?>
				</div>
			</div>
<?php				
			}
	}// end if ($count>=$number)
	else
	{ 
		$diff=$number-$countA1;
		if($countA1>0)
		{		
?>				
			<div onclick="document.getElementById('displayTextA2').style.display = document.getElementById('displayTextA2').style.display == 'none' ? 'block' : 'none';">
				<h3>Get <?php echo $countA1 ?> tickets from Vendor A</h3>
				<div id="displayTextA2" style="display: none;">
				<?php foreach($itemsA1['posts']  as  $products) // fetch all arrays, including nested arrays
						{					
						echo $products['name']."&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
						$".$products['price']."&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
						".$products['description']."&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
						".$products['vendorName']."<br/>";      
						}
				?>
				</div>
			</div>
<?php	
		}			
		if($countB1>=$diff)
		{			
?>				
			<div onclick="document.getElementById('displayTextB2').style.display = document.getElementById('displayTextB2').style.display == 'none' ? 'block' : 'none';">
				<h3>Get <?php echo $diff ?> tickets from Vendor B</h3>
				<div id="displayTextB2" style="display: none;">
				<?php 	for($i=0;$i<$diff;$i++)
						{
						echo $itemsB1['posts'][$i]['name']."&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
						$".$itemsB1['posts'][$i]['price']."&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
						".$itemsB1['posts'][$i]['description']."&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
						".$itemsB1['posts'][$i]['vendorName']."<br/>";
						}
				?>
				</div>
			</div>
<?php	
		}//end if($countB1>=$diff)
		else
		{
		$diff2=$diff-$countB1;
			if($countC1>=$diff2)
			{	
				if(count($itemsB1['posts'])>0)
				{
?>				
				<div onclick="document.getElementById('displayTextB3').style.display = document.getElementById('displayTextB3').style.display == 'none' ? 'block' : 'none';">
					<h3>Get <?php echo count($itemsB1['posts']) ?> tickets from Vendor B</h3>
					<div id="displayTextB3" style="display: none;">
					<?php	foreach($itemsB1['posts']  as  $products) // fetch all arrays, including nested arrays
							{
							echo $products['name']."&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
							$".$products['price']."&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
							".$products['description']."&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
							".$products['vendorName']."<br/>";      
							}				
					?>
					</div>
				</div>
<?php
				}
?>				
				<div onclick="document.getElementById('displayTextC2').style.display = document.getElementById('displayTextC2').style.display == 'none' ? 'block' : 'none';">
					<h3>Get <?php echo $diff2 ?> tickets from Vendor C</h3>
					<div id="displayTextC2" style="display: none;">
					<?php	for($i=0;$i<$diff2;$i++)
							{
							echo $itemsC1['posts'][$i]['name']."&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
							$".$itemsC1['posts'][$i]['price']."&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
							".$itemsC1['posts'][$i]['description']."&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
							".$itemsC1['posts'][$i]['vendorName']."<br/>";
							}     
					?>
					</div>
				</div>
<?php		
			}
			else
			{
				if(count($itemsB1['posts'])>0)
				{
?>				
				<div onclick="document.getElementById('displayTextB4').style.display = document.getElementById('displayTextB4').style.display == 'none' ? 'block' : 'none';">
					<h3>Get <?php echo count($itemsB1['posts']) ?> tickets from Vendor B</h3>
					<div id="displayTextB4" style="display: none;">
					<?php	foreach($itemsB1['posts']  as  $products) // fetch all arrays, including nested arrays
							{
							echo $products['name']."&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
							$".$products['price']."&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
							".$products['description']."&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
							".$products['vendorName']."<br/>"; 
							}     
					?>
					</div>
				</div>				
<?php				     
				}
				if(count($itemsC1['posts'])>0)
				{
?>				
				<div onclick="document.getElementById('displayTextC3').style.display = document.getElementById('displayTextC3').style.display == 'none' ? 'block' : 'none';">
					<h3>Get <?php echo count($itemsC1['posts']) ?> tickets from Vendor C</h3>
					<div id="displayTextC3" style="display: none;">
					<?php	foreach($itemsC1['posts']  as  $products) // fetch all arrays, including nested arrays
							{
							echo $products['name']."&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
							$".$products['price']."&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
							".$products['description']."&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
							".$products['vendorName']."<br/>";      
							}
							?>
				</div>
			</div>
<?php		
				}
			if(count($itemsAltA['posts'])>0||count($itemsAltB['posts'])>0||count($itemsAltB['posts'])>0)
			{
?>				
				<h2>Other Choices</h2>
<?php		
			}
			if(count($itemsAltA['posts'])>0)
				{
?>				
			<div onclick="document.getElementById('displayTextAAlt').style.display = document.getElementById('displayTextAAlt').style.display == 'none' ? 'block' : 'none';">
				<h3>Get <?php echo count($itemsAltA['posts']) ?> tickets from Vendor A</h3>
				<div id="displayTextAAlt" style="display: none;">
				<?php foreach($itemsAltA['posts']  as  $productsA) // fetch all arrays, including nested arrays
						{
						echo $productsA['name']."&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
						$".$productsA['price']."&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
						".$productsA['description']."&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
						".$productsA['vendorName']."<br/>";      
						}
				?>
				</div>
			</div>
<?php
				}	
				if(count($itemsAltB['posts'])>0)
				{
?>				
				<div onclick="document.getElementById('displayTextBAlt').style.display = document.getElementById('displayTextBAlt').style.display == 'none' ? 'block' : 'none';">
					<h3>Get <?php echo count($itemsAltB['posts']) ?> tickets from Vendor B</h3>
					<div id="displayTextBAlt" style="display: none;">
					<?php foreach($itemsAltB['posts']  as  $productsB) // fetch all arrays, including nested arrays
							{
							echo $productsB['name']."&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
							$".$productsB['price']."&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
							".$productsB['description']."&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
							".$productsB['vendorName']."<br/>";      
							}
					?>
					</div>
				</div>
<?php				
				}
				if(count($itemsAltC['posts'])>0)
				{
?>				
				<div onclick="document.getElementById('displayTextCAlt').style.display = document.getElementById('displayTextCAlt').style.display == 'none' ? 'block' : 'none';">
					<h3>Get <?php echo count($itemsAltC['posts']); ?> tickets from Vendor C</h3>
					<div id="displayTextCAlt" style="display: none;">
					<?php foreach($itemsAltC['posts']  as  $productsC) // fetch all arrays, including nested arrays
							{
							echo $productsC['name']."&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
							$".$productsC['price']."&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
							".$productsC['description']."&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
							".$productsC['vendorName']."<br/>";      
							}
					?>
					</div>
				</div>
<?php
				}				
			}     
		}// end else !if($countB1>=$diff)		
	}	
}//end if(!empty($_GET['name']))
?>

</body>
</html>
