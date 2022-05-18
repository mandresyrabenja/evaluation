<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Evaluation</title>
    <link rel="icon" href="<?= img_url('maki.png') ?>">
    <link rel="stylesheet" href="<?= css_url('bulma.min')?>">
    <link rel="stylesheet" href="<?= css_url('bootstrap.min')?>">
    <link rel="stylesheet" href="<?= css_url('animate.min')?>">
    <link rel="stylesheet" href="<?= css_url('font-awesome.min')?>">
    <link rel="stylesheet" href="<?= css_url('style_backoffice')?>">

    <script src="<?= js_url('vue.min')?>"></script>
    <script src="<?= js_url('axios.min')?>"></script>
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
                        <a class="nav-link" href="<?= site_url('car/list') ?>">Voiture</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= site_url('car/listDueAdmin') ?>">Echéance</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <?= $page ?>
</body>

<script src="<?= js_url('pagination') ?>"></script>
<script src="<?= js_url('app') ?>"></script>

</html>