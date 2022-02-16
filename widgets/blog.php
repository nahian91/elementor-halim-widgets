<?php

class Elementor_Blog_Widget extends \Elementor\Widget_Base {

    public function get_name() {
		return 'blog_widget';
	}

	public function get_title() {
		return esc_html__( 'Blog Widget', 'elementor-addon-halim' );
	}

	public function get_icon() {
		return 'eicon-favorite';
	}

	public function get_custom_help_url() {
		return 'https://go.elementor.com/widget-name';
	}

	public function get_categories() {
		return [ 'elementor-addon-halim-category' ];
	}

	public function get_keywords() {
		return [ 'blog' ];
	}

    protected function register_controls(){

        $this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'elementor-addon-halim' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		// Blog Column
		$this->add_control(
			'blog_column', [
				'label' => esc_html__( 'Select Column', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'col-md-4',
				'options' => [
					'col-md-4'  => esc_html__( '3 Column', 'plugin-name' ),
					'col-md-6' => esc_html__( '2 Column', 'plugin-name' ),
					'col-md-3' => esc_html__( '4 Column', 'plugin-name' ),
				],
			]
		);

		$this->add_control(
			'blog_posts', [
				'label' => esc_html__( 'Total Posts', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 3,
			]
		);

		// Blog Order
		$this->add_control(
			'blog_order', [
				'label' => esc_html__( 'Order', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => [
					'DESC'  => esc_html__( 'DESC', 'plugin-name' ),
					'ASC' => esc_html__( 'ASC', 'plugin-name' ),
				],
			]
		);

		// Blog Column
		$this->add_control(
			'blog_orderby', [
				'label' => esc_html__( 'Order By', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'title',
				'options' => [
					'author'  => esc_html__( 'Author', 'plugin-name' ),
					'title' => esc_html__( 'Title', 'plugin-name' ),
					'date' => esc_html__( 'Date', 'plugin-name' ),
				],
			]
		);

		$this->add_control(
			'blog_show_date',
			[
				'label' => esc_html__( 'Show Date?', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'your-plugin' ),
				'label_off' => esc_html__( 'Hide', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'blog_show_author',
			[
				'label' => esc_html__( 'Show Author?', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'your-plugin' ),
				'label_off' => esc_html__( 'Hide', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'blog_show_excerpt',
			[
				'label' => esc_html__( 'Show Content?', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'your-plugin' ),
				'label_off' => esc_html__( 'Hide', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'blog_show_btn',
			[
				'label' => esc_html__( 'Show Button?', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'your-plugin' ),
				'label_off' => esc_html__( 'Hide', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);


		
        $this->end_controls_section();

		$this->start_controls_section(
			'style_section',
			[
				'label' => esc_html__( 'Style', 'elementor-addon-halim' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'section_subheading_style',
			[
				'label' => esc_html__( 'Section Subheading', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'section_subheading_typography',
				'selector' => '{{WRAPPER}} .section-title h3 span',
			]
		);

		$this->add_control(
			'section_subheading_color',
			[
				'label' => esc_html__( 'Color', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .section-title h3 span' => 'color: {{VALUE}}',
				],
				'default' => '#333'
			]
		);

		$this->add_control(
			'section_heading_style',
			[
				'label' => esc_html__( 'Section Heading', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'section_heading_typography',
				'selector' => '{{WRAPPER}} .section-title h3',
			]
		);

		$this->add_control(
			'section_heading_color',
			[
				'label' => esc_html__( 'Color', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .section-title h3' => 'color: {{VALUE}}',
				],
				'default' => '#333'
			]
		);

		$this->add_control(
			'section_desc_style',
			[
				'label' => esc_html__( 'Section Description', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'section_desc_typography',
				'selector' => '{{WRAPPER}} .section-title p',
			]
		);

		$this->add_control(
			'section_desc_color',
			[
				'label' => esc_html__( 'Color', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .section-title p' => 'color: {{VALUE}}',
				],
				'default' => '#333'
			]
		);


		$this->add_control(
			'section_border_style',
			[
				'label' => esc_html__( 'Border', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'section_border_color',
			[
				'label' => esc_html__( 'Border Color', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .section-title::before, .section-title::after' => 'background-color: {{VALUE}}',
				],
				'default' => '#635cdb'
			]
		);

		$this->end_controls_section();

    }

    protected function render() {
        $settings = $this->get_settings_for_display();
		$blog_column = $settings['blog_column'];
		$blog_posts = $settings['blog_posts'];
		$blog_order = $settings['blog_order'];
		$blog_orderby = $settings['blog_orderby'];
		$blog_date = $settings['blog_show_date'];
		$blog_author = $settings['blog_show_author'];
		$blog_excerpt = $settings['blog_show_excerpt'];
		$blog_button = $settings['blog_show_btn'];

		if($blog_column == 'col-md-4') {
			$blog_column = 'col-md-4';
		} elseif($blog_column == 'col-md-6'){
			$blog_column = 'col-md-6';
		} elseif($blog_column == 'col-md-3'){ 
			$blog_column = ' col-md-3';			
		}
	?>
		<div class="row">
			<?php
				$args = [
					'post_type' => 'post',
					'posts_per_page' => $blog_posts,
					'order' => $blog_order,
					'orderby' => $blog_orderby
				];
				$query = new WP_Query($args);
				while($query->have_posts()) {
					$query->the_post();
				?>
				<div class="<?php echo $blog_column;?>">
					<div class="single-blog">
						<img src="<?php the_post_thumbnail_url();?>" alt="<?php the_title();?>">
						<div class="post-content">
							<div class="post-title">
							<h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
							</div>
							<div class="pots-meta">
							<ul>
								<?php
									if($blog_date == 'yes') {
								?>
									<li><?php the_date();?></li>
								<?php
									}
								?>

								<?php
									if($blog_author == 'yes') {
								?>
									<li><?php the_author();?></li>
								<?php
									}
								?>
							</ul>
							</div>
							<?php if($blog_excerpt == 'yes') {the_excerpt();}?>
							
							<?php
								if($blog_button == 'yes') {
							?>
								<a href="<?php the_permalink();?>" class="box-btn">read more <i class="fa fa-angle-double-right"></i></a>
							<?php
								}
							?>
						</div>
					</div>
				</div>
				<?php
				}
				wp_reset_postdata();
			?>
			
		</div>
	<?php
    }
}
