<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package flatone
 */

?>

	</div><!-- #content -->

	<footer  class="site-footer">
		<div class="footer-header">
			<div class="container">
				<div class="row">
					<span class="icon-global"></span>
					<h3>VIỆC LÀM</h3>
				</div>
			</div><!-- .site-info -->
		</div>
		<div class="footer-content">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<h3>Trụ sở chính Hà Nội </h3>
						<div class="info">
							<span class="fa fa-home"></span>
                            Lô 5+6, Khu công nghiệp Lai Xá, Kim Chung, H. Hoài Đức, TP.Hà Nội.                        
						</div>
						<div class="info">
							<span class="fa fa-phone-square"></span>
                            <span class='label'>Điện thoại:</span> 
                            <span class='value'>0987654321</span>                   
						</div>
						<div class="info">
							<span class="fa fa-envelope"></span>
                            <span class='label'>Email:</span> 
                            <span class='value'>abc@gmail.com</span>                   
						</div>
						<div class="info">
							<span class="fa fa-map-marker"></span>
                            <span class='label'>Email:</span> 
                            <span class='value'><a href="#">Xem bản đồ</a></span>                   
						</div>
					</div>
					<div class="col-md-4">
						<h3>Chi nhánh Đà Nẵng</h3>
						<div class="info">
							<span class="fa fa-home"></span>
                            Lô 5+6, Khu công nghiệp Lai Xá, Kim Chung, H. Hoài Đức, TP.Hà Nội.                        
						</div>
						<div class="info">
							<span class="fa fa-phone-square"></span>
                            <span class='label'>Điện thoại:</span> 
                            <span class='value'>0987654321</span>                   
						</div>
						<div class="info">
							<span class="fa fa-envelope"></span>
                            <span class='label'>Email:</span> 
                            <span class='value'>abc@gmail.com</span>                   
						</div>
						<div class="info">
							<span class="fa fa-map-marker"></span>
                            <span class='label'>Email:</span> 
                            <span class='value'><a href="#">Xem bản đồ</a></span>                   
						</div>
					</div>
					<div class="col-md-4">
						<h3>Chi nhánh Hồ Chí Minh </h3>
						<div class="info">
							<span class="fa fa-home"></span>
                            Lô 5+6, Khu công nghiệp Lai Xá, Kim Chung, H. Hoài Đức, TP.Hà Nội.                        
						</div>
						<div class="info">
							<span class="fa fa-phone-square"></span>
                            <span class='label'>Điện thoại:</span> 
                            <span class='value'>0987654321</span>                   
						</div>
						<div class="info">
							<span class="fa fa-envelope"></span>
                            <span class='label'>Email:</span> 
                            <span class='value'>abc@gmail.com</span>                   
						</div>
						<div class="info">
							<span class="fa fa-map-marker"></span>
                            <span class='label'>Email:</span> 
                            <span class='value'><a href="#">Xem bản đồ</a></span>                   
						</div>
					</div>
				</div>
				<div class="panel-phone row">
					<div class="col-md-3">
						<h3>Thương hiệu</h3>
						<div class="phone-number">

								<?php 
									if (has_header_image()) {
										echo '<img src="' . get_header_image() . '" class=""/>';
									} 
								?>
							<!-- <img src="http://intechvietnam.com/imgs/layout/logoint.jpg" /> -->
						</div>
					</div>
					<div class="col-md-3">
						<h3>Hotline Hà Nội</h3>
						<div class="phone-number">
							<span class="icon icon-zalo"></span>
                            <span class='label'>Mr. Abc:</span> 
                            <span class='value'>0987654321</span>   
						</div>
						<div class="phone-number">
							<span class="icon icon-zalo"></span>
                            <span class='label'>Mr. Abc:</span> 
                            <span class='value'>0987654321</span>   
						</div>
					</div>
					<div class="col-md-3">
						<h3>Hotline Đà Nẵng</h3>
						<div class="phone-number">
							<span class="icon icon-zalo"></span>
                            <span class='label'>Mr. Abc:</span> 
                            <span class='value'>0987654321</span>   
						</div>
						<div class="phone-number">
							<span class="icon icon-zalo"></span>
                            <span class='label'>Mr. Abc:</span> 
                            <span class='value'>0987654321</span>   
						</div>
					</div>
					<div class="col-md-3">
						<h3>Hotline Hồ Chí Minh</h3>
						<div class="phone-number">
							<span class="icon icon-zalo"></span>
                            <span class='label'>Mr. Abc:</span> 
                            <span class='value'>0987654321</span>   
						</div>
						<div class="phone-number">
							<span class="icon icon-zalo"></span>
                            <span class='label'>Mr. Abc:</span> 
                            <span class='value'>0987654321</span>   
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<span class="icon icon-cc"></span>
						Copyright © 2017 intechvietnam.com. All Rights Reserved            
					</div>
					<div class="col-md-6">
						<span class="icon icon-verified"></span>          
					</div>
				</div>
			</div><!-- .site-info -->
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
