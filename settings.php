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
 * Settings for the My Achievement Points block.
 *
 * @package    block_myachievementpoints
 * @copyright  2018 Test Valley School
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/*** Achievements API settings ***/
$settings->add(new admin_setting_heading(
	'block_myachievementpoints_api_header',
	get_string('config_achievements_api_header', 'block_myachievementpoints'),
	get_string('config_achievements_api_information', 'block_myachievementpoints')
));

$settings->add(new admin_setting_configtext(
	'block_myachievementpoints_api_base',
	get_string('config_achievements_api_base', 'block_myachievementpoints'),
	get_string('config_achievements_api_base_desc', 'block_myachievementpoints'),
	'',
	PARAM_NOTAGS,
	null
));

$settings->add(new admin_setting_configtext(
	'block_myachievementpoints_api_namespace',
	get_string('config_achievements_api_namespace', 'block_myachievementpoints'),
	get_string('config_achievements_api_namespace_desc', 'block_myachievementpoints'),
	'',
	PARAM_NOTAGS,
	null
));

$settings->add(new admin_setting_configtext(
	'block_myachievementpoints_api_route',
	get_string('config_achievements_api_route', 'block_myachievementpoints'),
	get_string('config_achievements_api_route_desc', 'block_myachievementpoints'),
	'',
	PARAM_NOTAGS,
	null
));

$settings->add(new admin_setting_configtext(
	'block_myachievementpoints_api_user',
	get_string('config_achievements_api_user', 'block_myachievementpoints'),
	get_string('config_achievements_api_user_desc', 'block_myachievementpoints'),
	'',
	PARAM_NOTAGS,
	null
));

$settings->add(new admin_setting_configpasswordunmask(
	'block_myachievementpoints_api_pass',
	get_string('config_achievements_api_pass', 'block_myachievementpoints'),
	get_string('config_achievements_api_pass_desc', 'block_myachievementpoints'),
	''
));


