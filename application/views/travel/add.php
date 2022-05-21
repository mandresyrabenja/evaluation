<hr>
    <ul class="nav justify-content-center" id="crud_title">
        <li class="nav-item">Ajouter un trajet</li>
    </ul>
<hr>
<div class="container">
    <form action="<?= site_url('travel/insert') ?>" method="POST" class="login">
            <div class="row text-success">
                <h4>Voiture</h4>
            </div>
            <select name="car_id" class="form-control">
                <?php
                if(isset($cars) && !empty($cars)) : 
                    foreach($cars as $car): 
                ?>
                        <option value="<?= $car->numero ?>"><?= $car->car_model ?> - Numero: <?= $car->numero ?></option>
                <?php 
                    endforeach;
                endif; 
                ?>
            </select>
            <div class="row text-success">
                <h4>Départ</h4>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Date et heure</label>
                        <input type="datetime-local" class="form-control" name="start_time">           
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Lieu</label>
                        <input type="text" class="form-control" name="start_place">           
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Kilométrage</label>
                        <input type="number" class="form-control" name="start_km">           
                    </div>
                </div>
            </div>
            <div class="row text-success">
                <h4>Arrivée</h4>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Date et heure</label>
                        <input type="datetime-local" class="form-control" name="end_time">           
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Lieu</label>
                        <input type="text" class="form-control" name="end_place">           
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Kilométrage</label>
                        <input type="number" class="form-control" name="end_km">           
                    </div>
                </div>
            </div>
            <div class="row text-success">
                <h4>Carburant</h4>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Quantité</label>
                        <input type="number" class="form-control" name="fuel_quantity">           
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Montant</label>
                        <input type="number" class="form-control" name="fuel_price">           
                    </div>
                </div>
            </div>
            <div class="row text-success">
                <h4>Motif</h4>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <input type="text" class="form-control" name="reason">           
                </div>
            </div>
            <div slot="foot">
                <?php if(isset($errorMsg)) : ?>
                <div class="row">
                    <div class="col-md-12">
                        <span class="text-danger"><b><?= $errorMsg ?></b></span>
                    </div>
                </div>
                <?php endif ?>
                <button class="btn btn-success" type="submit">Ajouter</button>
            </div>
    </form>
</div>
