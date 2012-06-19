<?php
/**
 * Performs install/uninstall methods for the endtime plugin
 *
 * PHP version 5
 * LICENSE: This source file is subject to LGPL license 
 * that is available through the world-wide-web at the following URI:
 * http://www.gnu.org/copyleft/lesser.html
 * @author	   Ushahidi Team <team@ushahidi.com> 
 * @package    Ushahidi - http://source.ushahididev.com
 * @module	   Actionable Installer
 * @copyright  Ushahidi - http://www.ushahidi.com
 * @license    http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License (LGPL) 
 */

class Endtime_Install {

	/**
	 * Constructor to load the shared database library
	 */
	public function __construct()
	{
		$this->db = Database::instance();
	}

	/**
	 * Creates the required database tables for the endtime plugin
	 */
	public function run_install()
	{
		// Create the database tables.
		// Also include table_prefix in name
		$this->db->query("CREATE TABLE IF NOT EXISTS `".Kohana::config('database.default.table_prefix')."endtime` (
				  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
				  `incident_id` int(11) NOT NULL,
				  `endtime_date` datetime DEFAULT NULL,
				  `applicable` tinyint(4) DEFAULT '1',
				  PRIMARY KEY (`id`)
				) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1");
	}

	/**
	 * Deletes the database tables for the endtime module
	 */
	public function uninstall()
	{
		$this->db->query('DROP TABLE `'.Kohana::config('database.default.table_prefix').'endtime`');
	}
}