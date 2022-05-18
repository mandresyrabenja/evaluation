<hr>
<ul class="nav justify-content-center" id="crud_title">
  <li class="nav-item">
        <a class="nav-link h4" href="<?php echo site_url('motel');?>">Hôtels</a>
  </li>
</ul>
<hr>
<div class="container">

    <div class="row">
            <div class="col-md-12">
            <table class="table my-3" id="menu_header">
               <tr>
                   <td> <a href="<?= site_url('motel/create') ?>" class="btn btn-success btn-block" >Ajouter</a></td>
               </tr>
           </table>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Email</th>
                            <th scope="col">Téléphone</th>
                            <th scope="col">Compte bancaire</th>
                            <th scope="col">Location</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($motels)) {  for($i=0; $i < count($motels); $i++) {?>
                        <tr>
                            <td><?php echo $motels[$i]->motel_id ?></td>
                            <td><?php echo $motels[$i]->name ?></td>
                            <td><?php echo $motels[$i]->phone ?></td>
                            <td><?php echo $motels[$i]->email ?></td>
                            <td><?php echo $motels[$i]->bank_account ?></td>
                            <td><?php echo $motels[$i]->location ?></td>
                            <td>
                                <a href="<?php echo base_url().'index.php/Motel/delete/'.$motels[$i]->motel_id ?>" class="btn btn-danger">Effacer</a>
                            </td>
                        </tr>
                        <?php } } else {?>
                            <tr>
                                <td colspan="7">Aucun resultats trouvés</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
</div>