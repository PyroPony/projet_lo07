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

    <form role="form" method='get' action='router2.php'>
        <div class="form-group">
            <input type="hidden" name='action' value='innovationReadLocalisation'>
            <label for="adresse">Localisation : </label> <select class="form-control" id='adresse' name='adresse' style="width: 200px">
                <?php
                foreach ($results as $element) {
                    echo ("<option value='". $element . "'> ".$element ."</option>");
                }
                ?>
            </select>
            <label for="bool">Vacciné : </label><select class="form-control" id="bool" name="bool" style="width: 80px">
                <option value="0">oui</option>
                <option value="1"> - </option>
            </select>
        </div>
        <button class="btn btn-primary" type="submit">Submit form</button>
    </form>

</div>
<?php include $root . '/app/view/fragment/fragmentVaccinationFooter.html'; ?>

<!-- ----- fin Innovation3 -->


