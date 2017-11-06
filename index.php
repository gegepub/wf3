<!DOCTYPE HTML>
<html>
<head>
  <title>Exemple</title>
</head>
<body>

  <?php
  	$nom = 'Dupont';
  	$prenom = 'Jean';
  	
    echo "Bonjour ". $prenom." ".$nom;

    echo "<br/>";
    $age = 33;

    echo "J'ai $age ans";
    //echo 'J\'ai $age ans';
    // \ caractère d'échappement, le \n est un saut de ligne

    echo "<br>";

    if ($age > 18 && $prenom == "Jean"){
    	echo "Majeur";
    } elseif($age >= 15) {
    	echo "Ado";
    } else {
    	echo "Enfant";
    }

    $age2 = 33;
    echo "<br>";
    echo $age <=> $age2;  
    echo "<br>";
    echo 1<=>2;
    echo "<br>";
    echo 2<=>1;
    echo "<br>";
    // Déclaration de variables
    $a = null;

    $c = 5;
    $b;
    $d;

    // affiche la première valeur non nulle
    echo $a ?? $b ?? $c ?? $d;

    echo "<br>";
    // l'arithmétique :
    $a = 5;
    $b = $a + 5;
    echo "b vaut $b et a vaut $a";

    echo "<br>";
    $b = $a +=5; //$a = $a + 5
    echo "b vaut $b et a vaut $a";
   
	echo "<br>";   
    $a++;	// $a = $a + 1
    echo "a vaut $a <br>";

    ++$a;	// $a = $a +1
    echo "a vaut $a <br>";

    // différence
    echo "avant a vaut " .  ++$a; // on incrémente d'abord a et on envoie la valeur de a après  
    echo " après a vaut " .  $a;
    echo "<br>";
    echo "avant a vaut " .  $a++; // on envoie la valeur de a et on incrémente a après
    echo " après a vaut " .  $a;
    
    echo "<pre>";		// balise <pre> pour isoler le code
    print_r ($a);		// contenu de la valeur
    echo "</pre>";
    echo "<pre>";
    var_dump ($a);		// donne le type et les propriétés d'un objet
    echo "ce code n'est pas interprété\n\ndu tout";
    echo "</pre>";

    $array = ["couleur" => "rouge", "taille" => 1.70];
    echo "<pre>";
    var_dump($array);
    die ("fini");
  ?>

</body>
</html>