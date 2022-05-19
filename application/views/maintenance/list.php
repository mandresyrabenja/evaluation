<hr>
<ul class="nav justify-content-center" id="crud_title">
    <li class="nav-item">Etats des maintenances</li>
</ul>
<hr>

<div class="container">
        <div class="row">    
            <div class="col-md-10"></div>
            <div class="col-md-2">
                <a class="btn btn-success btn-block" href="<?= site_url('car/updateMaintenanceForm') ?>">Mise à jour</a></td>
            </div>
        </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table is-bordered is-hoverable">
            <thead id="table_head" class="text-white" >
                <th class="text-white">Numero de voiture</th>
                <th class="text-white">Marque</th>
                <th class="text-white">Modèle</th>
                <th class="text-white">Vidange</th>
                <th class="text-white">Pneu</th>
            </thead>
                <tbody class="table-light">
                    <?php 
                        foreach($cars as $car):
                    ?>
                        <tr>
                            <td><?= $car->numero ?></td>
                            <td><?= $car->brand ?></td>
                            <td><?= $car->car_model ?></td>
                            <td class="<?= ($car->oil_change < 200) ? 'bg-danger' :  ( ($car->oil_change < 500) ? 'bg-warning' : '' ) ?>">
                                <?= $car->oil_change ?>
                            </td>
                            <td class="<?= ($car->tire < 200) ? 'bg-danger' :  ( ($car->tire < 500) ? 'bg-warning' : '' ) ?>">
                                <?= $car->tire ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>