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

class block_myachievementpoints extends block_base {

    public function init() {
        $this->title = get_string('pluginname', 'block_myachievementpoints');
    }

    public function applicable_formats() {
        return array('all' => true, 'tag' => false);
    }

    public function specialization() {
        $this->title = isset($this->config->title) ? $this->config->title : get_string('newmyachievementpointsblock', 'block_myachievementpoints');
    }

    public function instance_allow_multiple() {
        return true;
    }

    /**
     * Allow the use of the global settings for this block.
     */
    public function has_config() {
	return true;
    }

    /**
     * Determine whether or not the block is correctly configured for API access.
     *
     * @return bool
     */
    protected function is_configured() {
	global $CFG;

	$searchfor = array(
		'api_base',
		'api_namespace',
		'api_route',
		'api_user',
		'api_pass'
	);

	foreach($searchfor as $configkey) {
		if (!property_exists($CFG, 'block_myachievementpoints_' . $configkey)) {
			debugging(sprintf('%s (%s)', get_string('nokey', 'block_myachievementpoints'), $configkey), DEBUG_DEVELOPER);
			return false;
		}
		$completekey = 'block_myachievementpoints_' . $configkey;

		if (!isset($CFG->$completekey)) {
			return false;
		}
		if (empty($CFG->$completekey)) {
			return false;
		}
	}
	return true;
    }

    public function get_content() {
        global $CFG, $USER, $DB;

        if ($this->content !== NULL) {
            return $this->content;
        }	

	// initialise block content object
        $this->content = new stdClass();
	$this->content->text = '';
	$this->content->footer = '';

	if (empty($this->instance)) {
		return $this->content;
	}

	if (!$USER->id) {
		//$this->content->text .= html_writer::tag( 'p', get_string('notloggedin', 'block_myachievementpoints') );
		// empty content if not logged in -- block will not appear
		$this->content->text = '';
		$this->content->footer = '';
		return $this->content;
	}

	// are the block's global config options configured correctly? if not, fail early
	if (!$this->is_configured()) {
		$this->content->text .= html_writer::tag( 'p', get_string('notconfigured', 'block_myachievementpoints') );
		$this->content->footer = '';
		return $this->content;
	}

	// data for template
	$data = new \stdClass();

	// is the data already in the cache?
	$cache = cache::make('block_myachievementpoints', 'achievement_totals');
	if ($cache->get('total_achievement_points')) {
		debugging('Used cache', DEBUG_DEVELOPER);
		$data->total_achievement_points = $cache->get('total_achievement_points');
		$data->total_conduct_points = $cache->get('total_conduct_points');
		$data->total_behaviour_points = $cache->get('total_behaviour_points');
	}
	else {
		require_once( dirname(__FILE__) . '/classes/local/hub_api_request.php' );

		debugging('Did not use cache', DEBUG_DEVELOPER);
		try {
			$request = new \block_myachievementpoints\local\WP_REST_API_Request(
				$CFG->block_myachievementpoints_api_base,
				$CFG->block_myachievementpoints_api_namespace,
				$CFG->block_myachievementpoints_api_route,
				$CFG->block_myachievementpoints_api_user,
				$CFG->block_myachievementpoints_api_pass
			);
			$request->timeout = 2;
			$request->add_query_argument('orderby', 'date');
			$request->add_query_argument('order', 'desc');
			$request->add_query_argument('status', 'private');
			$request->add_meta_query('username', $USER->username, '=');
			
			$result = $request->request();
		}
		catch (Exception $e) {
			$this->content->text .= html_writer::tag( 'p', get_string('exceptionduringrequest', 'block_myachievementpoints') );
		}

		if ($request->status == 200 && is_array($result) && count($result) > 0) {
			$data->total_achievement_points = intval($result[0]->total_achievement_points);
			$data->total_conduct_points = intval($result[0]->total_conduct_points);
			$data->total_behaviour_points = intval($result[0]->total_behaviour_points);

			$cache->set('total_achievement_points', $data->total_achievement_points);
			$cache->set('total_conduct_points', $data->total_conduct_points);
			$cache->set('total_behaviour_points', $data->total_behaviour_points);
		}
		else if ($request->status == 200) {
			//$this->content->text .= html_writer::tag( 'p', get_string('noresults', 'block_myachievementpoints'));
			// empty content if no results -- block will not appear
			return $this->content;
		}
		else {
			$this->content->text .= html_writer::tag( 'p', sprintf(get_string('requestfailed', 'block_myachievementpoints'), $request->status));
			return $this->content;
		}
	}

	// if data is out of range, we don't want to display it
	if ($data->total_conduct_points < 0) {
		$data->total_conduct_points = get_string('negative_conduct_points', 'block_myachievementpoints');	
		$data->total_behaviour_points = get_string('high_behaviour_points', 'block_myachievementpoints');	
	}

	// normal rendering if we have data
	$renderer = $this->page->get_renderer('block_myachievementpoints');
	$block = new \block_myachievementpoints\output\block($data);

	$this->content->text .= $renderer->render($block);

        return $this->content;
    }

    /**
     * Returns true if the block can be docked.
     * The mentees block can only be docked if it has a non-empty title.
     * @return bool
     */
    public function instance_can_be_docked() {
        return parent::instance_can_be_docked() && isset($this->config->title) && !empty($this->config->title);
    }
}

