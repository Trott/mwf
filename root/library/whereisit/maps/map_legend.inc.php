<?php 
/**
 * @file
 * Includes-file for the various library floorplan pages.
 * Defines the default legend for the floorplan maps.
 * 
 * @author Stefan Topfstedt <Stefan.Topfstedt@ucsf.edu>
 * @copyright Copyright (c) 2010-11 UC Regents
 * @license http://mwf.ucla.edu/license
 */

/**
 * Parnassus floorplan legend items.
 * @global 
 * @var Array
 */
$legend = array(
        array(
                'title' => 'Computers', // legend item title
                'params' => array(
                        // CSS class selector for the legend item
                        'class' => 'ucsf-library-floorplan-legend ucsf-library-floorplan-legend-computer')
        ),
        array(
                'title' => 'Elevators',
                'params' => array(
                        'class' => 'ucsf-library-floorplan-legend ucsf-library-floorplan-legend-elevator')
        ),
        array(
                'title' => 'Photocopiers',
                'params' => array(
                        'class' => 'ucsf-library-floorplan-legend ucsf-library-floorplan-legend-photocopy')
        ),
        array(
                'title' => 'Reshelving Area',
                'params' => array(
                        'class' => 'ucsf-library-floorplan-legend ucsf-library-floorplan-legend-reshelving')
        ),
        array(
                'title' => 'Restrooms',
                'params' => array(
                        'class' => 'ucsf-library-floorplan-legend ucsf-library-floorplan-legend-restroom')
        ),
        array(
                'title' => 'Stairs',
                'params' => array(
                        'class' => 'ucsf-library-floorplan-legend ucsf-library-floorplan-legend-stairs')
        )
);