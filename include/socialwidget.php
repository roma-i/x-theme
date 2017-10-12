<?php
class x_theme_social_widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'x_theme_social_widget',
            esc_html__( 'Social widget', 'x_theme' ),
            array( 'classname' => 'social_widget','description' => esc_html__( 'Displays socials icons', 'x_theme' ), )
        );
    }

    /**
     * @param $haystack
     *
     * @return mixed
     */
    private function array_remove_empty( $haystack ) {
        foreach ( $haystack as $key => $value ) {
            if ( is_array( $value ) ) {
                $haystack[ $key ] = $this->array_remove_empty( $haystack[ $key ] );
            }

            if ( empty( $haystack[ $key ] ) ) {
                unset( $haystack[ $key ] );
            }
        }

        return $haystack;
    }


    /**
     * @param array $new_instance
     * @param array $old_instance
     *
     * @return array
     */
    function update( $new_instance, $old_instance ) {

        $new_instance = $this->array_remove_empty( $new_instance );

        /** @var WP_Widget $instance */
        $instance = wp_parse_args( $new_instance );

        /** @var WP_Widget $instance */
        return $instance;
    }



    function widget( $args, $instance ) {
        // Widget output
        extract($args, EXTR_SKIP);


        $title = empty($instance['title']) ? ''  : apply_filters('widget_title', $instance['title']); 
        $text = empty($instance['text']) ? ''  : $instance['text'];
     

        $t_url = empty( $instance['t_url'] ) ? '' : $instance['t_url'];
        $l_url = empty( $instance['l_url'] ) ? '' : $instance['l_url'];
        $f_url = empty( $instance['f_url'] ) ? '' : $instance['f_url'];
        $g_url = empty( $instance['g_url'] ) ? '' : $instance['g_url'];
        $p_url = empty( $instance['p_url'] ) ? '' : $instance['p_url']; 

        echo $args['before_widget'];
        if ( $title ) {
            echo $args['before_title'] . $title . $args['after_title'];
        }

        $output = '';
 
        $output .= ( ! empty( $text ) ) ? '<div class="widget-title">' . $text . '</div>' : '';
        $output .= '<ul class="list-social">';
        $output .= ( ! empty( $t_url ) ) ? '<li><a href="' . $t_url . '"><i class="fa fa-twitter"></i></a></li>' : '';
        $output .= ( ! empty( $f_url ) ) ? '<li><a href="' . $f_url . '"><i class="fa fa-facebook"></i></a></li>' : '';
        $output .= ( ! empty( $g_url ) ) ? '<li><a href="' . $g_url . '"><i class="fa fa-google-plus"></i></a></li>' : '';
        $output .= ( ! empty( $l_url ) ) ? '<li><a href="' . $l_url . '"><i class="fa fa-linkedin"></i></a></li>' : '';
        $output .= ( ! empty( $p_url ) ) ? '<li><a href="' . $p_url . '"><i class="fa fa-pinterest-p"></i></a></li>' : '';
        $output .= '</ul>';


        $output .= ( ! empty( $instance['image'] ) ) ? '<img src="'. esc_url( $instance['image'] )  .'" class="footer-img" alt="" >' : '';
     

        echo $output;

        echo $args['after_widget'];
    }

    function form( $instance ) {
        // Output admin widget options form
        $instance = wp_parse_args( (array) $instance, array(
                'title' => '',  
                't_url' => '',
                'l_url' => '',
                'f_url' => '',
                'g_url' => '',
                'p_url' => '',
                'image' => '',
            )
        );
        $title = $instance['title'];  
        $t_url = $instance['t_url'];

        $l_url = $instance['l_url'];
        $f_url = $instance['f_url'];
        $g_url = $instance['g_url'];
        $p_url = $instance['p_url'];

        


        ?> 
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e( 'Title:','x-theme'); ?>
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('f_url'); ?>">
                <?php esc_html_e( 'Facebook URL:','x-theme'); ?>
                <input class="widefat" id="<?php echo $this->get_field_id('f_url'); ?>"
                       name="<?php echo $this->get_field_name('f_url'); ?>"
                       type="text" value="<?php echo esc_attr($f_url); ?>" />
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('t_url'); ?>">
                <?php esc_html_e( 'Twitter URL:','x-theme'); ?>
                <input class="widefat" id="<?php echo $this->get_field_id('t_url'); ?>"
                          name="<?php echo $this->get_field_name('t_url'); ?>" type="text" value="<?php echo esc_attr($t_url); ?>"><?php echo esc_attr($t_url); ?></input>
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('l_url'); ?>">
                <?php esc_html_e( 'Linkedin:','x-theme'); ?>
                <input class="widefat" id="<?php echo $this->get_field_id('l_url'); ?>"
                       name="<?php echo $this->get_field_name('l_url'); ?>"
                       type="text" value="<?php echo esc_attr($l_url); ?>" />
            </label>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('g_url'); ?>">
                <?php esc_html_e( 'Google Plus:','x-theme'); ?>
                <input class="widefat" id="<?php echo $this->get_field_id('g_url'); ?>"
                       name="<?php echo $this->get_field_name('g_url'); ?>"
                       type="text" value="<?php echo esc_attr($g_url); ?>" />
            </label>
        </p>
        
        <p>
            <label for="<?php echo $this->get_field_id('p_url'); ?>"><?php esc_html_e( 'Pinterest URL:','x-theme'); ?>
                <input class="widefat" id="<?php echo $this->get_field_id('p_url'); ?>" name="<?php echo $this->get_field_name('p_url'); ?>" type="text" value="<?php echo esc_attr($p_url); ?>" /></label>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('image'); ?>">
                <?php esc_html_e( 'Image URL:','caidenn'); ?>
                <input class="widefat" id="<?php echo $this->get_field_id('image'); ?>" 
                name="<?php echo $this->get_field_name('image'); ?>" 
                type="text" value="<?php echo esc_attr($image); ?>" />
            </label>
        </p>
      
        <?php
    }
}

add_action( 'widgets_init', function() {
    register_widget( 'x_theme_social_widget' );
});