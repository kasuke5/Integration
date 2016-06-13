<?php 
include ('header.php');
?>
<link rel="stylesheet" type="text/css" href="./css/chosen.min.css" />  
<link rel="stylesheet" type="text/css" href="./css/fileinput.css" />  

<script type="text/javascript" src="./js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="./js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="./js/jquery-ui.min.js"></script>
<script type="text/javascript" src="./js/chosen.jquery.min.js"></script>
<script type="text/javascript" src="./js/fileinput.js"></script>
<!-- afarkas.github.io/webshim/demos/index.html q-->
<script src="//cdn.jsdelivr.net/webshim/1.14.5/polyfiller.js"></script>
<script>
    webshims.setOptions('forms-ext', {types: 'date'});
    webshims.polyfill('forms forms-ext');
</script>
<h2>Creation d'evenement</h2>
 <form class="form-horizontal" role="form">
 <div class="form-group">
 	<p>upload photo (super widget de la muerte)</p>
 	<label class="control-label">Select File</label>
 	<div class="col-sm-5">
    	<input id="input-1" type="file" class="file">
    </div>
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
            <label for="date_debut" class="col-sm-2 control-label">Date et heure début:</label>
            <div class="col-sm-5">
            <input type="datetime-local" id="date_debut" name="date_debut" value="" placeholder="2016-01-10T09:00"  class="form-control"/>
            </div>
    </div>
    <div class="form-group">
            <label for="date_fin" class="col-sm-2 control-label">Date et heure fin:</label>
            <div class="col-sm-5">
            <input type="datetime-local" id="date_fin" name="date_fin" value="" placeholder="2016-01-10T10:00"  class="form-control"/>
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