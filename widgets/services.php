<?php

class Elementor_Services_Widget extends \Elementor\Widget_Base {

    public function get_name() {
		return 'services_widget';
	}

	public function get_title() {
		return esc_html__( 'Services Widget', 'elementor-addon-halim' );
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
		return [ 'services'];
	}

    protected function register_controls(){

        $this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'elementor-addon-halim' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		// Services Column
		$this->add_control(
			'services_column',
			[
				'label' => esc_html__( 'Select Column', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'columnThree',
				'options' => [
					'columnThree'  => esc_html__( '3 Column', 'elementor-addon-halim' ),
					'columnFour' => esc_html__( '4 Column', 'elementor-addon-halim' ),
					'columnTwo' => esc_html__( '2 Column', 'elementor-addon-halim' ),
				],
			]
		);

		// Services List

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'service_media_type',
			[
				'label' => esc_html__( 'Select Media Type', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'service_icon' => [
						'title' => esc_html__( 'Icon', 'elementor-addon-halim' ),
						'icon' => 'eicon-menu-bar',
					],
					'service_image' => [
						'title' => esc_html__( 'Image', 'elementor-addon-halim' ),
						'icon' => 'eicon-featured-image',
					],
					'service_number' => [
						'title' => esc_html__( 'Number', 'elementor-addon-halim' ),
						'icon' => 'eicon-number-field',
					],
				],
				'default' => 'service_icon',
				'toggle' => true,
				'separator' => 'before'
			]
		);

		$repeater->add_control(
			'service_icon', [
				'label' => esc_html__( 'Icon', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'solid',
				],
				'condition' => [
					'service_media_type' => 'service_icon'
				]
			]
		);

		$repeater->add_control(
			'service_image',
			[
				'label' => esc_html__( 'Choose Image', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'service_media_type' => 'service_image'
				]
			]
		);

		$repeater->add_control(
			'service_number', [
				'label' => esc_html__( 'Number', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 1,
				'condition' => [
					'service_media_type' => 'service_number'
				]
			],
			
		);

		$repeater->add_control(
			'service_title', [
				'label' => esc_html__( 'Title', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Web Design', 'elementor-addon-halim' ),
				'label_block' => true,
			],
			
		);

		$repeater->add_control(
			'service_desc', [
				'label' => esc_html__( 'Description', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Lorem ipsum dummy text.', 'elementor-addon-halim' ),
				'label_block' => true,
			],
			
		);

		$this->add_control(
			'service_lists',
			[
				'label' => esc_html__( 'Services List', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ service_title }}}',
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
			'service_media_style',
			[
				'label' => esc_html__( 'Select Media Type', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'service_icon_style' => [
						'title' => esc_html__( 'Icon', 'elementor-addon-halim' ),
						'icon' => 'eicon-menu-bar',
					],
					'service_image_style' => [
						'title' => esc_html__( 'Image', 'elementor-addon-halim' ),
						'icon' => 'eicon-featured-image',
					],
					'service_number_style' => [
						'title' => esc_html__( 'Number', 'elementor-addon-halim' ),
						'icon' => 'eicon-number-field',
					],
				],
				'default' => 'service_icon',
				'toggle' => true,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'service_icon_color',
			[
				'label' => esc_html__( 'Color', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-service i' => 'color: {{VALUE}}',
				],
				'default' => '#fff',
				'condition' => [
					'service_media_style' => 'service_icon_style'
				],
				'separator' => 'before'
			]
		);

		$this->add_control(
			'service_icon_background',
			[
				'label' => esc_html__( 'Background Color', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-service i' => 'background-color: {{VALUE}}',
				],
				'default' => '#635cdb',
				'condition' => [
					'service_media_style' => 'service_icon_style'
				],
				'separator' => 'before'
			]
		);

		$this->add_control(
			'service_icon_size',
			[
				'label' => esc_html__( 'Size', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 30,
						'max' => 50,
						'step' => 5,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 30,
				],
				'selectors' => [
					'{{WRAPPER}} .single-service i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'service_media_style' => 'service_icon_style'
				],
				'separator' => 'before'
			]
		);

		$this->add_control(
			'service_icon_padding',
			[
				'label' => esc_html__( 'Padding', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .single-service i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'service_media_style' => 'service_icon_style'
				],
				'separator' => 'before'
			]
		);

		$this->add_control(
			'service_icon_radius',
			[
				'label' => esc_html__( 'Border Radius', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .single-service i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'service_media_style' => 'service_icon_style'
				],
				'separator' => 'before'
			]
		);

		$this->add_control(
			'service_image_width',
			[
				'label' => esc_html__( 'Width', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 50,
						'max' => 200,
						'step' => 5,
					],
					'%' => [
						'min' => 10,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .single-service img' => 'width: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'service_media_style' => 'service_image_style'
				],
				'separator' => 'before'
			]
		);
		

		$this->add_control(
			'service_image_height',
			[
				'label' => esc_html__( 'Height', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 50,
						'max' => 200,
						'step' => 5,
					],
					'%' => [
						'min' => 10,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .single-service img' => 'height: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'service_media_style' => 'service_image_style'
				],
				'separator' => 'before'
			]
		);

		$this->add_control(
			'service_number_size',
			[
				'label' => esc_html__( 'Size', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 5,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .single-service span' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'service_media_style' => 'service_number_style'
				],
				'separator' => 'before'
			]
		);

		$this->end_controls_section();

    }

    protected function render() {
        $settings = $this->get_settings_for_display();
		$services_column_class = $settings['services_column'];
		$service_lists = $settings['service_lists'];
		

		if($services_column_class == 'columnTwo') {
			$services_column_class = 'col-lg-6';
		} elseif($services_column_class == 'columnFour') {
			$services_column_class = 'col-lg-3';
		} else {
			$services_column_class = 'col-lg-4';
		}
	?>
		<div class="row">
			
			<?php
				foreach($service_lists as $service) {
			?>
				<div class="<?php echo $services_column_class;?>">
				<!-- Single Service -->
					<div class="single-service">

						<?php
							if(!empty($service['service_icon'])) {
						?>
							<i class="<?php echo $service['service_icon']['value'];?>"></i>
						<?php
							} elseif(!empty($service['service_image'])) {
						?>
							<img src="<?php echo $service['service_image']['url'];?>" alt="">
						<?php
							} elseif(!empty($service['service_number'])) {
						?>
							<span><?php echo $service['service_number'];?></span>
						<?php
							}
						?>
						<h4><?php echo $service['service_title'];?></h4>
						<p><?php echo $service['service_desc'];?></p>
					</div>
				</div>
			<?php
				}
			?>
		</div>
	<?php
    }
}
