<?php

namespace RunbyitWidgets\ElementorWidgets;

use Elementor\Widget_Base;
// use Elementor\Control_Manager;


if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor List Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Map1 extends \Elementor\Widget_Base {

    /**
     * Get widget name.
     *
     * Retrieve list widget name.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'list';
    }

    /**
     * Get widget title.
     *
     * Retrieve list widget title.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__( 'List', 'elementor-list-widget1' );
    }

    /**
     * Get widget icon.
     *
     * Retrieve list widget icon.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-bullet-list';
    }

    /**
     * Get custom help URL.
     *
     * Retrieve a URL where the user can get more information about the widget.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget help URL.
     */
    public function get_custom_help_url() {
        return 'https://developers.elementor.com/docs/widgets/';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the list widget belongs to.
     *
     * @since 1.0.0
     * @access public
     * @return array Widget categories.
     */
    public function get_categories() {
        return [ 'general' ];
    }

    /**
     * Get widget keywords.
     *
     * Retrieve the list of keywords the list widget belongs to.
     *
     * @since 1.0.0
     * @access public
     * @return array Widget keywords.
     */
    public function get_keywords() {
        return [ 'list', 'lists', 'ordered', 'unordered' ];
    }

    /**
     * Register list widget controls.
     *
     * Add input fields to allow the user to customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */

    protected function register_controls() {




        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'Content', 'elementor-list-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'elementor-list-widget' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Enter your title', 'elementor-list-widget' ),
            ]
        );
//        $this->add_control(
//            'marker_spacing',
//            [
//                'label' => esc_html__( 'Spacing', 'elementor-list-widget' ),
//                'type' => \Elementor\Controls_Manager::SLIDER,
//                'size_units' => [ 'px', 'em', 'rem', 'custom' ],
//                'range' => [
//                    'px' => [
//                        'min' => 0,
//                        'max' => 100,
//                    ],
//                    'em' => [
//                        'min' => 0,
//                        'max' => 10,
//                    ],
//                    'rem' => [
//                        'min' => 0,
//                        'max' => 10,
//                    ],
//                ],
//                'default' => [
//                    'unit' => 'px',
//                    'size' => 40,
//                ],
//                'selectors' => [
//                    // '{{WRAPPER}} .elementor-list-widget' => 'padding-left: {{SIZE}}{{UNIT}};',
//                    '.city' => 'top: {{SIZE}}{{UNIT}};',
//                ],
//            ]
//        );

        $this->add_control(
            'pins',
            [
                'label' => esc_html__( 'Piny na mapie', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [

                    [
                        'name' => 'city',
                        'label' => esc_html__( 'Miasto', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__( 'Nazwa miasta' , 'textdomain' ),
                        'label_block' => true,
                    ],

                    [
                        'name' => 'image',
                        'label' => esc_html__( 'Choose Image', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],

                    [
                        'name' => 'icon',
                        'label' => __( 'Pinezka', 'text-domain' ),
                        'type' => \Elementor\Controls_Manager::ICONS,
                        'default' => [
                            'value' => 'fas fa-map-marker-alt',
                            'library' => 'solid',
                        ],
                    ],

                    [
                        'name' => 'pin-color',
                        'label' => esc_html__( 'Kolor pinezki', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            'i.fas' => 'color: {{VALUE}}',
                        ],
                    ],


                        [
                            'name' => 'marker_spacing',
                            'label' => esc_html__( 'Spacing', 'elementor-list-widget' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px', 'em', 'rem', 'custom' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                                'em' => [
                                    'min' => 0,
                                    'max' => 10,
                                ],
                                'rem' => [
                                    'min' => 0,
                                    'max' => 10,
                                ],
                            ],
                            'default' => [
                                'unit' => 'px',
                                'size' => 40,
                            ],
                            'selectors' => [
                                // '{{WRAPPER}} .elementor-list-widget' => 'padding-left: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .city' => 'top: {{SIZE}}{{UNIT}};',
                            ],
                        ],


                    [
                        'name' => 'left',
                        'label' => esc_html__( 'Odległość od lewej', 'elementor-list-widget' ),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => [ 'px', 'em', 'rem' ],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 500,
                            ],
                            'em' => [
                                'min' => 0,
                                'max' => 100,
                            ],
                            'rem' => [
                                'min' => 0,
                                'max' => 10,
                            ],
                        ],
                        'default' => [
                            'unit' => 'px',
                            'size' => 250,
                        ],
                        'selectors' => [
                            // '{{WRAPPER}} .elementor-list-widget' => 'padding-left: {{SIZE}}{{UNIT}};',
                            '.city' => 'top: {{SIZE}}{{UNIT}}',
                        ],

                    ],


                    [
                        'name' => 'desc',
                        'label' => esc_html__( 'Opis', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::WYSIWYG,
                        'default' => esc_html__( 'Wpisz tutaj opis' , 'textdomain' ),
                        'show_label' => false,
                    ],
                ],
//                'default' => [
//                    [
//                        'list_title' => esc_html__( 'Title #1', 'textdomain' ),
//                        'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'textdomain' ),
//                    ],
//                    [
//                        'list_title' => esc_html__( 'Title #2', 'textdomain' ),
//                        'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'textdomain' ),
//                    ],
//                ],
                'title_field' => '{{{ city }}}',
            ]
        );

        $this->end_controls_section();

    }

//    protected function register_controls() {
//
//        $this->start_controls_section(
//            'content_section',
//            [
//                'label' => esc_html__( 'List Content', 'elementor-list-widget' ),
//                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
//            ]
//        );
//
//
//
//
//        $this->add_control(
//            'marker_spacing',
//            [
//                'label' => esc_html__( 'Spacing', 'elementor-list-widget' ),
//                'type' => \Elementor\Controls_Manager::SLIDER,
//                'size_units' => [ 'px', 'em', 'rem', 'custom' ],
//                'range' => [
//                    'px' => [
//                        'min' => 0,
//                        'max' => 100,
//                    ],
//                    'em' => [
//                        'min' => 0,
//                        'max' => 10,
//                    ],
//                    'rem' => [
//                        'min' => 0,
//                        'max' => 10,
//                    ],
//                ],
//                'default' => [
//                    'unit' => 'px',
//                    'size' => 40,
//                ],
//                'selectors' => [
//                    // '{{WRAPPER}} .elementor-list-widget' => 'padding-left: {{SIZE}}{{UNIT}};',
//                    '.city' => 'top: {{SIZE}}{{UNIT}};',
//                ],
//            ]
//        );
//
//        $this->end_controls_section();
//
//    }

    /**
     * Render list widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render() {
        $settings = $this->get_settings_for_display();

        $this->add_render_attribute( 'elementor-list-widget' );

    }

    /**
     * Render list widget output in the editor.
     *
     * Written as a Backbone JavaScript template and used to generate the live preview.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function content_template() {
        ?>

        <?php
    }

}
