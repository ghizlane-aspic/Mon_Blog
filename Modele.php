<?php
// Renvoie la liste des commentaires associés à un billet
function getCommentaires($idBillet) {
$bdd = getBdd();
$commentaires = $bdd->prepare('select COM_ID as id, COM_DATE as date,'
. ' COM_AUTEUR as auteur, COM_CONTENU as contenu from T_COMMENTAIRE'
. ' where BIL_ID=?');
$commentaires->execute(array($idBillet));
return $commentaires;
}

// Renvoie les informations sur un billet
function getBillet($idBillet) {
$bdd = getBdd();
$billet = $bdd->prepare('select BIL_ID as id, BIL_DATE as date,'
. ' BIL_TITRE as titre, BIL_CONTENU as contenu from T_BILLET'
. ' where BIL_ID=?');
$billet->execute(array($idBillet));
if ($billet->rowCount() == 1)
return $billet->fetch(); // Accès à la première ligne de résultat
else
throw new Exception("Aucun billet ne correspond à l'identifiant '$idBillet'");
}

// Renvoie la liste de tous les billets
function getBillets() {
$bdd = getBdd();
$resultat = $bdd->query('select BIL_ID as id, BIL_DATE as date, BIL_TITRE as titre, BIL_CONTENU as contenu from T_BILLET order by BIL_ID desc');
return $resultat->fetchAll(PDO::FETCH_ASSOC);
}

// Effectue la connexion à la BDD
// Instancie et renvoie l'objet PDO associé
function getBdd() {
    $host = getenv('DB_HOST') ?: 'db';
    $db   = getenv('DB_NAME') ?: 'monblog';
    $user = getenv('DB_USER') ?: 'monblog';
    $pass = getenv('DB_PASSWORD') ?: 'monblogpass';
    $port = getenv('DB_PORT') ?: '3306';

    $dsn = "mysql:host={$host};port={$port};dbname={$db};charset=utf8";
    $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    );

    $bdd = new PDO($dsn, $user, $pass, $options);
    return $bdd;
}
