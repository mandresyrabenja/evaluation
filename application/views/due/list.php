<hr>
<ul class="nav justify-content-center" id="crud_title">
    <li class="nav-item">Etats des écheances</li>
</ul>
<hr>

<div class="container">
        <div class="row">    
            <div class="col-md-10"></div>
            <div class="col-md-2">
                <a class="btn btn-success btn-block" href="<?= site_url('car/updateDueForm') ?>">Mise à jour</a></td>
            </div>
        </div>
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
                    if(isset($dues) && !empty($dues)) :
                        foreach($dues as $due): ?>
                            <tr class="table-default">
                                <td><?= $due->numero ?></td>
                                <td><?= $due->brand ?></td>
                                <td><?= $due->car_model ?></td>
                                <td><?= $due->type ?></td>
                                <td class="<?= ($due->insurance_day_left < 15) ? 'bg-danger' : 'bg-warning' ?>" >
                                    <?= $due->insurance ?>
                                    <?php if($due->insurance_day_left > 0) : ?> 
                                        (dans <?= $due->insurance_day_left ?> jours)
                                    <?php elseif($due->insurance_day_left == 0) : ?> 
                                        (Aujourdhui)
                                    <?php else : ?> 
                                        (Il y a <?= $due->insurance_day_left * -1 ?> jours)
                                    <?php endif ?>
                                </td>
                                <td class="<?= ($due->tech_day_left < 15) ? 'bg-danger' : 'bg-warning' ?>" >
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
                    <?php 
                        endforeach;
                    endif; 
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>