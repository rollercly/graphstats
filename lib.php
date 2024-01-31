<?php
function report_graphstats_extend_navigation_course($navigation, $course, $context) {
    if (has_capability('report/graphstats:view', $context)) {
        $url = new moodle_url('/report/graphstatsindex.php', array('id'=>$course->id));
        $navigation->add(get_string('pluginname', 'report_graphstats'), $url, navigation_node::TYPE_SETTING, null, null, new pix_icon('i/report', ''));
    }
}