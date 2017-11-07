<html>
<head>
  <!-- Insérer le css ici -->
  <link rel="stylesheet" type="text/css" href="style.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>

<?php
// Initialisation des variables

// Mes pokemons
$pokemons = array();

// Les pokemons ont 50 points à répartir entre vie, défense et attaque
// Pikachu
$pikachu = [
  'pv' => 25, // 25 Points de vie par défaut
  'attaque' => 15,
  'defense' => 10
];
$pokemons['Pikachu'] = $pikachu;

// Bulbizarre
$bulbizarre = [
  'pv' => 30,
  'attaque' => 8,
  'defense' => 20
];
$pokemons['Bulbizarre'] = $bulbizarre;

// Salmeche
$salmeche = [
  'pv' => 25,
  'attaque'=> 20,
  'defense' => 15
];
$pokemons['Salmeche'] = $salmeche;

echo '
  <script type="text/javascript">
    var pokemons = [];
';
foreach($pokemons as $pokemon => $stats) {
  echo 'pokemons["' . $pokemon . '"] = [];' . "\n";
  foreach ($stats as $cle => $valeur) {
    echo 'pokemons["' . $pokemon . '"]["' . $cle . '"] = ' . $valeur . "\n";
  }
}

echo '
  
  function changePokemon1(event) {
    selPokemon = $(this).val();
    $("[name=\'pv_pokemon1\']").val(pokemons[selPokemon]["pv"]);
    $("[name=\'defense_pokemon1\']").val(pokemons[selPokemon]["defense"]);
    $("[name=\'attaque_pokemon1\']").val(pokemons[selPokemon]["attaque"]);
  }

  function changePokemon2(event) {
    selPokemon = $(this).val();
    $("[name=\'pv_pokemon2\']").val(pokemons[selPokemon]["pv"]);
    $("[name=\'defense_pokemon2\']").val(pokemons[selPokemon]["defense"]);
    $("[name=\'attaque_pokemon2\']").val(pokemons[selPokemon]["attaque"]);
  
  // pour initialiser lorsque le document est chargé
  $(document).ready(function() {
    $("#pokemon1").on("change", changePokemon);
    $("#pokemon2").on("change", changePokemon);
  });

  </script>
';

// tableau de validation
$form_error = [];

// Validation du formulaire
// $input est égal au champ name de l'input ou du select
foreach($_GET as $input => $value) {
  if ($input === 'pokemon1' || $input === 'pokemon2') {
    if (!isset($pokemons[$value])) {
      echo '<p style="">Le pokemon ' . $value . ' n\'est pas un pokemon disponible</p>';
      $form_error[$input] = 1;
    }
  } elseif (empty($value) || !ctype_digit($value) || $value <= 0) {
    echo '<p style="">Le champ ' . $input . ' doit être un entier strictement supérieur à 0</p>';
    $form_error[$input] = 1;
  }
}
?>

  <form>
    <fieldset>
      <legend>Pokemon 1 :
        <select name="pokemon1" <?php echo isset($form_error['pokemon1']) ? 'class="error"' : ''; ?>>
          <?php
            foreach($pokemons as $pokemon => $stats) {
              echo '<option value="' . $pokemon . '">' . $pokemon . '</option>';
            }
          ?>
        </select>
      </legend>
      <div>Points de vie : <input type="test" name="pv_pokemon1" value="<?php echo $pikachu['pv']; ?>" <?php echo isset($form_error['pv_pokemon1']) ? 'class="error"' : ''; ?> /></div>
      <div>Points de défense : <input type="test" name="defense_pokemon1" value="<?php echo $pokemon1['defense']; ?>" <?php echo isset($form_error['defense_pokemon1']) ? 'class="error"' : ''; ?> /></div>
      <div>Points d'attaque : <input type="test" name="attaque_pokemon1" value="<?php echo $pikachu['attaque']; ?>" <?php echo isset($form_error['attaque_pokemon1']) ? 'class="error"' : ''; ?> /></div>
    </fieldset>
    <fieldset>
      <legend>Pokemon 2 :
        <select name="pokemon2" <?php echo isset($form_error['pokemon2']) ? 'class="error"' : ''; ?>>
          <?php
            foreach($pokemons as $pokemon => $stats) {
              echo '<option value="' . $pokemon . '">' . $pokemon . '</option>';
            }
          ?>
        </select>
      </legend>
      <div>Points de vie : <input type="test" name="pv_pokemon2" value="<?php echo $bulbizarre['pv']; ?>" <?php echo isset($form_error['pv_pokemon2']) ? 'class="error"' : ''; ?> /></div>
      <div>Points de défense : <input type="test" name="defense_pokemon2" value="<?php echo $bulbizarre['defense']; ?>" <?php echo isset($form_error['defense_pokemon2']) ? 'class="error"' : ''; ?> /></div>
      <div>Points d'attaque : <input type="test" name="attaque_pokemon2" value="<?php echo $bulbizarre['attaque']; ?>" <?php echo isset($form_error['attaque_pokemon2']) ? 'class="error"' : ''; ?> /></div>
    </fieldset>
    <button type="submit">Combattez !</button>
  </form>

<?php
/**
 * Bienvenue dans ce module PHP
 * Nous allons travailler à la réalisation d'un pokedex
 */
// Vérifions les informations
/*echo "<pre>";
var_dump($_GET);
var_dump($_POST);
echo "</pre>";*/
if (count($form_error) > 0)
  die ("Le combat est reporté pour cause d'erreurs de saisie");

if (count($_GET) = 0)
  die ("Veuillez sélectionner vos pokemons et lancer le combat");


$tour = 0;

$nom_pokemon1 = $_GET['pokemon1'];
$pokemon1 = $pokemon[$nom_pokemon1];

// stats customs
$pokemon1["pv"] = $_GET['pv_pokemon1']

$nom_pokemon2 = $_GET['pokemon2'];
$pokemon2 = $pokemon[$nom_pokemon2];

echo "<h2>$nom_pokemon1 affronte $nom_pokemon2</h2>"


//echo "Date : " . date('d/m/Y : H:i:s');


// Boucle de combat
do {
  echo "<h2> Tour : " . ++$tour . " à " . date('H:i:s') . "</h2>";
  // pikachu attaque bulbizarre
  echo "<h3>$nom_pokemon1 attaque $nom_pokemon2</h3>";
  if ($pokemon1['attaque'] >= $pokemon2['defense']) {
    // L'attaque est supérieure à la défense : pikachu touche
    $coup = $pokemon1['attaque'] - $pokemon2['defense'] + 1; // La valeur du coup est la différence entre l'attaque et la défense
    $pokemon2['pv'] -= $coup;
    echo "<p>nom_pokemon2 perd $coup PV, il lui reste " . $pokemon2['pv'] . " Points de vie</p>";
  } else {
    // La défense est supérieure à l'attaque, pikachu prend la moitié du coup et la défense baisse un peu
    $coup = ($bulbizarre['defense'] - $pikachu['attaque']) / 2;
    $pikachu['pv'] -= $coup;
    $bulbizarre['defense'] -= 1;
    echo "<p>Bulbizarre perd 1 Points de défense, il lui reste " . $bulbizarre['defense'] . " Points de défense</p>";
    echo "<p>Pikachu râte son attaque ! Il perd $coup Points de vie, il lui reste " . $pikachu['pv'] . " Points de vie</p>";
  }
  if ($bulbizarre['pv'] <= 0) // S'il n'y a pas d'accolades après un if, seule la première instruction est filtrée par le if
    echo "<p>Bulbizarre est KO !</p>";
  if ($pikachu['pv'] <= 0)
    echo "<p>Pikachu est KO !</p>";
  // Et maintenant la contre-attaque : à vous de jouer !
  // bulbizarre attaque pikachu
  echo "<h3>Bulbizarre attaque Pikachu</h3>";
  if ($bulbizarre['attaque'] >= $pikachu['defense']) {
    // L'attaque est supérieure à la défense : bulbizarre touche
    $coup = $bulbizarre['attaque'] - $pikachu['defense'] + 1; // La valeur du coup est la différence entre l'attaque et la défense
    $pikachu['pv'] -= $coup;
    echo "<p>Pikachu perd $coup PV, il lui reste " . $pikachu['pv'] . " PV</p>";
  } else {
    // La défense est supérieure à l'attaque, bulbizarre prend la moitié du coup et la défense baisse un peu
    $coup = ($pikachu['defense'] - $bulbizarre['attaque']) / 2;
    $bulbizarre['pv'] -= $coup;
    $pikachu['defense'] -= 1;
    echo "<p>Pikachu perd 1 Points de défense, il lui reste " . $pikachu['defense'] . " Points de défense</p>";
    echo "<p>Bulbizarre râte son attaque ! Il perd $coup Points de vie, il lui reste " . $bulbizarre['pv'] . " Points de vie</p>";
  }
  if ($bulbizarre['pv'] <= 0) // S'il n'y a pas d'accolades après un if, seule la première instruction est filtrée par le if
    echo "<p>Bulbizarre est KO !</p>";
  if ($pikachu['pv'] <= 0)
    echo "<p>Pikachu est KO !</p>";
} while ($pikachu['pv'] > 0 && $bulbizarre['pv'] > 0); // === !($pikachu['pv'] <= 0 || $bulbizarre['pv'] <= 0)
// Ajoutons quelques baies pour restaurer des Points de Vies
$pv_baie_rouge = 50;
$pv_baie_noire = 30;
// Bulbizarre mange une baie rouge
// Pikachu mange une baie noire
?>


</body>
</html>