<?php 
$notes = [
    "maths" => [15, 17, 12],
    "francais" => [14, 11],
    "sport" => [16, 18, 10],
    "anglais" => [13, 19] 
];

//Function affiche, permetre afficher le tableau
function affiche($arr){
    $text = "Les notes de Paul sont: ";
    echo $text . "<br>";
    foreach ($arr as $key => $value) {
        foreach($value as $key2 => $valeur){ 
            if(($key2 == count($value)-1) && (count($value) > 0)){
                echo $valeur . " ";
            } elseif (($key2 == count($value)-2) && (count($value) > 1)) {
                echo $valeur . " et ";
            } else {
                echo $valeur . ", ";
            }
        }
        echo " en " . $key . "<br>";
    }
}
echo "<br>";
affiche($notes);

//Function la note moyenne
function moyenne($arr) {
    foreach ($arr as &$value) { 
        //& - un signe de changement des données d'entrée, c'est-à-dire que les données que nous avons entrées après avoir utilisé la fonction seront modifiées.
        $sum = array_sum($value);
        $count = count($value);
        $result = $sum / $count;
        if(!is_int($result)){
            $resultFormat = bcdiv($result, 1, 1);//les données seront affichées avec 1 chiffre après la virgule
            $value = $resultFormat;
        } else {
            $value = $result;
        }
    }
    return $arr;
}
echo "<pre>";
$notesMoyenne = moyenne($notes);
print_r($notesMoyenne);
echo "</pre>";


//Function la note moyenne total
function moyenneTotal($arr) {
    foreach ($arr as &$value) { 
        //& - un signe de changement des données d'entrée, c'est-à-dire que les données que nous avons entrées après avoir utilisé la fonction seront modifiées.
        $sum = array_sum($value);
        $count = count($value);
        $result = $sum / $count;
        if(!is_int($result)){
            $resultFormat = bcdiv($result, 1, 1);//les données seront affichées avec 1 chiffre après le point
            $value = $resultFormat;
        } else {
            $value = $result;
        }
    }
    $sum = 0;
    foreach($arr as $value) {
        $sum += $value;
    }

    return ["Moyenne total" => $sum / count($arr)];//nom de la clé entre guillemets => la valeur de la clé de calcul de la moyenne arithmétique
}

echo "<pre>";
$notesTotal = moyenneTotal($notes);
print_r($notesTotal);
echo "</pre>";


//JSON to HTML
$json = '{"a":"abeille", "b":"banane", "c":"chocolat", "d":"dauphin", "e":"ecole"}';
$array = json_decode($json, true);

echo "<pre>";
print_r($array);
echo "</pre>";

//Fonction qui vérifie si une valeur existe dans un array
function is_existe($arr, string $val){
    foreach ($arr as $value) {
        if($value == $val) {
            return true;
        } 
    }
    return false;
}

echo "<pre>";
var_dump(is_existe($array, "dauphin"));
var_dump(is_existe($array, "requin"));
echo "</pre>";

//Fonction qui affiche un array dans un tableau HTML
function afficheArr ($arr){
    echo "<table style='width: 500px;border:1px solid; border-collapse: collapse;'>";
    foreach($arr as $key => $value){
        echo "<tr style='border:1px solid;'>" . 
        "<td style='width: 100px; border:1px solid;'>" . $key . "</td>" .
        "<td style='width: 100px; border:1px solid;'>" . $value . "</td>" .
        "<td style='width: 100px; border:1px solid;'>" . strtoupper($value) . "</td>" .
        "<td style='width: 100px; border:1px solid;'>" . ucfirst($value) . "</td>" .
        "<td style='width: 100px; border:1px solid;'>" . strlen($value) ."</td>" .
        "</tr>";
    }
    echo "</table>";
}

afficheArr($array);

//Traitement d'URL
$url = "https://darkcity.fr/blog/2015/08/16/bac-a-sable-php";

//Fonction qui transforme une URL en un tableau associatif
function foo1(string $lien){
    $lienArr = explode("/", $lien);
    $lienArrNew = [];
    foreach($lienArr as $value) {
        if($value !== "https:" and $value !== "http:" and $value !== ""){
            //1) unset($lienArr[$key]); supprime la clé du tableau mais ne met pas à jour les clés, si la clé est supprimée par l'indice 1, alors la sortie sera [0], [2], ...
            $lienArrNew[] = $value; // remplir le tableau vide avec des données

        }
    }
    //1) $lienArr = array_values($lienArr); écrase les clés dans le tableau en commençant par 0
    return $lienArrNew;
}

echo "<pre>";
$array_1 = foo1($url);
print_r($array_1);
echo "</pre>";

//Fonction qui spécifie le type de données dans la clé du tableau (string/int).
function foo2($arr){
    $lienArrNew = [];
    foreach($arr as $value){
        if(is_numeric($value)) {
            $valeur = "int";
        } else {
            $valeur = "string";
        }
        $lienArrNew[$value] = $valeur;
    }
    return $lienArrNew;
}

echo "<pre>";
$array_2 = foo2($array_1);
print_r($array_2);
echo "</pre>";


//Fonction qui classe les valeurs d'un tableau (int/string)
function foo3($arr){
    $lienArrNew = [];
    $intArr = [];
    $stringArr = [];
    foreach($arr as $key => $value){
        if($value == "string") {
            //$stringArr[] = $key;
            array_push($stringArr, $key);
        } elseif ($value == "int") {
            //$intArr[] = $key;
            array_push($intArr, $key);
        }
    }
    $lienArrNew["int"] = $intArr;
    $lienArrNew["string"] = $stringArr; 
    return $lienArrNew;
}

echo "<pre>";
$array_3 = foo3($array_2);
print_r($array_3);
echo "</pre>";
echo "</br>";
?>
