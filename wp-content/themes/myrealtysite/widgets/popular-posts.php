<?php

class popular_widget extends WP_Widget {

	function __construct() {
		parent::__construct(
// Выбираем ID для своего виджета
			'popular_widget', 

// Название виджета, показано в консоли
			__('My Widget', 'popular_widget_domain'), 

// Описание виджета
			array( 'description' => __( 'Популярные статьи', 'popular_widget_domain' ), ) 
			);
	}

// Создаем код для виджета - 
// сначала небольшая идентификация
	public function widget( $args, $instance ) {
  		if ( ! isset( $args['widget_id'] ) ) {
      		$args['widget_id'] = $this->id;
    	}
		$title = apply_filters( 'widget_title', $instance['title'] );
		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 'number';
   

// до и после идентификации переменных темой
		echo $args['before_widget'];
			
				    if ( ! empty( $title ) )
					echo $args['before_title'] . $title . $args['after_title'];?>
			<ul>
<?php 				
// Именно здесь записываем весь код и вывод данных


 
        			$args = array(
           			 	'posts_per_page' => $number,
            			'meta_key'    => 'post_views_count',
            			'orderby'     => 'meta_value_num',
            			'order'       => 'DESC'
        			);
        			$popular_posts = new WP_Query( $args );
        		while ( $popular_posts->have_posts() ) : $popular_posts->the_post();
            	?>
           
              
            	<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
        
      
        		<?php endwhile;
        			wp_reset_query(); 
        		?>
          	</ul>
        </section>
        <?php 

       
		  
		
	}

// Закрываем код виджета
	public function form( $instance ) {
		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : '';?>
   
<!-- } 

// Для административной консоли-->

			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to show:' ); ?></label>
				<input class="tiny-text" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="number" step="1" min="1" value="<?php echo $number; ?>" size="3" />
			</p>
		<?php 
	}
  
// Обновление виджета
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['number'] = (int) $new_instance['number'];
		return $instance;
	}
} // Закрываем класс popular_widget


// Регистрируем и запускаем виджет
function popular_load_widget() {
  	register_widget( 'popular_widget' );
}

add_action( 'widgets_init', 'popular_load_widget' );


?>