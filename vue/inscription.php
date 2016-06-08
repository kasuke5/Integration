<?php 
include 'header.php'; 
?>
<h3>Inscription</h3>

 <form class="form-horizontal" role="form">
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Email:</label>
    <div class="col-sm-5">
      <input type="email" class="form-control" id="email" placeholder="Enter email">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pseudo">Pseudo:</label>
    <div class="col-sm-5">
      <input type="password" class="form-control" id="pseudo" placeholder="Enter pseudo">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="mdp">Mot de passe:</label>
    <div class="col-sm-5">
      <input type="password" class="form-control" id="mdp" placeholder="Enter password">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="mdp2">Confirmer mot de passe:</label>
    <div class="col-sm-5">
      <input type="password" class="form-control" id="mdp2" placeholder="Enter password">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-5">
      <button type="submit" class="btn btn-default">Submit</button>
    </div>
  </div>
</form>
<?php
include 'footer.php';
?>

<script>
$(document).ready(function(){
  // Initialize Tooltip
  $('[data-toggle="tooltip"]').tooltip(); 
  
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {

      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
})
</script>

</body>
</html>
