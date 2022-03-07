<?php
	if(!isset($safeFile)){
		die('Problem with loading file!');
	}
?>

<div id="products" class="col-md-9">

	<div class="row">	
		<?php foreach($productService->getAllProducts($activeCategory) as $product): ?>
			<!-- FIRST PRODUCT -->
			<div class="col-md-12 col-lg-6">									
				<div class="card mb-4 box-shadow mask">
					<div class="card-inner">
						<div class="title">
							<?php echo $product->getTitle(); ?>
						</div>
						<div class="productImg">
							<img src="<?php echo $product->getBaseImage(); ?>" class="card-img-top" alt="Card image cap">
						</div>										
						<div class="card-body">
							<p class="card-text"><?php echo $product->getDescription(); ?></p>
							<p class="price">Cena: <?php echo $product->getPrice(); ?> &euro;</p>
							<div class="d-flex justify-content-between align-items-center">	
								<form action="./" method="post">
									<input type="hidden" name="action" value="addToCart">
									<input type="hidden" name="id" value="<?php echo $product->getId(); ?>">
									<input type="hidden" name="redirect" value="?page=cart">
									<div class="input-group mb-2">
										<div class="input-group-prepend">
											<div class="input-group-text">KS</div>
										</div>
										
										<input type="text" id="quantity" name="quantity" class="form-control" value="1">
										
										<div class="btn-group input-group-append">
											<button type="submit" class="btn btn-md btn-outline-secondary">Pridať do košíka</button>
										</div>
									</div>	
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
	
</div>