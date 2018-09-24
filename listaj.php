<?php
require_once "config.php";

$db = new QueryBuilder(Connection::make());
$result = $db->fetchAll('insurance_carrier');

?>

<table border=1>
 <tr>
   <th>Ime i prezime</th>
   <th>email</th>
   <th>Broj telefona</th>
   <th>Vrsta polise</th>
   <th>Od</th>
   <th>Do</th>
 </tr>

   <?php
       foreach ($result as $key => $value) {
         echo "<tr>";
         foreach ($value as $propery => $valuee) {
           if ($propery == 'id'){
             continue;
           }
           echo "<td>" . $valuee . "</td>";
         }
         echo "</tr>";
       }
    ?>
</table>

<ul>

</ul>
