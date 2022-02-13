<?php

class Elementor_Faq_Skills_Widget extends \Elementor\Widget_Base {

    public function get_name() {
		return 'faq_skills_widget';
	}

	public function get_title() {
		return esc_html__( 'FAQ & Skills Widget', 'elementor-addon-halim' );
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
		return [ 'faq', 'skills' ];
	}

    protected function register_controls(){

        $this->start_controls_section(
			'faq_section',
			[
				'label' => esc_html__( 'FAQ Content', 'elementor-addon-halim' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		// FAQ Title
		$this->add_control(
			'faq_title',
			[
				'label' => esc_html__( 'FAQ Title', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'FAQ', 'elementor-addon-halim' ),
				'placeholder' => esc_html__( 'Type your title here', 'elementor-addon-halim' ),
				'label_block' => true,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'faq_accordion_title', [
				'label' => esc_html__( 'Accordion Title', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Accordion Title' , 'plugin-name' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'faq_accordion_desc', [
				'label' => esc_html__( 'Accordion Description', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => esc_html__( 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch.' , 'plugin-name' ),
				'show_label' => false,
			]
		);

		$this->add_control(
			'faq_lists',
			[
				'label' => esc_html__( 'FAQ Lists', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'faq_accordion_title' => esc_html__( 'Title #1', 'plugin-name' ),
						'faq_accordion_desc' => esc_html__( 'Item content. Click the edit button to change this text.', 'plugin-name' ),
					],
					[
						'faq_accordion_title' => esc_html__( 'Title #2', 'plugin-name' ),
						'faq_accordion_desc' => esc_html__( 'Item content. Click the edit button to change this text.', 'plugin-name' ),
					],
				],
				'title_field' => '{{{ faq_accordion_title }}}',
			]
		);
		
        $this->end_controls_section();

		$this->start_controls_section(
			'skills_section',
			[
				'label' => esc_html__( 'Skills Content', 'elementor-addon-halim' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		// Skills Title
		$this->add_control(
			'skills_title',
			[
				'label' => esc_html__( 'Skills Title', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Our SKILLS', 'elementor-addon-halim' ),
				'placeholder' => esc_html__( 'Type your title here', 'elementor-addon-halim' ),
				'label_block' => true,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'skill_list_title', [
				'label' => esc_html__( 'Skill List Title', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'HTML5' , 'plugin-name' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'skill_list_number', [
				'label' => esc_html__( 'Skill List Percentage', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 80,
				'label_block' => true,
			]
		);

		$this->add_control(
			'skill_lists',
			[
				'label' => esc_html__( 'Skill Lists', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'skill_list_title' => esc_html__( 'HTMl5', 'plugin-name' ),
						'skill_list_number' => 80,
					],
				],
				'title_field' => '{{{ skill_list_title }}}',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'faq_style_section',
			[
				'label' => esc_html__( 'FAQ Style', 'elementor-addon-halim' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'faq_title_style',
			[
				'label' => esc_html__( 'FAQ Title', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'faq_title_typography',
				'selector' => '{{WRAPPER}} .page-title h4',
			]
		);

		$this->add_control(
			'faq_title_color',
			[
				'label' => esc_html__( 'Color', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .page-title h4' => 'color: {{VALUE}}',
				],
				'default' => '#fff'
			]
		);

		$this->add_control(
			'faq_title_border',
			[
				'label' => esc_html__( 'Border Color', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .page-title h4::before' => 'background-color: {{VALUE}}',
				],
				'default' => '#635cdb'
			]
		);

		$this->add_control(
			'faq_accordion_title_style',
			[
				'label' => esc_html__( 'FAQ Accordion Title', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'faq_accordion_title_typography',
				'selector' => '{{WRAPPER}} .card-header h5 button',
			]
		);

		$this->add_control(
			'faq_accordion_title_color',
			[
				'label' => esc_html__( 'Color', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .card-header h5 button' => 'color: {{VALUE}}',
				],
				'default' => '#333'
			]
		);

		$this->add_control(
			'faq_accordion_title_background',
			[
				'label' => esc_html__( 'Background Color', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .card-header' => 'background-color: {{VALUE}}',
				],
				'default' => '#635cdb'
			]
		);

		$this->add_control(
			'faq_accordion_desc_style',
			[
				'label' => esc_html__( 'FAQ Accordion Description', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'faq_accordion_desc_typography',
				'selector' => '{{WRAPPER}} .card-body',
			]
		);

		$this->add_control(
			'faq_accordion_desc_color',
			[
				'label' => esc_html__( 'Color', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .card-body' => 'color: {{VALUE}}',
				],
				'default' => '#333'
			]
		);

		$this->add_control(
			'faq_accordion_desc_background',
			[
				'label' => esc_html__( 'Background Color', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .card-body' => 'background-color: {{VALUE}}',
				],
				'default' => '#fff'
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'skills_style_section',
			[
				'label' => esc_html__( 'Skills Style', 'elementor-addon-halim' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'skill_title_style',
			[
				'label' => esc_html__( 'Skill Title', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'skill_title_typography',
				'selector' => '{{WRAPPER}} .page-title.skill h4',
			]
		);

		$this->add_control(
			'skill_title_color',
			[
				'label' => esc_html__( 'Color', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .page-title.skill h4' => 'color: {{VALUE}}',
				],
				'default' => '#fff'
			]
		);

		$this->add_control(
			'skill_title_border',
			[
				'label' => esc_html__( 'Border Color', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .page-title.skill h4::before' => 'background-color: {{VALUE}}',
				],
				'default' => '#635cdb'
			]
		);

		$this->add_control(
			'skill_list_style',
			[
				'label' => esc_html__( 'Skill Lists', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'skill_list_title_typography',
				'selector' => '{{WRAPPER}} .single-skill h4',
			]
		);

		$this->add_control(
			'skill_list_title_color',
			[
				'label' => esc_html__( 'Color', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-skill h4' => 'color: {{VALUE}}',
				],
				'default' => '#fff'
			]
		);

		$this->add_control(
			'skill_list_per_color',
			[
				'label' => esc_html__( 'Percentage Color', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .progress-bar' => 'color: {{VALUE}}',
				],
				'default' => '#fff'
			]
		);

		$this->add_control(
			'skill_list_per_background',
			[
				'label' => esc_html__( 'Percentage Background', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .progress-bar' => 'background-color: {{VALUE}}',
				],
				'default' => '#635cdb'
			]
		);

		$this->end_controls_section();

    }

    protected function render() {
        $settings = $this->get_settings_for_display();
		$faq_title = $settings['faq_title'];
		$faq_lists = $settings['faq_lists'];
		$skills_title = $settings['skills_title'];
		$skill_lists = $settings['skill_lists'];
	?>
		<div class="row">
			<div class="col-md-6">
				<div class="faq">
					<div class="page-title">
					<h4><?php echo $faq_title;?></h4>
					</div>
					<div class="accordion" id="accordionExample">

						<?php
							$i = 0;
							foreach($faq_lists as $faq_list) {
							$i++;
						?>
						<div class="card">
							<div class="card-header" id="heading-<?php echo $i;?>">
								<h5 class="mb-0">
									<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-<?php echo $i;?>" aria-expanded="true" aria-controls="collapseOne">
									<?php echo $faq_list['faq_accordion_title'];?>
									</button>
								</h5>
							</div>
							<div id="collapse-<?php echo $i;?>" class="collapse <?php if($i==1) {echo 'show';} ?>" aria-labelledby="headingOne" data-parent="#accordionExample">
								<div class="card-body">
									<?php echo $faq_list['faq_accordion_desc'];?>
								</div>
							</div>
						</div>
						<?php
							}
						?>
						
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="skills">
					<div class="page-title skill">
						<h4><?php echo $skills_title;?></h4>
					</div>
					<?php
						foreach($skill_lists as $skill_list) {
					?>
						<div class="single-skill">
							<h4><?php echo $skill_list['skill_list_title'];?></h4>
							<div class="progress-bar" role="progressbar" style="width: <?php echo $skill_list['skill_list_number'];?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $skill_list['skill_list_number'];?>%</div>
						</div>
					<?php
						}
					?>
				</div>
			</div>
		</div>
	<?php
    }
}
