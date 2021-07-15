
<!-- ----- début PointDeVueProjet -->
<?php

require($root . '/app/view/fragment/fragmentVaccinationHeader.html');
?>

<body>
<div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentVaccinationMenu.html';
    ?>
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3>Documentation de l'innovation 3</h3>
        </div>
        <div class="panel-body">
            Pour cette dernière innovation, j’ai décidé de réaliser une fonction assez
            simple mais non disponible dans le sujet de base. L’objectif est de reprendre ce que nous
            avons déjà pu réaliser dans des TD précédemment mais de l’adapter dans ce sujet. C’est ici qu’est
            l’innovation car on va sélectionner un groupe de patient en fonction de leur localisation.<br><br>
            On peut imaginer que cette fonction soit utile dans le cas d’un événement organisé de façon géographique et que le nécessité
            d’avoir reçu au moins une dose d’un vaccin est nécessaire. Il est alors possible de spécifier ou non si l’on veut uniquement
            des personnes vaccinées. Dans le cas non échéant, on peut simplement désirer récupérer les personnes répertoriées dans la région.<br><br>
            C’est un formulaire qui récupère dans un premier temps toutes les villes pour lesquelles des patients existent,
            puis on demande si la vaccination est nécessaire ou non.
        </div>
    </div>

</div>
<?php include $root . '/app/view/fragment/fragmentVaccinationFooter.html'; ?>

<!-- ----- fin pointDeVueProjet -->


