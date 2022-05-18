
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
                        <a class="nav-link" href="<?= site_url('car/addCar') ?>">Ajouter une voiture</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <hr>
    <ul class="nav justify-content-center" id="crud_title">
        <li class="nav-item">Liste des voitures</li>
    </ul>
    <hr>
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table is-bordered is-hoverable">
                <thead id="table_head" class="text-white" >
                    <th class="text-white">Numero</th>
                    <th class="text-white">Modèle</th>
                </thead>
                    <tbody class="table-light">
                        <?php foreach($cars as $car): ?>
                            <tr class="table-default">
                                <td><?= $car->numero ?></td>
                                <td><?= $car->car_model ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>