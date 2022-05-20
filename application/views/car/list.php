<hr>
<ul class="nav justify-content-center" id="crud_title">
    <li class="nav-item">Liste des voitures</li>
</ul>
<hr>

<div class="container">
    <div class="row">    
        <div class="col-md-10"></div>
        <div class="col-md-2">
            <a class="btn btn-success btn-block" href="<?= site_url('car/addCar') ?>">Ajouter</a></td>
        </div>
    </div>
    <div class="row">
        <table class="table is-bordered is-hoverable">
        <thead id="table_head" class="text-white" >
            <th class="text-white">Numero</th>
            <th class="text-white">Marque</th>
            <th class="text-white">Modèle</th>
            <th class="text-white">Type</th>
            <th class="text-white" colspan="2">Lien</th>
        </thead>
            <tbody class="table-light">
                <?php foreach($cars as $car): ?>
                    <tr class="table-default">
                        <td><?= $car->numero ?></td>
                        <td><?= $car->brand ?></td>
                        <td><?= $car->car_model ?></td>
                        <td><?= $car->type ?></td>
                        <td><a class="btn btn-success" href="<?= site_url('travel/carTravels?car_id=' . $car->numero) ?>">Trajet</a></td>
                        <td><a class="btn btn-success" href="<?= site_url('travel/graph?car_id=' . $car->numero) ?>">Graphe</a></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>