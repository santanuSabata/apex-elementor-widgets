<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class Apex_Cta_Widget extends \Elementor\Widget_Base {

    // ── Identity ───────────────────────────────────────────────────
    public function get_name()       { return 'apex_cta'; }
    public function get_title()      { return __( 'Apex CTA', 'apex-widgets' ); }
    public function get_icon()       { return 'eicon-call-to-action'; }
    public function get_categories() { return [ 'apex-widgets' ]; }
    public function get_keywords()   { return [ 'apex', 'cta', 'call to action', 'contact', 'button' ]; }

    // ── Controls ───────────────────────────────────────────────────
    protected function register_controls() {

        // ── TAB: CONTENT ──────────────────────────────────────────

        // Content
        $this->start_controls_section( 'section_content', [
            'label' => __( 'Content', 'apex-widgets' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);
            $this->add_control( 'title', [
                'label'       => __( 'Title', 'apex-widgets' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => __( 'Ready to Elevate Your Finances?', 'apex-widgets' ),
                'label_block' => true,
            ]);
            $this->add_control( 'description', [
                'label'   => __( 'Description', 'apex-widgets' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Book a complimentary strategy session with one of our senior advisors today.', 'apex-widgets' ),
                'rows'    => 3,
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

        // Button
        $this->start_controls_section( 'section_button', [
            'label' => __( 'Button', 'apex-widgets' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);
            $this->add_control( 'btn_text', [
                'label'   => __( 'Button Text', 'apex-widgets' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Get Started Now', 'apex-widgets' ),
            ]);
            $this->add_control( 'btn_type', [
                'label'   => __( 'Link Type', 'apex-widgets' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'email',
                'options' => [
                    'email'  => __( 'Email Address', 'apex-widgets' ),
                    'url'    => __( 'Custom URL', 'apex-widgets' ),
                    'anchor' => __( 'Page Anchor', 'apex-widgets' ),
                ],
            ]);
            $this->add_control( 'btn_email', [
                'label'       => __( 'Email Address', 'apex-widgets' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => 'contact@apexfinancial.com',
                'placeholder' => 'you@example.com',
                'condition'   => [ 'btn_type' => 'email' ],
            ]);
            $this->add_control( 'btn_url', [
                'label'       => __( 'Custom URL', 'apex-widgets' ),
                'type'        => \Elementor\Controls_Manager::URL,
                'placeholder' => 'https://...',
                'default'     => [ 'url' => '' ],
                'condition'   => [ 'btn_type' => 'url' ],
            ]);
            $this->add_control( 'btn_anchor', [
                'label'       => __( 'Anchor ID', 'apex-widgets' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => 'contact',
                'placeholder' => 'contact',
                'description' => __( 'Enter the section ID without the # symbol.', 'apex-widgets' ),
                'condition'   => [ 'btn_type' => 'anchor' ],
            ]);
            $this->add_control( 'btn_icon', [
                'label'   => __( 'Button Icon (optional)', 'apex-widgets' ),
                'type'    => \Elementor\Controls_Manager::ICONS,
                'default' => [ 'value' => '', 'library' => 'fa-solid' ],
            ]);
            $this->add_control( 'btn_icon_position', [
                'label'     => __( 'Icon Position', 'apex-widgets' ),
                'type'      => \Elementor\Controls_Manager::SELECT,
                'default'   => 'after',
                'options'   => [
                    'before' => __( 'Before Text', 'apex-widgets' ),
                    'after'  => __( 'After Text', 'apex-widgets' ),
                ],
                'condition' => [ 'btn_icon[value]!' => '' ],
            ]);
        $this->end_controls_section();

        // Background
        $this->start_controls_section( 'section_background', [
            'label' => __( 'Box Background', 'apex-widgets' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);
            $this->add_control( 'bg_type', [
                'label'   => __( 'Background Type', 'apex-widgets' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'color',
                'options' => [
                    'color'    => __( 'Solid Color', 'apex-widgets' ),
                    'gradient' => __( 'Gradient', 'apex-widgets' ),
                    'image'    => __( 'Image', 'apex-widgets' ),
                ],
            ]);
            $this->add_control( 'bg_color', [
                'label'     => __( 'Color', 'apex-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'condition' => [ 'bg_type' => 'color' ],
                'selectors' => [ '{{WRAPPER}} .cta-box' => 'background-color: {{VALUE}};' ],
            ]);
            $this->add_control( 'bg_gradient_start', [
                'label'     => __( 'Gradient Start', 'apex-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'condition' => [ 'bg_type' => 'gradient' ],
            ]);
            $this->add_control( 'bg_gradient_end', [
                'label'     => __( 'Gradient End', 'apex-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'condition' => [ 'bg_type' => 'gradient' ],
            ]);
            $this->add_control( 'bg_gradient_angle', [
                'label'      => __( 'Gradient Angle', 'apex-widgets' ),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'deg' ],
                'range'      => [ 'deg' => [ 'min' => 0, 'max' => 360 ] ],
                'default'    => [ 'unit' => 'deg', 'size' => 135 ],
                'condition'  => [ 'bg_type' => 'gradient' ],
            ]);
            $this->add_control( 'bg_image', [
                'label'     => __( 'Background Image', 'apex-widgets' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [ 'url' => '' ],
                'condition' => [ 'bg_type' => 'image' ],
            ]);
            $this->add_control( 'bg_overlay_color', [
                'label'     => __( 'Image Overlay Color', 'apex-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'condition' => [ 'bg_type' => 'image' ],
            ]);
        $this->end_controls_section();

        // ── TAB: STYLE ────────────────────────────────────────────

        // Box Style
        $this->start_controls_section( 'style_box', [
            'label' => __( 'CTA Box', 'apex-widgets' ),
            'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
        ]);
            $this->add_control( 'box_padding', [
                'label'      => __( 'Padding', 'apex-widgets' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', 'rem' ],
                'selectors'  => [
                    '{{WRAPPER}} .cta-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]);
            $this->add_control( 'box_border_radius', [
                'label'      => __( 'Border Radius', 'apex-widgets' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .cta-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]);
            $this->add_group_control( \Elementor\Group_Control_Border::get_type(), [
                'name'     => 'box_border',
                'label'    => __( 'Border', 'apex-widgets' ),
                'selector' => '{{WRAPPER}} .cta-box',
            ]);
            $this->add_group_control( \Elementor\Group_Control_Box_Shadow::get_type(), [
                'name'     => 'box_shadow',
                'label'    => __( 'Box Shadow', 'apex-widgets' ),
                'selector' => '{{WRAPPER}} .cta-box',
            ]);
            $this->add_control( 'content_align', [
                'label'   => __( 'Content Alignment', 'apex-widgets' ),
                'type'    => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left'   => [ 'title' => __( 'Left', 'apex-widgets' ),   'icon' => 'eicon-text-align-left' ],
                    'center' => [ 'title' => __( 'Center', 'apex-widgets' ), 'icon' => 'eicon-text-align-center' ],
                    'right'  => [ 'title' => __( 'Right', 'apex-widgets' ),  'icon' => 'eicon-text-align-right' ],
                ],
                'default'   => 'center',
                'selectors' => [ '{{WRAPPER}} .cta-box' => 'text-align: {{VALUE}};' ],
            ]);
        $this->end_controls_section();

        // Title Style
        $this->start_controls_section( 'style_title', [
            'label' => __( 'Title', 'apex-widgets' ),
            'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
        ]);
            $this->add_control( 'title_color', [
                'label'     => __( 'Color', 'apex-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [ '{{WRAPPER}} .cta-box h2' => 'color: {{VALUE}};' ],
            ]);
            $this->add_group_control( \Elementor\Group_Control_Typography::get_type(), [
                'name'     => 'title_typography',
                'label'    => __( 'Typography', 'apex-widgets' ),
                'selector' => '{{WRAPPER}} .cta-box h2',
            ]);
            $this->add_control( 'title_spacing', [
                'label'      => __( 'Bottom Spacing', 'apex-widgets' ),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range'      => [ 'px' => [ 'min' => 0, 'max' => 60 ] ],
                'selectors'  => [ '{{WRAPPER}} .cta-box h2' => 'margin-bottom: {{SIZE}}{{UNIT}};' ],
            ]);
        $this->end_controls_section();

        // Description Style
        $this->start_controls_section( 'style_description', [
            'label' => __( 'Description', 'apex-widgets' ),
            'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
        ]);
            $this->add_control( 'desc_color', [
                'label'     => __( 'Color', 'apex-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [ '{{WRAPPER}} .cta-box p' => 'color: {{VALUE}};' ],
            ]);
            $this->add_group_control( \Elementor\Group_Control_Typography::get_type(), [
                'name'     => 'desc_typography',
                'label'    => __( 'Typography', 'apex-widgets' ),
                'selector' => '{{WRAPPER}} .cta-box p',
            ]);
            $this->add_control( 'desc_spacing', [
                'label'      => __( 'Bottom Spacing', 'apex-widgets' ),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range'      => [ 'px' => [ 'min' => 0, 'max' => 60 ] ],
                'selectors'  => [ '{{WRAPPER}} .cta-box p' => 'margin-bottom: {{SIZE}}{{UNIT}};' ],
            ]);
        $this->end_controls_section();

        // Button Style
        $this->start_controls_section( 'style_button', [
            'label' => __( 'Button', 'apex-widgets' ),
            'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
        ]);
            $this->add_control( 'btn_color', [
                'label'     => __( 'Text Color', 'apex-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [ '{{WRAPPER}} .btn-primary' => 'color: {{VALUE}};' ],
            ]);
            $this->add_control( 'btn_bg', [
                'label'     => __( 'Background Color', 'apex-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [ '{{WRAPPER}} .btn-primary' => 'background-color: {{VALUE}};' ],
            ]);
            $this->add_control( 'btn_hover_color', [
                'label'     => __( 'Hover Text Color', 'apex-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [ '{{WRAPPER}} .btn-primary:hover' => 'color: {{VALUE}};' ],
            ]);
            $this->add_control( 'btn_hover_bg', [
                'label'     => __( 'Hover Background', 'apex-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [ '{{WRAPPER}} .btn-primary:hover' => 'background-color: {{VALUE}};' ],
            ]);
            $this->add_group_control( \Elementor\Group_Control_Typography::get_type(), [
                'name'     => 'btn_typography',
                'label'    => __( 'Typography', 'apex-widgets' ),
                'selector' => '{{WRAPPER}} .btn-primary',
            ]);
            $this->add_control( 'btn_padding', [
                'label'      => __( 'Padding', 'apex-widgets' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .btn-primary' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]);
            $this->add_control( 'btn_border_radius', [
                'label'      => __( 'Border Radius', 'apex-widgets' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .btn-primary' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]);
            $this->add_group_control( \Elementor\Group_Control_Box_Shadow::get_type(), [
                'name'     => 'btn_shadow',
                'label'    => __( 'Box Shadow', 'apex-widgets' ),
                'selector' => '{{WRAPPER}} .btn-primary',
            ]);
        $this->end_controls_section();
    }

    // ── Helpers ────────────────────────────────────────────────────
    private function build_href( $s ) {
        switch ( $s['btn_type'] ) {
            case 'email':
                return 'mailto:' . sanitize_email( $s['btn_email'] );
            case 'anchor':
                return '#' . ltrim( sanitize_text_field( $s['btn_anchor'] ), '#' );
            case 'url':
            default:
                return esc_url( $s['btn_url']['url'] ?? '#' );
        }
    }

    private function build_bg_style( $s ) {
        switch ( $s['bg_type'] ) {
            case 'gradient':
                $start = $s['bg_gradient_start'] ?? 'transparent';
                $end   = $s['bg_gradient_end']   ?? 'transparent';
                $angle = $s['bg_gradient_angle']['size'] ?? 135;
                return "background: linear-gradient({$angle}deg, {$start}, {$end});";
            case 'image':
                $url   = $s['bg_image']['url'] ?? '';
                $style = $url ? "background-image: url(" . esc_url( $url ) . "); background-size: cover; background-position: center;" : '';
                if ( ! empty( $s['bg_overlay_color'] ) ) {
                    // Overlay handled via ::before in theme CSS; pass as CSS var
                    $style .= " --cta-overlay: {$s['bg_overlay_color']};";
                }
                return $style;
            default:
                return '';
        }
    }

    // ── Render ─────────────────────────────────────────────────────
    protected function render() {
        $s          = $this->get_settings_for_display();
        $fade_class = ( 'yes' === $s['animation_class'] ) ? ' fade-up' : '';
        $href       = $this->build_href( $s );
        $bg_style   = $this->build_bg_style( $s );
        $is_external = ( $s['btn_type'] === 'url' && ! empty( $s['btn_url']['is_external'] ) );
        $has_icon    = ! empty( $s['btn_icon']['value'] );
        ?>
        <section class="cta" id="contact">
            <div class="container">

                <div class="cta-box<?php echo esc_attr( $fade_class ); ?>"
                    <?php if ( $bg_style ) echo 'style="' . esc_attr( $bg_style ) . '"'; ?>>

                    <?php if ( ! empty( $s['title'] ) ) : ?>
                        <h2><?php echo esc_html( $s['title'] ); ?></h2>
                    <?php endif; ?>

                    <?php if ( ! empty( $s['description'] ) ) : ?>
                        <p><?php echo esc_html( $s['description'] ); ?></p>
                    <?php endif; ?>

                    <?php if ( ! empty( $s['btn_text'] ) ) : ?>
                        <a href="<?php echo esc_url( $href ); ?>"
                            class="btn-primary"
                            <?php if ( $is_external ) echo 'target="_blank" rel="noopener noreferrer"'; ?>>

                            <?php if ( $has_icon && $s['btn_icon_position'] === 'before' ) : ?>
                                <?php \Elementor\Icons_Manager::render_icon( $s['btn_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                            <?php endif; ?>

                            <?php echo esc_html( $s['btn_text'] ); ?>

                            <?php if ( $has_icon && $s['btn_icon_position'] === 'after' ) : ?>
                                <?php \Elementor\Icons_Manager::render_icon( $s['btn_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                            <?php endif; ?>

                        </a>
                    <?php endif; ?>

                </div>

            </div>
        </section>
        <?php
    }
}