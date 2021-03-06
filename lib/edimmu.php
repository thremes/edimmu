<?php
/**
 * (To women begging the king to spare their lives) "Ha-ha these humans are
 * definitely foolish creatures.  Think as hard as those weak brains of
 * yours can manage. Do you humans ever listen to the cries of mercy coming
 * from pigs and cows you slaughter?" ~ Meruem | Hunter x Hunter
 *
 * @package    Edimmu
 * @author     Thiago Senna <thiago@thremes.com.br>
 * @copyright  Copyright (c) 2015, Thiago Senna
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

require_once( 'class-edimmu.php' );
require_once( 'class-edimmu-assets.php' );

/*
 * the theme
 */

$edimmu = new Edimmu();
add_action( 'after_setup_theme', array( $edimmu, 'setup' ) );

/*
 * the theme assets
 */

$edimmu_assets = new Edimmu_Assets();
add_action( 'after_setup_theme', array( $edimmu_assets, 'setup' ) );