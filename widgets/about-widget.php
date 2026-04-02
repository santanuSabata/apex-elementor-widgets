<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class Apex_About_Widget extends \Elementor\Widget_Base {

    // ── Identity ───────────────────────────────────────────────────
    public function get_name()       { return 'apex_about'; }
    public function get_title()      { return __( 'Apex About', 'apex-widgets' ); }
    public function get_icon()       { return 'eicon-info-box'; }
    public function get_categories() { return [ 'apex-widgets' ]; }
    public function get_keywords()   { return [ 'apex', 'about', 'features', 'checklist' ]; }

    // ── Controls ───────────────────────────────────────────────────
    protected function register_controls() {

        // ── TAB: CONTENT ──────────────────────────────────────────

        // Visual Panel — Big Number
        $this->start_controls_section( 'section_visual', [
            'label' => __( 'Visual Panel', 'apex-widgets' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);
            $this->add_control( 'big_number', [
                'label'   => __( 'Animated Number', 'apex-widgets' ),
                'type'    => \Elementor\Controls_Manager::NUMBER,
                'default' => 17,
                'description' => __( 'Counter animates up to this value on scroll.', 'apex-widgets' ),
            ]);
            $this->add_control( 'big_number_suffix', [
                'label'   => __( 'Number Suffix', 'apex-widgets' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => '+',
                'description' => __( 'Appended after the number, e.g. + or %', 'apex-widgets' ),
            ]);
            $this->add_control( 'visual_caption', [
                'label'       => __( 'Caption Below Number', 'apex-widgets' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => __( 'Years of Excellence in Financial Advisory', 'apex-widgets' ),
                'label_block' => true,
            ]);
            $this->add_control( 'visual_bg_image', [
                'label'   => __( 'Panel Background Image (optional)', 'apex-widgets' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [ 'url' => '' ],
                'description' => __( 'Replaces the default background colour if set.', 'apex-widgets' ),
            ]);
            $this->add_control( 'animation_class', [
                'label'        => __( 'Fade-Up Animation', 'apex-widgets' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => __( 'On', 'apex-widgets' ),
                'label_off'    => __( 'Off', 'apex-widgets' ),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]);
        $this->end_controls_section();

        // Content — Heading
        $this->start_controls_section( 'section_heading', [
            'label' => __( 'Section Heading', 'apex-widgets' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);
            $this->add_control( 'section_label', [
                'label'   => __( 'Section Label', 'apex-widgets' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Why Apex', 'apex-widgets' ),
            ]);
            $this->add_control( 'section_title', [
                'label'       => __( 'Title', 'apex-widgets' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => __( 'Built on Trust, Driven by Performance', 'apex-widgets' ),
                'label_block' => true,
            ]);
            $this->add_control( 'section_description', [
                'label'   => __( 'Description', 'apex-widgets' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Our team of seasoned financial experts combines deep market insight with a client-first philosophy to deliver measurable outcomes.', 'apex-widgets' ),
                'rows'    => 4,
            ]);
        $this->end_controls_section();

        // Features Repeater
        $this->start_controls_section( 'section_features', [
            'label' => __( 'Feature Items', 'apex-widgets' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);
            $this->add_control( 'check_icon', [
                'label'   => __( 'Check Icon', 'apex-widgets' ),
                'type'    => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value'   => 'fas fa-check',
                    'library' => 'fa-solid',
                ],
                'description' => __( 'Shared icon for all feature items.', 'apex-widgets' ),
            ]);

            $repeater = new \Elementor\Repeater();

            $repeater->add_control( 'feature_title', [
                'label'       => __( 'Title', 'apex-widgets' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => __( 'Feature Title', 'apex-widgets' ),
                'label_block' => true,
            ]);
            $repeater->add_control( 'feature_description', [
                'label'   => __( 'Description', 'apex-widgets' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Feature description goes here.', 'apex-widgets' ),
                'rows'    => 3,
            ]);

            $this->add_control( 'features_list', [
                'label'   => __( 'Features', 'apex-widgets' ),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'feature_title'       => __( 'Fiduciary Standard', 'apex-widgets' ),
                        'feature_description' => __( 'We always act in your best interest — no conflicts, no hidden fees.', 'apex-widgets' ),
                    ],
                    [
                        'feature_title'       => __( 'Data-Driven Decisions', 'apex-widgets' ),
                        'feature_description' => __( 'Proprietary analytics and research power every recommendation we make.', 'apex-widgets' ),
                    ],
                    [
                        'feature_title'       => __( 'Dedicated Advisors', 'apex-widgets' ),
                        'feature_description' => __( 'A named advisor available around the clock — not a call center.', 'apex-widgets' ),
                    ],
                ],
                'title_field' => '{{{ feature_title }}}',
            ]);
        $this->end_controls_section();

        // ── TAB: STYLE ────────────────────────────────────────────

        // Visual Panel Style
        $this->start_controls_section( 'style_visual', [
            'label' => __( 'Visual Panel', 'apex-widgets' ),
            'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
        ]);
            $this->add_control( 'visual_bg_color', [
                'label'     => __( 'Background Color', 'apex-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [ '{{WRAPPER}} .about-visual' => 'background-color: {{VALUE}};' ],
            ]);
            $this->add_group_control( \Elementor\Group_Control_Border::get_type(), [
                'name'     => 'visual_border',
                'label'    => __( 'Border', 'apex-widgets' ),
                'selector' => '{{WRAPPER}} .about-visual',
            ]);
            $this->add_group_control( \Elementor\Group_Control_Box_Shadow::get_type(), [
                'name'     => 'visual_shadow',
                'label'    => __( 'Box Shadow', 'apex-widgets' ),
                'selector' => '{{WRAPPER}} .about-visual',
            ]);
            $this->add_control( 'big_number_color', [
                'label'     => __( 'Number Color', 'apex-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [ '{{WRAPPER}} .big-number' => 'color: {{VALUE}};' ],
            ]);
            $this->add_group_control( \Elementor\Group_Control_Typography::get_type(), [
                'name'     => 'big_number_typography',
                'label'    => __( 'Number Typography', 'apex-widgets' ),
                'selector' => '{{WRAPPER}} .big-number',
            ]);
            $this->add_control( 'visual_caption_color', [
                'label'     => __( 'Caption Color', 'apex-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [ '{{WRAPPER}} .about-visual-inner p' => 'color: {{VALUE}};' ],
            ]);
            $this->add_group_control( \Elementor\Group_Control_Typography::get_type(), [
                'name'     => 'visual_caption_typography',
                'label'    => __( 'Caption Typography', 'apex-widgets' ),
                'selector' => '{{WRAPPER}} .about-visual-inner p',
            ]);
        $this->end_controls_section();

        // Section Heading Style
        $this->start_controls_section( 'style_heading', [
            'label' => __( 'Section Heading', 'apex-widgets' ),
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
                'selectors' => [ '{{WRAPPER}} .about-content h2' => 'color: {{VALUE}};' ],
            ]);
            $this->add_group_control( \Elementor\Group_Control_Typography::get_type(), [
                'name'     => 'title_typography',
                'label'    => __( 'Title Typography', 'apex-widgets' ),
                'selector' => '{{WRAPPER}} .about-content h2',
            ]);
            $this->add_control( 'desc_color', [
                'label'     => __( 'Description Color', 'apex-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [ '{{WRAPPER}} .about-content > p' => 'color: {{VALUE}};' ],
            ]);
            $this->add_group_control( \Elementor\Group_Control_Typography::get_type(), [
                'name'     => 'desc_typography',
                'label'    => __( 'Description Typography', 'apex-widgets' ),
                'selector' => '{{WRAPPER}} .about-content > p',
            ]);
        $this->end_controls_section();

        // Check Icon Style
        $this->start_controls_section( 'style_check', [
            'label' => __( 'Check Icon', 'apex-widgets' ),
            'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
        ]);
            $this->add_control( 'check_color', [
                'label'     => __( 'Icon Color', 'apex-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [ '{{WRAPPER}} .check i, {{WRAPPER}} .check svg' => 'color: {{VALUE}}; fill: {{VALUE}};' ],
            ]);
            $this->add_control( 'check_bg', [
                'label'     => __( 'Icon Background', 'apex-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [ '{{WRAPPER}} .check' => 'background-color: {{VALUE}};' ],
            ]);
            $this->add_control( 'check_size', [
                'label'      => __( 'Icon Size', 'apex-widgets' ),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range'      => [ 'px' => [ 'min' => 10, 'max' => 48 ] ],
                'selectors'  => [ '{{WRAPPER}} .check i, {{WRAPPER}} .check svg' => 'font-size: {{SIZE}}{{UNIT}};' ],
            ]);
            $this->add_control( 'check_border_radius', [
                'label'      => __( 'Border Radius', 'apex-widgets' ),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range'      => [ 'px' => [ 'min' => 0, 'max' => 50 ], '%' => [ 'min' => 0, 'max' => 100 ] ],
                'selectors'  => [ '{{WRAPPER}} .check' => 'border-radius: {{SIZE}}{{UNIT}};' ],
            ]);
        $this->end_controls_section();

        // Feature Text Style
        $this->start_controls_section( 'style_feature_text', [
            'label' => __( 'Feature Text', 'apex-widgets' ),
            'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
        ]);
            $this->add_control( 'feature_title_color', [
                'label'     => __( 'Title Color', 'apex-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [ '{{WRAPPER}} .about-feature h4' => 'color: {{VALUE}};' ],
            ]);
            $this->add_group_control( \Elementor\Group_Control_Typography::get_type(), [
                'name'     => 'feature_title_typography',
                'label'    => __( 'Title Typography', 'apex-widgets' ),
                'selector' => '{{WRAPPER}} .about-feature h4',
            ]);
            $this->add_control( 'feature_desc_color', [
                'label'     => __( 'Description Color', 'apex-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [ '{{WRAPPER}} .about-feature p' => 'color: {{VALUE}};' ],
            ]);
            $this->add_group_control( \Elementor\Group_Control_Typography::get_type(), [
                'name'     => 'feature_desc_typography',
                'label'    => __( 'Description Typography', 'apex-widgets' ),
                'selector' => '{{WRAPPER}} .about-feature p',
            ]);
            $this->add_control( 'feature_gap', [
                'label'      => __( 'Gap Between Items', 'apex-widgets' ),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'rem' ],
                'range'      => [ 'px' => [ 'min' => 0, 'max' => 60 ] ],
                'default'    => [ 'unit' => 'px', 'size' => 24 ],
                'selectors'  => [ '{{WRAPPER}} .about-features' => 'gap: {{SIZE}}{{UNIT}};' ],
            ]);
        $this->end_controls_section();
    }

    // ── Render ─────────────────────────────────────────────────────
    protected function render() {
        $s          = $this->get_settings_for_display();
        $fade_class = ( 'yes' === $s['animation_class'] ) ? ' fade-up' : '';

        // Optional background image inline style
        $bg_style = '';
        if ( ! empty( $s['visual_bg_image']['url'] ) ) {
            $bg_style = ' style="background-image: url(' . esc_url( $s['visual_bg_image']['url'] ) . '); background-size: cover; background-position: center;"';
        }
        ?>
        <section class="about" id="about">
            <div class="container">

                <!-- Visual Panel -->
                <div class="about-visual<?php echo esc_attr( $fade_class ); ?>"<?php echo $bg_style; ?>>
                    <div class="about-visual-inner">
                        <div class="big-number"
                            data-target="<?php echo esc_attr( $s['big_number'] ); ?>"
                            data-suffix="<?php echo esc_attr( $s['big_number_suffix'] ); ?>">
                            0
                        </div>
                        <?php if ( ! empty( $s['visual_caption'] ) ) : ?>
                            <p><?php echo esc_html( $s['visual_caption'] ); ?></p>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Content Panel -->
                <div class="about-content<?php echo esc_attr( $fade_class ); ?>">

                    <?php if ( ! empty( $s['section_label'] ) ) : ?>
                        <span class="section-label"><?php echo esc_html( $s['section_label'] ); ?></span>
                    <?php endif; ?>

                    <?php if ( ! empty( $s['section_title'] ) ) : ?>
                        <h2><?php echo esc_html( $s['section_title'] ); ?></h2>
                    <?php endif; ?>

                    <?php if ( ! empty( $s['section_description'] ) ) : ?>
                        <p><?php echo esc_html( $s['section_description'] ); ?></p>
                    <?php endif; ?>

                    <!-- Feature Items -->
                    <?php if ( ! empty( $s['features_list'] ) ) : ?>
                        <div class="about-features">
                            <?php foreach ( $s['features_list'] as $item ) : ?>
                                <div class="about-feature">
                                    <div class="check">
                                        <?php \Elementor\Icons_Manager::render_icon(
                                            $s['check_icon'],
                                            [ 'aria-hidden' => 'true' ]
                                        ); ?>
                                    </div>
                                    <div>
                                        <?php if ( ! empty( $item['feature_title'] ) ) : ?>
                                            <h4><?php echo esc_html( $item['feature_title'] ); ?></h4>
                                        <?php endif; ?>
                                        <?php if ( ! empty( $item['feature_description'] ) ) : ?>
                                            <p><?php echo esc_html( $item['feature_description'] ); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                </div>

            </div>
        </section>
        <?php
    }
}