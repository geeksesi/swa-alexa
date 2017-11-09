<div class="wrap">
    <h2><?php _e('Alexa rank plugin', 'swa-alexa'); ?></h2>
    <p><?php _e('Its a wordpress plugin to show your websites alexa rank in posts and pages.', 'swa-alexa'); ?></p>
    <hr>
    <?php
    $source = simplexml_load_file('http://data.alexa.com/data?cli=10&url='.get_site_url());
    ?>
    <p><?php _e('Your local rank is ', 'swa-alexa'); ?><strong>(<?php echo $source->SD->COUNTRY['RANK']; ?>)</strong> <?php _e('and your global rank is ', 'swa-alexa'); ?><strong>(<?php echo $source->SD->POPULARITY['TEXT']; ?>)</strong> <?php _e('and your local country name is ', 'swa-alexa'); ?><strong>(<?php echo $source->SD->COUNTRY['NAME']; ?>)</strong> </p>
    <hr>
    <h3><?php _e('View local rank', 'swa-alexa') ?></h3>
    <p><?php _e('shortcode: <code>[swa_alexa_country]</code>', 'swa-alexa') ?></p>
    <h3><?php _e('View global rank', 'swa-alexa') ?></h3>
    <p><?php _e('shortcode: <code>[swa_alexa_country_global]</code>', 'swa-alexa') ?></p>
    <h3><?php _e('View local country name', 'swa-alexa') ?></h3>
    <p><?php _e('shortcode: <code>[swa_alexa_country_name]</code>', 'swa-alexa') ?></p>
    <hr>
    <h2><?php _e('About plugin', 'swa-alexa') ?></h2>
    <p>
        <strong><?php _e('Plugin author: ', 'swa-alexa') ?> </strong> <a href="https://farhad.in" target="_blank"><?php _e('Farhad Hassan Pour', 'swa-alexa') ?></a> <br>
        <strong><?php _e('Plugin verison: ', 'swa-alexa') ?> </strong> <?php _e('1.0.0', 'swa-alexa') ?> <br>
        <strong><?php _e('Plugin source: ', 'swa-alexa') ?></strong> <a href="https://github.com/SahandWebAfzar/swa-alexa" target="_blank"><?php _e('Github', 'swa-alexa') ?></a> <br>
        <strong><?php _e('Donate: ', 'swa-alexa') ?></strong> <a href="<?php _e('https://farhad.in/donate/', 'swa-alexa') ?>" target="_blank"><?php _e('Please donate', 'swa-alexa') ?></a> <br>
        <strong><?php _e('Team name: ', 'swa-alexa') ?><a href="http://sahandwebafzar.ir" target="_blank"><?php _e('Sahand Web Afzar', 'swa-alexa') ?></a>.</strong>
    </p>
    <hr>
</div>