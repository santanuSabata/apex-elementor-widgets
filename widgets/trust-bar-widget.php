<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class Apex_Trust_Bar_Widget extends \Elementor\Widget_Base {

    // ── Identity ───────────────────────────────────────────────────
    public function get_name()       { return 'apex_trust_bar'; }
    public function get_title()      { return __( 'Apex Trust Bar', 'apex-widgets' ); }
    public function get_icon()       { return 'eicon-apps'; }
    public function get_categories() { return [ 'apex-widgets' ]; }
    public function get_keywords()   { return [ 'apex', 'trust', 'logos', 'clients', 'partners', 'bar' ]; }

    // ── Controls ───────────────────────────────────────────────────
    protected function register_controls() {

        // ── TAB: CONTENT ──────────────────────────────────────────

        // Intro Text
        $this->start_controls_section( 'section_intro', [
            'label' => __( 'Intro Text', 'apex-widgets' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);
            $this->add_control( 'intro_text', [
                'label'   => __( 'Label', 'apex-widgets' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Trusted by industry leaders', 'apex-widgets' ),
                'label_block' => true,
            ]);
            $this->add_control( 'intro_show', [
                'label'        => __( 'Show Label', 'apex-widgets' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => __( 'Show', 'apex-widgets' ),
                'label_off'    => __( 'Hide', 'apex-widgets' ),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]);
        $this->end_controls_section();

        // Logos Repeater
        $this->start_controls_section( 'section_logos', [
            'label' => __( 'Logos / Names', 'apex-widgets' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);

            $this->add_control( 'logo_type', [
                'label'   => __( 'Display Type', 'apex-widgets' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'text',
                'options' => [
                    'text'  => __( 'Text Names', 'apex-widgets' ),
                    'image' => __( 'Image Logos', 'apex-widgets' ),
                ],
                'description' => __( 'Switch between text names or uploaded logo images.', 'apex-widgets' ),
            ]);

            $repeater = new \Elementor\Repeater();

            // Text name
            $repeater->add_control( 'logo_name', [
                'label'       => __( 'Company Name', 'apex-widgets' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => __( 'Company Name', 'apex-widgets' ),
                'label_block' => true,
                'condition'   => [ 'logo_type' => 'text' ],
            ]);

            // Image logo
            $repeater->add_control( 'logo_image', [
                'label'     => __( 'Logo Image', 'apex-widgets' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [ 'url' => '' ],
                'condition' => [ 'logo_type' => 'image' ],
            ]);

            $repeater->add_control( 'logo_image_alt', [
                'label'     => __( 'Image Alt Text', 'apex-widgets' ),
                'type'      => \Elementor\Controls_Manager::TEXT,
                'default'   => __( 'Partner logo', 'apex-widgets' ),
                'condition' => [ 'logo_type' => 'image' ],
            ]);

            // Optional link for both types
            $repeater->add_control( 'logo_link', [
                'label'       => __( 'Link (optional)', 'apex-widgets' ),
                'type'        => \Elementor\Controls_Manager::URL,
                'placeholder' => 'https://...',
                'default'     => [ 'url' => '' ],
            ]);

            $this->add_control( 'logos_list', [
                'label'       => __( 'Entries', 'apex-widgets' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [ 'logo_name' => 'Morgan & Co.'     ],
                    [ 'logo_name' => 'Vantage Capital'  ],
                    [ 'logo_name' => 'Meridian Group'   ],
                    [ 'logo_name' => 'Atlas Holdings'   ],
                    [ 'logo_name' => 'Pinnacle Wealth'  ],
                ],
                'title_field' => '{{{ logo_name || logo_image_alt }}}',
            ]);

        $this->end_controls_section();

        // Layout
        $this->start_controls_section( 'section_layout', [
            'label' => __( 'Layout', 'apex-widgets' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);
            $this->add_control( 'layout_direction', [
                'label'   => __( 'Direction', 'apex-widgets' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'row',
                'options' => [
                    'row'    => __( 'Horizontal (row)', 'apex-widgets' ),
                    'column' => __( 'Vertical (column)', 'apex-widgets' ),
                ],
                'selectors' => [
                    '{{WRAPPER}} .trust-logos' => 'flex-direction: {{VALUE}};',
                ],
            ]);
            $this->add_control( 'layout_justify', [
                'label'   => __( 'Alignment', 'apex-widgets' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'center',
                'options' => [
                    'flex-start' => __( 'Left', 'apex-widgets' ),
                    'center'     => __( 'Center', 'apex-widgets' ),
                    'flex-end'   => __( 'Right', 'apex-widgets' ),
                    'space-between' => __( 'Space Between', 'apex-widgets' ),
                    'space-around'  => __( 'Space Around', 'apex-widgets' ),
                ],
                'selectors' => [
                    '{{WRAPPER}} .trust-logos' => 'justify-content: {{VALUE}};',
                ],
            ]);
            $this->add_control( 'logo_gap', [
                'label'      => __( 'Gap Between Items', 'apex-widgets' ),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'rem' ],
                'range'      => [ 'px' => [ 'min' => 0, 'max' => 100 ] ],
                'default'    => [ 'unit' => 'px', 'size' => 40 ],
                'selectors'  => [
                    '{{WRAPPER}} .trust-logos' => 'gap: {{SIZE}}{{UNIT}};',
                ],
            ]);
        $this->end_controls_section();

        // ── TAB: STYLE ────────────────────────────────────────────

        // Section Background
        $this->start_controls_section( 'style_section', [
            'label' => __( 'Section', 'apex-widgets' ),
            'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
        ]);
            $this->add_control( 'section_bg', [
                'label'     => __( 'Background Color', 'apex-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [ '{{WRAPPER}} .trust-bar' => 'background-color: {{VALUE}};' ],
            ]);
            $this->add_control( 'section_padding', [
                'label'      => __( 'Padding', 'apex-widgets' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', 'rem' ],
                'selectors'  => [
                    '{{WRAPPER}} .trust-bar' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]);
        $this->end_controls_section();

        // Intro Text Style
        $this->start_controls_section( 'style_intro', [
            'label'     => __( 'Intro Text', 'apex-widgets' ),
            'tab'       => \Elementor\Controls_Manager::TAB_STYLE,
            'condition' => [ 'intro_show' => 'yes' ],
        ]);
            $this->add_control( 'intro_color', [
                'label'     => __( 'Text Color', 'apex-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [ '{{WRAPPER}} .trust-bar > .container > p' => 'color: {{VALUE}};' ],
            ]);
            $this->add_group_control( \Elementor\Group_Control_Typography::get_type(), [
                'name'     => 'intro_typography',
                'label'    => __( 'Typography', 'apex-widgets' ),
                'selector' => '{{WRAPPER}} .trust-bar > .container > p',
            ]);
            $this->add_control( 'intro_spacing', [
                'label'      => __( 'Bottom Spacing', 'apex-widgets' ),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'rem' ],
                'range'      => [ 'px' => [ 'min' => 0, 'max' => 60 ] ],
                'selectors'  => [
                    '{{WRAPPER}} .trust-bar > .container > p' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]);
        $this->end_controls_section();

        // Text Names Style
        $this->start_controls_section( 'style_text_logos', [
            'label'     => __( 'Text Names', 'apex-widgets' ),
            'tab'       => \Elementor\Controls_Manager::TAB_STYLE,
            'condition' => [ 'logo_type' => 'text' ],
        ]);
            $this->add_control( 'logo_text_color', [
                'label'     => __( 'Text Color', 'apex-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [ '{{WRAPPER}} .trust-logos span, {{WRAPPER}} .trust-logos a' => 'color: {{VALUE}};' ],
            ]);
            $this->add_control( 'logo_text_hover_color', [
                'label'     => __( 'Hover Color', 'apex-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [ '{{WRAPPER}} .trust-logos a:hover' => 'color: {{VALUE}};' ],
            ]);
            $this->add_group_control( \Elementor\Group_Control_Typography::get_type(), [
                'name'     => 'logo_text_typography',
                'label'    => __( 'Typography', 'apex-widgets' ),
                'selector' => '{{WRAPPER}} .trust-logos span, {{WRAPPER}} .trust-logos a',
            ]);
            $this->add_control( 'divider_heading', [
                'label'     => __( 'Divider Between Items', 'apex-widgets' ),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]);
            $this->add_control( 'show_divider', [
                'label'        => __( 'Show Divider', 'apex-widgets' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => __( 'Yes', 'apex-widgets' ),
                'label_off'    => __( 'No', 'apex-widgets' ),
                'return_value' => 'yes',
                'default'      => 'no',
            ]);
            $this->add_control( 'divider_color', [
                'label'     => __( 'Divider Color', 'apex-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'condition' => [ 'show_divider' => 'yes' ],
                'selectors' => [
                    '{{WRAPPER}} .trust-logos span:not(:last-child)::after,
                     {{WRAPPER}} .trust-logos a:not(:last-child)::after' => 'background-color: {{VALUE}};',
                ],
            ]);
        $this->end_controls_section();

        // Image Logos Style
        $this->start_controls_section( 'style_image_logos', [
            'label'     => __( 'Image Logos', 'apex-widgets' ),
            'tab'       => \Elementor\Controls_Manager::TAB_STYLE,
            'condition' => [ 'logo_type' => 'image' ],
        ]);
            $this->add_control( 'image_max_height', [
                'label'      => __( 'Max Height', 'apex-widgets' ),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range'      => [ 'px' => [ 'min' => 20, 'max' => 120 ] ],
                'default'    => [ 'unit' => 'px', 'size' => 40 ],
                'selectors'  => [
                    '{{WRAPPER}} .trust-logos img' => 'max-height: {{SIZE}}{{UNIT}}; width: auto;',
                ],
            ]);
            $this->add_control( 'image_opacity', [
                'label'      => __( 'Opacity', 'apex-widgets' ),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'range'      => [ 'px' => [ 'min' => 0.1, 'max' => 1, 'step' => 0.05 ] ],
                'default'    => [ 'size' => 0.6 ],
                'selectors'  => [ '{{WRAPPER}} .trust-logos img' => 'opacity: {{SIZE}};' ],
            ]);
            $this->add_control( 'image_hover_opacity', [
                'label'      => __( 'Hover Opacity', 'apex-widgets' ),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'range'      => [ 'px' => [ 'min' => 0.1, 'max' => 1, 'step' => 0.05 ] ],
                'default'    => [ 'size' => 1 ],
                'selectors'  => [ '{{WRAPPER}} .trust-logos img:hover' => 'opacity: {{SIZE}};' ],
            ]);
            $this->add_control( 'image_grayscale', [
                'label'        => __( 'Grayscale', 'apex-widgets' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => __( 'Yes', 'apex-widgets' ),
                'label_off'    => __( 'No', 'apex-widgets' ),
                'return_value' => 'yes',
                'default'      => 'no',
                'selectors'    => [
                    '{{WRAPPER}} .trust-logos img' => 'filter: grayscale(100%);',
                ],
            ]);
        $this->end_controls_section();
    }

    // ── Render ─────────────────────────────────────────────────────
    protected function render() {
        $s          = $this->get_settings_for_display();
        $logo_type  = $s['logo_type'];
        $show_divider = ( 'yes' === ( $s['show_divider'] ?? 'no' ) );
        ?>
        <section class="trust-bar">
            <div class="container">

                <?php if ( 'yes' === $s['intro_show'] && ! empty( $s['intro_text'] ) ) : ?>
                    <p><?php echo esc_html( $s['intro_text'] ); ?></p>
                <?php endif; ?>

                <div class="trust-logos">
                    <?php foreach ( $s['logos_list'] as $index => $item ) :
                        $has_link    = ! empty( $item['logo_link']['url'] );
                        $is_external = ! empty( $item['logo_link']['is_external'] );
                        $tag         = $has_link ? 'a' : 'span';
                        $link_attrs  = $has_link
                            ? ' href="' . esc_url( $item['logo_link']['url'] ) . '"'
                              . ( $is_external ? ' target="_blank" rel="noopener noreferrer"' : '' )
                            : '';

                        // Divider pseudo-element via inline style (only text mode)
                        $divider_style = ( $show_divider && $logo_type === 'text' )
                            ? ' style="display:inline-flex;align-items:center;"'
                            : '';
                    ?>
                        <<?php echo $tag; ?><?php echo $link_attrs . $divider_style; ?>>

                            <?php if ( $logo_type === 'image' && ! empty( $item['logo_image']['url'] ) ) : ?>
                                <img
                                    src="<?php echo esc_url( $item['logo_image']['url'] ); ?>"
                                    alt="<?php echo esc_attr( $item['logo_image_alt'] ?? '' ); ?>"
                                    loading="lazy"
                                />
                            <?php else : ?>
                                <?php echo esc_html( $item['logo_name'] ); ?>
                            <?php endif; ?>

                        </<?php echo $tag; ?>>
                    <?php endforeach; ?>
                </div>

            </div>
        </section>
        <?php
    }
}