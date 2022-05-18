<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une voiture</title>
    <link rel="icon" href="<?= img_url('maki.png') ?>">
    <link rel="stylesheet" href="<?= css_url('bulma.min')?>">
    <link rel="stylesheet" href="<?= css_url('bootstrap.min')?>">
    <link rel="stylesheet" href="<?= css_url('animate.min')?>">
    <link rel="stylesheet" href="<?= css_url('font-awesome.min')?>">
    <link rel="stylesheet" href="<?= css_url('style_backoffice')?>">

    <script src="<?= js_url('jquery.min')?>"></script>

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand" href="<?= base_url() ?>">
                Evaluation
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= site_url('car') ?>">Voiture</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    
    
    <h3 slot="head" >Ajouter une voiture</h3>

    <form action="<?= site_url('car/insert') ?>" method="POST" class="login">
        <div slot="body" class="row">
            <div class="col-md-12">
                <div class="row">
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
                                <?php foreach($carBrands as $carBrand) : ?>
                                    <option value="<?= $carBrand->id ?>"><?= $carBrand->name ?></option>
                                <?php endforeach; ?>
                            </select>                
                        </div>           
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Type</label>
                            <select name="car_type" class="form-control">
                            <?php foreach($carTypes as $carType) : ?>
                                <option value="<?= $carType->id ?>"><?= $carType->name ?></option>
                            <?php endforeach; ?>
                            </select>
                        </div>           
                    </div>
                </div>
            </div>
            <div slot="foot">
                <button class="btn btn-success" type="submit">Ajouter</button>
            </div>
        </div>
    </form>

</body>
</html>
