<?php

function attaque($nom_pokemon1, &$pokemon1, $nom_pokemon2, &$pokemon2) {

static $tour = 0;
echo "<h3>$nom_pokemon1 attaque $nom_pokemon2</h3>";
if ($pokemon1['attaque'] >= $pokemon2['defense']) {
    // L'attaque est supérieure à la défense : pokemon1 touche
    $coup = $pokemon1['attaque'] - $pokemon2['defense'] + 1; // La valeur du coup est la différence entre l'attaque et la défense
    $pokemon2['pv'] -= $coup;
    echo "<p>$nom_pokemon2 perd $coup Point de vie, il lui reste " . $pokemon2['pv'] . " Points de vie</p>";
  } else {
    // La défense est supérieure à l'attaque, pokemon1 prend la moitié du coup et la défense baisse un peu
    $coup = ($pokemon2['defense'] - $pokemon1['attaque']) / 2;
    $pokemon1['pv'] -= $coup;
    $pokemon2['defense'] -= 1;
    echo "<p>$nom_pokemon2 perd 1 Points de défense, il lui reste " . $pokemon2['defense'] . " Points de défense</p>";
    echo "<p>$nom_pokemon1 râte son attaque ! Il perd $coup Points de vie, il lui reste " . $pokemon1['pv'] . " Points de vie</p>";
  }
  if ($pokemon2['pv'] <= 0) // S'il n'y a pas d'accolades après un if, seule la première instruction est filtrée par le if
    echo "<p>$nom_pokemon2 est KO !</p>";
  if ($pokemon1['pv'] <= 0)
    echo "<p>$nom_pokemon1 est KO !</p>";

}

?>