<?php

class Elementor_Team_Widget extends \Elementor\Widget_Base {

    public function get_name() {
		return 'team_widget';
	}

	public function get_title() {
		return esc_html__( 'Team Widget', 'elementor-addon-halim' );
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
		return [ 'team'];
	}

    protected function register_controls(){

        $this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'elementor-addon-halim' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		// Team Image
		$this->add_control(
			'team_image',
			[
				'label' => esc_html__( 'Choose Image', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		// Team Name
		$this->add_control(
			'team_name',
			[
				'label' => esc_html__( 'Name', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'john doe', 'elementor-addon-halim' ),
				'placeholder' => esc_html__( 'Type your team name', 'elementor-addon-halim' ),
				'label_block' => true,
				'separator' => 'before'
			]
		);

		// Team Designation
		$this->add_control(
			'team_designation',
			[
				'label' => esc_html__( 'Designation', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'web developer', 'elementor-addon-halim' ),
				'placeholder' => esc_html__( 'Type your team designation', 'elementor-addon-halim' ),
				'label_block' => true,
				'separator' => 'before'
			]
		);

		// Team Socials Show/Hide
		$this->add_control(
			'show_team_socials',
			[
				'label' => esc_html__( 'Show Socials?', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'your-plugin' ),
				'label_off' => esc_html__( 'Hide', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$repeater = new \Elementor\Repeater();


		$repeater->add_control(
			'team_icon_name',
			[
				'label' => esc_html__( 'Name', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'john doe', 'elementor-addon-halim' ),
				'placeholder' => esc_html__( 'Type your team name', 'elementor-addon-halim' ),
				'label_block' => true,
				'separator' => 'before'
			]
		);

		$repeater->add_control(
			'team_icon', [
				'label' => esc_html__( 'Icon', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'solid',
				],
			]
		);

		$repeater->add_control(
			'team_link', [
				'label' => esc_html__( 'Link', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'elementor-addon-halim' ),
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					'custom_attributes' => '',
				],
			]
		);

		$this->add_control(
			'team_socials',
			[
				'label' => esc_html__( 'Team Social List', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ team_icon_name }}}',
				'condition' => [
					'show_team_socials' => 'yes'
				]
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
		$team_image = $settings['team_image'];
		$team_name = $settings['team_name'];
		$team_designation = $settings['team_designation'];
		$team_socials = $settings['team_socials'];
	?>
		<div class="single-team">
			<img src="<?php echo $team_image['url'];?>" alt="<?php echo $team_name;?>">
			<div class="team-hover">
			<div class="team-content">
				<h4><?php echo $team_name;?> <span><?php echo $team_designation;?></span></h4>
				<?php
					if($team_socials) {
				?>
					<ul>
						<?php
							foreach($team_socials as $social) {
						?>
							<li><a href="<?php echo $social['team_link']['url'];?>"><i class="<?php echo $social['team_icon']['value'];?>"></i></a></li>
						<?php
							}
						?>
					</ul>
				<?php
					}
				?>
			</div>
			</div>
		</div>
	<?php
    }
}
