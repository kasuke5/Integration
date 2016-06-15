<?php 
include ('header.php');
?>
<div class="container">
<h3>Mes évenements</h3>
<table class="table table-striped">
    <thead>
      <tr>
        <th>Nom evenement</th>
        <th>Date/heure début</th>
        <th>Date/heure fin</th>
        <th>Mail associé</th>
        <th>Supp.</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>super soirée</td>
        <td>12/04/2016 22:00</td>
        <td>13/04/2016 06:00</td>
        <td>mail.eventizi.itinet.fr</td>
        <td><button class="btn-danger"><i class="fa fa-trash"></i></button></td>
      </tr>
      <tr>
        <td>Mary</td>
        <td>Moe</td>
        <td>Moe</td>
        <td>mary@example.com</td>
        <td><button class="btn-danger"><i class="fa fa-trash"></i></button></td>
      </tr>
      <tr>
        <td>July</td>
        <td>Dooley</td>
        <td>Moe</td>
        <td>july@example.com</td>
        <td><button class="btn-danger"><i class="fa fa-trash"></i></button></td>
      </tr>
    </tbody>
  </table>
  <a href="./ajout_evenement" class="btn"><i class="fa fa-plus"></i></a>

<h3>Evenements auxquelles je suis inscrit</h3>
<table class="table table-striped">
  <tr>
    <th>Nom évenement</th>
    <th>Date/heure début</th>
    <th>Date/heure fin</th>
    <th>Etat</th>
  </tr>
  <tr>
    <td>Summer folie</td>
    <td>26/09/2016 16:00</td>
    <td>29/09/2016 17:00</td>
    <td>
      <select name="participation">
        <option value="1">Je participe</option>
        <option value="2">Je suis interessé</option>
        <option value="3">Je ne participe pas</option>
      </select>
    </td>
  </tr>
</table>
</div>
<?php
include ('footer.php');
?>