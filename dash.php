
<?php
     $conn = mysqli_connect('localhost','root','','book_db');
     if(isset($_GET['deleteUser'])){
        $sno = $_GET['deleteUser'];
    
        $sql = "DELETE FROM `pass_details` WHERE `pass_details`.`p_id` ='$sno'";
        $result = mysqli_query($conn,$sql);
        if($result){
          // echo "The record has been deleted successfully! <br>";
          $deleteUser = true;
          header("Location: /busreservation-main/dash.php");
        }else{
          echo "The record was not been updated! " . mysqli_error($conn);
        }
      }

      if(isset($_POST['snoEdit'])){
    // echo "hello";
        $sno = $_POST['snoEdit'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $location = $_POST['location'];
        $guest = $_POST['guest'];

        $sql = "UPDATE `pass_details` SET `name` = '$name', `email` = '$email', `phone` = '$phone', `address` = '$address', `location` = '$location', `guests` = '$guest' WHERE `pass_details`.`p_id` = '$sno'";
        $result = mysqli_query($conn,$sql);
        if($result){
        // echo "hello";
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
                    <span class="nav_name">Home</span>
                </a>
                <a href="review.php" class="nav_link">
                    <i class="bx bx-message-square-detail nav_icon"></i>
                    <span class="nav_name">Reviews</span>
                </a>
            </nav>
        </div>
    </section>


    <!-- blog edit start -->
    <div class="modal top fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel"
                    aria-hidden="true" data-mdb-backdrop="true" data-mdb-keyboard="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4>edit</h4>
                                <button type="button" class="btn-close" data-mdb-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="dash.php" method="post">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="hidden" name="snoEdit" id="snoEdit">
                                        <input type="text" name="name" class="form-control" id="blogTitleEdit"
                                            placeholder="enter the name" />
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" id="blogTitleEdit"
                                            placeholder="enter the email" />
                                    </div>
                                    <div class="form-group">
                                        <label>Phone no</label>
                                        <input type="number" name="phone" class="form-control" id="blogTitleEdit"
                                            placeholder="enter the number" />
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" name="address" class="form-control" id="blogTitleEdit"
                                            placeholder="enter the address" />
                                    </div>
                                    <div class="form-group">
                                        <label>Location</label>
                                        <input type="text" name="location" class="form-control" id="blogTitleEdit"
                                            placeholder="enter the location" />
                                    </div>
                                    <div class="form-group">
                                        <label>Guests</label>
                                        <input type="number" name="guest" class="form-control" id="blogTitleEdit"
                                            placeholder="enter the guests" />
                                    </div>
                                    <div class="modal-footer">
                                        <button type="reset" class="btn btn-secondary" data-mdb-dismiss="modal">
                                            Close
                                        </button>
                                        <button type="submit" class="btn btn-primary">
                                            Edit
                                        </button>
                                    </div>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!-- blog edit end -->
    <section>
        <!--Container Main start-->
        <div class="pt-2 height-200 bg-light">
           

            <section id="blogsDetails" class="card mb-5 mx-5">
                <div class="row">
                    <!-- Grid column -->
                    <div class="col-md-12">
                        <h2 class="pt-3 pb-4 text-center font-bold font-up deep-purple-text">
                           <strong>PASSENGER DETAILS</strong> 
                        </h2>
                    </div>
                    <!-- Grid column -->
                </div>

            <section id="userDetail">
                <div class="card mb-10 my-5 mx-5">
                    <div class="card-body">
                        <!-- Grid row -->
                        <div class="row">
                            <!-- Grid column -->
                            <div class="col-md-12">
                                <h2 class="pt-3 pb-4 text-center font-bold font-up deep-purple-text">
                                   <strong>PASSENGER DETAILS</strong> 
                                </h2>
                            </div>
                            <!-- Grid column -->
                        </div>
                        <!-- Grid row -->
                        <!--Table-->
                        <table class="table table-striped text-center">
                            <!--Table head-->
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone No</th>
                                    <th>Address</th>
                                    <th>Location</th>
                                    <th>Guests</th>
                                    <th>Arrival</th>
                                    <th>Leaving</th>
                                    <!-- <th>action</th> -->
                                </tr>
                            </thead>
                            <!--Table head-->
                            <!--Table body-->
                            <tbody>
                            <?php 
                            $sql = "SELECT * FROM `pass_details`";
                            $result = mysqli_query($conn,$sql);
                                $Sno = false;
                                $count = 1;
                                while($row = mysqli_fetch_assoc($result)){
                                    echo "<tr>";
                                    // echo "<th>".$count."</th>";
                                    echo "<td>".$row['name']."</td>";
                                    echo "<td>".$row['email']."</td>";
                                    echo "<td>".$row['phone']."</td>";
                                    echo "<td>".$row['address']."</td>";
                                    echo "<td>".$row['location']."</td>";
                                    echo "<td>".$row['guests']."</td>";
                                    echo "<td>".$row['arrival']."</td>";
                                    echo "<td>".$row['leaving']."</td>";
                                    echo "<td>
                                    <button id='u".$row['p_id']."' type='button' rel='tooltip' class='editBlog btn btn-success btn-round btn-just-icon btn-sm' data-mdb-toggle='modal' data-mdb-target='#editModal'>edit</button>
                                    <button id='p".$row['p_id']."' type='button' rel='tooltip' class='deleteUser btn btn-danger btn-round btn-just-icon btn-sm'>delete</button>
                                    </td>";
                                    echo "</tr>";
                                    $Sno = true;  
                                    $count = $count+1;      
                                }
                                if(!$Sno){
                                    echo "<p class='card-text text-center'> no users yet</p>";
                                }
                        ?>
                                
                                
                               
                            </tbody>
                            <!--Table body-->
                        </table>
                        <!--Table-->
                    </div>
                </div>
            </section>

            
        </div>
        <!--Container Main end-->
    </section>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.js"></script>
    <script src="dashboard.js"></script>
    <script>
        deletesUser = document.getElementsByClassName("deleteUser");
        Array.from(deletesUser).forEach((element)=>{
                element.addEventListener("click",(e)=>{
                sno = e.target.id.substr(1);
                //   console.log("hello "+sno);
                if(confirm('want to delete?')){
                    window.location = `/busreservation-main/dash.php?deleteUser=${sno}`;
                }
            })
        })
        edits = document.getElementsByClassName("editBlog");
        Array.from(edits).forEach((element)=>{
            element.addEventListener("click",(e)=>{
            snoEdit.value = e.target.id.substr(1);
            })
        })
    </script>
</body>

</html>