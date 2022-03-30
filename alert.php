

<center>
                                <?php      
                        if(isset($_SESSION['status']))
                        {
                            //echo "<h4>".$_SESSION["status"]."</h4>";
                            

                           /* echo "<div class='alert alert-success'>
  <strong>".$_SESSION["status"]."</strong>
</div>"; */                 if ($_SESSION['status']=="Data saved successfully!") 
                            {
   

                           ?>
                               <div class="alert alert-success alert-dismissible">
                              <button type="button" class="close" data-dismiss="alert">&times;</button>
                              <strong><?php echo $_SESSION["status"]; ?></strong> 
                                </div>

                           <?php 
                            unset($_SESSION['status']);
                            }


                            elseif ($_SESSION['status']=="SMS Text Sent sucessfully!") 
                            {
   

                           ?>
                               <div class="alert alert-success alert-dismissible">
                              <button type="button" class="close" data-dismiss="alert">&times;</button>
                              <strong><?php echo $_SESSION["status"]; ?></strong> 
                                </div>

                           <?php 
                            unset($_SESSION['status']);
                            }













                            elseif($_SESSION['status'] == "Data saving failed!")
                            {
                            ?>
                               <div class="alert alert-danger alert-dismissible">
                              <button type="button" class="close" data-dismiss="alert">&times;</button>
                              <strong><?php echo $_SESSION["status"]; ?></strong> 
                                </div>

                           <?php 
                            unset($_SESSION['status']);

                            }


                            else 
                            {
   

                           ?>
                               <div class="alert alert-danger alert-dismissible">
                              <button type="button" class="close" data-dismiss="alert">&times;</button>
                              <strong><?php echo $_SESSION["status"]; ?></strong> 
                                </div>

                           <?php 
                            unset($_SESSION['status']);
                            }



                        }
                         ?>
                        </center>
