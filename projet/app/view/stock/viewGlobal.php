
<!-- ----- début viewAll -->
<?php

require($root . '/app/view/fragment/fragmentVaccinationHeader.html');
?>

<body>
<div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentVaccinationMenu.html';
    include $root . '/app/view/fragment/fragmentVaccinationJumbotron.html';
    ?>
    <table class = "table table-striped table-bordered">
        <thead>
        <tr>
            <th scope = "col">Centre</th>
            <th scope = "col">Doses</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($results as $element) {
            printf("<tr><td>%s</td><td>%d</td></tr>", $element["label"],
                $element["doses"]);
        }
        ?>
        </tbody>
    </table>
</div>
<?php include $root . '/app/view/fragment/fragmentVaccinationFooter.html'; ?>

<!-- ----- fin viewAll -->
  
  
  