<hr>
    <ul class="nav justify-content-center" id="crud_title">
        <li class="nav-item">Mettre à jour les éléments de maintenance</li>
    </ul>
<hr>
<div class="container">
<form action="<?= site_url('car/updateMaintenance') ?>" method="POST" class="login">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label>Voiture</label>
                    <select name="car_id" class="form-control">
                        <?php foreach($cars as $car) : ?>
                            <option value="<?= $car->numero ?>"><?= $car->car_model ?> - Numero: <?= $car->numero ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Type de maintenance</label>
                    <select name="maintenance" class="form-control">
                        <option value="oil_change">Vidange</option>
                        <option value="tire">Pneu</option>
                    </select>
                </div>
            </div>
        </div>
        
        <div slot="foot">
            <button class="btn btn-success" type="submit">Mettre à jour</button>
        </div>
</form>
</div>
