
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
            <label for="id_vaccin">Selectionnez le vaccin : </label><select class="form-control" id='id_vaccin' name='id_vaccin' style="width: 250px">
                <?php
                foreach ($results as $element) {
                    echo ("<option value='" . $element['id'] ."' >");
                    echo implode(" : ", $element);
                    echo ("</option>");
                }
                ?>
            </select>
            <label for="doses">Doses : </label><br><input type="text" step='any' name='doses' value='10'>
        </div>
        <p/>
        <button class="btn btn-primary" type="submit">Go</button>
    </form>
    <p/>
</div>

<?php include $root . '/app/view/fragment/fragmentVaccinationFooter.html'; ?>

<!-- ----- fin viewId -->