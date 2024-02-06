<?php
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Horseball Resultats</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>

  <?php 
    $file = './data/lliga-catalana-2023-2024.json';
    $file_json = file_get_contents($file, true);
    $json = json_decode($file_json, true);
    $data_principal = $json['jornades'];
  ?>

    <div class="container">
        <h1 class="text-center">Resultats</h1>
        <div class="row">
            <?php foreach($data_principal as $info) { ?>
            <div class="table-responsive col-6">
                <h4 class="alert alert-info text-center">Jornada <?php echo $info['jornada']; ?> - <?php echo $info['data']; ?> - <span class="text-end"><?php echo $info['lloc']; ?></span></h4>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Hora</th>
                            <th>Categoria</th>
                            <th class="text-end">Equip</th>
                            <th class="text-center">Resultat</th>
                            <th>Equip</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $data = $info['partits']; ?>
                        <?php foreach($data as $dades) { ?>
                        <tr>
                            <td><?php echo $dades['hora']; ?></td>
                            <td><?php echo $dades['categoria']; ?></td>
                            <td class="text-end"><?php echo $dades['equip_1']; ?></td>
                            <td class="text-center">

                                <!-- Definim el color dels resultats -->
                                <?php 
                                if (($dades['gols_equip_1']) > ($dades['gols_equip_2'])) {
                                    $color_resultats_1 = "text-bg-success";
                                    $color_resultats_2 = "text-bg-danger";
                                }
                                if (($dades['gols_equip_1']) < ($dades['gols_equip_2'])) {
                                    $color_resultats_1 = "text-bg-danger";
                                    $color_resultats_2 = "text-bg-success";
                                }
                                if (($dades['gols_equip_1']) == ($dades['gols_equip_2'])) {
                                    $color_resultats_1 = "text-bg-secondary";
                                    $color_resultats_2 = "text-bg-secondary";
                                }
                                ?>
                                <!-- Final definir color resultats -->

                                <h4>
                                    <span class="badge <?php echo $color_resultats_1; ?>"><?php echo $dades['gols_equip_1']; ?></span> - 
                                    <span class="badge <?php echo $color_resultats_2; ?>"><?php echo $dades['gols_equip_2']; ?></span>
                                </h4>
                            </td>
                            <td><?php echo $dades['equip_2']; ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <?php } ?>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
<?php

?>