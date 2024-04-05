<?php
/**
 * Gestiona los valores de personalizacion en el theme a través de Apariencia>Personalizar
 * Documentacion: https://kirki.org/
 * Para usar un campo determinado: get_theme_mod('field_id')
*/


if( class_exists( 'Kirki' ) ) {
    include_once get_theme_file_path( 'includes/kirki_start.php' );
    
	Kirki::add_config( 'starterpoint', array(
		'capability'    => 'edit_theme_options',
		'option_type'   => 'theme_mod',
	) );
    
    // Agregar un panel que agrupa secciones
	Kirki::add_panel( 'starterpoint_panelA', array(
		'priority'    => 10,
		'title'       => esc_html__( 'Panel A', 'kirki' ),
		'description' => esc_html__( 'Descripcion del panel', 'kirki' ),
    ) );
    

    // agregar la seccion del panel que agrupa controles
	Kirki::add_section( 'starterpoint_seccion1_panelA', array(
		'title'          => esc_html__( 'Sección 1', 'kirki' ),
		'description'    => esc_html__( 'Descriptcon de la sección.', 'kirki' ),
		'panel'          => 'starterpoint_panelA',
		'priority'       => 160,
	) );
    
    // agregar los controles de la seccion
	Kirki::add_field( 'starterpoint', [
		'type'        => 'checkbox',
		'settings'    => 'checkbox_setting',
		'label'       => esc_html__( 'Checkbox Control', 'kirki' ),
		'description' => esc_html__( 'Descripción', 'kirki' ),
		'section'     => 'starterpoint_seccion1_panelA',
		'default'     => true,
	] );
}