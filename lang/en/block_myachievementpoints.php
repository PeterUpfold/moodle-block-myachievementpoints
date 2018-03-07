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
 * Strings for component 'block_mentees', language 'en', branch 'MOODLE_20_STABLE'
 *
 * @package   block_myachievementpoints
 * @copyright 2018 Test Valley School
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$string['configtitle'] = 'Block title';
$string['configtitleblankhides'] = 'Block title (no title if blank)';
$string['leaveblanktohide'] = 'leave blank to hide the title';
$string['myachievementpoints:addinstance'] = 'Add a new My Achievement Points block';
$string['myachievementpoints:myaddinstance'] = 'Add a new My Achievement Points link block to Dashboard';
$string['introtext'] = 'View your current achievement points totals';
$string['newmyachievementpointsblock'] = '(new My Achievement Points block)';
$string['pluginname'] = 'My Achievement Points';
$string['config_achievements_api_header'] = 'API Access for Achievements';
$string['config_achievements_api_information'] = 'These configuration settings define how the My Achievement Points block will query for achievement totals.';
$string['config_achievements_api_base'] = 'Achievements API Base URI';
$string['config_achievements_api_base_desc'] = 'The base URI of the API endpoint from which achievement data can be queried. Usually will end with <em>/wp-json</em>.';
$string['config_achievements_api_namespace'] = 'Achievements API Namespace';
$string['config_achievements_api_namespace_desc'] = 'The API namespace from which achievement data can be queried. Usually <em>/wp/v2/</em>.';
$string['config_achievements_api_route'] = 'Achievements API Route';
$string['config_achievements_api_route_desc'] = 'The API route for achievement totals. Usually <em>achievement_totals</em>.';
$string['config_achievements_api_user'] = 'Achievements API Username';
$string['config_achievements_api_user_desc'] = 'The username to use to authenticate with the achievements API.';
$string['config_achievements_api_pass'] = 'Achievements API Password';
$string['config_achievements_api_pass_desc'] = 'The password to use to authenticate with the achievements API.';
$string['nokey'] = 'A required configuration key was not found.';
$string['notconfigured'] = 'Unable to show your Achievement Points at this time, as the administrator needs to configure this feature.';
$string['requestfailed'] = 'Unable to show your Achievement Points at this time (error %d).';
$string['noresults'] = 'Unable to show your Achievement Points at this time, as they were not found in the system.';
$string['exceptionduringrequest'] = 'Unable to show your Achievement Points at this time, as there was an error during the request.';
$string['notloggedin'] = 'You need to be logged in with a pupil account to see these details.';
$string['latencydisclaimer'] = 'This system is updated once per day.';
$string['cachedef_achievement_totals'] = 'Stores achievement total data for a user\'s session.';
$string['total_achievement_points_label'] = 'Achievement Points';
$string['total_conduct_points_label'] = 'Overall Achievement Points Total';
$string['negative_conduct_points'] = '--';
$string['total_behaviour_points_label'] = 'Behaviour Points';
$string['high_behaviour_points'] = '!';
$string['total_conduct_points_consists_of'] = 'calculated from&hellip;';
