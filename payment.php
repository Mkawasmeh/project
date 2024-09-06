<?php
include("ooos.php");
    $card_number = validate($_POST['card_number']);
    $payment_method = validate($_POST['payment_method']);
	///////////////////////////////////////////////////////////////////////////////////////////////////
if(!empty($card_number) and !empty($payment_method)){
    $sql4 = "UPDATE ingo SET card_number='$card_number' WHERE Name='$name' ";
	$sql5="UPDATE ingo SET payment_method ='$payment_method' WHERE Name='$name'";
	mysqli_query($mycon, $sql5);
    if (mysqli_query($mycon, $sql4)) {
        //echo "Record inserted successfully";
    } else {
        echo "Error inserting record: " . mysqli_error($mycon);
    }

mysqli_close($mycon);}
?>
<html>
<body>
<form action="ooo.php" method="post" class="form-container" id="checkout-form">
            <h2>how many hours</h2>
            <div class="form-group">
                <label for="hours">Enter the number of hours:</label>
                <input type="number" name="hours" id="hours" required>
                <span class="error" id="name-error"></span>
            </div>
            <h2>What is your major</h2>
            <select name="major" id="major" required>
                <option value="CS">CS</option>
                <option value="BIT">BIT</option>
                <option value="CIS">CIS</option>
            </select>
            </div>
            <button type="submit" id="submit-btn">Pay Now</button>
        </form>
</body>
</html>