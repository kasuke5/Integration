<?php 
include 'header.php'; 
?>
<div id="formulaire">
<h3>Inscription</h3>
<?php //echo "<h2>".$message."</h2>"; ?>
 <form class="form-horizontal" role="form" method="post">
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Nom:</label>
    <div class="col-sm-5">
      <input type="text" name="nom" required class="form-control" placeholder="Nom">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="login">Description:</label>
    <div class="col-sm-5">
      <input type="text" name="description" required class="form-control" placeholder="Description">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pass">Date et heure de début :</label>
    <div class="col-sm-5">
      <input type="date" name="debut" class="form-control" placeholder="jj-mm-aa hh-mm">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pass2">Date et heure de fin:</label>
    <div class="col-sm-5">
      <input type="datetime" name="fin" class="form-control" placeholder="jj-mm-aa hh-mm">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Adresse:</label>
    <div class="col-sm-5">
      <input type="text" name="adresse" required class="form-control" placeholder="Adresse">
    </div>
    <div class="form-group">
    <div class="col-sm-offset-2 col-sm-5">
    <select id='c'>
        <option value="1" >Importer votre site</option>
        <option value="2" selected >Utiliser wordpress</option>

    <br></br>
    <div id="bdd">
    </div>
    </select>
  </div>
</div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-5">
      <button type="submit" class="btn btn-default"name="action">Submit</button>
    </div>
  </div>
</form>
</div>
<?php
include 'footer.php';
?>

<script>
  /*$('#c').change(function(){
      if($('#c').val() == 1){
        alert($('#c').val());
        $('#bdd').html("<input type='checkbox' name='bdd'> Utiliser aussi une bdd");
      }
      });*/


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
