<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists('assets_url')){
    function assets_url($url) : string{
        return base_url()."assets/".$url."";
    }
}

/**
     * @param mixed $url = nomFichier dans le dossier assets/css/
     *
     * @return string = assets/css/(nomFichier).css
     */
    if(!function_exists('css_url')){
        function css_url($url) : string{
            return base_url()."assets/css/".$url.".css";
        }
    }

    /**
     * @param mixed $url = nomFichier dans le dossier assets/js/
     *
     * @return string = assets/js/(nomFichier).js
     */
    if(!function_exists('js_url')){
        function js_url($url) : string{
            return base_url()."assets/js/".$url.".js";
        }
    }
    
    /**
     * @param mixed $url = nomFichier dans le dossier assets/img/
     *
     * @return string = assets/img/(nomFichier)
     */
    if(!function_exists('img_url')){
        function img_url($url) : string{
            return base_url()."assets/img/".$url;
        }
    }

    /**
     * @param mixed $url = image dans le dossier assets/img/hotel
     *
     * @return string = assets/img/hotel/(image)
     */
    if(!function_exists('img_url_hotel')){
        function img_url_hotel($url) : string{
            return base_url()."assets/img/hotel/".$url.".jpg";
        }
    }

    /**
     * @param mixed $url = image dans le dossier assets/img/experience
     *
     * @return string = assets/img/experience/(image)
     */
    if(!function_exists('img_url_exp')){
        function img_url_exp($url) : string{
            return base_url()."assets/img/experience/".$url.".jpg";
        }
    }
