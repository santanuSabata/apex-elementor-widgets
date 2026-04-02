<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class Apex_Services_Widget extends \Elementor\Widget_Base {

    // ── Identity ───────────────────────────────────────────────────
    public function get_name()       { return 'apex_services'; }
    public function get_title()      { return __( 'Apex Services', 'apex-widgets' ); }
    public function get_icon()       { return 'eicon-services'; }
    public function get_categories() { return [ 'apex-widgets' ]; }
    public function get_keywords()   { return [ 'apex', 'services', 'cards', 'grid' ]; }

    // ── Controls ───────────────────────────────────────────────────
    protected function register_controls() {

        // ── TAB: CONTENT ──────────────────────────────────────────

        // Section Header
        $this->start_controls_section( 'section_header', [
            'label' => __( 'Section Header', 'apex-widgets' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);
            $this->add_control( 'section_label', [
                'label'   => __( 'Section Label', 'apex-widgets' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'What We Do', 'apex-widgets' ),
                'description' => __( 'Small label above the heading.', 'apex-widgets' ),
            ]);
            $this->add_control( 'section_title', [
                'label'       => __( 'Section Title', 'apex-widgets' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => __( 'Comprehensive Financial Solutions', 'apex-widgets' ),
                'label_block' => true,
            ]);
            $this->add_control( 'section_description', [
                'label'   => __( 'Section Description', 'apex-widgets' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Tailored strategies to navigate complexity and unlock growth at every stage.', 'apex-widgets' ),
                'rows'    => 3,
            ]);
        $this->end_controls_section();

        // Services Repeater
        $this->start_controls_section( 'section_cards', [
            'label' => __( 'Service Cards', 'apex-widgets' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);

            $repeater = new \Elementor\Repeater();

            $repeater->add_control( 'card_icon', [
                'label'   => __( 'Icon', 'apex-widgets' ),
                'type'    => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value'   => 'fas fa-chart-line',
                    'library' => 'fa-solid',
                ],
                'description' => __( 'Choose from the icon library or paste a Font Awesome class.', 'apex-widgets' ),
            ]);
            $repeater->add_control( 'card_title', [
                'label'       => __( 'Title', 'apex-widgets' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => __( 'Service Title', 'apex-widgets' ),
                'label_block' => true,
            ]);
            $repeater->add_control( 'card_description', [
                'label'   => __( 'Description', 'apex-widgets' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Service description goes here.', 'apex-widgets' ),
                'rows'    => 4,
            ]);
            $repeater->add_control( 'card_link', [
                'label'       => __( 'Card Link (optional)', 'apex-widgets' ),
                'type'        => \Elementor\Controls_Manager::URL,
                'placeholder' => 'https://...',
                'default'     => [ 'url' => '' ],
            ]);

            $this->add_control( 'services_list', [
                'label'       => __( 'Services', 'apex-widgets' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [
                        'card_icon'        => [ 'value' => 'fas fa-chart-line', 'library' => 'fa-solid' ],
                        'card_title'       => __( 'Wealth Management', 'apex-widgets' ),
                        'card_description' => __( 'Personalized portfolio strategies designed to preserve and grow your wealth across market cycles with disciplined risk management.', 'apex-widgets' ),
                    ],
                    [
                        'card_icon'        => [ 'value' => 'fas fa-building', 'library' => 'fa-solid' ],
                        'card_title'       => __( 'Corporate Advisory', 'apex-widgets' ),
                        'card_description' => __( 'Strategic guidance for M&A, restructuring, and capital markets to maximize enterprise value and accelerate transformation.', 'apex-widgets' ),
                    ],
                    [
                        'card_icon'        => [ 'value' => 'fas fa-shield-halved', 'library' => 'fa-solid' ],
                        'card_title'       => __( 'Risk & Compliance', 'apex-widgets' ),
                        'card_description' => __( 'Proactive frameworks to identify, assess, and mitigate financial risks while ensuring full regulatory compliance.', 'apex-widgets' ),
                    ],
                    [
                        'card_icon'        => [ 'value' => 'fas fa-hand-holding-dollar', 'library' => 'fa-solid' ],
                        'card_title'       => __( 'Tax Strategy', 'apex-widgets' ),
                        'card_description' => __( 'Sophisticated tax planning structures that minimize liability and optimize after-tax returns for individuals and entities.', 'apex-widgets' ),
                    ],
                    [
                        'card_icon'        => [ 'value' => 'fas fa-seedling', 'library' => 'fa-solid' ],
                        'card_title'       => __( 'Retirement Planning', 'apex-widgets' ),
                        'card_description' => __( 'Goal-oriented retirement solutions ensuring financial independence and legacy preservation for generations ahead.', 'apex-widgets' ),
                    ],
                    [
                        'card_icon'        => [ 'value' => 'fas fa-globe', 'library' => 'fa-solid' ],
                        'card_title'       => __( 'International Finance', 'apex-widgets' ),
                        'card_description' => __( 'Cross-border financial structuring and global investment strategies for multi-jurisdictional portfolios.', 'apex-widgets' ),
                    ],
                ],
                'title_field' => '{{{ card_title }}}',
            ]);

        $this->end_controls_section();

        // Layout
        $this->start_controls_section( 'section_layout', [
            'label' => __( 'Layout', 'apex-widgets' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);
            $this->add_control( 'columns', [
                'label'   => __( 'Columns', 'apex-widgets' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => '3',
                'options' => [
                    '1' => __( '1 Column', 'apex-widgets' ),
                    '2' => __( '2 Columns', 'apex-widgets' ),
                    '3' => __( '3 Columns', 'apex-widgets' ),
                    '4' => __( '4 Columns', 'apex-widgets' ),
                ],
                'selectors' => [
                    '{{WRAPPER}} .services-grid' => 'grid-template-columns: repeat({{VALUE}}, 1fr);',
                ],
            ]);
            $this->add_control( 'animation_class', [
                'label'        => __( 'Enable Fade-Up Animation', 'apex-widgets' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => __( 'Yes', 'apex-widgets' ),
                'label_off'    => __( 'No', 'apex-widgets' ),
                'return_value' => 'yes',
                'default'      => 'yes',
                'description'  => __( 'Adds the fade-up class your theme JS already handles.', 'apex-widgets' ),
            ]);
        $this->end_controls_section();

        // ── TAB: STYLE ────────────────────────────────────────────

        // Section Header Style
        $this->start_controls_section( 'style_header', [
            'label' => __( 'Section Header', 'apex-widgets' ),
            'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
        ]);
            $this->add_control( 'label_color', [
                'label'     => __( 'Label Color', 'apex-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [ '{{WRAPPER}} .section-label' => 'color: {{VALUE}};' ],
            ]);
            $this->add_group_control( \Elementor\Group_Control_Typography::get_type(), [
                'name'     => 'label_typography',
                'label'    => __( 'Label Typography', 'apex-widgets' ),
                'selector' => '{{WRAPPER}} .section-label',
            ]);
            $this->add_control( 'title_color', [
                'label'     => __( 'Title Color', 'apex-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [ '{{WRAPPER}} .section-header h2' => 'color: {{VALUE}};' ],
            ]);
            $this->add_group_control( \Elementor\Group_Control_Typography::get_type(), [
                'name'     => 'title_typography',
                'label'    => __( 'Title Typography', 'apex-widgets' ),
                'selector' => '{{WRAPPER}} .section-header h2',
            ]);
            $this->add_control( 'desc_color', [
                'label'     => __( 'Description Color', 'apex-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [ '{{WRAPPER}} .section-header p' => 'color: {{VALUE}};' ],
            ]);
            $this->add_group_control( \Elementor\Group_Control_Typography::get_type(), [
                'name'     => 'desc_typography',
                'label'    => __( 'Description Typography', 'apex-widgets' ),
                'selector' => '{{WRAPPER}} .section-header p',
            ]);
        $this->end_controls_section();

        // Card Style
        $this->start_controls_section( 'style_cards', [
            'label' => __( 'Service Cards', 'apex-widgets' ),
            'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
        ]);
            $this->add_control( 'card_bg', [
                'label'     => __( 'Card Background', 'apex-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [ '{{WRAPPER}} .service-card' => 'background-color: {{VALUE}};' ],
            ]);
            $this->add_group_control( \Elementor\Group_Control_Border::get_type(), [
                'name'     => 'card_border',
                'label'    => __( 'Card Border', 'apex-widgets' ),
                'selector' => '{{WRAPPER}} .service-card',
            ]);
            $this->add_control( 'card_border_radius', [
                'label'      => __( 'Border Radius', 'apex-widgets' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .service-card' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]);
            $this->add_group_control( \Elementor\Group_Control_Box_Shadow::get_type(), [
                'name'     => 'card_shadow',
                'label'    => __( 'Card Shadow', 'apex-widgets' ),
                'selector' => '{{WRAPPER}} .service-card',
            ]);
        $this->end_controls_section();

        // Icon Style
        $this->start_controls_section( 'style_icon', [
            'label' => __( 'Card Icon', 'apex-widgets' ),
            'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
        ]);
            $this->add_control( 'icon_color', [
                'label'     => __( 'Icon Color', 'apex-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [ '{{WRAPPER}} .service-icon i' => 'color: {{VALUE}};' ],
            ]);
            $this->add_control( 'icon_bg', [
                'label'     => __( 'Icon Background', 'apex-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [ '{{WRAPPER}} .service-icon' => 'background-color: {{VALUE}};' ],
            ]);
            $this->add_control( 'icon_size', [
                'label'      => __( 'Icon Size', 'apex-widgets' ),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range'      => [ 'px' => [ 'min' => 12, 'max' => 80 ] ],
                'selectors'  => [ '{{WRAPPER}} .service-icon i' => 'font-size: {{SIZE}}{{UNIT}};' ],
            ]);
        $this->end_controls_section();

        // Card Text Style
        $this->start_controls_section( 'style_card_text', [
            'label' => __( 'Card Text', 'apex-widgets' ),
            'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
        ]);
            $this->add_control( 'card_title_color', [
                'label'     => __( 'Card Title Color', 'apex-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [ '{{WRAPPER}} .service-card h3' => 'color: {{VALUE}};' ],
            ]);
            $this->add_group_control( \Elementor\Group_Control_Typography::get_type(), [
                'name'     => 'card_title_typography',
                'label'    => __( 'Card Title Typography', 'apex-widgets' ),
                'selector' => '{{WRAPPER}} .service-card h3',
            ]);
            $this->add_control( 'card_desc_color', [
                'label'     => __( 'Card Description Color', 'apex-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [ '{{WRAPPER}} .service-card p' => 'color: {{VALUE}};' ],
            ]);
            $this->add_group_control( \Elementor\Group_Control_Typography::get_type(), [
                'name'     => 'card_desc_typography',
                'label'    => __( 'Card Description Typography', 'apex-widgets' ),
                'selector' => '{{WRAPPER}} .service-card p',
            ]);
        $this->end_controls_section();
    }

    // ── Render ─────────────────────────────────────────────────────
    protected function render() {
        $s         = $this->get_settings_for_display();
        $fade_class = ( 'yes' === $s['animation_class'] ) ? ' fade-up' : '';
        ?>
        <section class="services" id="services">
            <div class="container">

                <div class="section-header<?php echo esc_attr( $fade_class ); ?>">
                    <?php if ( ! empty( $s['section_label'] ) ) : ?>
                        <span class="section-label"><?php echo esc_html( $s['section_label'] ); ?></span>
                    <?php endif; ?>
                    <?php if ( ! empty( $s['section_title'] ) ) : ?>
                        <h2><?php echo esc_html( $s['section_title'] ); ?></h2>
                    <?php endif; ?>
                    <?php if ( ! empty( $s['section_description'] ) ) : ?>
                        <p><?php echo esc_html( $s['section_description'] ); ?></p>
                    <?php endif; ?>
                </div>

                <div class="services-grid">
                    <?php foreach ( $s['services_list'] as $item ) :
                        $has_link = ! empty( $item['card_link']['url'] );
                        $tag      = $has_link ? 'a' : 'div';
                        $link_attr = $has_link
                            ? 'href="' . esc_url( $item['card_link']['url'] ) . '"'
                              . ( $item['card_link']['is_external'] ? ' target="_blank" rel="noopener noreferrer"' : '' )
                            : '';
                    ?>
                        <<?php echo $tag; ?> class="service-card<?php echo esc_attr( $fade_class ); ?>" <?php echo $link_attr; ?>>
                            <div class="service-icon">
                                <?php \Elementor\Icons_Manager::render_icon( $item['card_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                            </div>
                            <h3><?php echo esc_html( $item['card_title'] ); ?></h3>
                            <p><?php echo esc_html( $item['card_description'] ); ?></p>
                        </<?php echo $tag; ?>>
                    <?php endforeach; ?>
                </div>

            </div>
        </section>
        <?php
    }
}