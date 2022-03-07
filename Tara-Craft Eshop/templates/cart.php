<?php
	if(!isset($safeFile)){
		die('Problem with loading file!');
	}
?>

<!-- RIGHT / CHECKOUT -->
<div id="checkout" class="col-md-9 bg-white p-5">

	<div class="container">
		<div class="text-center">
			<h2>Objednávka</h2>
			<p class="lead">Po vyplnení objednávky nám príde e-mail a potom Vás budeme kontaktovať o ďalšom postupe s jej vybavením. V prípade akýchkoľvek otázok nás neváhajte kontaktovať.</p>
		</div>

		<div class="row">
			<div class="col-md-4 order-md-2 mb-4">
				<h4 class="d-flex justify-content-between align-items-center mb-3">
					<span class="text-muted">Nákupný košík</span>
					<span class="badge badge-secondary badge-pill"><?php echo $basket->getNumberOfItems(); ?></span>
				</h4>
				<ul class="list-group mb-3">
					<?php 
						foreach($basket->getProductIdsWithQuantity() as $productId=>$quantity): 
						$product = $productService->getProductById($productId);
					?>
						<li class="list-group-item d-flex justify-content-between lh-condensed">
							<div>
								<div>
									<div class="my-0"><?php echo $product->getTitle(); ?></div>
								</div>
								<div class="text-muted">
									(<?php echo $quantity;?> ks) 
									<form action="./" method="post" style="display: inline;">
										<input type="hidden" name="action" value="removeFromCart">
										<input type="hidden" name="id" value="<?php echo $productId; ?>">
										<input type="hidden" name="redirect" value="?page=cart">
										<button type="submit" class="trashButton"><i class="far fa-trash-alt"></i></button>
									</form>
								</div>
							</div>
							<span class="text-muted">&euro; <?php echo $product->getPrice()*$quantity; ?></span>
						</li>
					<?php endforeach; ?>
					<li class="list-group-item d-flex justify-content-between">
						<strong>SPOLU:</strong>
						<strong>&euro; 
							<?php 
								echo $productService->getTotalPrice($basket->getProductIdsWithQuantity()); 
							?>
						</strong>
					</li>
				</ul>

			</div>
			<div class="col-md-8 order-md-1">
				<h4 class="mb-3">Fakturačná adresa</h4>
				<form action="./" method="post">
					<input type="hidden" name="action" value="processOrder">
					<input type="hidden" name="redirect" value="?page=orderCompleted">
					<div class="row">
						<div class="col-md-6 mb-3">
							<label for="firstName">Meno</label>
							<input type="text" class="form-control" name="firstName" id="firstName" placeholder="Janko">
						</div>
						<div class="col-md-6 mb-3">
							<label for="lastName">Priezvisko</label>
							<input type="text" class="form-control" name="lastName" id="lastName" placeholder="Hraško">
						</div>
					</div>

					<div class="mb-3">
						<label for="email">Email</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text">@</span>
							</div>
							<input type="email" class="form-control" name="email" id="email" placeholder="nieco@nieco.sk">
						</div>
					</div>
					<div class="mb-3">
						<label for="phone">Telefón <span class="text-muted"></span></label>
						<input type="text" class="form-control" name="phone" id="phone" placeholder="+421 989 123 123">
					</div>

					<div class="mb-3">
						<label for="company">Firma <span class="text-muted">(nepovinné)</span></label>
						<input type="text" class="form-control" name="company" id="company" placeholder="AKO NA WEB, s.r.o.">
					</div>
					<div class="row">
						<div class="col-md-4 mb-3">
							<label for="ico">IČO <span class="text-muted">(nepovinné)</span></label>
							<input type="text" class="form-control" name="ico" id="ico" placeholder="11411545">
						</div>
						<div class="col-md-4 mb-3">
							<label for="dic">DIČ <span class="text-muted">(nepovinné)</span></label>
							<input type="text" class="form-control" name="dic" id="dic" placeholder="11411545114">
						</div>
						<div class="col-md-4 mb-3">
							<label for="icDph">IČ DPH <span class="text-muted">(nepovinné)</span></label>
							<input type="text" class="form-control" name="icDph" id="icDph" placeholder="SK11411545114">
						</div>
					</div>

					<div class="mb-3">
						<label for="street">Ulica</label>
						<input type="text" class="form-control" name="street" id="street" placeholder="Bajkalská 41/13">
					</div>

					<div class="row">
						<div class="col-md-5 mb-3">
							<label for="city">Mesto</label>
							<input type="text" class="form-control" name="city" id="city" placeholder="Bratislava">
						</div>
						<div class="col-md-4 mb-3">
							<label for="country">State</label>
							<select class="custom-select d-block w-100" name="country" id="country">
								<option value="">Vybrať...</option>
								<option>Slovensko</option>
								<option>Česko</option>
							</select>
						</div>
						<div class="col-md-3 mb-3">
							<label for="psc">Psč</label>
							<input type="text" class="form-control" name="psc" id="psc" placeholder="01010">
						</div>
					</div>
					
					<hr class="mb-4">

					<h4 class="mb-3">Platba</h4>

					<div class="d-block my-3">
						<div class="custom-control custom-radio">
							<input id="bank" name="paymentMethod" type="radio" class="custom-control-input">
							<label class="custom-control-label" for="bank">Bankovým prevodom</label>
						</div>
					</div>
					
					<hr class="mb-4">
					
					<button class="btn btn-primary btn-lg btn-block" type="submit">Odoslať objednávku</button>
				</form>
			</div>
		</div>
		
	</div>

</div>