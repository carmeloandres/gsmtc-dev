<?php
/**
 * Gsmtc_Developer
 * 
 * Esta clase gestiona el nucleo de funcionamiento del tema
 */
class Gsmtc_Developer{

	function __construct(){

		add_action('wp_enqueue_scripts',array($this,'wp_enqueue_scripts'));
        add_action('after_setup_theme',array($this,'after_setup_theme'));
/*        add_action('init',array($this,'init'));
		add_filter('login_redirect',array($this,'redirect_restaurador'),10,3);
		add_filter( 'page_template',array($this,'hide_admin_bar') );
		add_action('switch_theme',array($this,'borrar_pagina_restaurador'));
		add_action('init',array($this,'reescritura_de_urls'));
		add_filter( 'query_vars', array($this,'mis_query_vars'));
		add_action('after_setup_theme',array($this,'nuevas_dimensiones_imagen'));
//		add_filter('wp_title',array($this,'titulo_pestanya'),10,2);
		add_filter('pre_get_document_title',array($this,'titulo_pestanya'));
*/
	}

	/**
	 * Esta función carga los estilos y scripts necesarias para el tema
	 */
    function wp_enqueue_scripts(){

        wp_enqueue_style(
            'gsmtc-dev-motnserrat',
            'https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap',
            [],
            null
        );

        wp_enqueue_style(
            'gsmtc-dev-bootstrap',
            get_theme_file_uri('assets/css/bootstrap.min.css'),
        );

        wp_enqueue_style(
            'gsmtc-dev-bootstrap-icons',
            get_theme_file_uri('assets/bootstrap-icons/bootstrap-icons.css'),
        );

        wp_enqueue_style(
            'gsmtc-dev-theme',
            get_theme_file_uri('style.css'),
        );

    }

    /**
	 * Esta función activa las caracteristica de wordpress necesarias para el tema
	 */
    function after_setup_theme(){
        add_theme_support('editor-styles');
    }

	/**
	 * Esta función crea los custom post types y el rol de usuario 'restaurador'
	 */
	function init() {
    }
}
