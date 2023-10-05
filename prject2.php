<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</head>

<body background="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRKdIdlL-69-qA-wewLeA2sMbrE_WmGBVgYGg&usqp=CAU"; style="background-color: brown;">
<div style="width: 30%; max-width: 700px; max-height: 500px; margin: 0 auto; border: 2px solid #555; padding: 15px; background-color:grey; margin-top:5%; border-radius:1em;">
    <h3 style="text-align: center;color: #333">CURRENCY CONVERTER</h3>

    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <div style="font-size:1.1em;">
            <label class="form-label" for="from">
                From:

            </label><br>
            <select class="form-select" id="from" name="from" required>
                <option disabled>-Select currency-</option>
                <option value="USD">USD </option>
                <option value="EUR">EUR </option>
                <option value="INR">INR </option>
                <option value="ALL">ALL</option>
                <option value="BOB">BOB</option>
                <option value="BRL">BRL</option>
            </select>

        </div><br>

        <div style="font-size:1.1em;">
            <label class="form-label" for="to">

                To:

            </label><br>

            <select class="form-select" id="to" name="to" required>
                <option disabled>-Select currency-</option>
                <option value="EUR">EUR</option>
                <option value="INR">INR</option>
                <option value="USD">USD</option>
                <option value="ALL">ALL</option>
                <option value="BOB">BOB</option>
                <option value="BRL">BRL</option>
            </select>

        </div><br>
        <div style="font-size:1.1em;">
        <label for="amount" class="form-label" >Amount:</label>
        <input class="form-control" type="text" id="amount" name="amount" placeholder="Enter amount" style="border: 2px solid #777" required>
        <div><br>
        <input type="submit" value="Convert Currency" class="btn btn-primary w-100">

    </form>

</div>


<?php

$con = mysqli_connect('localhost', 'root', 'Certificate007#', 'one');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Retrieve user input from the form
    $amount = $_POST['amount'];
    $fromCurrency = $_POST['from'];
    $toCurrency = $_POST['to'];

    // Create a cURL request to fetch the conversion data
    $ch = curl_init();
    $url = "https://v6.exchangerate-api.com/v6/d5ecfe443c36ff29603803aa/pair/$fromCurrency/$toCurrency/$amount";
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    $result = curl_exec($ch);
    curl_close($ch);

    // Decode the JSON response
    $jsonObj = json_decode($result);

    // Check if the conversion result is available
    if (isset($jsonObj->conversion_result)) {
        $conversionResult = $jsonObj->conversion_result;
        echo "<h2>Conversion Result:</h2>";
        echo "<p>$amount $fromCurrency is equal to $conversionResult $toCurrency</p>";

        // Insert the conversion result into the database
        $insert_query = "INSERT INTO conversion_history (from_currency, to_currency, amount, result) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($con, $insert_query);


        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ssds", $fromCurrency, $toCurrency, $amount, $conversionResult);
            if (mysqli_stmt_execute($stmt)) {

                // The conversion result has been saved to the database
                mysqli_stmt_close($stmt);

            } else {
                // Handle database insertion error
                echo "<h2 style='color: red;'>Error:</h2>";
                echo "<p style='color: red;'>Failed to save conversion result to the database.</p>";

            }

        } else {
            // Handle database query preparation error
            echo "<h2 style='color: red;'>Error:</h2>";
            echo "<p style='color: red;'>Database query preparation failed.</p>";
        }

    } else {
        echo "<h2 style='color: red;'>Error:</h2>";
        echo "<p style='color: red;'>Unable to fetch conversion rate. Please check your input and try again.</p>";
    }
    // Close the database connection
    mysqli_close($con);

} else {
    // Handle cases where the form is not submitted
    echo "<h2>Error:</h2>";
    echo "<p>Invalid request.</p>";

}
?>
</body>
</html>