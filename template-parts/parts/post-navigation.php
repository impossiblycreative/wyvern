<?php
$prev_post = get_previous_post();
$next_post = get_next_post();

if ( $prev_post || $next_post ) {
    $prev_id = $prev_post->ID;
    $next_id = $next_post->ID;
?>
    <nav class="post-navigation">
    <?php
    if ( $prev_id ) {
        set_query_var( 'prev_id', $prev_id );
        get_template_part( 'template-parts/parts/prev-post-navigation-link' );
    }
    
    if ( $next_id ) {
        set_query_var( 'next_id', $next_id );
        get_template_part( 'template-parts/parts/next-post-navigation-link' );    
    }
    ?>
    </nav>
<?php
}