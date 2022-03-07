<?php
	if(!isset($safeFile)){
		die('Problem with loading file!');
	}
	
	$class = "";
	if($activeCategory == null && $page == ""){
		$class = "active";
	}
?>

<div class="col-md-3">
	<ul id="left-navigation">
		<li><a href="./" class="<?php echo $class; ?>">Kategórie</a></li>
		<?php foreach($productService->getCategories() as $category): ?>
			<?php 
				$class = "";
				if($category == $activeCategory){
					$class = "active";
				}
			?>
			<li>
				<a href="?category=<?php echo $category; ?>" class="<?php echo $class; ?>">
					<?php echo $category; ?>
				</a>
			</li>
		<?php endforeach; ?>
	</ul>
</div>