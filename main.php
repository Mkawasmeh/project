
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus Corner - Checkout</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 0;
            padding: 0;
        }

        main {
            padding: 20px;
        }

        .form-container {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 5px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .error {
            color: red;
            font-size: smaller;
        }
    </style>
</head>
<body>
    <main>
        <h1>Checkout</h1>
        <form action="payment.php" method="post" class="form-container" id="checkout-form">
		
            <h2>Payment Information</h2>
            <select name="payment_method" id="payment-method" required>
                <option value="">Choose Payment Method</option>
                <option value="credit_card">Credit Card</option>
                <option value="debit_card">Debit Card</option>
            </select>
                <div class="form-group">
                    <label for="card_number">Card Number:</label>
                    <input type="text" name="card_number" id="card_number" required>
                    <span class="error" id="card-number-error"></span>
                </div>
            <button type="submit" >Pay Now</button>
					<p>YOU have an account? <a href="signin.php"> SIGN IN </a></p>
        </form>
		</main>
		</body>
		</html>