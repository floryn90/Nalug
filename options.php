<div class="wrap">
  <h2>Personalizzazioni tema NaLUG</h2>
  <form method="post" action="options.php">
    <?php settings_fields( 'nalug-options' ); ?>
    <?php do_settings_sections( 'nalug-options' ); ?>
    <?php submit_button(); ?>
  </form>
</div>
