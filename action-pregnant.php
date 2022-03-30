<?php
  require_once 'test-config.php';


  if (isset($_POST['query'])) {
    $inpText = $_POST['query'];
    $sql = "select * from maternity inner join client ON maternity.client_id = client.client_id where concat(client_fname,client_mi,client_lname)  LIKE :name and client_status='Active' ";

    $stmt = $conn->prepare($sql);
    $stmt->execute(['name' => '%' . $inpText . '%']);
    $result = $stmt->fetchAll();

    if ($result) {
      foreach ($result as $row) {
        echo '<a href="#" class="list-group-item list-group-item-action border-1">' . $row['client_fname']." ".$row['client_mi']." ".$row['client_lname'].'</a>';
      }
    } else {
      echo '<p class="list-group-item border-1">No Record</p>';
    }
  }
?>




