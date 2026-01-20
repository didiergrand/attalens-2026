<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>
</div>
</div>
</div>

<footer id="footer">
  <div class="container">
    <div class="row">
      <div class="col-sm-4">
        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Contenu du bas 1')) : ?>
        <?php endif; ?>
      </div>
      <div class="col-sm-4">
        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Contenu du bas 2')) : ?>
        <?php endif; ?>
      </div>
      <div class="col-sm-4">
        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Contenu du bas 3')) : ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</footer>
<div id="footer-bottom">
  <div class="container">
    <div class="row">      
      <div class="col-sm-12"> <a href="<?php echo home_url('/declaration-de-protection-des-donnees/'); ?>">Déclaration de protection des données</a>  |  <a href="<?php echo home_url('/declaration-de-protection-des-donnees/#cookies'); ?>">Politique de cookies</a>  |  <a class="cmplz-show-banner">Gérer le consentement</a></div>
    </div>
  </div>
</div>
<!-- .site-footer -->
</div>
<!-- .site-inner -->
</div>
<!-- .site -->

<?php wp_footer(); ?>
<script src="https://cdn.jsdelivr.net/npm/swiffy-slider@1.6.0/dist/js/swiffy-slider.min.js" crossorigin="anonymous" defer></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/custom.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/vendor/bootstrap.min.js"></script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-57be507a4975626f"></script>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-87006524-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-87006524-1');
</script>
</body></html>
