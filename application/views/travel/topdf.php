<html>
<head>
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
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  
  <script type="text/javascript">
    $("#btnPrint").live("click", function () {
      var divContents = $("#text").html();
      var printWindow = window.open('', '', 'height=400,width=800');
      printWindow.document.write('<html><head><title>Html to PDF</title>');
      printWindow.document.write('</head><body >');
      printWindow.document.write(document.getElementById('text').innerHTML);
      printWindow.document.write('</body></html>');
      printWindow.document.close();
      printWindow.print();
    });
  </script>
  </head>
  <body>
    <form id="form1">
    <div id="text">
      <hr>
      <ul class="nav justify-content-center" id="crud_title">
          <li class="nav-item">Liste des trajets</li>
      </ul>
      <hr>

      <div class="container">
          <div class="row">    
              <div class="col-md-10"></div>
              <div class="col-md-2"><button class="btn btn-success" id="btnPrint">Exporter en PDF</button></div>
          </div>
          <div class="row">
              <div class="col-md-12">
                  <table class="table is-bordered is-hoverable">
                  <thead id="table_head" class="text-white" >
                      <tr>
                          <th class="text-white align-top" rowspan="2">Numero voiture</th>
                          <th class="text-white align-top" rowspan="2">Chauffeur</th>
                          <th class="text-white align-top" rowspan="2">Motif</th>
                          <th class="text-white" colspan="3">Départ</th>
                          <th class="text-white" colspan="3">Arrivé</th>
                      </tr>
                      <tr>
                          <td class="text-white font-weight-bold">Lieu</td>
                          <td class="text-white font-weight-bold">Date et heure</td>
                          <td class="text-white font-weight-bold">Kilometrage</td>
                          <td class="text-white font-weight-bold">Lieu</td>
                          <td class="text-white font-weight-bold">Date et heure</td>
                          <td class="text-white font-weight-bold">Kilometrage</td>
                      </tr>
                  </thead>
                      <tbody class="table-light">
                          
                          <?php foreach($travels as $travel): ?>
                              <tr class="table-default">
                                  <td><?= $travel->car_id ?></td>
                                  <td><?= $travel->driver ?></td>
                                  <td><?= $travel->reason ?></td>
                                  <td><?= $travel->start_place ?></td>
                                  <td><?= $travel->start_time ?></td>
                                  <td><?= $travel->start_km ?></td>
                                  <td><?= $travel->end_place ?></td>
                                  <td><?= $travel->end_time ?></td>
                                  <td><?= $travel->end_km ?></td>
                              </tr>
                          <?php endforeach ?>
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
    </div>
      
    </form>
  </body>

<script src="<?= js_url('pagination') ?>"></script>
<script src="<?= js_url('app') ?>"></script>

</html>