<?php

/**
 * My Account page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

defined('ABSPATH') || exit;
?>

<!-- <section class="section client-panel-header">
	<div data-aos="fade-up" class="section-container">
		<div class="title">
			<h1 class="heading--l">Panel klienta</h1>
		</div>

		<div class="user">
			<svg xmlns="http://www.w3.org/2000/svg" width="87" height="87" viewBox="0 0 87 87">
				<g id="Group_2190" data-name="Group 2190" transform="translate(10723 17796)">
					<g id="user_2_" data-name="user (2)" transform="translate(-10714.846 -17787.846)">
						<path id="Path_18164" data-name="Path 18164" d="M21.676,52.751,11.13,58.5a9.478,9.478,0,0,0-1.693,1.2,35.323,35.323,0,0,0,45.385.117,9.356,9.356,0,0,0-1.859-1.246L41.67,52.934a4.307,4.307,0,0,1-2.381-3.852V44.651a17.057,17.057,0,0,0,1.068-1.374A25.986,25.986,0,0,0,43.868,36.2a3.547,3.547,0,0,0,2.516-3.375V28.1A3.531,3.531,0,0,0,45.2,25.478V18.641S46.606,8,32.2,8s-13,10.64-13,10.64v6.837A3.526,3.526,0,0,0,18.011,28.1v4.73A3.546,3.546,0,0,0,19.646,35.8a23.471,23.471,0,0,0,4.276,8.847v4.322A4.311,4.311,0,0,1,21.676,52.751Z" transform="translate(3.15 2.671)" fill="#268585" />
						<g id="Group_2189" data-name="Group 2189" transform="translate(0 0)">
							<path id="Path_18165" data-name="Path 18165" d="M35.95.005A35.324,35.324,0,0,0,12.6,62.369a9.392,9.392,0,0,1,1.677-1.192l10.546-5.753a4.308,4.308,0,0,0,2.245-3.781V47.321a23.448,23.448,0,0,1-4.276-8.847A3.547,3.547,0,0,1,21.158,35.5v-4.73a3.531,3.531,0,0,1,1.182-2.621V21.31s-1.4-10.64,13-10.64,13,10.64,13,10.64v6.837a3.526,3.526,0,0,1,1.182,2.621V35.5a3.547,3.547,0,0,1-2.516,3.375A25.986,25.986,0,0,1,43.5,45.947a17.057,17.057,0,0,1-1.068,1.374v4.431A4.305,4.305,0,0,0,44.817,55.6L56.11,61.25a9.4,9.4,0,0,1,1.854,1.243A35.337,35.337,0,0,0,35.95.005Z" transform="translate(0 0)" fill="#35bbba" />
						</g>
					</g>
					<g id="AdobeStock_278370910" transform="translate(-10723 -17796)" fill="none" stroke="#35bbba" stroke-width="2">
						<circle cx="43.5" cy="43.5" r="43.5" stroke="none" />
						<circle cx="43.5" cy="43.5" r="42.5" fill="none" />
					</g>
				</g>
			</svg>

			<p>
				Zalogowany jako: <strong><?php echo wp_get_current_user()->display_name ?></strong>
			</p>
			<svg xmlns="http://www.w3.org/2000/svg" width="28.667" height="28.667" viewBox="0 0 28.667 28.667">
				<path id="Path_17318" data-name="Path 17318" d="M16.333,2A14.333,14.333,0,1,1,2,16.333,14.338,14.338,0,0,1,16.333,2Zm0,25.8A11.467,11.467,0,1,0,4.867,16.333,11.463,11.463,0,0,0,16.333,27.8Zm1.433-11.467h4.3l-5.733,5.733L10.6,16.333h4.3V10.6h2.867Z" transform="translate(-2 -2)" fill="#ef9700" />
			</svg>
		</div>
	</div>
</section>-->

<?php get_template_part('partials/client-panel-tabs'); ?>



<section class="section client-panel-content">
	<div class="section-container">
		<div class="woocommerce-MyAccount-content">
			<?php
			do_action('woocommerce_account_content');
			?>
		</div>
	</div>
</section>