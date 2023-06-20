<div class="rating">
  <input type="radio" id="star1" name="rating" value="1">
  <label for="star1" title="1 star">&#9733;</label>
  <input type="radio" id="star2" name="rating" value="2">
  <label for="star2" title="2 stars">&#9733;</label>
  <input type="radio" id="star3" name="rating" value="3">
  <label for="star3" title="3 stars">&#9733;</label>
  <input type="radio" id="star4" name="rating" value="4">
  <label for="star4" title="4 stars">&#9733;</label>
  <input type="radio" id="star5" name="rating" value="5">
  <label for="star5" title="5 stars">&#9733;</label>
  
</div>
<style>
    .rating {
  display: inline-block;
}

.rating input {
  display: none;
}

.rating label {
  font-size: 2em;
  color: #ccc;
  cursor: pointer;
  transition: all 0.2s ease-in-out;
}

.rating input:checked ~ label,
.rating:hover label {
  color: #FFD700;
}

</style>
<script>
function sendRating(kod_album, rating) {
  var xhr = new XMLHttpRequest();
  var url = "submit_rating.php";
  var params = "kod_album=" + encodeURIComponent(kod_album) + "&rating=" + encodeURIComponent(rating);
  var params = "kod_album=" + encodeURIComponent(kod_album) + "&rating=" + encodeURIComponent(rating) + "&answer=" + encodeURIComponent(answer);

  xhr.open("POST", url, true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.onreadystatechange = function() {
    if (xhr.readyState == 4 && xhr.status == 200) {
      // Request finished, do something with the response
      console.log(xhr.responseText);
    }
  };

  xhr.send(params);
}

</script>