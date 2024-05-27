<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $month = isset($_POST['month']) ? $_POST['month'] : '';
    $units = isset($_POST['units']) ? intval($_POST['units']) : 0;
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';
    $houseNumber = isset($_POST['houseNumber']) ? $_POST['houseNumber'] : '';
    $consumerId = isset($_POST['consumerId']) ? $_POST['consumerId'] : '';

    
    $rate1 = 3.50;
    $rate2 = 4.00;
    $rate3 = 5.20;
    $rate4 = 6.50;

    
    if ($units <= 50) {
        $bill = $units * $rate1;
    } elseif ($units <= 100) {
        $bill = (50 * $rate1) + (($units - 50) * $rate2);
    } elseif ($units <= 200) {
        $bill = (50 * $rate1) + (50 * $rate2) + (($units - 100) * $rate3);
    } else {
        $bill = (50 * $rate1) + (50 * $rate2) + (100 * $rate3) + (($units - 200) * $rate4);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Electricity Bill</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .bill-container {
            background-color: #fff;
            width: 400px;
            padding: 20px;
            border: 2px solid #333;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            text-align: left;
        }

        h1 {
            color: black;
            text-align: center;
        }

        .bill-details {
            margin-bottom: 20px;
        }

        .bill-details p {
            margin: 5px 0;
        }

        #billResult {
            padding: 10px;
            border: 1px solid black;
            border-radius: 5px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="bill-container">
        <h1>Electricity Bill</h1>
        <div class="bill-details">
            <p><strong>Month:</strong> <?php echo $month; ?></p>
            <p><strong>Consumer Name:</strong> <?php echo $name; ?></p>
            <p><strong>Address:</strong> <?php echo $address; ?></p>
            <p><strong>House Number:</strong> <?php echo $houseNumber; ?></p>
            <p><strong>Consumer ID:</strong> <?php echo $consumerId; ?></p>
            <p><strong>Total Units Consumed:</strong> <?php echo $units; ?></p>
        </div>
        <div id="billResult">
            <p><strong>Total Electricity Bill:</strong> Rs. <?php echo $bill; ?></p>
        </div>
    </div>
</body>
</html>

<?php
}
?>
