<?php
  require_once 'test-config.php';

  if (isset($_POST['query'])) {
    $inpText = $_POST['query'];
    $sql = "select * from healthworker where concat(hw_fname,hw_mi,hw_lname) LIKE :name and hw_status='Active' ";

    $stmt = $conn->prepare($sql);
    $stmt->execute(['name' => '%' . $inpText . '%']);
    $result = $stmt->fetchAll();

    if ($result) {
      foreach ($result as $row) {
        echo '<a href="#" class="list-group-item list-group-item-action border-1">' . $row['hw_fname'] ." ". $row['hw_mi']." ".$row['hw_lname'] .'</a>';
      }
    } else {
      echo '<p class="list-group-item border-1">No Record</p>';
    }
  }
?>
