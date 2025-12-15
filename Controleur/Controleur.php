<?php
require __DIR__ . '/../Modele/Modele.php';

// Affiche la liste de tous les billets du blog
function accueil() {
  $billets = getBillets();
  require __DIR__ . '/../Vue/vueAccueil.php';
}

// Affiche les détails sur un billet
function billet($idBillet) {
  $billet = getBillet($idBillet);
  $commentaires = getCommentaires($idBillet);
  require __DIR__ . '/../Vue/vueBillet.php';
}

// Affiche une erreur
function erreur($msgErreur) {
  require __DIR__ . '/../Vue/vueErreur.php';
}