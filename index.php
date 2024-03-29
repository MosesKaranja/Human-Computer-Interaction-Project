<?php 
 
 require 'core/init.php';
 include 'includes/head.php';
 include 'includes/navigation.php';
 include 'headerfull.php';
 include 'includes/leftbar.php';

 $sql = "SELECT * FROM products WHERE featured = 1";
 $featured = $db->query($sql);

 ?>


		<!-- Main Content -->
		<div class="col-md-8">
			<div class="row">

				<h2>Feature Products</h2>
				<?php while($product = mysqli_fetch_assoc($featured)) : ?>

				<div class="col-md-3">
					<h4><?php echo $product['title'];?></h4>
					<img src="<?php echo $product['image'];?>" alt="<?php echo $product['title'];?>" class="img-thumb">
					<p class="list-price text-danger">List Price: <s>$<?php echo $product['list_price'];?></s></p>
					<p class="price">Our Price: $<?php echo $product['price']?></p>
					<button type="button" class="btn btn-sm btn-success" onclick="detailsModal(<?=$product['id'];?>)">Details</button>
				</div>

			<?php endwhile;?>

			</div>
		</div>

		<?php
	
		 include('includes/rightbar.php');
		 include('includes/footer.php');
		?>
