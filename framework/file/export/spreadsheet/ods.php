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
 * @see mr_file_export_spreadsheet_abstract
 */
require_once($CFG->dirroot.'/local/mr/framework/file/export/spreadsheet/abstract.php');

/**
 * MR File Export Spreadsheet ODS
 *
 * @author Mark Nielsen
 * @package mr
 */
class mr_file_export_spreadsheet_ods extends mr_file_export_spreadsheet_abstract {
    /**
     * Get the file extension generated by the export class
     *
     * @return string
     */
    public function get_extension() {
        return 'ods';
    }

    /**
     * Can only handle 100k
     */
    public function max_rows() {
        return 100000;
    }

    /**
     * Different workbook
     */
    public function new_workbook() {
        global $CFG;

        require_once($CFG->dirroot.'/lib/odslib.class.php');

        return new MoodleODSWorkbook('-');
    }
}
