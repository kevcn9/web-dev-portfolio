<?php
session_start();
include 'PHPMyAdminConnection.php';

if ($_POST['view'] == 'PlumberDB') 
{
    $sql = "SELECT * FROM plumbers";
    $result = mysqli_query($con, $sql);

    if ($result)  
    {
        echo "<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN' 'http://www.w3.org/TR/html4/loose.dtd'>
        <html>
	    <head>
            <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
            <link rel='stylesheet' href='Project3DBCSS.css'>
            <title>Project3DB</title>
        </head>
        <body background='https://images.pexels.com/photos/16440312/pexels-photo-16440312/free-photo-of-cat-touching-tap-water-running-from-sink.jpeg'>
            <div>
                <h1>Perfect Plumber Pros</h1>
                <table border='1'>
                <tr>
                <th>Plumber ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Password</th>
                <th>Phone</th>
                <th>Email</th>
                </tr>";
        while ($row = mysqli_fetch_array($result)) 
        {
            echo "<tr>
                    <td>" . $row["plumberID"] . "</td>
                    <td>" . $row["firstName"] . "</td>
                    <td>" . $row["lastName"] . "</td>  
                    <td>" . $row["password"] . "</td>  
                    <td>" . $row["phoneNumber"] . "</td>
                    <td>" . $row["email"] . "</td>
                    </tr>";
        }

        echo "</table>";
        echo "<button onclick='window.location.href=\"Project3DB.html\"'>Home</button>";
        echo "</div>";
        echo "</body>";
        echo "</html>";
    } 
}

if($_POST['view'] == 'customerDB')
{
    $sql = "SELECT customers.firstName, customers.lastName, 
                customerPersonalInfo.customerID, customerPersonalInfo.streetAddress, customerPersonalInfo.state, customerPersonalInfo.zipCode, customerPersonalInfo.phoneNumber, 
                serviceRecords.dateOfService, serviceRecords.typeOfService, 
                supplies.suppliesNeeded, supplies.receivedDate,
                serviceRecords.cost
                from customers
                INNER JOIN customerPersonalInfo on customers.customerID = customerPersonalInfo.customerID
                INNER JOIN serviceRecords on customerPersonalInfo.customerID = serviceRecords.customerID
                INNER JOIN supplies on serviceRecords.customerID = supplies.customerID"; 
    $result = mysqli_query($con, $sql);
    if ($result)  
    {
        echo "<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN' 'http://www.w3.org/TR/html4/loose.dtd'>
        <html>
	    <head>
            <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
            <link rel='stylesheet' href='Project3DBCSS.css'>
            <title>Project3DB</title>
        </head>
        <body background='https://images.pexels.com/photos/16440312/pexels-photo-16440312/free-photo-of-cat-touching-tap-water-running-from-sink.jpeg'>
            <div>
                <h1>Perfect Plumber Pros</h1>
                <table border='1'>
                <tr>
                <th>Customer First Name</th>
                <th>Customer Last Name</th>
                <th>Customer ID</th>
                <th>Customer Address</th>
                <th>Customer state</th>
                <th>Customer Zip Code</th>
                <th>Customer Phone Number</th>
                <th>Date of Service</th>
                <th>Service Type</th>
                <th>Supplies Needed</th>
                <th>Supplies Received</th>
                <th>Cost</th>
                </tr>";
        while ($row = mysqli_fetch_array($result)) 
        {
            echo "<tr>
            <td>" . $row["firstName"] . "</td>
            <td>" . $row["lastName"] . "</td>
            <td>" . $row["customerID"] . "</td>  
            <td>" . $row["streetAddress"] . "</td> 
            <td>" . $row["state"] . "</td> 
            <td>" . $row["zipCode"] . "</td>
            <td>" . $row["phoneNumber"] . "</td>
            <td>" . $row["dateOfService"] . "</td>
            <td>" . $row["typeOfService"] . "</td>
            <td>" . $row["suppliesNeeded"] . "</td>
            <td>" . $row["receivedDate"] . "</td>
            <td>" . $row["cost"] . "</td>
            </tr>";
        }
        echo "</table>";
        echo "<button onclick='window.location.href=\"Project3DB.html\"'>Home</button>";
        echo "</div>";
        echo "</body>";
        echo "</html>";
    }
}
close($con);
?>


