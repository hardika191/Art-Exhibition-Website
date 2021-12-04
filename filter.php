<?php
session_start();
require_once("db_filter.php");
$db_handle = new DBController();
$price_sort= ((isset($_REQUEST['price_sort']))?sanitize ($_REQUEST['price_sort']):'');
$min_price=((isset($_REQUEST['min_price']))?sanitize ($_REQUEST['min_price']):'');
$max_price=((isset($_REQUEST['max_price']))?sanitize ($_REQUEST['max _price']):'');
$b=((isset($_REQUEST['artist']))?sanitize($_REQUEST['artist']):'');

$artistQ = $db_handle->runQuery("SELECT * FROM artist ORDER BY artist");
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
<title>Collections</title>
<link href="css_collection.css" rel="stylesheet" type="text/css">
</head>

<body>

<h1 id="title1">Museum of Contemporary Photography</h1>
<hr>
<div class="nav">
<table>
<tr>
<td><a href="IWP_project.html">Home</a></td>
<td><a href="#vid">Videos</a></td>
<td><a href="cart.php">Shopping Cart</a></td>
<td><a href="IWP_registration.html">Registration</a></td>
<td><a href="iwp_contactus.html">Enquiry</a></td>
<td><a href="#">Contact the Artist</a></td>
</tr>
</table>
</div>
<hr style="margin-bottom:50px">
<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 5</div>
  <img src="dis1.png" style="width:100%">
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 5</div>
  <img src="dis2.jpg" style="width:100%">
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 5</div>
  <img src="dis3.png" style="width:100%">
</div>

<div class="mySlides fade">
  <div class="numbertext">4 / 5</div>
  <img src="dis4.png" style="width:100%">
</div>

<div class="mySlides fade">
  <div class="numbertext">5 / 5</div>
  <img src="dis5.png" style="width:100%">
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 

</div>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex> slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 5000);
}
</script>


<div class="filter">
<h3 class="text-center">Search By:</h3>
<h4 class="text-center">Price</h4>
<form>
	<input type="radio" name="price_sort" value="low"<?=(($price_sort=='low')?' checked':'');?>  Low to High <br>
  <input type="radio" name="price_sort" value="high"<?=(($price_sort=='high')?' checked':'');?> High to Low <br>

  <h3>Price</h3><br><br>
<input type="text" name="min_price" class="price-range" placeholder="Min $" value="<?=$min_price;?>">
<input type="text" name="max_price" class="price-range" placeholder="Max $" value="<?=$max_price;?>"><br><br>
  
<h3>Artist</h3>

<input type="radio" name="artist" value=""<?=(($b == '')?' checked': '');?>>
<?php while($artist = mysqli_fetch_assoc($artistQ)): ?>

<input type="radio" name="artist" value=" <?=artist['id'];?>"<?=(($b == $artist['id'])?' checked':'');?>><?=$artist['artist'];?>

<?php endwhile; ?>

<input type="submit" value="search">
</form>

</div>




<br><br>
<section>
<div class="items">
<div class="thumbnail">
<img src="pg_city_limits.jpg" class="image">
<label class="price">Price:</label>
<input type="button" value="Buy">
</div>
<div class="thumbnail">
<img src="pg_city_limits.jpg" class="image">
<label class="price">Price:</label>
<input type="button" value="Buy">
</div>
<div class="thumbnail">
<img src="pg_city_limits.jpg" class="image">
<label class="price">Price:</label>
<input type="button" value="Buy">
</div>

<div class="thumbnail">
<img src="pg_city_limits.jpg" class="image">
<label class="price" >Price:</label>
<input type="button" value="Buy">
</div>
<div class="thumbnail">
<img src="pg_city_limits.jpg" class="image">
<label class="price">Price:</label>
<input type="button" value="Buy">
</div>
<div class="thumbnail">
<img src="pg_city_limits.jpg" class="image">
<label class="price">Price:</label>
<input type="button" value="Buy">
</div>
<div class="thumbnail">
<img src="pg_city_limits.jpg" class="image">
<label class="price">Price:</label>
<input type="button" value="Buy">
</div>
<div class="thumbnail">
<img src="pg_city_limits.jpg" class="image">
<label class="price">Price:</label>
<input type="button" value="Buy">
</div>
<div class="thumbnail">
<img src="pg_city_limits.jpg" class="image">
<label class="price">Price:</label>
<input type="button" value="Buy">
</div>
</div>
</section>
</body>
</html>
