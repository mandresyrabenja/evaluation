<hr>
    <ul class="nav justify-content-center" id="crud_title">
        <li class="nav-item">Mettre à jour les échéances</li>
    </ul>
<hr>
<div class="container">
<form action="<?= site_url('car/updateDue') ?>" method="POST" class="login">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label>Voiture</label>
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
