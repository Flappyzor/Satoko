<?php
/*
 * Satoko Templating Engine
 * (c)Flashwave <http://flash.moe>
 * Released under the Apache License Version 2
 */

namespace Satoko;

class Templates {
	/*
	 * Highly unsafe template output thing
	 * Only doing this to see if the templates need update (which they do since I made them over 5 months ago or something)
	 */
	function temp_output($tplname) {
		return file_get_contents('tpl/' . $tplname . '.tpl');
	}
}
