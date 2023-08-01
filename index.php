<!DOCTYPE html>
<html>
<body>

<?php
echo "My first PHP script!";
$turma2 = "Vamos desenvolver website em PHP";
// o comando echo imprime na tela
echo "<br>".$turma2;
$x = 5 /* + 15 */ + 5;
echo "<br>".$x;

$txt = "Hello world!";
$x = 5;
$y = 10.5;
echo "<br>".$txt." x = ".$x." y = ".$y."<br>";

$txt2 = "W3Schools.com";
// vai dar erro o código abaixo:
//echo "I love $txt!";
// consertando o código acima
echo "<br>"."I love".$txt2."!";
$x = 5;
$y = 4;
echo "<br> O valor da soma é igual a ".$x + $y."<br>";
var_dump($x + $y);
echo "<br>";
$cars = array("Volvo","BMW","Toyota");
var_dump($cars);
for($i=0;$i<3;$i++){
    echo "<br>".$cars[$i];
}



?>

</body>
</html> 