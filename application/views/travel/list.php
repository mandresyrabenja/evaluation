<hr>
<ul class="nav justify-content-center" id="crud_title">
    <li class="nav-item">Liste des trajets</li>
</ul>
<hr>

<div class="container">
    <div class="row">    
        <div class="col-md-10"></div>
        <div class="col-md-2">
            <a class="btn btn-success btn-block" href="<?= site_url('travel/add') ?>">Ajouter</a></td>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table is-bordered is-hoverable">
            <thead id="table_head" class="text-white" >
                <tr>
                    <th class="text-white align-top" rowspan="2">Numero voiture</th>
                    <th class="text-white align-top" rowspan="2">Chauffeur</th>
                    <th class="text-white align-top" rowspan="2">Motif</th>
                    <th class="text-white" colspan="3">Départ</th>
                    <th class="text-white" colspan="3">Arrivé</th>
                </tr>
                <tr>
                    <td class="text-white font-weight-bold">Lieu</td>
                    <td class="text-white font-weight-bold">Date et heure</td>
                    <td class="text-white font-weight-bold">Kilometrage</td>
                    <td class="text-white font-weight-bold">Lieu</td>
                    <td class="text-white font-weight-bold">Date et heure</td>
                    <td class="text-white font-weight-bold">Kilometrage</td>
                </tr>
            </thead>
                <tbody class="table-light">
                    
                    <?php foreach($travels as $travel): ?>
                        <tr class="table-default">
                            <td><?= $travel->car_id ?></td>
                            <td><?= $travel->driver ?></td>
                            <td><?= $travel->reason ?></td>
                            <td><?= $travel->start_place ?></td>
                            <td><?= $travel->start_time ?></td>
                            <td><?= $travel->start_km ?></td>
                            <td><?= $travel->end_place ?></td>
                            <td><?= $travel->end_time ?></td>
                            <td><?= $travel->end_km ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>