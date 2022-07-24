<?php include'header.php' ?>
<div class="container" id="frm">
	<h1 style="text-align: center;font-weight: bold;">
		Payment Details
	</h1>
	<div class="row">
		<div class="col-xs-3">
			<img style="width: 100%;" src="https://icons.iconarchive.com/icons/designbolts/credit-card-payment/256/Master-Card-Blue-icon.png">
		</div>
		<div class="col-xs-3">
			<img style="width: 100%;" src="https://cdn0.iconfinder.com/data/icons/credit-8/512/29_credit-512.png">
		</div>
		<div class="col-xs-3">
			<img style="width: 100%;" src="https://cdn4.iconfinder.com/data/icons/simple-peyment-methods/512/paypal-512.png">
		</div>
		<div class="col-xs-3">
			<img style="width: 100%;" src="https://cdn0.iconfinder.com/data/icons/IS_credit-cards-full_final/512/american_express.png">
		</div>
	</div>
	<hr>
	<form method="get" action="bought.php">
		<b>CARD NUMBER</b>
		<div class="form-group">
			<input type="text" placeholder="Valid Card Number" class="form-control" maxlength="16" onkeyup="this.value = this.value.replace(/^([^0-9]*)$/, '')" required>
		</div>
		<div class="row">
			<div class="col-xs-7">
				<b>EXPIRATION DATE</b><br>
				<input type="text" placeholder="MM/YY" class="form-control" required><br>
			</div>
			<div class="col-xs-5">
				<b>CV CODE</b><br>
				<input type="text" placeholder="CVC" class="form-control" maxlength="3" onkeyup="this.value = this.value.replace(/^([^0-9]*)$/, '')" required>	
			</div>
		</div>
		<b>CARD OWNER</b>
		<div class="form-group">
			<input type="text" placeholder="Card Owner Name" class="form-control" required>	
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary btn-block">CONFIRM PAYMENT</button>
		</div>
		<?php
			echo '<input type="hidden" value="'.$_GET["uid"].'" name="uid">';
			echo '<input type="hidden" value="'.$_GET["cid"].'" name="cid">';
		?>
	</form>
</div>
<?php include'footer.php' ?>