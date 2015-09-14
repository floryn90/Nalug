<?php if( have_posts() ) : ?>
  <?php while (have_posts()) : the_post(); ?>
    <?php if ( is_singular( 'author' ) ) : ?>
      <h2><span><?php echo the_title(); ?></span></h2>

    <?php endif; ?>
  <?php endwhile; ?>
<?php endif; ?>
</header>
<h4><a href="#">Nullam Concester Tur Nerto</a></h4>
<p>Gamus at magna non nunc tristique rhoncuseri tym. Aliquam nibh ante, egestas id dictum aterert commodo re luctus libero. Praesent faucibus malesuada cibuste. Donec laoreet metus id laoreet malesuada. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam consectetur orci sed rabitur vel lorem sit amet nulla ullamcorper fermentum. <br><br>In vitae varius augue, eu consectetur ligula. Etiam dui eros, laoreet sit amet est vel, commodo venenatis eros. Donec laoreet metus id laoreet malesuada. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
<a href="#" class="btn">more</a>
