
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
            <h2>Documentation de l'innovation 1</h2>
        </div>
        <div class="panel-body">
            Cette première innovation consiste à une amélioration du visionnage des données disponibles.
            En effet, je me suis dit qu’au lieu d’avoir de simples tableaux nous présentant les données
            il est tout de suite plus facile de repérer l’information utile sur une graphe. <br><br>
            Pour réaliser cette innovation, j’ai décidé d’utiliser un Framework CSS <span class="label label-success"><a target="_blank" href="https://chartscss.org/">Charts.css</a></span>
            permettant la transposition
            d’un tableau html en visuel graphique. Son installation est assez simple car il a suffi d’ajouter
            le fichier css dans les ressources du projet puis de le rattacher a la globalité des pages par une
            balise «link» dans le fragment du header html.<br><br>
            Ensuite, afin de montrer l’utilité de cet ajout, j’ai établit 3 querys pour ma page d’innovation 1.
            L’objectif ici n’est pas de développer à son plein potentiel l’utilisation de ce framework, mais plutôt
            d’avoir un proof of concept pour le futur (par soucis de temps et de quantité de travail, j’en reparlerais
            dans mon point de vue global sur ce projet. Ces 3 querys que j’ai décidé d’illustrer sont les suivantes :<br><br>
            <ol>
                <li>
                    <span class="label label-default">SELECT centre.label, SUM(stock.quantite) AS 'doses' FROM stock, centre WHERE centre_id
                        = centre.id GROUP BY centre.label ORDER BY doses DESC</span><br>
                    Dans cette première requête, on peut visualiser les doses (tout vaccin confondu) disponible selon chaque centre.
                    On peut donc en retirer quelques informations clés très rapidement : le centre nécessitant de stock, les centres un
                    stock moyen, les stocks en situations stables.
                </li>
                <li>
                    <span class="label label-default">SELECT label, quantite FROM stock, vaccin WHERE vaccin_id = vaccin.id  GROUP BY vaccin.label
                        ORDER BY quantite DESC</span><br>
                    Dans cette deuxième requête, on peut visualiser les doses (tout centre confondu) disponible selon selon chaque vaccin.
                    Grâce à ce graphe on peut visualiser les vaccins avec une nécessité d’ajout de stock.
                </li>
                <li>
                    <span class="label label-default">SELECT patient.adresse, MAX(injection) as doses FROM rendezvous, patient  WHERE patient_id =
                        patient.id GROUP BY adresse ORDER BY doses DESC</span><br>
                    Dans cette troisième requête, on peut visualiser le nombre de personnes vaccinées selon la location l’adresse de
                    son centre (à sa dernière dose injectée). Grâce à ce graphe on peut visualiser le rapport de personnes vaccinées par rapport
                    à la population (avec évidemment les données nécessaires, sinon ici le chiffre permet de connaitre combien de personnes sont passés dans le centre)
                </li>
            </ol>
            <br>
            J’ai arbitrairement décider de ces querys car pour moi elles me permettent d’illustrer simplement ce qu’un utilisateur serait
            en possibilité de désirer. Evidemment l’intérêt majeur des présentations en graphe serait ici de les faire corréler entre eux
            afin de pouvoir en retirer des plans d’actions par exemple. Cependant, il est plus utile de trouver les corrélations à ressortir
            par des études pour ensuite les implémenter sur l’infrastructure. C’est pourquoi ici je n’ai pas poussé jusqu’à ce point l’innovation,
            mais le concept est largement compris.<br><br>
            De plus, pour permettre une meilleure interprétation, connaître la fluctuation des doses dans le temps serait d’une grande aide. Cependant
            je n’ai pas eu le temps nécessaire afin de me pencher sur ce problème.<br><br>
            L’implémentation permet d’observer les 3 querys explicitées avec chacune 1 graphe. L’affichage des graphiques est adaptatif au données disponibles,
            donc "normalement" ca marche bien.
        </div>
    </div>
</div>
<?php include $root . '/app/view/fragment/fragmentVaccinationFooter.html'; ?>

<!-- ----- fin pointDeVueProjet -->
  
  
  