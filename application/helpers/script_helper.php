<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
if (!function_exists('script_tag')) {
    /**
     * @param string $src
     * @param string $language
     * @param string $type
     * @param bool $index_page
     * @param bool $html5
     * @return string
     */
    function script_tag(
        $src = '',
        $language = 'javascript',
        $type = 'text/javascript',
        $index_page = false,
        $html5 = true
    ) {
        $CI =& get_instance();

        $script = '<scr' . 'ipt';

        if (is_array($src)) {
            foreach ($src as $k => $v) {
                if ($k == 'src' and strpos($v, '://') === false) {
                    if ($index_page === true) {
                        $script .= ' src="' . $CI->config->site_url($v) . '"';
                    } else {
                        $script .= ' src="' . $CI->config->slash_item('base_url') . $v . '"';
                    }
                } else {
                    $script .= "$k=\"$v\"";
                }
            }

            $script .= "></scr'.'ipt>\n";
        } else {
            if (strpos($src, '://') !== false) {
                $script .= ' src="' . $src . '"';
            } elseif ($index_page === true) {
                $script .= ' src="' . $CI->config->site_url($src) . '"';
            } else {
                $script .= ' src="' . $CI->config->slash_item('base_url') . $src . '"';
            }

            if (false == $html5) {
                $script .= ' language="' . $language;
                $script .= '" type="' . $type . '"';
            }

            $script .= '></scr' . 'ipt>' . "\n";
        }

        return $script;
    }
}
