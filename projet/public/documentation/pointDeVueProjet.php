
<!-- ----- début PointDeVueProjet -->
<?php

require($root . '/app/view/fragment/fragmentVaccinationHeader.html');
?>

<body>
<div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentVaccinationMenu.html';
    include $root . '/app/view/fragment/fragmentVaccinationJumbotron.html';
    ?>

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3>Retour sur le projet</h3>
        </div>
        <div class="panel-body">
            Ce projet a été très intéressant à réaliser. En effet, il m’a permis de revoir la totalité des TP au sein
            d’un même ensemble (en partant de la base du TP12 MVC, nous repartons finalement de l’aboutissement de tous
            les devoirs de TP). Cependant il a su solliciter de nouveaux développements pour je dirais une bonne moitié du
            projet. Toute cette accumulation de tâches m’a permis de développer de nombreuses compétences.<br>
            Pour aborder ce projet, j’ai décidé de ne pas former de binôme car j’avais peur de me retrouver avec plus de
            problèmes que tout seul. Je pense avoir fait le bon choix, car malgré le fait que je sois débutant en PHP et SQL,
            j’avais estimé que ce projet me serait abordable individuellement et cela a été le cas.  En me planifiant de grosses
            sessions de développement j’ai pu réaliser ce projet de manière plutôt efficace. Mais ce projet n’en reste pas
            moins conséquent et j’ai dû rester concentrer pour le terminer selon le planning que je m’étais fixé.<br>
            Comme je l’ai expliqué précédemment, la première partie du projet est assez rapide et simple. L’objectif selon moi
            est d’adapter tout le travail fourni au long du semestre dans le cadre du projet. C’est ici que l’on est récompensé
            d’avoir ou non réaliser avec consistance les TP. Il n’y pas vraiment de prise de tête et on avance assez rapidement
            pour adapter le code dans la nouvelle base de données et les pages demandées. Cette partie s’étend pour moi jusqu’à la
            moitié de la gestion du stock.<br>
            Nous entrons ensuite dans une partie que je qualifierais d’intermédiaire. Ici, nous n’adaptons plus uniquement le
            code réalisé dans le passé, il faut réfléchir à de nouvelles solutions à des problèmes se présentant au fils des contraintes.
            Mais cela se gère avec un peu de volontés.<br>
            C’est ensuite dans la dernière partie, que je mettrais dans un niveau un plus avancé. C’est là que j’ai dû prendre
            le plus de temps à trouver des solutions pour répondre aux attentes du sujet. Je reviendrais plus bas sur certains
            points de cette partie, mais dans sa globalité je la trouve très intéressante car elle requiert un « mix » de pas mal
            de notions vues dans le semestre. Je n’avais pas au départ saisie le temps que je prendrais ces deux derniers parties intermédiaire et avancée.<br>
            C’est donc la raison pour laquelle je dirais que ce sujet se scinde en deux parties pour les demandes du cahier des charges. Mais cela reste totalement abordable
            et j’ai pris beaucoup de plaisirs à chercher des solutions dans la deuxième section.
        </div>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3>Axe d'améliorations de mon projet</h3>
        </div>
        <div class="panel-body">
            Le premier axe d’amélioration de mon site serait de reconstruire de nombreuses parties du code de façon plus optimisée et propre.
            J’admets que certaines parties de mon code sont de réelles usines à gaz et qu’elles nécessiteraient un important processus d’optimisation.
            Dans ce cas, rebâtir une base saine et stable serait la première étape avant de réaliser tout autre amélioration. Je pense avoir répondu à
            une grande partie du cahier des charges et donc mon code n’est pas à rebâtir dans son entièreté.<br>
            Ce problème de rédaction et de conception du code a été dû aux conditions actuelles liées au Covid. En effet, je me retrouve avec une quantité
            importante de devoirs et je n’ai malheureusement pas pu accorder autant de temps que je voulais pour ce projet. Mais j’ai essayé de faire tout
            mon possible pour rendre le meilleur compromis. Il serait donc intéressant pour mon site, d’avoir dans un premier une attention de révision.<br>
            Ensuite un des points sur lesquels je ne sais si les bases de données prennent déjà en compte cette fonctionnalités ou non, est la gestion de
            l’historique des données. Il serait de mon point de vue fort intéressant de pouvoir consulter l’évolution des stocks, des patients, des rendez-vous
            sur une échelle de temps. Il serait alors possible de corréler beaucoup plus de données et d’en tirer énormément plus d’informations pertinentes.<br>
            Enfin, l’axe d’amélioration majeure, seraient pour moi un développement plus important des innovations. Je les ai réalisés en tant que
            « proof of concept » afin de répondre au sujet. Mais j’aurais bien aimé les développer de façon plus stables et plus complètes que ce soit
            en termes de fonctionnalités (sélection d’éléments spécifiques, personnalisation de l’utilisateur) ou de rendu (interface utilisateur).<br>
        </div>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3>Axe d'améliorations du projet</h3>
        </div>
        <div class="panel-body">
            Selon moi, le sujet en lui-même (jusqu’aux innovations non comprises) est très équilibrée. Il suit une progression assez linéaire dans
            la difficulté, et le sujet traité reste de surcroit intéressant. En effet traitant d’un sujet d’actualité, il permet d’avoir une sorte
            d’application concrète des technologies que nous avons étudié. Certes elles ne sont pas employées sur un niveau professionnel, mais pour
            une « découverte » des technologies du web, PHP et SQL, j’ai trouvé cela fort intéressant. J’avais d’ailleurs pu regarder la construction
            des projets liés au Covid comme <a href="https://vitemadose.covidtracker.fr/">ViteMaDose</a> et <a href="https://covidtracker.fr/">CovidTracker</a>, et je trouve une certaine approche similaire dans ce projet.<br>
            Cependant, pour moi la partie avec plus d’ambigüité est celle sur les innovations. Elle est assez floue et je n’arrivais personnellement
            pas à juger la quantité de travail requise. Cela est peut-être pratique pour certains qui peuvent laisser place à leur imagination et
            utiliser leur temps disponible à les réaliser. Mais pour la majorité je trouve qu’il y a une certaine lacune. En effet, j’ai eu des idées, en
            liant par exemple les données à des API (comme google map pour localiser les centres sur une carte interactive) cependant je n’avais ni le
            temps de la réaliser, ou bien même de juste approcher le JavaScript pour la réaliser. Vous aviez stipulé que cette technologie était initiée
            avant en LO07, et je pense qu’en garder une petite partie permettrait plus de possibilité des élèves.<br>
            Mais la partie innovation reste tout de même intéressante si l’on a le temps de s’y attarder.<br>

        </div>
    </div>
    </div>
<?php include $root . '/app/view/fragment/fragmentVaccinationFooter.html'; ?>

<!-- ----- fin pointDeVueProjet -->
  
  
  