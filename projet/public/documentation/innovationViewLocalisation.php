<!-- ----- début Innovation3 -->
<?php

require($root . '/app/view/fragment/fragmentVaccinationHeader.html');
?>

<body>
<div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentVaccinationMenu.html';
    ?>
    <div class="jumbotron">
        <h2>Innovation 3 : sélection des patients selon leur localisation</h2>
        <p><em>avoir la liste des patients géographiquement</em></p>
    </div>
    <table class = "table table-striped table-bordered">
        <thead>
        <tr>
            <th scope = "col">id</th>
            <th scope = "col">nom</th>
            <th scope = "col">prenom</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($results as $element) {
            printf("<tr><td>%d</td><td>%s</td><td>%s</td></tr>", $element['id'],
                $element['nom'], $element['prenom']);
        }
        ?>
        </tbody>
    </table>
</div>
<?php include $root . '/app/view/fragment/fragmentVaccinationFooter.html'; ?>

<!-- ----- fin Innovation3 -->





