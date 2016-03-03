<?php
/**
 * The template for displaying the footer.
 *
 * @package Hezy
 */
?>

    <footer id="footer" class="footer" role="contentinfo">

        <div class="bottom_block">

            <p class="copyright">© 2014 hezy</p>

            <a href="#" id="scrollup" class="top_link">top <span class="glyphicon glyphicon-chevron-up"></span></a>

            <nav class="navigation">

                <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>

            </nav>

        </div>
    </footer><!-- #footer -->

</div><!-- .wrapper -->

<?php wp_footer(); ?>
</body>
</html>