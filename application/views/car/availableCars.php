<hr>
<ul class="nav justify-content-center" id="crud_title">
    <li class="nav-item">Liste des voitures disponible</li>
</ul>
<hr>

<div class="container">
    <div class="row">
        <table class="table is-bordered is-hoverable">
        <thead id="table_head" class="text-white" >
            <th class="text-white">Numero</th>
            <th class="text-white">Marque</th>
            <th class="text-white">Modèle</th>
            <th class="text-white">Type</th>
        </thead>
            <tbody class="table-light">
                <?php
                if(isset($cars) && !empty($cars)) : 
                    foreach($cars as $car): 
                ?>
                    <tr class="table-default">
                        <td><?= $car->numero ?></td>
                        <td><?= $car->brand ?></td>
                        <td><?= $car->car_model ?></td>
                        <td><?= $car->type ?></td>
                    </tr>
                <?php 
                    endforeach;
                endif; 
                ?>
            </tbody>
        </table>
    </div>
</div>