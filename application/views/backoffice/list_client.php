<hr>
<ul class="nav justify-content-center" id="crud_title">
  <li class="nav-item">
        <a class="nav-link h4" href="<?php echo site_url('client');?>">Utilisateurs</a>
  </li>
</ul>
<hr>
<div class="container">
    <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prénom</th>
                            <th scope="col">Date de naissance</th>
                            <th scope="col">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($clients)) {  for($i=0; $i < count($clients); $i++) {?>
                        <tr>
                            <td><?php echo $clients[$i]->client_id ?></td>
                            <td><?php echo $clients[$i]->first_name ?></td>
                            <td><?php echo $clients[$i]->last_name ?></td>
                            <td><?php echo $clients[$i]->birthday ?></td>
                            <td><?php echo $clients[$i]->email ?></td>
                            <td>
                                <a href="<?php echo site_url('client/delete/'.$clients[$i]->client_id); ?>" class="btn btn-danger">Effacer</a>
                            </td>
                        </tr>
                        <?php } } else {?>
                            <tr>
                                <td colspan="5">Aucun resultats trouvés</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
</div>