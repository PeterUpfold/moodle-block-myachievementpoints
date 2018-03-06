<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Block to show a pupil's own achievement point totals from The Hub.
 *
 * @package    block_myachievementpoints
 * @copyright  2018 Test Valley School
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace block_myachievementpoints\output;

defined('MOODLE_INTERNAL') || die();

/**
 * Display the My Achievement Points block.
 */
class block implements \renderable, \templatable {

	/**
	 * Data to be substituted into the template.
	 */
	protected $data;

	/**
	 * Create the instance of this renderable.
	 *
	 * @var $data \stdClass The data to be substituted into the template.
	 */
	public function __construct($data) {
		$this->data = $data;
	}

	/**
	 * Prepare data for use in a template.
	 *
	 * @return array
	 */
	public function export_for_template(\renderer_base $output) {
		return $this->data;	
	}

};
