<?php 
include ('header.php');
?>
<!-- afarkas.github.io/webshim/demos/index.html q-->
<script src="//cdn.jsdelivr.net/webshim/1.14.5/polyfiller.js"></script>
<script>
    webshims.setOptions('forms-ext', {types: 'date'});
    webshims.polyfill('forms forms-ext');
</script>
<h2>Creation d'evenement</h2>
 <form class="form-horizontal" role="form">
 <div class="form-group">
 	upload photo (super widget de la muerte)
 </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="name">Nom de l'évènement :</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="name" placeholder="Enter name">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="lieu">lieu de l'évènement:</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="lieu" placeholder="Enter password">
    </div>
  </div>
  	<div class="form-group">
            <label for="date_depart" class="col-sm-2 control-label">Date début:</label>
            <div class="col-sm-5">
            <input type="date" id="date_depart" name="date_depart" value="" placeholder="2015-01-10 ..."  class="form-control"/>
            </div>
    </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label><input type="checkbox"> Remember me</label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Submit</button>
    </div>
  </div>
</form>

<?php
include ('footer.php');
?>