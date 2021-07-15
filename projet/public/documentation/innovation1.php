
<!-- ----- début Innovation1 -->
<?php

require($root . '/app/view/fragment/fragmentVaccinationHeader.html');
?>

<body>
<div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentVaccinationMenu.html';
    ?>
<!--    <pre>--><?php //print_r($results)?><!--</pre>-->

    <div class="jumbotron">
        <h2>Innovation 1 : affichage sous forme de graphiques</h2>
        <p><em>une meilleure visualisation pour l'utilisateur</em></p>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4>Doses par centres en global</h4>
        </div>
        <div class="panel-body">
            <table class="charts-css bar show-heading show-primary-axis show-data-on-hover" style="height: <?php echo count($results[1]) * 50 ?>px">
                <thead>
                <tr>
                    <th>Nom Centre</th>
                    <th>Quantite</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($results[1] as $row){
                    if ($row["doses"] != 0){
                        echo "<tr>";
                        echo "<th scope='row'> " .$row["label"] ."</th>";
                        echo "<td style='--size:". $row["doses"]/$results[1][0]["doses"] ."'> <span class='data'> </span> <span class='tooltip'> ".$row["label"]."<br>Nombre de doses :". $row["doses"] . "</span> </td>";
                        echo "</tr>";
                    }
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>


    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4>Doses par vaccins en global</h4>
        </div>
        <div class="panel-body">
            <table class="charts-css bar show-heading show-primary-axis show-data-on-hover" style="height: <?php echo count($results[2]) * 50 ?>px">

                <thead>
                <tr>
                    <th>Nom Vaccin</th>
                    <th>Quantite</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($results[2] as $row){
                    if ($row["quantite"] != 0){
                        echo "<tr>";
                        echo "<th scope='row'> " .$row["label"] ."</th>";
                        echo "<td style='--size:". $row["quantite"]/$results[2][0]["quantite"] ."'> <span class='data'> </span> <span class='tooltip'> ". $row["label"] ."<br>Nombre de doses :". $row["quantite"] . "</span> </td>";
                        echo "</tr>";
                    }
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>


    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4>Vaccinés par location</h4>
        </div>
        <div class="panel-body">
            <table class="charts-css column show-heading show-data-on-hover show-primary-axis" style="height: <?php echo count($results[3]) * 50 ?>px">
                <thead>
                <tr>
                    <th>Nom Vaccin</th>
                    <th>Quantite</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($results[3] as $row){
                    if ($row["doses"] != 0){
                        echo "<tr>";
                        echo "<th scope='row'> " .$row["adresse"] ."</th>";
                        echo "<td style='--size:". $row["doses"]/$results[3][0]["doses"] ."'> <span class='data'> </span> <span class='tooltip'> ". $row["adresse"] ."<br>Nombre de vaccinés :". $row["doses"] . "</span> </td>";
                        echo "</tr>";
                    }
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>





</div>
<?php include $root . '/app/view/fragment/fragmentVaccinationFooter.html'; ?>

<!-- ----- fin Innovation1 -->
  
  
  