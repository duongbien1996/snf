<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */

?>
    <footer>
        <div class="snf-footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-top">
                            <div class="footer-logo">
                                <a href="#"><img src="<?php echo ASSETS_URI ?>/images/svg/logo.svg" alt="#"></a>
                            </div>
                            <div class="footer-address">
                                <ul>
                                    <li>
                                        <div class="map">
                                            <img src="<?php echo ASSETS_URI ?>/images/svg/maps-and-flags.svg" alt="#">                                        
                                        </div>
                                        <div class="addr">
                                            <p>Trụ sở: Tầng 1, Số 2 ngõ 66 Khúc Thừa Dụ, Dịch Vọng, Cầu Giấy, Hà Nội</p>
                                            <a href="tel:0986835678">Điện thoại: 0986835678</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="map">
                                            <img src="<?php echo ASSETS_URI ?>/images/svg/maps-and-flags.svg" alt="#">                                        
                                        </div>
                                        <div class="addr">
                                            <p>Cơ sở 2: Số 23 ngõ 40 Tạ Quang Bửu, Bách Khoa, Hai Bà Trưng, Hà Nội.</p>
                                            <a href="tel:0988123456">Điện thoại: 0988123456</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="map">
                                            <img src="<?php echo ASSETS_URI ?>/images/svg/maps-and-flags.svg" alt="#">                                        
                                        </div>
                                        <div class="addr">
                                            <p>Cơ sở 3: Cầu Ngà, Bắc Ninh</p>
                                            <a href="tel:043 9366 366">Điện thoại: 043 9366 366</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="map">
                                            <img src="<?php echo ASSETS_URI ?>/images/svg/phone.svg" alt="#">                                        
                                        </div>
                                        <div class="addr">
                                            <a href="tel:19001080">Hotline: 19001080</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="map">
                                            <img src="<?php echo ASSETS_URI ?>/images/svg/mail.svg" alt="#">                                        
                                        </div>
                                        <div class="addr">
                                            <a href="tomail:cskh@snf.com.vn">Email: cskh@snf.com.vn </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="footer-support">
                                <h3 class="ft-title">BẠN CẦN TRỢ GIÚP</h3>
                                <?php
                                    wp_nav_menu(array(
                                        'menu' => 'Menu Footer Support',
                                        'menu_class' => 'snf-menu js-menu-nav',
                                        'container' => 'ul',
                                    ));
                                ?>
                            </div>  
                            <div class="footer-info-more">
                                <h3 class="ft-title">THÔNG TIN THÊM</h3>
                                <?php
                                    wp_nav_menu(array(
                                        'menu' => 'Menu Footer Info More',
                                        'menu_class' => 'snf-menu js-menu-nav',
                                        'container' => 'ul',
                                    ));
                                ?>
                            </div>
                        </div>
                        <div class="footer-bottom text-center">Copyright © 2017 Smart Invest. All Rights Reserved</div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
<?php 
    wp_footer(); 
?>
</body>
</html>
