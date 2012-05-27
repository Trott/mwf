<?php

/**
 * @author trott
 * @copyright Copyright (c) 2010-12 UC Regents
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
require_once(__DIR__ . '/assets/lib/user_agent.class.php');

echo HTML_Decorator::html_start()->render();

echo Site_Decorator::head()->set_title(Config::get('global', 'title_text'))->render();

echo HTML_Decorator::body_start()->render();

echo Site_Decorator::ucsf_header()
        ->render();


if (User_Agent::get_os() == 'android') {
    echo Site_Decorator::content()
            ->set_padded()
            ->add_header('Download UCSF Mobile 2.0!')
            ->add_paragraph(
                    array('You have been redirected here because you are using the Android version of UCSF Mobile 1.0.',
                        HTML_Decorator::tag_open('br'), HTML_Decorator::tag_open('br'),
                        'A new, updated and enhanced UCSF Mobile 2.0 version for the Android is now available.',
                        HTML_Decorator::tag_open('br'), HTML_Decorator::tag_open('br'),
                        'To obtain the new version, please uninstall UCSF Mobile 1.0 before navigating to the Android Marketplace and installing UCSF Mobile 2.0.',
                        HTML_Decorator::tag_open('br'), HTML_Decorator::tag_open('br'),
                        'Future upgrades on the Android platform will not require this extra step.',
                        HTML_Decorator::tag_open('br'), HTML_Decorator::tag_open('br'),
                        'To download and install UCSF Mobile 2.0 after deleting UCSF Mobile 1.0, go to ',
                        HTML_Decorator::tag('a', 'http://bit.ly/UCSFMobileAndroid', array('href' => 'http://bit.ly/UCSFMobileAndroid')),
                        ' or search for ',
                        HTML_Decorator::tag('i', 'UCSF Mobile'),
                        ' in the Android Market.'))
            ->render();
}

$continue_menu = Site_Decorator::menu()
        ->set_padded()
        ->add_item('Continue to Shuttles', '/shuttle')
        ->add_item('Continue to Library', '/library');

if (User_Agent::get_os() == 'android')
    $continue_menu->add_item('Get UCSF Mobile 2.0 Now!', 'https://market.android.com/details?id=edu.ucsf.m');


echo $continue_menu->render();

echo Site_Decorator::ucsf_footer()->render();
echo HTML_Decorator::body_end()->render();
echo HTML_Decorator::html_end()->render();
?>