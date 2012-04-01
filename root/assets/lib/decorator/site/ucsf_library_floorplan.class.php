<?php

/**
 *
 * @package decorator
 * @subpackage site_decorator
 *
 * @author topfstedt
 * @copyright Copyright (c) 2010-12 UC Regents
 * @license http://mwf.ucla.edu/license
 * @version 20120313
 *
 * @uses Content_Site_Decorator
 */
require_once(__DIR__ . '/content.class.php');

class Ucsf_Library_Floorplan_Site_Decorator extends Content_Site_Decorator {

    /**
     * Floorplan map URL 
     * @var String
     */
    protected $_mapUrl;

    /**
     * Description of the floor
     * @var String
     */
    protected $_description;

    /**
     * A list of items on the legend for the floorplan map.  
     * @var Array
     */
    protected $_legendItems;

    /**
     * 
     * @param String $title
     * @param Array $params
     * @param String $mapUrl
     * @param Array $legendItems
     * @param String $description
     */
    public function __construct($title = 'Floor', $params = array(), $mapUrl = '', $legendItems = array(), $description = '') {
        parent::__construct(array(), $params);
        $this->add_header($title);
        $this->_mapUrl = $mapUrl;
        $this->_description = $description;
        $this->_legendItems = $legendItems;
    }

    /**
     * @see Content_Site_Decorator::render()
     * @uses Ucsf_Library_Map_Legend_Site_Decorator
     */
    public function render($raw = false) {

        //add floorplan
        if (!empty($this->_mapUrl)) {
            // add map image
            $section=HTML_Decorator::tag('img', null, array('src' => $this->_mapUrl, 'style' => 'max-width: 100%'));

            //add legend
            if (!empty($this->_legendItems)) {
                $list = array();
                for ($i = 0, $n = count($this->_legendItems); $i < $n; $i++) {
                    $list[] = HTML_Decorator::tag('li', HTML_Decorator::tag('span', $this->_legendItems[$i]['title'], $this->_legendItems[$i]['params']));
                }
                $section->add_inner(HTML_Decorator::tag('ul', $list, array('class' => 'two-col-list')));
                $section->add_inner(HTML_Decorator::tag('br', null, array('class' => 'clear')));
            }
            $this->add_section($section);
        }

        // add description
        if (!empty($this->_description)) {
            $description = array();
            $description_array = preg_split("/[\n]+/", $this->_description);
            foreach ($description_array as $description_element) {
                $description[] = $description_element;
                $description[] = HTML_Decorator::tag_open('br');
            }
            $this->add_section(HTML_Decorator::tag('span', $description, array('class' => 'smallprint')));
        }
        return parent::render($raw);
    }

}
