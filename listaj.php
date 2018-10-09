<?php
require_once "config.php";

$db = new QueryBuilder(Connection::make());
$result = $db->fetchAll('insurance_carrier');

?>

<table border=1>
 <tr>
   <th>Ime i prezime</th>
   <th>E-mail</th>
   <th>Broj telefona</th>
   <th>Vrsta polise</th>
   <th>Od</th>
   <th>Do</th>
 </tr>
 <tr>
   <td colspan="6">&nbsp;</td>
 </tr>


      <?php foreach ($result as $carrier_object) : ?>
         <tr>
           <td> <?=$carrier_object->full_name?> </td>
           <td> <?=$carrier_object->email?> </td>
           <td> <?=$carrier_object->phone?> </td>
           <td> <?=$carrier_object->type?> </td>
           <td> <?=$carrier_object->date_from?> </td>
           <td> <?=$carrier_object->date_to?> </td>
         </tr>

           <?php
             if($carrier_object->type == 'group') :

               $group_result = $db->selectJOIN(
                 [
                   'insured' => ['full_name', 'email', 'birth_date']
                 ],
                 ['insured' => 'insurance_carrier'],
                 ['insured.fk_ic' => 'insurance_carrier.id'],
                 ['fk_ic' => $carrier_object->id]
               );
           ?>
             <tr>
               <td colspan="6" align="center" style="font-weight: bold; font-style: italic;">Ljudi koji su osigurani na Vase ime:</td>
             </tr>

             <tr>
               <th colspan="2">Ime i prezime</th>
               <th colspan="2">E-mail</th>
               <th colspan="2">Datum rodjenja</th>
             </tr>

             <?php foreach ($group_result as $insured_object) : ?>

               <tr>
                 <td colspan="2"> <?=$insured_object->full_name?> </td>
                 <td colspan="2"> <?=$insured_object->email?> </td>
                 <td colspan="2"> <?=$insured_object->birth_date?> </td>
               </tr>

             <?php endforeach; ?>
           <?php endif; ?>
           <tr>
             <td colspan="6">&nbsp;</td>
           </tr>
       <?php endforeach; ?>
</table>

<ul>

</ul>
