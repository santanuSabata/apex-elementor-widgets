<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class Apex_Testimonials_Widget extends \Elementor\Widget_Base {

    // ── Identity ───────────────────────────────────────────────────
    public function get_name()       { return 'apex_testimonials'; }
    public function get_title()      { return __( 'Apex Testimonials', 'apex-widgets' ); }
    public function get_icon()       { return 'eicon-testimonial-carousel'; }
    public function get_categories() { return [ 'apex-widgets' ]; }
    public function get_keywords()   { return [ 'apex', 'testimonials', 'reviews', 'quotes', 'clients' ]; }

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
                'default' => __( 'Client Stories', 'apex-widgets' ),
            ]);
            $this->add_control( 'section_title', [
                'label'       => __( 'Title', 'apex-widgets' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => __( 'What Our Clients Say', 'apex-widgets' ),
                'label_block' => true,
            ]);
            $this->add_control( 'section_description', [
                'label'   => __( 'Description', 'apex-widgets' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Real results from real partnerships.', 'apex-widgets' ),
                'rows'    => 2,
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

        // Testimonials Repeater
        $this->start_controls_section( 'section_cards', [
            'label' => __( 'Testimonial Cards', 'apex-widgets' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);

            // Star rating control (shared default for all cards)
            $this->add_control( 'stars_count', [
                'label'   => __( 'Star Rating (all cards)', 'apex-widgets' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => '5',
                'options' => [
                    '1' => '★',
                    '2' => '★ ★',
                    '3' => '★ ★ ★',
                    '4' => '★ ★ ★ ★',
                    '5' => '★ ★ ★ ★ ★',
                ],
                'description' => __( 'Applies to all cards. Override per card below.', 'apex-widgets' ),
            ]);

            $repeater = new \Elementor\Repeater();

            // Quote
            $repeater->add_control( 'quote', [
                'label'       => __( 'Quote', 'apex-widgets' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => __( 'Client testimonial goes here.', 'apex-widgets' ),
                'rows'        => 4,
                'label_block' => true,
            ]);

            // Per-card star override
            $repeater->add_control( 'stars_override', [
                'label'   => __( 'Star Rating Override', 'apex-widgets' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'default',
                'options' => [
                    'default' => __( 'Use global setting', 'apex-widgets' ),
                    '1'       => '★',
                    '2'       => '★ ★',
                    '3'       => '★ ★ ★',
                    '4'       => '★ ★ ★ ★',
                    '5'       => '★ ★ ★ ★ ★',
                ],
            ]);

            // Avatar — type switcher
            $repeater->add_control( 'avatar_type', [
                'label'   => __( 'Avatar Type', 'apex-widgets' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'initials',
                'options' => [
                    'initials' => __( 'Initials', 'apex-widgets' ),
                    'image'    => __( 'Photo', 'apex-widgets' ),
                ],
                'separator' => 'before',
            ]);
            $repeater->add_control( 'avatar_initials', [
                'label'     => __( 'Initials', 'apex-widgets' ),
                'type'      => \Elementor\Controls_Manager::TEXT,
                'default'   => 'AB',
                'condition' => [ 'avatar_type' => 'initials' ],
                'description' => __( '2 letters, e.g. JR', 'apex-widgets' ),
            ]);
            $repeater->add_control( 'avatar_image', [
                'label'     => __( 'Photo', 'apex-widgets' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [ 'url' => '' ],
                'condition' => [ 'avatar_type' => 'image' ],
            ]);

            // Author details
            $repeater->add_control( 'author_name', [
                'label'       => __( 'Name', 'apex-widgets' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => __( 'Client Name', 'apex-widgets' ),
                'label_block' => true,
                'separator'   => 'before',
            ]);
            $repeater->add_control( 'author_role', [
                'label'       => __( 'Role / Company', 'apex-widgets' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => __( 'CEO, Company Name', 'apex-widgets' ),
                'label_block' => true,
            ]);

            $this->add_control( 'testimonials_list', [
                'label'   => __( 'Testimonials', 'apex-widgets' ),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'quote'           => __( 'Apex transformed our company\'s financial trajectory. Their strategic insight helped us secure $40M in growth capital.', 'apex-widgets' ),
                        'avatar_type'     => 'initials',
                        'avatar_initials' => 'JR',
                        'author_name'     => 'James Robertson',
                        'author_role'     => 'CEO, Vantage Dynamics',
                        'stars_override'  => 'default',
                    ],
                    [
                        'quote'           => __( 'Their wealth management team protected our portfolio through volatile markets with remarkable composure and returns.', 'apex-widgets' ),
                        'avatar_type'     => 'initials',
                        'avatar_initials' => 'SK',
                        'author_name'     => 'Sarah Kim',
                        'author_role'     => 'Private Client',
                        'stars_override'  => 'default',
                    ],
                    [
                        'quote'           => __( 'Professional, transparent, and genuinely invested in our success. Apex is the gold standard in financial advisory.', 'apex-widgets' ),
                        'avatar_type'     => 'initials',
                        'avatar_initials' => 'MT',
                        'author_name'     => 'Michael Torres',
                        'author_role'     => 'CFO, Meridian Group',
                        'stars_override'  => 'default',
                    ],
                ],
                'title_field' => '{{{ author_name }}} — {{{ author_role }}}',
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
                ],
                'selectors' => [
                    '{{WRAPPER}} .testimonials-grid' => 'grid-template-columns: repeat({{VALUE}}, 1fr);',
                ],
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
        $this->start_controls_section( 'style_card', [
            'label' => __( 'Testimonial Card', 'apex-widgets' ),
            'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
        ]);
            $this->add_control( 'card_bg', [
                'label'     => __( 'Background Color', 'apex-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [ '{{WRAPPER}} .testimonial-card' => 'background-color: {{VALUE}};' ],
            ]);
            $this->add_group_control( \Elementor\Group_Control_Border::get_type(), [
                'name'     => 'card_border',
                'label'    => __( 'Border', 'apex-widgets' ),
                'selector' => '{{WRAPPER}} .testimonial-card',
            ]);
            $this->add_control( 'card_border_radius', [
                'label'      => __( 'Border Radius', 'apex-widgets' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-card' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]);
            $this->add_group_control( \Elementor\Group_Control_Box_Shadow::get_type(), [
                'name'     => 'card_shadow',
                'label'    => __( 'Box Shadow', 'apex-widgets' ),
                'selector' => '{{WRAPPER}} .testimonial-card',
            ]);
            $this->add_control( 'card_padding', [
                'label'      => __( 'Card Padding', 'apex-widgets' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', 'rem' ],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]);
        $this->end_controls_section();

        // Stars Style
        $this->start_controls_section( 'style_stars', [
            'label' => __( 'Stars', 'apex-widgets' ),
            'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
        ]);
            $this->add_control( 'stars_color', [
                'label'     => __( 'Star Color', 'apex-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [ '{{WRAPPER}} .stars' => 'color: {{VALUE}};' ],
            ]);
            $this->add_control( 'stars_size', [
                'label'      => __( 'Star Size', 'apex-widgets' ),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'em' ],
                'range'      => [ 'px' => [ 'min' => 10, 'max' => 40 ] ],
                'selectors'  => [ '{{WRAPPER}} .stars' => 'font-size: {{SIZE}}{{UNIT}};' ],
            ]);
            $this->add_control( 'stars_spacing', [
                'label'      => __( 'Bottom Spacing', 'apex-widgets' ),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range'      => [ 'px' => [ 'min' => 0, 'max' => 40 ] ],
                'selectors'  => [ '{{WRAPPER}} .stars' => 'margin-bottom: {{SIZE}}{{UNIT}};' ],
            ]);
        $this->end_controls_section();

        // Quote Style
        $this->start_controls_section( 'style_quote', [
            'label' => __( 'Quote Text', 'apex-widgets' ),
            'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
        ]);
            $this->add_control( 'quote_color', [
                'label'     => __( 'Text Color', 'apex-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [ '{{WRAPPER}} blockquote' => 'color: {{VALUE}};' ],
            ]);
            $this->add_group_control( \Elementor\Group_Control_Typography::get_type(), [
                'name'     => 'quote_typography',
                'label'    => __( 'Typography', 'apex-widgets' ),
                'selector' => '{{WRAPPER}} blockquote',
            ]);
            $this->add_control( 'quote_border_color', [
                'label'     => __( 'Left Border Color', 'apex-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [ '{{WRAPPER}} blockquote' => 'border-left-color: {{VALUE}};' ],
            ]);
        $this->end_controls_section();

        // Avatar Style
        $this->start_controls_section( 'style_avatar', [
            'label' => __( 'Avatar', 'apex-widgets' ),
            'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
        ]);
            $this->add_control( 'avatar_bg', [
                'label'     => __( 'Background Color', 'apex-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [ '{{WRAPPER}} .testimonial-avatar' => 'background-color: {{VALUE}};' ],
            ]);
            $this->add_control( 'avatar_text_color', [
                'label'     => __( 'Initials Color', 'apex-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [ '{{WRAPPER}} .testimonial-avatar' => 'color: {{VALUE}};' ],
            ]);
            $this->add_group_control( \Elementor\Group_Control_Typography::get_type(), [
                'name'     => 'avatar_typography',
                'label'    => __( 'Initials Typography', 'apex-widgets' ),
                'selector' => '{{WRAPPER}} .testimonial-avatar',
            ]);
            $this->add_control( 'avatar_size', [
                'label'      => __( 'Avatar Size', 'apex-widgets' ),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range'      => [ 'px' => [ 'min' => 32, 'max' => 100 ] ],
                'default'    => [ 'unit' => 'px', 'size' => 48 ],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-avatar' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}; min-width: {{SIZE}}{{UNIT}};',
                ],
            ]);
            $this->add_control( 'avatar_radius', [
                'label'      => __( 'Border Radius', 'apex-widgets' ),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'default'    => [ 'unit' => '%', 'size' => 50 ],
                'selectors'  => [ '{{WRAPPER}} .testimonial-avatar' => 'border-radius: {{SIZE}}{{UNIT}};' ],
            ]);
        $this->end_controls_section();

        // Author Text Style
        $this->start_controls_section( 'style_author', [
            'label' => __( 'Author Text', 'apex-widgets' ),
            'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
        ]);
            $this->add_control( 'author_name_color', [
                'label'     => __( 'Name Color', 'apex-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [ '{{WRAPPER}} .testimonial-author .name' => 'color: {{VALUE}};' ],
            ]);
            $this->add_group_control( \Elementor\Group_Control_Typography::get_type(), [
                'name'     => 'author_name_typography',
                'label'    => __( 'Name Typography', 'apex-widgets' ),
                'selector' => '{{WRAPPER}} .testimonial-author .name',
            ]);
            $this->add_control( 'author_role_color', [
                'label'     => __( 'Role Color', 'apex-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [ '{{WRAPPER}} .testimonial-author .role' => 'color: {{VALUE}};' ],
            ]);
            $this->add_group_control( \Elementor\Group_Control_Typography::get_type(), [
                'name'     => 'author_role_typography',
                'label'    => __( 'Role Typography', 'apex-widgets' ),
                'selector' => '{{WRAPPER}} .testimonial-author .role',
            ]);
        $this->end_controls_section();
    }

    // ── Helpers ────────────────────────────────────────────────────
    private function get_stars( $count ) {
        $map = [ '1'=>'★','2'=>'★ ★','3'=>'★ ★ ★','4'=>'★ ★ ★ ★','5'=>'★ ★ ★ ★ ★' ];
        return $map[ $count ] ?? '★ ★ ★ ★ ★';
    }

    // ── Render ─────────────────────────────────────────────────────
    protected function render() {
        $s          = $this->get_settings_for_display();
        $fade_class = ( 'yes' === $s['animation_class'] ) ? ' fade-up' : '';
        ?>
        <section class="testimonials" id="testimonials">
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

                <div class="testimonials-grid">
                    <?php foreach ( $s['testimonials_list'] as $item ) :

                        // Resolve stars — per-card override wins, else global
                        $stars = ( isset( $item['stars_override'] ) && $item['stars_override'] !== 'default' )
                            ? $this->get_stars( $item['stars_override'] )
                            : $this->get_stars( $s['stars_count'] );
                    ?>
                        <div class="testimonial-card<?php echo esc_attr( $fade_class ); ?>">

                            <div class="stars"><?php echo esc_html( $stars ); ?></div>

                            <blockquote>
                                "<?php echo esc_html( $item['quote'] ); ?>"
                            </blockquote>

                            <div class="testimonial-author">

                                <div class="testimonial-avatar">
                                    <?php if ( $item['avatar_type'] === 'image' && ! empty( $item['avatar_image']['url'] ) ) : ?>
                                        <img
                                            src="<?php echo esc_url( $item['avatar_image']['url'] ); ?>"
                                            alt="<?php echo esc_attr( $item['author_name'] ); ?>"
                                            style="width:100%;height:100%;object-fit:cover;border-radius:inherit;"
                                            loading="lazy"
                                        />
                                    <?php else : ?>
                                        <?php echo esc_html( strtoupper( substr( $item['avatar_initials'], 0, 2 ) ) ); ?>
                                    <?php endif; ?>
                                </div>

                                <div>
                                    <div class="name"><?php echo esc_html( $item['author_name'] ); ?></div>
                                    <div class="role"><?php echo esc_html( $item['author_role'] ); ?></div>
                                </div>

                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>
        </section>
        <?php
    }
}