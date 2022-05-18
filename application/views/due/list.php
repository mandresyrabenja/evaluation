<hr>
<ul class="nav justify-content-center" id="crud_title">
    <li class="nav-item">Etats des écheances</li>
</ul>
<hr>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table is-bordered is-hoverable">
            <thead id="table_head" class="text-white" >
                <th class="text-white">Numero de voiture</th>
                <th class="text-white">Marque</th>
                <th class="text-white">Modèle</th>
                <th class="text-white">Type</th>
                <th class="text-white">Echéance assurance</th>
                <th class="text-white">Echéance technique</th>
                
            </thead>
                <tbody class="table-light">
                    <?php foreach($dues as $due): ?>
                        <tr class="table-default">
                            <td><?= $due->numero ?></td>
                            <td><?= $due->brand ?></td>
                            <td><?= $due->car_model ?></td>
                            <td><?= $due->type ?></td>
                            <td><?= $due->insurance ?>(dans <?= $due->insurance_day_left ?> ) jours</td>
                            <td><?= $due->technical_visit ?>(dans <?= $due->tech_day_left ?> ) jours</td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>