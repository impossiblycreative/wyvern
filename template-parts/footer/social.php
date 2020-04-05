<?php if ( !empty( get_theme_mod( 'facebook_link' ) ) || !empty( get_theme_mod( 'twitter_link' ) ) || !empty( get_theme_mod( 'instagram_link' ) ) || !empty( get_theme_mod( 'github_link' ) ) || !empty( get_theme_mod( 'youtube_link' ) ) || !empty( get_theme_mod( 'twitch_link' ) ) ) : ?>
    <ul class="social-icons">
        <?php if ( !empty( get_theme_mod( 'facebook_link' ) ) ) : ?>
            <li class="social-icon">
                <a href="<?php echo esc_url( get_theme_mod( 'facebook_link' ) ); ?>" target="_blank" rel="noopener" title="<?php echo esc_html_e( 'Link to Facebook Profile', 'wyvern' ); ?>">
                    <span class="fab fa-facebook"></span>
                    <span class="screen-reader-text"><?php echo esc_html_e( 'Link to Facebook Profile', 'wyvern' ); ?></span>
                </a>
            </li>
        <?php endif; ?>

        <?php if ( !empty( get_theme_mod( 'twitter_link' ) ) ) : ?>
            <li class="social-icon">
                <a href="<?php echo esc_url( get_theme_mod( 'twitter_link' ) ); ?>" target="_blank" rel="noopener" title="<?php echo esc_html_e( 'Link to Twitter Profile', 'wyvern' ); ?>">
                    <span class="fab fa-twitter"></span>
                    <span class="screen-reader-text"><?php echo esc_html_e( 'Link to Twitter Profile', 'wyvern' ); ?></span>
                </a>
            </li>
        <?php endif; ?>

        <?php if ( !empty( get_theme_mod( 'instagram_link' ) ) ) : ?>
            <li class="social-icon">
                <a href="<?php echo esc_url( get_theme_mod( 'instagram_link' ) ); ?>" target="_blank" rel="noopener" title="<?php echo esc_html_e( 'Link to Instagram Profile', 'wyvern' ); ?>">
                    <span class="fab fa-instagram"></span>
                    <span class="screen-reader-text"><?php echo esc_html_e( 'Link to Instagram Profile', 'wyvern' ); ?></span>
                </a>
            </li>
        <?php endif; ?>

        <?php if ( !empty( get_theme_mod( 'github_link' ) ) ) : ?>
            <li class="social-icon">
                <a href="<?php echo esc_url( get_theme_mod( 'github_link' ) ); ?>" target="_blank" rel="noopener" title="<?php echo esc_html_e( 'Link to GitHub Profile', 'wyvern' ); ?>">
                    <span class="fab fa-github"></span>
                    <span class="screen-reader-text"><?php echo esc_html_e( 'Link to GitHub Profile', 'wyvern' ); ?></span>
                </a>
            </li>
        <?php endif; ?>

        <?php if ( !empty( get_theme_mod( 'youtube_link' ) ) ) : ?>
            <li class="social-icon">
                <a href="<?php echo esc_url( get_theme_mod( 'youtube_link' ) ); ?>" target="_blank" rel="noopener" title="<?php echo esc_html_e( 'Link to YouTube channel', 'wyvern' ); ?>">
                    <span class="fab fa-youtube"></span>
                    <span class="screen-reader-text"><?php echo esc_html_e( 'Link to YouTube channel', 'wyvern' ); ?></span>
                </a>
            </li>
        <?php endif; ?>

        <?php if ( !empty( get_theme_mod( 'twitch_link' ) ) ) : ?>
            <li class="social-icon">
                <a href="<?php echo esc_url( get_theme_mod( 'twitch_link' ) ); ?>" target="_blank" rel="noopener" title="<?php echo esc_html_e( 'Link to Twitch Profile', 'wyvern' ); ?>">
                    <span class="fab fa-twitch"></span>
                    <span class="screen-reader-text"><?php echo esc_html_e( 'Link to Twitch Profile', 'wyvern' ); ?></span>
                </a>
            </li>
        <?php endif; ?>
    </ul>
<?php endif; ?>