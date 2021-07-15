
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
            <label for="id_centre">Selectionnez le centre : </label><select class="form-control" id='id_centre' name='id_centre' style="width: 250px">
                <?php
                foreach ($results['centre'] as $element) {
                    echo ("<option value='" . $element->getId() ."' >");
                    echo $element->getId() . " : " . $element->getLabel();
                    echo ("</option>");
                }
                ?>
            </select>
            <br>
            <?php
            foreach ($results['vaccin'] as $element){
                echo "<label for=" .$element->getLabel() .">". $element->getId()." : ".$element->getLabel() ." :   </label><br><input type='text' step='any' name=".$element->getId()." value='0'><br>";
            }
            ?>
        </div>
        <p/>
        <button class="btn btn-primary" type="submit">Go</button>
    </form>
    <p/>
</div>

<?php include $root . '/app/view/fragment/fragmentVaccinationFooter.html'; ?>

<!-- ----- fin viewId -->