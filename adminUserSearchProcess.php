<?php

include "connection.php";

$username = $_POST["u"];

// echo($username);

if (empty($username)) {
    echo("please enter useranme");
} else if(strlen($username) > 20) {
    echo("more than 20 character");
}else if(!empty($username)){
    // echo("success");

    $rs = Database::search("SELECT *FROM `user` WHERE `fname`  LIKE '%" . $username . "%' OR `lname`  LIKE '%" . $username . "%' AND `user_type_id` = '2'");
    $num = $rs->num_rows;

    for ($i=0; $i < $num; $i++) { 
        
       $d = $rs->fetch_assoc();

       if ($d["fname"] == 0) {

        echo("Can Not Found User");

       } else {
        
        ?>
       
        <tr>
     <th scope="row"> <?php echo $d["id"];?> </th>
     <td><?php echo $d["fname"];?></td>
     <td><?php echo $d["lname"];?></td>
     <td><?php echo $d["email"];?></td>
     <td><?php echo $d["mobile"];?></td>
     <td><?php 
 
         if ($d["status"] == 1) {
             echo("Active");
         } else {
             echo("Deactive");
         }
         
     ?></td>
     <td>
 
 
 <div class="form-check form-switch">
   <input class="form-check-input" type="checkbox" role="switch" id="toggle" onchange="changeUserStatus(<?php echo $d['id']; ?>);" <?php if ($d["status"] == 1) { ?> checked <?php } ?>>
   <label class="form-check-label" for="flexSwitchCheckDefault"></label>
 </div>
 </td>
 </tr>
 
 
 
        <?php



       }
       

       
    }


}




?>