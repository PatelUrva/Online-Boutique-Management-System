
<!DOCTYPE html>
<html>
<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
.mySlides 
{
    display:none;
    padding-top: 0px
}
</style>
<body>

    <div class="w3-content w3-display-container">
    <img class="mySlides" src="images/slider 4.jpg" style="width:1030px">
    <img class="mySlides" src="images/slide2.png" style="width:1030px">
    <img class="mySlides" src="images/slider2.jpg" style="width:1030px; height:700px">
    <img class="mySlides" src="images/slider3.jpg" style="width:1030px; height:700px">

</div>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}
  slides[slideIndex-1].style.display = "block";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>

</body>
</html>
