<?php 
include ('header.php');
?>

<link rel="stylesheet" type="text/css" href="vue/css/chosen.min.css" />  
<link rel="stylesheet" type="text/css" href="vue/css/fileinput.css" /> 
<link href="vue/css/bootstrap-datetimepicker.min.css" rel="stylesheet" > 


<script type="text/javascript" src="vue/js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="vue/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="vue/js/chosen.jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
<script type="text/javascript" src="vue/js/moment.js"></script>
<script type="text/javascript" src="vue/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="vue/js/locales/fr.js"></script>
 <!-- afarkas.github.io/webshim/demos/index.html q-->
 <script src="//cdn.jsdelivr.net/webshim/1.14.5/polyfiller.js"></script>

<script>
   webshims.setOptions('forms-ext', {types: 'date'});
   webshims.polyfill('forms forms-ext');
</script>
<div class="event">
<div class="login-triangle"></div>
<?php echo $message; ?>
<h2 class="login-header">Creation d'évènement</h2>
  <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
  <label class="control-label">Photo de l'évènement</label>
  <input  type="file" name="photo">
  <br><br>
    <label class="control-label" for="lieu">Nom</label>
    <input type="text" name="nom" placeholder="Ajoutez un nom court sans majuscules" value=<?php if (isset($_POST['nom'])){echo $_POST['nom'];} ?>>
    <br><br>
       <label class="control-label" for="lieu">Lieu</label>
    <input type="text" id="lieu" name="adresse" placeholder="Ajoutez un lieu" value=<?php if (isset($_POST['adresse'])){echo $_POST['adresse'];} ?>>
    <br><br>
  <div class="form-group">
    <label for="debut" class="col-sm-4 control-label">Date et heure début:</label>
       <div class="col-sm-5">
           <input type="datetime-local" id="debut" name="debut" value="" placeholder="2016-01-10T09:00"  class="form-control"/>        
       </div>
  </div>
    <br><br>
    <div class="form-group">
      <label for="fin" class="col-sm-4 control-label">Date et heure fin:</label>  
        <div class="col-sm-5">
           <input type="datetime-local" id="fin" name="fin" value="" placeholder="2016-01-10T10:00"  class="form-control"/>
        </div>
      </div>
    <br><br>
  <!--  <div class="col-md-6">-->
    <label class="control-label">Catégorie</label>
    <select name="categorie">
                    <?php for($i=0;$i<count($categories);$i++){
                                echo"<option value='".$categories[$i]["categorie_id"]."'>".$categories[$i]["categorie_name"]."</option>";
                            }
                            echo "</select>";
                            ?>
                            <br><br>

               <label class="control-label" for="lieu">Tags</label>
               <input type="text" id="newtag" name="" placeholder="Ajouter des tags">
                <br><br>
               <a id="addtags" href="" class="btn"><i class="fa fa-plus"></i></a>
         <div id="tags">
        </div>


           <label class="control-label">Choix d'importation du site</label>
            <select id='c' name="choix">
        <option value="importer" >Importer votre site</option>
        <option value="wordpress" selected >Utiliser un template défini</option>
  </select>
  <div id="bdd"></div>
  <br><br>
  <label class="control-label">Description</label>      
   <textarea name="description" id="description" rows="4" cols="50" value=<?php if (isset($_POST['description'])){echo $_POST['description'];} ?>></textarea>
    <input type="submit" name="action" value="Créer">
  </div>
  </form>

<?php
include 'footer.php';
?>
<script type="text/javascript">

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