<?php
require 'fonctions/auth.php';
force_utilisateur_connecte();
require 'header.php';
$title = "Page d'acceuil";
$nav = "index"; ?>
<?php
$parfums =
  [
    'Fraise' => 4,
    'Vanille' => 5,
    'Chocolat' => 3
  ];
$cornets =
  [
    'Pot' => 2,
    'Cornet' => 3
  ];
$supplements =
  [
    'Pepites de chocolat' => 1,
    'Chantille' => 0.5
  ];
$title = "Composez votre classe";
$ingredients = [];
$total = 0;
if (isset($_GET['parfum'])) {
  foreach ($_GET['parfum'] as $parfum) {
    if (isset($parfums[$parfum])) {
      $ingredients[] = $parfum;
      $total += $parfums[$parfum];
    }
  }
}
if (isset($_GET['cornet'])) {
  $cornet = $_GET['cornet'];
  if (isset($cornets[$cornet])) {
    $ingredients[] = $cornet;
    $total += $cornets[$cornet];
  }
}
if (isset($_GET['supplements'])) {
  foreach ($_GET['supplements'] as $supplement) {
    if (isset($supplements[$supplement])) {
      $ingredients[] = $supplement;
      $total += $supplements[$supplement];
    }
  }
}
?>
<?php require 'fonctions.php'; ?>
<h1>Composez votre glace</h1>
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Votre glace</h5>
                <ul>
                    <?php foreach ($ingredients as $ingredient) : ?>
                    <li><?php echo $ingredient; ?></li>
                    <?php endforeach; ?>
                </ul>
                <p><strong> Prix: </strong><?php echo $total; ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <form action="index.php" method="GET">
            <h2>Choisissez vos parfums</h2>
            <?php foreach ($parfums as $parfum => $prix) : ?>
            <div class="checkbox">
                <label>
                    <?= checkbox('parfum', $parfum, $_GET); ?>
                    <?php echo $parfum . '- ' . $prix . 'euro'; ?>
                </label>
            </div>
            <?php endforeach; ?>
            <h2>Choissisez votre cornet</h2>
            <?php foreach ($cornets as $cornet => $prix) : ?>
            <div class="checkbox">
                <label>
                    <?= radio('cornet', $cornet, $_GET); ?>
                    <?php echo $cornet . '- ' . $prix . 'euro'; ?>
                </label>
            </div>
            <?php endforeach; ?>
            <h2>Choisissez vos supplements</h2>
            <?php foreach ($supplements as $supplement => $prix) : ?>
            <div class="checkbox">
                <label>
                    <?= checkbox('supplements', $supplement, $_GET); ?>
                    <?php echo $supplement . '- ' . $prix . 'euro'; ?>
                </label>
            </div>
            <?php endforeach; ?>
            <button type="submit" class="btn btn-primary">Envoyer ma commande</button>
        </form>
    </div>
</div>
<div> <?php require 'footer.php'; ?></div>