<?php

/**
 * The main cost center configuration form
*
* It uses the standard core Moodle formslib. For more info about them, please
* visit: http://docs.moodle.org/en/Development:lib/formslib.php
*
* @package    mod
* @subpackage emarking
* @copyright 2016 Mihail Pozarski <mipozarski@alumnos.uai.cl>
* @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
*/

defined('MOODLE_INTERNAL') || die();

require_once (dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/config.php');
require_once ($CFG->libdir . "/formslib.php");

class emarking_exammodification_form extends moodleform {

	/**
	 * Defines forms elements
	 */
	public function definition() {
		global $DB;
		$examid = required_param('exam', PARAM_INT);
		$category = required_param('category', PARAM_INT);
		$statusicon = optional_param('status', 1, PARAM_INT);
		$mform = $this->_form;
		$mform->addElement('header', 'general', get_string('exammodification', 'mod_emarking'));
		$mform->addElement('text', 'cost',get_string('costofonepage', 'mod_emarking'));
		$mform->addRule('cost', get_string('numericvalue', 'mod_emarking'), 'required', null, 'client');
		$mform->setType('cost', PARAM_INT);
		$mform->addHelpButton('cost', 'numericvalue', 'mod_emarking');
		$mform->addElement('hidden', 'exam', $examid);
		$mform->setType('exam', PARAM_INT);
		$mform->addElement('hidden', 'category', $category);
		$mform->setType('category', PARAM_INT);
		$mform->addElement('hidden', 'status', $statusicon);
		$mform->setType('status', PARAM_INT);
		$this->add_action_buttons(true);

	}
}
