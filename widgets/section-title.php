<?php

class Elementor_Section_Title_Widget extends \Elementor\Widget_Base {

    public function get_name() {
		return 'section_title_widget';
	}

	public function get_title() {
		return esc_html__( 'Section Title Widget', 'elementor-addon-halim' );
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
		return [ 'test', 'heading' ];
	}

    protected function register_controls(){

        $this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'elementor-addon-halim' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		// Section Subheading
		$this->add_control(
			'section_subheading',
			[
				'label' => esc_html__( 'Section Subheading', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'who we are?', 'elementor-addon-halim' ),
				'placeholder' => esc_html__( 'Type your subheading here', 'elementor-addon-halim' ),
				'label_block' => true,
			]
		);

		// Section Heading
		$this->add_control(
			'section_heading',
			[
				'label' => esc_html__( 'Section Heading', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'about us', 'elementor-addon-halim' ),
				'placeholder' => esc_html__( 'Type your heading here', 'elementor-addon-halim' ),
				'label_block' => true,
				'separator' => 'before'
			]
		);

		// Section Description
		$this->add_control(
			'section_desc',
			[
				'label' => esc_html__( 'Section Description', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry typesetting industry.', 'elementor-addon-halim' ),
				'placeholder' => esc_html__( 'Type your description here', 'elementor-addon-halim' ),
				'label_block' => true,
				'separator' => 'before'
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
		$section_subheading = $settings['section_subheading'];
		$section_heading = $settings['section_heading'];
		$section_desc = $settings['section_desc'];
	?>
		<div class="row section-title">
			<div class="col-md-6 text-right">
				<h3><span><?php echo $section_subheading;?></span> <?php echo $section_heading;?></h3>
			</div>
			<div class="col-md-6">
				<p><?php echo $section_desc;?></p>
			</div>
		</div>
	<?php
    }
}
