
<!-- ----- début viewId -->
<?php
require ($root . '/app/view/fragment/fragmentVaccinationHeader.html');
?>

<body>
<div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentVaccinationMenu.html';
    include $root . '/app/view/fragment/fragmentVaccinationJumbotron.html';
    ?>
    <form role="form" method='get' action='router2.php'>
        <div class="form-group">
            <input type="hidden" name='action' value='<?php echo ($target);?>'>
            <label for="id_patient">Selectionnez le patient : </label><select class="form-control" id='id_patient' name='id_patient' style="width: 250px">
                <?php
                foreach ($results as $element) {
                    echo ("<option value='" . $element->getId() ."' >");
                    echo $element->getId() . " : " . $element->getNom() . " : " . $element->getPrenom();
                    echo ("</option>");
                }
                ?>
            </select>
        </div>
        <p/>
        <button class="btn btn-primary" type="submit">Go</button>
    </form>
    <p/>
</div>

<?php include $root . '/app/view/fragment/fragmentVaccinationFooter.html'; ?>

<!-- ----- fin viewId -->