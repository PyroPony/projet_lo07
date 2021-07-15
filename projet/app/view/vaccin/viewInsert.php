
<!-- ----- début viewInsert -->

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
            <input type="hidden" name='action' value='vaccinCreated'>
            <label for="label">label : </label><input type="text" name='label' size='32' value='5G-Antenna'>
            <label for="doses">doses : </label><input type="text" name='doses' value='4'>
        </div>
        <p/>
        <button class="btn btn-primary" type="submit">Go</button>
    </form>
    <p/>
</div>
<?php include $root . '/app/view/fragment/fragmentVaccinationFooter.html'; ?>

<!-- ----- fin viewInsert -->



