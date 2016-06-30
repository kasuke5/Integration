<?php 
include ('header.php');
?>

<link rel="stylesheet" type="text/css" href="vue/css/chosen.min.css" />  
<link rel="stylesheet" type="text/css" href="vue/css/fileinput.css" /> 
<link href="vue/css/bootstrap-datetimepicker.css" rel="stylesheet" media="screen"> 
<script type="text/javascript" src="vue/js/locales/bootstrap-datetimepicker.de.js" charset="UTF-8"></script>
<script type="text/javascript" src="vue/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="vue/js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="vue/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="vue/js/chosen.jquery.min.js"></script>
<script type="text/javascript" src="vue/js/fileinput.js"></script>
<script src="//cdn.jsdelivr.net/webshim/1.14.5/polyfiller.js"></script>
<!--<script>
    webshims.setOptions('forms-ext', {types: 'date'});
    webshims.polyfill('forms forms-ext');-->
</script>
<div class="event">
<div class="login-triangle"></div>
<h2 class="login-header">Creation d'évènement</h2>
  <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
    <div class="col-xs-4 col-sm-3">
    <label class="control-label" for="nom">Nom</label>
    <br>
    <input type="text" name="nom" id="nom" placeholder="Ajoutez un nom court sans majuscules">
    <label class="control-label" for="lieu">Lieu</label>
    <br>
    <input type="text" name="adresse" id="lieu" placeholder="Ajoutez un lieu">
    </div>
    <div class="col-xs-4 col-sm-3">
    <label class="control-label" for="debut">Date/heure Début</label>
    <br>
   <div class="input-append date form_datetime" data-date="2013-02-21T15:25:00Z">
    <input size="16" type="text" id="debut" name="debut" value="" readonly>
    <span class="add-on"><i class="icon-remove"></i></span>
    <span class="add-on"><i class="icon-calendar"></i></span>
    </div>
    <label class="control-label" for="fin">Date/heure Fin</label>
    <br>
<div class="input-append date form_datetime" data-date="2013-02-21T15:25:00Z">
    <input size="16" type="text" id="fin" name="fin" value="" readonly>
    <span class="add-on"><i class="icon-remove"></i></span>
    <span class="add-on"><i class="icon-calendar"></i></span>
    </div>
    </div>
  <div class="col-xs-4 col-sm-2">
    <label class="control-label">Catégorie</label>
    <br>
    <select name="categorie">
                    <?php for($i=0;$i<count($categories);$i++){
                                echo"<option value='".$categories[$i]["categorie_id"]."'>".$categories[$i]["categorie_name"]."</option>";
                            }
                            ?>
      </select>
                            
</div> 
<div class="col-xs-4 col-sm-2">
               <label class="control-label" for="newtag">Tags</label>
               <br>
               <input type="text" id="newtag" name="adresse" placeholder="Ajouter des tags" style="width: 142px;">
               <a id="addtags" href="" class="btn"><i class="fa fa-plus"></i></a>
         <div id="tags">
        </div>
 </div>
 <div class="col-xs-4 col-sm-6">
   <label class="control-label">Importation du site</label>
   <br>
            <select id='c' name="choix">
        <option value="importer" >Importer votre site</option>
        <option value="wordpress" selected >Utiliser un template défini</option>
  </select>
    <br><br>
  <label class="control-label">Photo de l'évènement</label>
  <br>
  <input  type="file" id="photo" name="photo">
  <div id="bdd"></div>
   </div>
  <label class="control-label" for="description">Description</label>     
   <br>
   <textarea name="description" id="description" rows="4" cols="40"></textarea> 
    <input type="submit" name="action" value="Créer">
  </form>
  </div>



<!--<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
 <div class="form-group">
  <label class="control-label">Select File</label>
  <div class="col-sm-5">
      <input  type="file" name="photo">
    </div>
 </div>
 <div class="form-group">
    <label class="control-label col-sm-2" for="lieu">Nom:</label>
    <div class="col-sm-5">
      <input type="text" name="nom" class="form-control" placeholder="">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="lieu">Lieu de l'évènement:</label>
    <div class="col-sm-5">
      <input type="text" name="adresse" class="form-control" placeholder="">
    </div>
  </div>
    <div class="form-group">
            <label for="date_debut" class="col-sm-2 control-label">Date et heure début:</label>
            <div class="col-sm-5">
            <input type="datetime-local" id="debut" name="debut" value="" placeholder="2016-01-10T09:00"  class="form-control"/>
            </div>
    </div>
    <div class="form-group">
            <label for="date_fin" class="col-sm-2 control-label">Date et heure fin:</label>
            <div class="col-sm-5">
              <input type="datetime-local" id="fin" name="fin" value="" placeholder="2016-01-10T10:00"  class="form-control"/>
            </div>
    </div>

    <div class="form-group">
            <label for="date_fin" class="col-sm-2 control-label">Catégorie</label>
            <div class="col-sm-5">
             <select name="categorie">
                   // <?php //for($i=0;$i<count($categories);$i++){
                             //   echo"<option value='".$categories[$i]["categorie_id"]."'>".$categories[$i]["categorie_name"]."</option>";
                           // }
                            //echo "</select>";
                      //      ?>
            </div>
    </div>
    <br>


    <div class="form-group">
    <div class="col-sm-offset-2 col-sm-0">
    <select id='c' name="choix">
        <option value="importer" >Importer votre site</option>
        <option value="wordpress" selected >Utiliser wordpress</option>
	</select>
	</div>
	</div>
    <br><br>
    <div id="bdd">
    </div>      
      <label for="description" class="col-sm-2 control-label">Description : </label>
        <div class="col-sm-5">
          <textarea name="description" id="description" rows="4" cols="50"></textarea>
        </div>


  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-0">
      <button type="submit" class="btn btn-default" name="action">Envoyer</button>
    </div>
  </div>
</form>-->


<?php
include 'footer.php';
?>

<script type="text/javascript">
    $(".form_datetime").datetimepicker({
        format: "dd MM yyyy - hh:ii",
        autoclose: true,
        todayBtn: true,
        startDate: "2013-02-14 10:00",
        minuteStep: 10
    });
</script>        

<script>
  $('#c').change(function(){
      if($('#c').val() == "importer"){
        $('#bdd').html("<input type='checkbox' name='bdd'> Utiliser aussi une bdd");
      }else{
	$('#bdd').html("");
	}
      });

  var i;

$(document).on("click", "#addtags",  function(e){
  e.preventDefault();
  i++;
  var html = $("#tags").html();
  $("#tags").html(html+"     <button class='btn btn-default tags' value='"+i+"'>"+$('#newtag').val()+"</button> <input type='hidden' name='tags[]' id='tag"+i+"' value='"+$("#newtag").val()+"'>");


  }); 

$(document).on("click", ".tags",  function(e){
  e.preventDefault();
  var val = $(this).val();
  $(this).remove();
  $("#tag"+val).remove();
});



</script>