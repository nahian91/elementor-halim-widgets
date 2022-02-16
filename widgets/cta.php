<?php

class Elementor_CTA_Widget extends \Elementor\Widget_Base {

    public function get_name() {
		return 'cta_widget';
	}

	public function get_title() {
		return esc_html__( 'CTA Widget', 'elementor-addon-halim' );
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
		return [ 'cta' ];
	}

    protected function register_controls(){

        $this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'elementor-addon-halim' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'cta_title',
			[
				'label' => esc_html__( 'CTA Title', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'best solution for your business ', 'elementor-addon-halim' ),
				'placeholder' => esc_html__( 'Type your title here', 'elementor-addon-halim' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'cta_description',
			[
				'label' => esc_html__( 'CTA Description', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'the can be used on larger scale projectss as well as small scale projectss', 'elementor-addon-halim' ),
				'placeholder' => esc_html__( 'Type your description here', 'elementor-addon-halim' ),
				'label_block' => true,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'cta_btn_text',
			[
				'label' => esc_html__( 'Button Text', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Contact Us', 'elementor-addon-halim' ),
				'placeholder' => esc_html__( 'Type your btn text here', 'elementor-addon-halim' ),
				'label_block' => true,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'cta_btn_url',
			[
				'label' => esc_html__( 'Link', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'elementor-addon-halim' ),
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					'custom_attributes' => '',
				],
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
			'cta_title_style',
			[
				'label' => esc_html__( 'CTA Title', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'cta_title_typography',
				'selector' => '{{WRAPPER}} .elementor-section.cta h4',
			]
		);

		$this->add_control(
			'cta_title_color',
			[
				'label' => esc_html__( 'Color', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cta h4' => 'color: {{VALUE}}',
				],
				'default' => '#fff'
			]
		);

		$this->add_control(
			'cta_desc_style',
			[
				'label' => esc_html__( 'CTA Description', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'cta_desc_typography',
				'selector' => '{{WRAPPER}} .cta h4 span',
			]
		);

		$this->add_control(
			'cta_desc_color',
			[
				'label' => esc_html__( 'Color', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cta h4 span' => 'color: {{VALUE}}',
				],
				'default' => '#fff'
			]
		);

		$this->add_control(
			'cta_btn_style',
			[
				'label' => esc_html__( 'CTA Button', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'cta_btn_typography',
				'selector' => '{{WRAPPER}} .cta a.box-btn',
			]
		);

		$this->add_control(
			'cta_btn_color',
			[
				'label' => esc_html__( 'Color', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cta a.box-btn' => 'color: {{VALUE}}',
				],
				'default' => '#fff'
			]
		);

		$this->add_control(
			'cta_btn_background',
			[
				'label' => esc_html__( 'Background Color', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cta a.box-btn' => 'background-color: {{VALUE}}',
				],
				'default' => '#635cdb'
			]
		);

		$this->end_controls_section();

    }

    protected function render() {
        $settings = $this->get_settings_for_display();
		$cta_title = $settings['cta_title'];
		$cta_description = $settings['cta_description'];
		$cta_btn_text = $settings['cta_btn_text'];
		$cta_btn_url = $settings['cta_btn_url'];
	?>
		<div class="row cta">
			<div class="col-md-6">
				<h4><?php echo $cta_title;?> <span><?php echo $cta_description;?></span></h4>
			</div>
			<div class="col-md-6 text-center">
				<a href="<?php echo $cta_btn_url['url'];?>" class="box-btn"><?php echo $cta_btn_text;?> <i class="fa fa-angle-double-right"></i></a>
			</div>
		</div>
	<?php
    }
}
