<hr>
    <ul class="nav justify-content-center" id="crud_title">
        <li class="nav-item">Ajouter une voiture</li>
    </ul>
<hr>
<div class="container">
    <div class="row">
        <form action="<?= site_url('car/insert') ?>" method="POST" class="login">
            <div slot="body" class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Numero</label>
                        <input type="text" class="form-control" name="numero">           
                    </div>    
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Modèle</label>
                        <input type="text" class="form-control" name="car_model">           
                    </div>    
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Marque</label>
                        <select name="car_brand" class="form-control">
                            <?php 
                            if(isset($carBrands) && !empty($carBrands)) :
                                foreach($carBrands as $carBrand) : 
                            ?>
                                <option value="<?= $carBrand->id ?>"><?= $carBrand->name ?></option>
                            <?php 
                                endforeach;
                            endif;
                            ?>
                        </select>                
                    </div>           
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Type</label>
                        <select name="car_type" class="form-control">
                        <?php 
                            if(isset($carTypes) && !empty($carTypes)) :
                            foreach($carTypes as $carType) : 
                        ?>
                            <option value="<?= $carType->id ?>"><?= $carType->name ?></option>
                        <?php 
                            endforeach;
                        endif;
                        ?>
                        </select>
                    </div>           
                </div>
                </div>
                <div slot="foot">
                    <button class="btn btn-success" type="submit">Ajouter</button>
                </div>
            </div>
        </form>
    </div>
</div>