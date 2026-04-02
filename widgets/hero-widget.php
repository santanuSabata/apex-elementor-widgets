<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class Apex_Hero_Widget extends \Elementor\Widget_Base {

    // ── Identity ───────────────────────────────────────────────────
    public function get_name()       { return 'apex_hero'; }
    public function get_title()      { return __( 'Apex Hero', 'apex-widgets' ); }
    public function get_icon()       { return 'eicon-home-page'; }
    public function get_categories() { return [ 'apex-widgets' ]; }
    public function get_keywords()   { return [ 'apex', 'hero', 'banner', 'headline' ]; }

    // ── Controls ───────────────────────────────────────────────────
    protected function register_controls() {

        // ── TAB: CONTENT ──────────────────────────────────────────

        // Badge
        $this->start_controls_section( 'section_badge', [
            'label' => __( 'Badge', 'apex-widgets' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);
            $this->add_control( 'badge_text', [
                'label'   => __( 'Badge Text', 'apex-widgets' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Trusted Since 2008', 'apex-widgets' ),
            ]);
            $this->add_control( 'badge_show', [
                'label'        => __( 'Show Badge', 'apex-widgets' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => __( 'Show', 'apex-widgets' ),
                'label_off'    => __( 'Hide', 'apex-widgets' ),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]);
        $this->end_controls_section();

        // Headline
        $this->start_controls_section( 'section_headline', [
            'label' => __( 'Headline', 'apex-widgets' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);
            $this->add_control( 'headline_main', [
                'label'   => __( 'Headline — Main Text', 'apex-widgets' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Financial Strategy', 'apex-widgets' ),
                'label_block' => true,
            ]);
            $this->add_control( 'headline_accent', [
                'label'   => __( 'Headline — Accent Text', 'apex-widgets' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'That Delivers Results', 'apex-widgets' ),
                'label_block' => true,
                'description' => __( 'This part renders with the accent colour.', 'apex-widgets' ),
            ]);
            $this->add_control( 'subheadline', [
                'label'   => __( 'Subheadline / Description', 'apex-widgets' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'We partner with businesses and high-net-worth individuals to build lasting wealth through data-driven financial planning and strategic advisory.', 'apex-widgets' ),
                'rows'    => 4,
            ]);
        $this->end_controls_section();

        // Buttons
        $this->start_controls_section( 'section_buttons', [
            'label' => __( 'Buttons', 'apex-widgets' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);
            $this->add_control( 'btn_primary_text', [
                'label'   => __( 'Primary Button Text', 'apex-widgets' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Schedule a Call', 'apex-widgets' ),
            ]);
            $this->add_control( 'btn_primary_url', [
                'label'       => __( 'Primary Button URL', 'apex-widgets' ),
                'type'        => \Elementor\Controls_Manager::URL,
                'placeholder' => '#contact',
                'default'     => [ 'url' => '#contact' ],
            ]);
            $this->add_control( 'btn_outline_text', [
                'label'   => __( 'Outline Button Text', 'apex-widgets' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Our Services', 'apex-widgets' ),
            ]);
            $this->add_control( 'btn_outline_url', [
                'label'       => __( 'Outline Button URL', 'apex-widgets' ),
                'type'        => \Elementor\Controls_Manager::URL,
                'placeholder' => '#services',
                'default'     => [ 'url' => '#services' ],
            ]);
        $this->end_controls_section();

        // Stats — Repeater
        $this->start_controls_section( 'section_stats', [
            'label' => __( 'Stats Card', 'apex-widgets' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);

            $repeater = new \Elementor\Repeater();

            $repeater->add_control( 'stat_number', [
                'label'   => __( 'Number (target value)', 'apex-widgets' ),
                'type'    => \Elementor\Controls_Manager::NUMBER,
                'default' => 100,
                'description' => __( 'The animated counter counts up to this number.', 'apex-widgets' ),
            ]);
            $repeater->add_control( 'stat_suffix', [
                'label'   => __( 'Suffix', 'apex-widgets' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => '+',
                'description' => __( 'e.g.  +  /  B+  /  %', 'apex-widgets' ),
            ]);
            $repeater->add_control( 'stat_label', [
                'label'   => __( 'Label', 'apex-widgets' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Label', 'apex-widgets' ),
            ]);

            $this->add_control( 'stats_list', [
                'label'       => __( 'Stats', 'apex-widgets' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [ 'stat_number' => 500,  'stat_suffix' => '+',  'stat_label' => 'Clients Served' ],
                    [ 'stat_number' => 2,    'stat_suffix' => 'B+', 'stat_label' => 'Assets Under Advisory' ],
                    [ 'stat_number' => 97,   'stat_suffix' => '%',  'stat_label' => 'Client Retention Rate' ],
                ],
                'title_field' => '{{{ stat_number }}}{{{ stat_suffix }}} — {{{ stat_label }}}',
            ]);

        $this->end_controls_section();

        // ── TAB: STYLE ────────────────────────────────────────────

        // Badge Style
        $this->start_controls_section( 'style_badge', [
            'label'     => __( 'Badge', 'apex-widgets' ),
            'tab'       => \Elementor\Controls_Manager::TAB_STYLE,
            'condition' => [ 'badge_show' => 'yes' ],
        ]);
            $this->add_control( 'badge_color', [
                'label'     => __( 'Text Color', 'apex-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [ '{{WRAPPER}} .hero-badge' => 'color: {{VALUE}};' ],
            ]);
            $this->add_control( 'badge_bg', [
                'label'     => __( 'Background Color', 'apex-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [ '{{WRAPPER}} .hero-badge' => 'background-color: {{VALUE}};' ],
            ]);
            $this->add_group_control( \Elementor\Group_Control_Typography::get_type(), [
                'name'     => 'badge_typography',
                'label'    => __( 'Typography', 'apex-widgets' ),
                'selector' => '{{WRAPPER}} .hero-badge',
            ]);
        $this->end_controls_section();

        // Headline Style
        $this->start_controls_section( 'style_headline', [
            'label' => __( 'Headline', 'apex-widgets' ),
            'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
        ]);
            $this->add_control( 'headline_color', [
                'label'     => __( 'Headline Color', 'apex-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [ '{{WRAPPER}} .hero-content h1' => 'color: {{VALUE}};' ],
            ]);
            $this->add_control( 'accent_color', [
                'label'     => __( 'Accent Text Color', 'apex-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [ '{{WRAPPER}} .hero-content h1 .accent' => 'color: {{VALUE}};' ],
            ]);
            $this->add_group_control( \Elementor\Group_Control_Typography::get_type(), [
                'name'     => 'headline_typography',
                'label'    => __( 'Headline Typography', 'apex-widgets' ),
                'selector' => '{{WRAPPER}} .hero-content h1',
            ]);
            $this->add_control( 'subheadline_color', [
                'label'     => __( 'Subheadline Color', 'apex-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [ '{{WRAPPER}} .hero-content p' => 'color: {{VALUE}};' ],
            ]);
            $this->add_group_control( \Elementor\Group_Control_Typography::get_type(), [
                'name'     => 'subheadline_typography',
                'label'    => __( 'Subheadline Typography', 'apex-widgets' ),
                'selector' => '{{WRAPPER}} .hero-content p',
            ]);
        $this->end_controls_section();

        // Buttons Style
        $this->start_controls_section( 'style_buttons', [
            'label' => __( 'Buttons', 'apex-widgets' ),
            'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
        ]);
            $this->add_control( 'btn_primary_color', [
                'label'     => __( 'Primary — Text Color', 'apex-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [ '{{WRAPPER}} .btn-primary' => 'color: {{VALUE}};' ],
            ]);
            $this->add_control( 'btn_primary_bg', [
                'label'     => __( 'Primary — Background', 'apex-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [ '{{WRAPPER}} .btn-primary' => 'background-color: {{VALUE}};' ],
            ]);
            $this->add_control( 'btn_outline_color', [
                'label'     => __( 'Outline — Text Color', 'apex-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [ '{{WRAPPER}} .btn-outline' => 'color: {{VALUE}};' ],
            ]);
            $this->add_control( 'btn_outline_border', [
                'label'     => __( 'Outline — Border Color', 'apex-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [ '{{WRAPPER}} .btn-outline' => 'border-color: {{VALUE}};' ],
            ]);
            $this->add_group_control( \Elementor\Group_Control_Typography::get_type(), [
                'name'     => 'buttons_typography',
                'label'    => __( 'Buttons Typography', 'apex-widgets' ),
                'selector' => '{{WRAPPER}} .btn-primary, {{WRAPPER}} .btn-outline',
            ]);
        $this->end_controls_section();

        // Stats Style
        $this->start_controls_section( 'style_stats', [
            'label' => __( 'Stats Card', 'apex-widgets' ),
            'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
        ]);
            $this->add_control( 'stats_card_bg', [
                'label'     => __( 'Card Background', 'apex-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [ '{{WRAPPER}} .hero-card' => 'background-color: {{VALUE}};' ],
            ]);
            $this->add_group_control( \Elementor\Group_Control_Box_Shadow::get_type(), [
                'name'     => 'stats_card_shadow',
                'label'    => __( 'Card Shadow', 'apex-widgets' ),
                'selector' => '{{WRAPPER}} .hero-card',
            ]);
            $this->add_control( 'stat_number_color', [
                'label'     => __( 'Number Color', 'apex-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [ '{{WRAPPER}} .hero-stat .number' => 'color: {{VALUE}};' ],
            ]);
            $this->add_group_control( \Elementor\Group_Control_Typography::get_type(), [
                'name'     => 'stat_number_typography',
                'label'    => __( 'Number Typography', 'apex-widgets' ),
                'selector' => '{{WRAPPER}} .hero-stat .number',
            ]);
            $this->add_control( 'stat_label_color', [
                'label'     => __( 'Label Color', 'apex-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [ '{{WRAPPER}} .hero-stat .label' => 'color: {{VALUE}};' ],
            ]);
            $this->add_group_control( \Elementor\Group_Control_Typography::get_type(), [
                'name'     => 'stat_label_typography',
                'label'    => __( 'Label Typography', 'apex-widgets' ),
                'selector' => '{{WRAPPER}} .hero-stat .label',
            ]);
        $this->end_controls_section();
    }

    // ── Render ─────────────────────────────────────────────────────
    protected function render() {
        $s = $this->get_settings_for_display();

        $primary_url = $s['btn_primary_url']['url'] ?? '#contact';
        $outline_url = $s['btn_outline_url']['url']  ?? '#services';
        ?>
        <section class="hero" id="home">
            <div class="container">
                <div class="hero-content">

                    <?php if ( 'yes' === $s['badge_show'] && ! empty( $s['badge_text'] ) ) : ?>
                        <div class="hero-badge"><?php echo esc_html( $s['badge_text'] ); ?></div>
                    <?php endif; ?>

                    <h1>
                        <?php echo esc_html( $s['headline_main'] ); ?>
                        <?php if ( ! empty( $s['headline_accent'] ) ) : ?>
                            <span class="accent"><?php echo esc_html( $s['headline_accent'] ); ?></span>
                        <?php endif; ?>
                    </h1>

                    <?php if ( ! empty( $s['subheadline'] ) ) : ?>
                        <p><?php echo esc_html( $s['subheadline'] ); ?></p>
                    <?php endif; ?>

                    <div class="hero-buttons">
                        <?php if ( ! empty( $s['btn_primary_text'] ) ) : ?>
                            <a href="<?php echo esc_url( $primary_url ); ?>" class="btn-primary">
                                <?php echo esc_html( $s['btn_primary_text'] ); ?>
                            </a>
                        <?php endif; ?>
                        <?php if ( ! empty( $s['btn_outline_text'] ) ) : ?>
                            <a href="<?php echo esc_url( $outline_url ); ?>" class="btn-outline">
                                <?php echo esc_html( $s['btn_outline_text'] ); ?>
                            </a>
                        <?php endif; ?>
                    </div>

                </div>

                <div class="hero-visual">
                    <div class="hero-card">
                        <?php foreach ( $s['stats_list'] as $stat ) : ?>
                            <div class="hero-stat">
                                <div class="number"
                                    data-target="<?php echo esc_attr( $stat['stat_number'] ); ?>"
                                    data-suffix="<?php echo esc_attr( $stat['stat_suffix'] ); ?>">
                                    0
                                </div>
                                <div class="label"><?php echo esc_html( $stat['stat_label'] ); ?></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

            </div>
        </section>
        <?php
    }
}