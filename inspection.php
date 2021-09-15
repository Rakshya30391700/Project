
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Inspection</title>
</head>
<body>
    <?php
        session_start();
        include("include/connection.php");
        $msg='';
        if(isset($_POST['upload'])){
            $property_id=$_GET['property_id'];
            $buyer_id=$_SESSION['user_id'];
            $owner_id=$_GET['owner_id'];
            $inspection_date=$_POST['inspection_date'];
            $start_time=$_POST['start_time'];
            $end_time=$_POST['end_time'];
            $query= "INSERT INTO `inspection` ( `inspection_date`, `start_time`, `end_time`, `owner_aggreed`, `buyer_user_id`, `seller_user_id`, `property_id`) VALUES ( '$inspection_date', '$start_time', '$end_time', 'false', '$buyer_id', '$owner_id', '$property_id');";
            mysqli_query($con,$query);
            echo '<script>alert("Added Schedule Sucessfully")</script>';
            
        }else{
            echo '';
        }
        if($_SESSION['user_type']=="land owner"){

            include "include/property_manager_navbar.php"; 
        
        }elseif($_SESSION['user_type']=="customer"){
            
            include "include/customer_navbar.php"; 
        
        }elseif($_SESSION['user_type']=="admin"){
            
            include "include/admin_navbar.php"; 
        
        }
    ?>
    <section class=" section-t4">
        <div class="container">
            <div class="title-box-d">
                <h3 class="title-d">Fill Form for Inspection</h3>
            </div>  
            <form class="form-a" method="post">
                <div class="row">
                    <div class="col-md-12 mb-2">
                    <div class="form-group">
                        <label class="pb-2" for="Type">Date</label>
                        <input type="date" name="inspection_date" class="form-control form-control-md form-control-a" placeholder="Keyword" required>
                    </div>
                    </div>
                    <div class="col-md-6 mb-2">
                    <div class="form-group">
                        <label class="pb-2" for="Type">Start time</Address></label>
                        <input type="time"  name="start_time" class="form-control form-control-md form-control-a" required>
                    </div>
                    </div>
                    <div class="col-md-6 mb-2">
                    <div class="form-group">
                        <label class="pb-2" for="Type">End Time</label>
                        <input type="time" name="end_time" class="form-control form-control-md form-control-a" required>
                    </div>
                    </div>
                    
                    
                    <div class="col-md-12">
                        <input type="submit" name="upload" class="btn btn-b" value="Schedule Inspection">
                    </div>
                </div>
            </form>
        </div> 
        
    </section>
</body>
</html>