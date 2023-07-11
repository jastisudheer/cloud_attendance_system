<?php
        $servername = "localhost";
        $username = "chandu";
        $password = "chandu@1234567890";
        $dbname = "eattendo";

        $conn = new mysqli($servername,$username, $password, $dbname);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Fetch attendance records
        $regno =  $_REQUEST['regno'];
        $sql = "SELECT  Course, Regno, date, status FROM attendance WHERE Regno='$regno'";
        $result = mysqli_query($conn, $sql);

        // Display attendance records in HTML table
        echo "<table>";
        echo "<tr><th> Course </th><th> Regno </th><th> Date </th><th> Status </th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo " <tr> ";
            echo " <td> " . $row['Course'] . " </td> ";
            echo " <td> " . $row['Regno'] . " </td> ";
            echo " <td> " . $row['date'] . " </td> ";
            echo " <td> " . $row['status'] . " </td> ";
            echo " </tr> ";
        }
        echo "</table>";

        // Close database connection
        mysqli_close($conn);
    ?>
    <!DOCTYPE html>
    <html>
    <body>
    <form action="attendance3.html">
        <button type="submit" class="btn-u pull-right">BACK</button>
    </form>
    </body>
    </html>