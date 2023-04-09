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

	/**
	 * render_block
	 * 
	 * This method modify two blocks content to show the logo svg and the responsive button svg 
	 *
	 */


    function render_block($block_content, $block, $instance){

        if ($block['blockName'] === 'core/site-logo' &&
            !is_admin() &&
            !wp_is_json_request() ) {

            $nueva_imagen = 'src="'.get_template_directory_uri().'/assets/svg/logo-2021-04-26-blue.svg';
                
            $new_block = preg_replace('/src.*?.png/i', $nueva_imagen, $block_content);


            return $new_block;

        }

        if ($block['blockName'] === 'core/navigation' && 
            !is_admin() &&
            !wp_is_json_request() ) {

            $new_block = preg_replace('/<svg.*?\/svg>/i','<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="122.879px" height="103.609px" viewBox="0 0 122.879 103.609" enable-background="new 0 0 122.879 103.609" xml:space="preserve"><g><path fill-rule="evenodd" clip-rule="evenodd" d="M10.368,0h102.144c5.703,0,10.367,4.665,10.367,10.367v0 c0,5.702-4.664,10.368-10.367,10.368H10.368C4.666,20.735,0,16.07,0,10.368v0C0,4.665,4.666,0,10.368,0L10.368,0z M10.368,82.875 h102.144c5.703,0,10.367,4.665,10.367,10.367l0,0c0,5.702-4.664,10.367-10.367,10.367H10.368C4.666,103.609,0,98.944,0,93.242l0,0 C0,87.54,4.666,82.875,10.368,82.875L10.368,82.875z M10.368,41.438h102.144c5.703,0,10.367,4.665,10.367,10.367l0,0 c0,5.702-4.664,10.368-10.367,10.368H10.368C4.666,62.173,0,57.507,0,51.805l0,0C0,46.103,4.666,41.438,10.368,41.438 L10.368,41.438z"/></g></svg>', $block_content,1);

            return $new_block;
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
