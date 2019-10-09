<!DOCTYPE html>
<html lang="en">
<head>
  <title>Search Books</title>
  <meta charset="utf-8">
</head>
<body>

<h2>Search Books</h2>

  <form name="book" method="post" action="bookApiCall.php" >

		Book Title <input type="text" name="title" value="">
		Price $<input type="number" name="price" min=5 max=15 step=5 value="5">
	   <input type="submit" value="Search" ></input>
	   	             


  </form>

</body>
</html>
