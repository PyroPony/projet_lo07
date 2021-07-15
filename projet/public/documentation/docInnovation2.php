
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
            <h2>Documentation de l'innovation 2</h2>
        </div>
        <div class="panel-body">
            Cette deuxième innovation a un but d’affichage dynamique un peu plus ludique que des tableaux ou de simples listes. Lorsque j’ai réalisé
            le projet, j’avais plusieurs fois envie de consulter le dossier de vaccination d’un patient afin de savoir où j’en étais et quelles
            conditions je pouvais luis imposer. Cependant dans la structure globale du projet, nous pouvons uniquement agir sur le dossier de vaccination
            en tant que patient.  C’est-à-dire qu’en fonction de sa situation vaccinale nous aurons différents scénarios, tel que 0 (aucune dose, donc ajouter
            première dose) ou 1 (ajouter dose suivante) ou n (afficher toutes les doses administrées). <br><br>
            J’ai donc décider d’implémenter une page qui intègre tous les dossiers vaccinaux de la plateforme. Grâce à cela il est facile de se rendre compte
            de la situation d’un patient. Nous obtenons pour chaque patient :<br>
            <ul>
                <li>
                    Nom et prénom
                    <div class="panel panel-primary" style="width: 50%"> <div class="panel-heading" >Michel Dupont</div></div>
                </li>
                <li>
                    Les injections faites et les centres associés
                </li>
                <li>
                    La progression de la vaccination par rapport au nombre de doses totales
                    <div class="progress" style="width: 40%">
                        <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                        </div>
                    </div>
                </li>
                <li>
                    Le nombre de doses reçues<br>
                    <span class='badge'>1</span>  Dose(s) reçue(s)
                </li>
                <li>
                    Le nombre de doses nécessaires<br>
                    <span class='badge'>2</span>  Dose(s) nécessaire(s)
                </li>
            </ul>
            <br>
            Afin d’avoir un côté plus attrayant pour l’affichage des données, j’ai couplé mon idée au Framework <span class="label label-success"><a target="_blank" href="https://getbootstrap.com/docs/3.3/">BootStrap</a></span>
            déjà présent dans le projet. Cet affichage répond aux fluctuations de données reçues et adaptent son affichage
            en conséquence. C’est-à-dire que tous les panels de chaque patient auront la même taille déterminée par le nombre
            d’arguments maximum possible (liste d’injections) pour l’échantillon de données récupérées à cette session. Ensuite
            en utilisant une barre de progression, je peux présenter la progression de la vaccination du patient avec le visuel
            adapté. Et enfin je détaille le nombre de total de doses reçus avec le nombre de doses nécessaires avec un affichage
            dans des badges Bootstrap.<br><br>
            Cependant je n’ai pas intégré de sélection d’un patient en particulier pour cet affichage, de ce fait il est nécessaire
            lors du traitement d’un nombre de patients important d’utiliser CTRL + f afin de trouver la personne recherchée. De plus,
            j’ai essayé de valider ce design avec un maximum de scénarios, mais il se peut qu’il soit défectueux si par exemple 2 vaccins
            différents sont administrés à la même personne (quoi qu’il arrive je ne suis pas médecin, et si on change de vaccin je ne
            sais pas si il faut considéré le nombre de doses du premier ou du second ou un autre).
        </div>
    </div>
</div>
<?php include $root . '/app/view/fragment/fragmentVaccinationFooter.html'; ?>

<!-- ----- fin pointDeVueProjet -->


