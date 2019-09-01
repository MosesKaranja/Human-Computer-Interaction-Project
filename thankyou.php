<?php
require_once 'core/init.php';

// Set your secret key: remember to change this to your live secret key in production
// See your keys here: https://dashboard.stripe.com/account/apikeys
\Stripe\Stripe::setApiKey(STRIPE_PRIVATE);

// Token is created using Checkout or Elements!
// Get the payment token ID submitted by the form:
//Get the rest of the post data


/*$token = $_POST['stripeToken'];
*/

$full_name = sanitize($_POST['full_name']);
$email = sanitize($_POST['email']);
$street = sanitize($_POST['street']);
$street2 = sanitize($_POST['street2']);
$city = sanitize($_POST['city']);
$state = sanitize($_POST['state']);
$zip_code = sanitize($_POST['zip_code']);
$country = sanitize($_POST['country']);
$tax = sanitize($_POST['tax']);
$sub_total = sanitize($_POST['sub_total']);
$grand_total = sanitize($_POST['grand_total']);
$cart_id = sanitize($_POST['cart_id']);
$description = sanitize($_POST['description']);
$charge_amount = number_format($grand_total,2) * 100;

/*$metadata = array(
	"cart_id" => $cart_id,
	"tax" => $tax,
	"sub_total" => $sub_total,
);

*/

/*$charge = \Stripe\Charge::create([
    'amount' => $charge_amount,
    'currency' => CURRENCY,
    'description' => $description,
    'source' => $token,
    'receipt_email' => $email,
    'metadata' => $metadata
]);

$db->query("UPDATE cart SET paid = 1 WHERE id = '{$cart_id}'");


$sqlInsert = "INSERT INTO transactions(charge_id, cart_id, full_name, email, street, street2, city, state, zip_code, country, sub_total, tax, grand_total, description, txn_type) VALUES ('$charge->id', '$cart_id', '$full_name', '$email', '$street', '$street2', '$city', '$state', '$zip_code', '$country', '$sub_total', '$tax', '$grand_total', '$description', '$charge->object')";

$db->query($sqlInsert);

/*$domain = ($_SERVER['HTTP_HOST'] != 'localhost')? '.'.$_SERVER['HTTP_HOST']:false;
setcookie(CART_COOKIE,'',1,"/",$domain,false);*/


include 'includes/head.php';
include 'includes/navigation.php';
include 'headerfull.php';

?>


<div class="container">

	<h4>Your card has been successfully charged <?=money($grand_total);?>. You have been emailed a reciept. Please check your spam folder if it is not in your inbox. Additionally you can print this page as a reciept.</h4>
<h4>You receipt number is: <strong><?=$cart_id;?></strong></h4>
<h4>Your order will be shipped to the address below.</h4>



	<table class="table table-bordered">
		<h4 class="text-center">Shipping Location Details.</h4>
		<thead>
			<tr>
				<th>FullName</th>
				<th>Street</th>
				<th>Street 2</th>
				<th>City</th>
				<th>State</th>
				<th>Zip Code</th>
			</tr>
		</thead>

		<tbody>
			<tr>
				<td> <?php echo $full_name?> </td>
				<td> <?php echo $street?> </td>
				<td> <?php echo $street2?> </td>
				<td> <?php echo $city?> </td>
				<td> <?php echo $state?> </td>
				<td> <?php echo $zip_code?> </td>
			</tr>
		</tbody>
		
	</table>
	
</div>


<?php include 'includes/footer.php'?>
