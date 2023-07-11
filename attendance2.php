
<!DOCTYPE html>
<html>
    <body>
    
        <?php
        $servername = "localhost";
        $username = "chandu";
        $password = "chandu@1234567890";
        $dbname = "eattendo";
        $conn = new mysqli($servername,$username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: "
                . $conn->connect_error);
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {
            // Validate the secret code
            $secret_code = $_POST["secret_code"];
            session_start();
            if (isset($_SESSION['secret_code'])) 
            {
                $current_time = time();
                $expiry_time = $_SESSION['expiry_time'];
                if ($current_time > $expiry_time) 
                {
                    unset($_SESSION['secret_code']);
                    unset($_SESSION['expiry_time']);
                    die("Secret code has expired. Please try again.");
                } 
                else 
                {
                    if ($secret_code != $_SESSION['secret_code']) 
                    {
                        die("Invalid secret code. Please try again.");
                    }
                }
            }
            
        }
        $Course =  $_REQUEST['course'];
        $Regno =  $_REQUEST['regno'];
		$Date = $_REQUEST['date'];
        $sql = "INSERT INTO attendance VALUES('$Course', '$Regno', '$Date', 'Present')";
        if ($conn->query($sql) === TRUE) 
        { 
           echo "<h1>Attendance Marked Successfully</h1>";
        }
        else 
        {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        // Close database connection
        mysqli_close($conn);
        ?>
       <form action="student.html">
           <div class="row">
               <div class="col-md-6">
                   <Button  class="btn-u pull-right">BACK</Button>
                </div>
            </div>
        </form>
    </body>
</html>
