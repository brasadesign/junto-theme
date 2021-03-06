<?php
/**
 * The template used for displaying the content of the Clientes in home.php
 *
 * @package Junto Theme
 */
?>
<div id="missao"></div>
<section class="col-md-12 missao" id="missao_section">
	<header class="entry-header">
		<h2>O que nos move?</h2>
		<span class="sub-title">[ Missão ]</span>
	</header><!-- .entry-header -->

	<div class="entry-content">

		<?php $m = get_option('missao'); ?>
		<?php if (get_field('missao_repeater', $m)) : ?>
            <?php while (has_sub_field('missao_repeater', $m)): ?>
            <?php 
            	$title = get_sub_field('missao_repeater_titulo');
            	$desc = get_sub_field('missao_repeater_descricao');
				
				echo "<div class='each'>";

					if( $desc ) {
						echo "<span class='desc'>";
							echo "<span class='title'>" . $title . "</span>";
							echo $desc;
						echo "</span>";
					}

				echo "</div>";

			?>

            <?php endwhile; ?>
		<?php endif; ?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php edit_post_link( __( 'Edite a seção Metodologia', 'junto-theme' ), '<span class="edit-link">', '</span>', $m ); ?>
	</footer><!-- .entry-footer -->
</section><!-- .metodologia -->
<div class="bottom-bg missao"></div>

<?php unset( $m ); ?>