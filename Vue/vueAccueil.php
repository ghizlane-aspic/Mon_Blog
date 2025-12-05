<?php 
$titre = 'Mon Blog'; 
?>

<?php ob_start(); ?>

<?php foreach (($billets ?? []) as $billet): ?>

    <article>
        <header>
          <a href="<?= "index.php?action=billet&id=" . $billet['id'] ?>">
            <h1 class="titreBillet"><?= $billet['titre'] ?></h1>
            </a>
            <time><?= $billet['date'] ?></time>
        </header>
        <p><?= $billet['contenu'] ?></p>
    </article>
<?php endforeach; ?>

<?php 
$contenu = ob_get_clean();
require 'gabarit.php';
?>
