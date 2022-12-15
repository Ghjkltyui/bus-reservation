<?php
$conn = mysqli_connect('localhost','root','','book_db');

 if(isset($_POST['name'])){
    
     $name = $_POST['name'];
    $suggestion = $_POST['suggestion'];
    $sql = "INSERT INTO `reviews` (`name`, `review`) VALUES ('$name', '$suggestion')";
   $result = mysqli_query($conn,$sql);
   if($result){
    //  echo "The record has been deleted successfully! <br>";
   }else{
     echo "The record was not been updated! " . mysqli_error($conn);
   }
 }

 if(isset($_GET['deleteMsg'])){
    $sno = $_GET['deleteMsg'];

    $sql = "DELETE FROM `reviews` WHERE `reviews`.`r_id` = '$sno'";
    $result = mysqli_query($conn,$sql);
    if($result){
        header("Location: /busreservation-main/review.php");
    }else{
        echo "The record was not been updated! " . mysqli_error($conn);
    }
  }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="dashboard.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.css" rel="stylesheet" />  
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<style>
*{box-sizing:border-box;}
body{font-family: 'Open Sans', sans-serif; color:#333; font-size:14px; background-color:#dadada; padding:100px;}
.form_box{width:1200px; padding:10px; background-color:white;}
input{padding:5px;  margin-bottom:5px;}
input[type="submit"]{border:none; outlin:none; background-color:#679f1b; color:white;}
.heading{background-color:#ac1219; color:white; height:40px; width:100%; line-height:40px; text-align:center;}
.shadow{
  -webkit-box-shadow: 0px 0px 17px 1px rgba(0,0,0,0.43);
-moz-box-shadow: 0px 0px 17px 1px rgba(0,0,0,0.43);
box-shadow: 0px 0px 17px 1px rgba(0,0,0,0.43);}
.pic{text-align:left; width:33%; float:left;}
</style>
</head>

<body id="body-pd">
    <section>
        <header class="header" id="header">
            <div class="header_toggle">
                <i class="bx bx-menu" id="header-toggle"></i>
            </div>
           
        </header>
        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                
                <a href="home.php" class="nav_link">
                    <i class="bx bx-log-out nav_icon"></i>
                    <span class="nav_name">SignOut</span>
                </a>
            </nav>
        </div>
    </section>
    <section>
       

 <div class="form_box shadow">
 
 <p>Do you have any suggestion for us? </p>
 <form action="review.php" method="post">
    <label>enter the name</label><br>
    <input type="text" placeholder="enter your name" name="name"><br>
    <label>enter your suggestion</label><br>
    <textarea name="suggestion" rows="8" cols="150" ></textarea>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
 </div>

            <section id="messages">
                <div class="card mb-10 my-5 mx-5">
                    <div class="row">
                        <!-- Grid column -->
                        <div class="col-md-12">
                            <h2 class="pt-3 pb-4 text-center font-bold font-up deep-purple-text">
                               <strong>REVIEWS</strong> 
                            </h2>
                        </div>
                        <!-- Grid column -->
                    </div>
                    <div class="container m-3 mx-0">

                        <?php
                            $sql = "SELECT * FROM `reviews`";
                            $result = mysqli_query($conn,$sql);
                            $Sno = false;
                            $count = 1;
                            while($row = mysqli_fetch_assoc($result)){
                            echo "<div class='card'>
                            <div class='card-body mb-2' style='background-color: #eaeef3;'>
                              <h5 class='card-title text-primary'>Review:</h5>
                              <p class='card-text'>".$row['review']."</p>
                              <p class='card-text'><small class='text-muted'> - ".$row['name']."</small></p>
                              <button id='d".$row['r_id']."' type='button' rel='tooltip' class=' deleteMsg btn btn-danger btn-round btn-just-icon btn-sm'>
                                            <i class='material-icons' id='z".$row['r_id']."' >mark as read</i>
                                            </button></div>
                            </div>
                        </div>";
                            }
                        ?>
                            <!-- <div class="card">
                                <div class="card-body mb-2" style="background-color: #eaeef3;">
                                  <h5 class="card-title text-primary">Review:</h5>
                                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                  <p class="card-text"><small class="text-muted"> - xyz</small></p>
                                  
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!--Container Main end-->
    </section>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.js"></script>
    <script src="dashboard.js"></script>
    <script>
        deletesMsg = document.getElementsByClassName("deleteMsg");
        Array.from(deletesMsg).forEach((element)=>{
                element.addEventListener("click",(e)=>{
                sno = e.target.id.substr(1);
                //   console.log("hello"+sno);
                if(confirm('want to delete?')){
                    window.location = `/busreservation-main/review.php?deleteMsg=${sno}`;
                }
            })
        })
    </script>
</body>

</html>