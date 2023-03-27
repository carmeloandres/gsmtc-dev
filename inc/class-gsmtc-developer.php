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
        add_filter('render_block',array($this,'render_block'),10,3);
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

    function render_block($block_content, $block, $instance){

        if (
            $block['blockName'] === 'core/navigation' && 
            !is_admin() &&
            !wp_is_json_request()
            ) {

            $new_block = preg_replace('/<svg.*?\/svg>/i','<svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 50 50" width="50px" height="50px"><path d="M 0 7.5 L 0 12.5 L 50 12.5 L 50 7.5 Z M 0 22.5 L 0 27.5 L 50 27.5 L 50 22.5 Z M 0 37.5 L 0 42.5 L 50 42.5 L 50 37.5 Z"/></svg>', $block_content);

//            $new_block = preg_replace('/\<svg width(.*?)\<\/svg\>/', "<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'><path stroke='rgba%280,0,0,0.55%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/></svg>", $block_content);
            error_log ('La función "render_block" ha sido ejecutada, $block_content: '.var_export($new_block,true).PHP_EOL);

            return $new_block;
//            return preg_replace('/\<svg width(.*?)\<\/svg\>/', "<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'><path stroke='rgba%280,0,0,0.55%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/></svg>", $block_content);
        } 
        
        if (
            $block['blockName'] === 'core/navigation' && 
            !is_admin() &&
            !wp_is_json_request()
            ) {
                error_log ('La función "render_block" ha sido ejecutada, $block: '.var_export($block,true).PHP_EOL);
                
            }
        
    
        return $block_content;
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
