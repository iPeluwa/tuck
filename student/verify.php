 <?php
 $user_id = $_GET['id'];
 include("../db_conection.php");
               if(isset($_POST['submit'])){
                $vouc = $_POST['vouc'];

                $query = "SELECT * FROM voucher WHERE voucher = '$vouc'";
                $result = mysqli_query($dbcon,$query);
                //while($re=mysqli_fetch_assoc($result))
                 
                
               
                

                if(mysqli_num_rows($result) == 0){
                  echo "<script>alert('Invalid Voucher, Kindly contact the Tuckshop Admin.')</script>";
                }else{

                  $found = mysqli_fetch_array($result);
                  $used = $found['status'];
                  $voucher = $found['voucher'];
                  $amount = $found['amount'];
                  

                  if($used == 1){
                     echo "<script>alert('Voucher has been used.')
                     </script>";
                  }else{
                     
                      mysqli_query($dbcon,"UPDATE voucher SET status = 1 WHERE voucher = '$voucher' AND amount = '$amount'");
                      mysqli_query($dbcon,"INSERT INTO deposit (user_id, voucher, amount, date) VALUE ('$user_id','$voucher','$amount',CURDATE())");

                      echo "<script>alert('Voucher redeemed successfully!.')
                      </script>";

                      //redirect_to('home.php?id=1');
                  }
                }
               }

               ?>