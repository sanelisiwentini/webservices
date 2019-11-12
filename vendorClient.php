<!DOCTYPE html>
<html lang="en">
<head>
  <title>Search Meal Tickets</title>
  <meta charset="utf-8">
</head>
<body>

<h2>Search Meal Tickets</h2>

  <form name="book" method="get" action="vendorService.php" >

		Meal Ticket Name <input type="text" name="name" value="">
		Price Limit $<input type="number" name="price" min=5 max=20 step=5 value="5">
		Number of Tickets <input type="text" name="number" value="">
	   <input type="submit" value="Search" ></input>
	   	             


  </form>

</body>
</html>
