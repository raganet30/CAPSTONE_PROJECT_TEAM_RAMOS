<!DOCTYPE html>
<html lang="en">


<?php 
//session_start();
include('includes/head.php');
include('authentication.php');
?>

<body>
    <div class="main-wrapper">

<?php include('includes/topnav.php') ?>
<?php include('includes/sidebar.php') ?>

        <div class="page-wrapper">
         <div class="content">
                <div class="row">
                    

                    <div class="col-lg-8 offset-lg-2">
                        
                        <?php include('alert.php') ?>
                    <br>

                        <h4 class="page-title">Send SMS</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">


                        <form action="send-sms-process.php" method="POST">
                             <div class="row">
                               
                               <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Recipient`s Name <span class="text-danger">*</span></label>

                                        <input class="form-control" type="text" name="search" id="search"placeholder="Search..."autocomplete="off" required >
                                        <div class="list-group" id="show-list">
                                        <!-- Here autocomplete list will be display -->
                                        </div>

                                        


                                    </div>

                                    <div class="form-group">
                                        <label>Message</label><span class="text-danger">*</span>
                                       

                                        <textarea id="tweet" rows="4" class="form-control" type="text" name="message"  maxlength="85" placeholder="Type text here" required></textarea>

                                            <div id="charactersRemaining">85</div>


                                    </div>

                                   <button  type="submit" name="btn_send" class="btn btn-primary btn-lg "><i class="fas fa-paper-plane fa-2x"></i></button>

                                </div>

                               

                                
                                

                            </div>

                            <!--use to get the user id-->
                                <input type="hidden" name="userid" value="<?php echo $GLOBALS['userid']; ?>">
                              <!--used to get the user id-->

                            

                        </form>
                    </div>
                </div>
            </div>
   




        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>

    <?php include('includes/script.php') ?>
    <?php include('includes/footer.php') ?>
</body>


<script type="text/javascript">
        var el;                                                    

function countCharacters(e) {                                    
  var textEntered, countRemaining, counter;          
  textEntered = document.getElementById('tweet').value;  
  counter = (85 - (textEntered.length));
  countRemaining = document.getElementById('charactersRemaining'); 
  countRemaining.textContent = counter;       
}
el = document.getElementById('tweet');                   
el.addEventListener('keyup', countCharacters, false);


</script>


</html>