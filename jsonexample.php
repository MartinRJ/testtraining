<?php
define(maxlength, 1024);
define(space, " ");
define(regexp, '/searchstring"\s*:\s*"(.*?)"\s*}/s');
define(responsestart, '{"');
define(responseend, '"}');
$firstname = array('Noah','Daniel','Miguel','Noah','William','Martin','Alexander','David','James','Samuel','Diego','Sofía','María','Lucía','Marti','Catali','Ele','Emilia','Valenti','Paula','Zoe','Alysha','Isabella','Alice','Valenti','Hele','Laura','Sophia','Maria Eduarda','Lore','Júlia','Heloísa','Lívia','Olivia','Emma','Charlotte','Sophia','Aria','Ava','Chloe','Zoey','Abigail','Amilia','Emma','Léa','Alice','Olivia','Florence','Charlotte','Charlie','Rosalie','Béatrice','Zoé','Sofía','Emilia','Isidora','Florencia','Maite','Josefa','Amanda','Antonella','Agusti','Marti','Maria','Valenti','Isabella','Sofía','Valeria','María José','Gabriela','Sara','Salomé','Daniela','Widelene','Mirlande/Myrlande','Islande','Lovelie/Lovely','Judeline','Angeline','Esther','Chedeline','Jessica','Rose-Merline','Gabrielle','Amelia','Tian','Brian','Jada','Xime','Valenti','María Fernda','Sofía','María José','Marti','Emilia','Zoe','Mia','Dulce María','María','Elizabeth','Beatriz','Ramo','Liz','Concepción','Caroli','Mabel','Raquel','Noemí','María','Valenti','Camila','Fernda','Milagros','Luz','Abigail','Aria','Lucia','Alexandra','Valenti','Victoria','Mia','Amanda','Camila','Amaia','Emma','Kamila','Sofia','Isabella','Emma','Olivia','Ava','Isabella','Sophia','Taylor','Charlotte','Amelia','Evelyn','Abigail','Mary','Patricia','Linda','Barbara','Elizabeth','Jennifer','Maria','Susan','Margaret','Dorothy','Florencia','Lucía','Agusti','Valenti','Camila','Julia','Sofía','Abril','A Paula','Micaela','Camila','Isabella','Sofía','Victoria','Valenti','Valeria','Nicole','Samantha','Maria','Antonella','Angeline','Jacob','Pedro','Tomas');
$lastnames = array('Adams','Baker','Clark','Davis','Evans','Frank','Ghosh','Hills','Irwin','Jones','Klein','Lopez','Mason','Nalty','Ochoa','Patel','Quinn','Reily','Smith','Trott','Usman','Valdo','White','Xiang','Yakub','Zafar','Sneezy','Sleepy','Dopey','Doc','Happy','Bashful','Grumpy','Mufasa','Sarabi','Simba','Nala','Kiara','Kovu','Timon','Pumbaa','Rafiki','Shenzi','Adams','Baker','Clark','Davis','Evans','Frank','Ghosh','Hills','Irwin','Jones','Klein','Lopez','Mason','Nalty','Ochoa','Patel','Quinn','Reily','Smith','Trott','Usman','Valdo','White','Xiang','Yakub','Zafar','Sneezy','Sleepy','Dopey','Doc','Happy','Bashful','Grumpy','Mufasa','Sarabi','Simba','Nala','Kiara','Kovu','Timon','Pumbaa','Rafiki','Shenzi','Adams','Baker','Clark','Davis','Evans','Frank','Ghosh','Hills','Irwin','Jones','Klein','Lopez','Mason','Nalty','Ochoa','Patel','Quinn','Reily','Smith','Trott','Usman','Valdo','White','Xiang','Yakub','Zafar','Sneezy','Sleepy','Dopey','Doc','Happy','Bashful','Grumpy','Mufasa','Sarabi','Simba','Nala','Kiara','Kovu','Timon','Pumbaa','Rafiki','Shenzi','Adams','Baker','Clark','Davis','Evans','Frank','Ghosh','Hills','Irwin','Jones','Klein','Lopez','Mason','Nalty','Ochoa','Patel','Quinn','Reily','Smith','Trott','Usman','Valdo','White','Xiang','Yakub','Zafar','Sneezy','Sleepy','Dopey','Doc','Happy','Bashful','Grumpy','Mufasa','Sarabi','Simba','Nala','Kiara','Kovu','Timon','Pumbaa','Rafiki','Shenzi');
define(responseerror, "not found");
$entityBody = file_get_contents('php://input');
$entityBody = substr($entityBody, 0, maxlength);

$match = "";
preg_match(regexp, $entityBody, $match);
if (sizeof($match) < 2)
{
  echo responsestart . responseerror . responseend;
}
else if (empty($match[1]))
{
  echo responsestart . responseerror . responseend;
}
else
{
  $result =array_keys($firstname,$match[1]);
  if (count($result) > 0)
  {
    echo responsestart . $match[1] . space . $lastnames[$result[0]] . responseend;
  }
  else
  {
    echo responsestart . responseerror . responseend;
  }
}
?>