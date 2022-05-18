<h3 slot="head" >Mettre à jour les écheances</h3>

<div class="container">
<form action="<?= site_url('car/updateDue') ?>" method="POST" class="login">
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
                    <label>Assurance</label>
                    <input type="date" class="form-control" name="insurance">           
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Visite technique</label>
                    <input type="date" class="form-control" name="technical_visit">           
                </div>
            </div>
        </div>
        
        <div slot="foot">
            <button class="btn btn-success" type="submit">Mettre à jour</button>
        </div>
</form>
</div>
