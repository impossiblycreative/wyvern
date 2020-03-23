<?php if ( !empty( get_theme_mod( 'facebook_link' ) ) || !empty( get_theme_mod( 'twitter_link' ) ) || !empty( get_theme_mod( 'instagram_link' ) ) || !empty( get_theme_mod( 'github_link' ) ) || !empty( get_theme_mod( 'youtube_link' ) ) || !empty( get_theme_mod( 'twitch_link' ) ) ) : ?>
    <ul class="social-icons">
        <?php if ( !empty( get_theme_mod( 'facebook_link' ) ) ) : ?>
            <li class="social-icon">
                <a href="<?php echo esc_url( get_theme_mod( 'facebook_link' ) ); ?>" target="_blank" title="Link to Facebook Profile">
                    <span class="fab fa-facebook"></span>
                </a>
            </li>
        <?php endif; ?>

        <?php if ( !empty( get_theme_mod( 'twitter_link' ) ) ) : ?>
            <li class="social-icon">
                <a href="<?php echo esc_url( get_theme_mod( 'twitter_link' ) ); ?>" target="_blank" title="Link to Twitter Profile">
                    <span class="fab fa-twitter"></span>
                </a>
            </li>
        <?php endif; ?>

        <?php if ( !empty( get_theme_mod( 'instagram_link' ) ) ) : ?>
            <li class="social-icon">
                <a href="<?php echo esc_url( get_theme_mod( 'instagram_link' ) ); ?>" target="_blank" title="Link to Instagram Profile">
                    <span class="fab fa-instagram"></span>
                </a>
            </li>
        <?php endif; ?>

        <?php if ( !empty( get_theme_mod( 'github_link' ) ) ) : ?>
            <li class="social-icon">
                <a href="<?php echo esc_url( get_theme_mod( 'github_link' ) ); ?>" target="_blank" title="Link to GitHub Profile">
                    <span class="fab fa-github"></span>
                </a>
            </li>
        <?php endif; ?>

        <?php if ( !empty( get_theme_mod( 'youtube_link' ) ) ) : ?>
            <li class="social-icon">
                <a href="<?php echo esc_url( get_theme_mod( 'youtube_link' ) ); ?>" target="_blank" title="Link to YouTube Profile">
                    <span class="fab fa-youtube"></span>
                </a>
            </li>
        <?php endif; ?>

        <?php if ( !empty( get_theme_mod( 'twitch_link' ) ) ) : ?>
            <li class="social-icon">
                <a href="<?php echo esc_url( get_theme_mod( 'twitch_link' ) ); ?>" target="_blank" title="Link to Twitch Profile">
                    <span class="fab fa-twitch"></span>
                </a>
            </li>
        <?php endif; ?>
    </ul>
<?php endif; ?>