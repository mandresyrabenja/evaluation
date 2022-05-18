    <hr>
    <ul class="nav justify-content-center" id="crud_title">
        <li class="nav-item">Liste des trajets</li>
    </ul>
    <hr>
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table is-bordered is-hoverable">
                <thead id="table_head" class="text-white" >
                    <th class="text-white">Motif</th>
                    <th class="text-white">Numero voiture</th>
                </thead>
                    <tbody class="table-light">
                        <?php foreach($travels as $travel): ?>
                            <tr class="table-default">
                                <td><?= $travel->reason ?></td>
                                <td><?= $travel->car_id ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>