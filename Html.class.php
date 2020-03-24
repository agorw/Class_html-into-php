<?php

class Html {

    /**
     * 
     * @param type $doctype
     * 'html5'    HTML 5 
     * 'html4S'   HTML 4.01 Strict
     * 'html4T'   HTML 4.01 Transitional
     * 'html4F'   HTML 4.01 Frameset
     * 'xhtml1S'  XHTML 1.0 Strict
     * 'xhtml1T'  XHTML 1.0 Transitional
     * 'xhtml1F'  XHTML 1.0 Frameset
     * 'xhtml1.1' XHTML 1.1
     * @return type
     */
    function doctype($doctype) {
        switch ($doctype) {
            case 'html5' :
                $r = '<!DOCTYPE html>';
                break;
            case 'html4S':
                $r = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">';
                break;
            case 'html4T':
                $r = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">';
                break;
            case 'html4F':
                $r = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">';
                break;
            case 'xhtml1S' :
                $r = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">';
                break;
            case 'xhtml1T':
                $r = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
                break;
            case 'xhtml1F':
                $r = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">';
                break;
            case 'xhtml1.1':
                $r = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">';
                break;
            default :
                $r = '<!DOCTYPE html>';
            break;
        }
        return $r;
    }

    /**
     * 
     * @param type $content
     * @return string
     */
    function html($content) {
        $r = '<html>' . $content . '</html>';
        return $r;
    }

    /**
     * 
     * @param type $title
     * @return string
     */
    function title($title) {
        $r = '<title>' . $title . '</title>';
        return $r;
    }

    /**
     * 
     * @param type $attribute :
     * charset      character_set    Specifies the character encoding for the HTML document
     * content      text             Gives the value associated with the http-equiv or name attribute
     * http-equiv   content-type     Provides an HTTP header for the information/value of the content attribute
     * default-style
     * refresh
     * name         application-name Specifies a name for the metadata
     * author
     * description
     * generator
     * keywords
     * scheme       format/URI       Not supported in HTML5. Specifies a scheme to be used to interpret the value of the content attribute
     * @return string
     */
    function meta($attribute = array()) {
        $r = '<meta';
        foreach ($attribute as $k => $v) {
            $r.=' ' . $k . '="' . $v . '"';
        }
        $r .= ' />';
        return $r;
    }

    /**
     * 
     * @param type $attribute
     * @return string
     */
    function link($attribute = array()) {
        $r = '<link';
        foreach ($attribute as $k => $v) {
            $r.=' ' . $k . '="' . $v . '"';
        }
        $r .= ' />';
        return $r;
    }

    /**
     * 
     * @param type $attribute
     * @return string
     */
    function img($attribute = array()) {
        $r = '<img';
        foreach ($attribute as $k => $v) {
            $r.=' ' . $k . '="' . $v . '"';
        }
        $r .= ' />';
        return $r;
    }

    /**
     * 
     * @param type $content
     * @param type $attribute
     * @return string
     */
    function script($content, $attribute = array()) {
        $r = '<script';
        foreach ($attribute as $k => $v) {
            $r.=' ' . $k . '="' . $v . '"';
        }
        $r .= '>' . $content . ' </script>';
        return $r;
    }

    /**
     * 
     * @param type $content
     * @param type $attribute
     * @return string
     */
    function div($content, $attribute = array()) {
        $r = '<div';
        foreach ($attribute as $k => $v) {
            $r.=' ' . $k . '="' . $v . '"';
        }
        $r .= '>' . $content . '</div>';
        return $r;
    }

    /**
     * 
     * @param type $content
     * @param type $attribute :
     * media	media_query	Specifies what media/device the media resource is optimized for
     * scoped	scoped          Specifies that the styles only apply to this element's parent element and that element's child elements
     * type	text/css	Specifies the MIME type of the style sheet
     * @return string
     */
    function style($content, $attribute = array()) {
        $r = '<style';
        foreach ($attribute as $k => $v) {
            $r.=' ' . $k . '="' . $v . '"';
        }
        $r .= '>' . $content . '</style>';
        return $r;
    }

    /**
     * 
     * @param type $fields
     * @param type $title
     * @param type $attributesTD
     * @param type $attributesTR
     * @param type $attributesTable
     * @param type $alternColor
     * @return string
     */
    function table($fields, $title = array(), $attributesTD = array(), $attributesTR = array(), $attributesTable = array(), $alternColor = false, $nomId = '') {

        $r = '<table ';
        foreach ($attributesTable as $k => $v) {
            $r.=' ' . $k . '="' . $v . '"';
        }
        $r .='>';

        if (!empty($title)) {
            $r .= '<thead>';
            $r .='<tr>';
            foreach ($title as $k => $v) {
                $r .='<th  class="' . $k . '">' . $v . '</th>';
            }
            $r .='</tr>';
            $r .= '</thead>';
        }

        $r .= '<tbody>';
        if ($alternColor == TRUE) {
            $alt = 1;
        }
        $id = $nomId . '1';
        foreach ($fields as $k => $v) {

            if (is_array($v)) {
                if (empty($id)) {
                    $r .='<tr id="' . $id . '" ';
                    foreach ($attributesTR as $kTR => $vTR) {
                        $r.=' ' . $kTR . '="' . $vTR . '"';
                    }
                    $r .='>';
                } else {
                    $r .='<tr id="' . $id . '" class="alt' . ($alt % 2) . '"';
                    foreach ($attributesTR as $kTR => $vTR) {
                        $r.=' ' . $kTR . '="' . $vTR . '"';
                    }
                    $r .='>';
                }
                foreach ($v as $k => $i) {
                    $r .='<td ';
                    foreach ($attributesTD as $kTD => $vTD) {
                        $r.=' ' . $kTD . '="' . $vTD . '"';
                    }
                    $r .='class="' . $k . '">' . $i . '</td>';
                }
                $r .='</tr>';
            } else {
                if (empty($id)) {
                    $r .='<tr id="' . $id . '" ';
                    foreach ($attributesTR as $kTR => $vTR) {
                        $r.=' ' . $kTR . '="' . $vTR . '"';
                    }
                    $r .='><td name = "' . $k . '">' . $v . '</td></tr>';
                } else {
                    $r .='<tr id="' . $id . '" ';
                    foreach ($attributesTR as $kTR => $vTR) {
                        $r.=' ' . $kTR . '="' . $vTR . '"';
                    }
                    $r = ' class = "alt' . ($alt % 2) . '"><td name = "' . $k . '">' . $v . '</td></tr>';
                }
            }
            if (!empty($id))
                $alt++;
            $id++;
        }
        $r .= '</tbody>';
        $r .="</table>";
        return $r;
    }

    /**
     * Genere une liste html
     * @param type $type 'ul' ou 'ol'
     * @param type $fields
     * @param type $attributesLI
     * @param type $attributesUL
     * @return string
     */
    function list($type, $fields, $attributesLI = array(), $attributesUL = array()) {
        $r = '<' . $type . '>';
        foreach ($fields as $k => $v) {
            $r .= '<li name = "' . $k . '">' . $v . '</li>';
        }
        $r .= '</' . $type . '>';
        return $r;
    }

    /**
     * 
     * @return string
     */
    function header($content) {
        return '<head>' . $content . '</head>';
    }

    /**
     * 
     * @return string
     */
    function body($content) {
        return '<body>' . $content . '</body>';
    }

    /**
     * 
     * @return string
     */
    function br() {
        return '<br/>';
    }

}
