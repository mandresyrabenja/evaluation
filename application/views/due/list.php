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
                    <?php 
                        foreach($dues as $due):
                            if( ($due->insurance_day_left < 15) || ($due->tech_day_left < 15) )
                                $bgColor = 'danger';
                            else
                                $bgColor = 'warning';
                    ?>
                        <tr class="table-default bg-<?= $bgColor ?>">
                            <td><?= $due->numero ?></td>
                            <td><?= $due->brand ?></td>
                            <td><?= $due->car_model ?></td>
                            <td><?= $due->type ?></td>
                            <td>
                                <?= $due->insurance ?>
                                <?php if($due->insurance_day_left > 0) : ?> 
                                    (dans <?= $due->insurance_day_left ?> jours)
                                <?php elseif($due->insurance_day_left == 0) : ?> 
                                    (Aujourdhui)
                                <?php else : ?> 
                                    (Il y a <?= $due->insurance_day_left * -1 ?> jours)
                                <?php endif ?>
                            </td>
                            <td>
                                <?= $due->technical_visit ?>
                                <?php if($due->tech_day_left > 0) : ?> 
                                    (dans <?= $due->tech_day_left ?> jours)
                                <?php elseif($due->tech_day_left == 0) : ?> 
                                    (Aujourdhui)
                                <?php else : ?> 
                                    (Il y a <?= $due->tech_day_left * -1 ?> jours)
                                <?php endif ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>