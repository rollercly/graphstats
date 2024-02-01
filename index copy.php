<?php
// This file is part of Moodle - https://moodle.org/
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
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

/**
 * Plugin strings are defined here.
 *
 * @package     report_graphstats
 * @category    string
 * @copyright   2024 Jose Lorenzo <jos.lorenzo@outlook.com>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
require_once(__DIR__ . '/../../config.php');
require_once($CFG->libdir . '/adminlib.php');
require_once($CFG->dirroot.'/report/graphstats/lib.php');

admin_externalpage_setup('reporteventlists');

///////////////

require_login(); // Requiere que el usuario esté autenticado

$courseid = required_param('id', PARAM_INT); // Obtén el ID del curso de la URL

$context = context_course::instance($courseid); // Obtiene el contexto del curso
require_capability('moodle/course:viewparticipants', $context); // Verifica los permisos de acceso al curso

$PAGE->set_context($context); // Establece el contexto de la página

$course = get_course($courseid); // Obtiene información del curso
$participants = get_enrolled_users($context); // Obtiene los usuarios inscritos en el curso

// Inicia la salida HTML
echo $OUTPUT->header();
echo '<h2>Usuarios inscritos en '.$course->fullname.'</h2>';
echo '<ul>';
foreach ($participants as $participant) {
    echo '<li>'.$participant->firstname.' '.$participant->lastname.'</li>'; // Muestra el nombre completo del usuario
}
echo '</ul>';
echo $OUTPUT->footer();
