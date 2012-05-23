<?php
/**
 * @author trott
 * @copyright Copyright (c) 2010-11 UC Regents
 * @license http://mwf.ucla.edu/license
 * @version 20120313
 *
 * @uses Decorator
 * @uses Site_Decorator
 * @uses HTML_Decorator
 * @uses Config
 */
require_once(__DIR__ . '/assets/lib/decorator.class.php');
require_once(__DIR__ . '/assets/config.php');

echo HTML_Decorator::html_start()->render();

echo Site_Decorator::head()->set_title(Config::get('global', 'title_text') . " | About")->render();

echo HTML_Decorator::body_start()->render();

echo Site_Decorator::ucsf_header("About")
        ->render();

//Decorator doesn't yet handle unordered lists, too tedious to use HTML_Decorator::tag, so they're hardcoded for now.
echo Site_Decorator::content()
        ->set_padded()
        ->add_header('About UCSF Mobile')
        ->add_section(array('UCSF Mobile is a joint project of:', 
            HTML_Decorator::tag('ul', array(
                HTML_Decorator::tag('li', 'Information Technology Services'),
                HTML_Decorator::tag('li', 'Library & Center for Knowledge Management'),
                HTML_Decorator::tag('li', 'University Relations')),
                    array('class'=>'bulleted')),
            'In collaboration with:',
            HTML_Decorator::tag('ul', array(
                HTML_Decorator::tag('li', 'Transportation Services (Shuttle)'),
                HTML_Decorator::tag('li', 'Campus Life Services (Fitness)'),
                HTML_Decorator::tag('li', 'Campus Planning (Maps)')),
                    array('class'=>'bulleted'))
            ))
        ->add_section(array('The UCSF Mobile website is powered by the ',
                HTML_Decorator::tag('a', 'Mobile Web Framework', array('href' => 'http://mwf.ucla.edu')), 
            '.'))
        ->render();

echo Site_Decorator::ucsf_footer()->render();
echo HTML_Decorator::body_end()->render();
echo HTML_Decorator::html_end()->render();
?>