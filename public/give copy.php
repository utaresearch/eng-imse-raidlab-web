<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Give Tab</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
</head>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>
<body>
    <div class="container">
         <h1>GIVE</h1>
       
       <p>On behalf of everyone at RFID Lab, thank you for your support! The gift you make today will have an immediate impact on our research activities, and for that, we are so appreciative.   
		  
		  If you need assistance in making your gift, or would like more information, please contact Dr. Erick Jones 817-296-6884. </p>
		  
		
	<h2>GIFT INFORMATION:</p><br>

	<form action="/give.php">



		<input type="radio" name="amt" value="1000"> $ 1,000.00<br><br>
		<input type="radio" name="amt" value="500"> $ 500.00<br><br>
		<input type="radio" name="amt" value="250">$ 250.00<br><br>
		<input type="radio" name="amt" value="125"> $ 125.00<br><br>  
		<input type="radio" name="amt" value="">Other <input type="text" name="amt" />​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​<br><br>
		
		
		<input type="submit" value="Submit"><br>
				
	</form>

		<br/>
		<div id="paypal-button-container"></div>

		  
		<script src="https://www.paypal.com/sdk/js?client-id=AUDnHMw92Z5Zi9h_NcbFIP1RyFko1XLJ__6TQvhQcc3oMHO_j1--T8mkyt-xVLcl1R8Hm7D1ukHjoDc4"></script>
		<script>
  paypal.Buttons({
    createOrder: function(data, actions) {
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: '100'
          }
        }]
      });
    },
    onApprove: function(data, actions) {
      return actions.order.capture().then(function(details) {
        alert('Transaction completed by ' + details.payer.name.given_name);
        // Call your server to save the transaction
        return fetch('/paypal-transaction-complete', {
          method: 'post',
          headers: {
            'content-type': 'application/json'
          },
          body: JSON.stringify({
            orderID: data.orderID
          })
        });
      });
    }
  }).render('#paypal-button-container');
</script>
	
    </div>
    <?php include 'footer.php'; ?>
	
</body>
</html>	