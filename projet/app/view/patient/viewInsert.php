
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
            <input type="hidden" name='action' value='patientCreated'>
            <label for="prenom">prenom : </label><input type="text" name='prenom' size='16' value='Macfouille'>
            <label for="nom">nom : </label><input type="text" name='nom' size='16' value='Carlito'>
            <label for="adresse">adresse : </label><input type="text" name='adresse' size='42' value='18 rue du fisc, Webedia'>
        </div>
        <p/>
        <button class="btn btn-primary" type="submit">Go</button>
    </form>
    <p/>
</div>
<?php include $root . '/app/view/fragment/fragmentVaccinationFooter.html'; ?>

<!-- ----- fin viewInsert -->



