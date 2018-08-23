<?php
/**
 * Moodlerooms Framework
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see http://opensource.org/licenses/gpl-3.0.html.
 *
 * @copyright Copyright (c) 2009 Blackboard Inc. (http://www.blackboardopenlms.com)
 * @license http://opensource.org/licenses/gpl-3.0.html GNU Public License
 * @package mr
 * @author Mark Nielsen
 */

defined('MOODLE_INTERNAL') or die('Direct access to this script is forbidden.');

/**
 * @see mr_plugin
 */
require_once($CFG->dirroot.'/local/mr/framework/plugin.php');

/**
 * MR File Export Abstract
 *
 * Base class for all exporters. Not all
 * exporters can support the generation
 * of files.
 *
 * @author Mark Nielsen
 * @package mr
 */
abstract class mr_file_export_abstract extends mr_plugin {
    /**
     * Passed to get_string calls.
     *
     * Implementing abstract mr_plugin::get_component()
     *
     * @return string
     */
    public function get_component() {
        return 'local_mr';
    }

    /**
     * Returns the plugin's name based on class name
     *
     * @return string
     */
    public function type() {
        return str_replace(
            array('mr_file_export_', '_'),
            array('', '/'),
            get_class($this)
        );
    }

    /**
     * If the export plugin can generate a file or not.
     *
     * @return boolean
     */
    public function generates_file() {
        return true;
    }

    /**
     * The max export size that the export plugin can handle
     *
     * @return int
     */
    public function max_rows() {
        return 100000;
    }

    /**
     * Init routines, params can be unique to the plugin
     *
     * @param string $name The file name to export to
     * @return void
     */
    public function init($name) {}

    /**
     * Get the file extension generated by the export class
     *
     * @return string
     */
    abstract public function get_extension();

    /**
     * Header setup
     *
     * @param array $headers Array of header names in correct order
     * @return void
     */
    abstract public function set_headers($headers);

    /**
     * Add a row to the export
     *
     * @param array $row Row cell values
     * @return void
     */
    abstract public function add_row($row);

    /**
     * Close the export and return whatever the export generated
     *
     * @return mixed
     */
    abstract public function close();

    /**
     * Run any cleanup routines
     *
     * @return void
     */
    public function cleanup() {}
}
