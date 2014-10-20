What?
---

This is a PHP script to extract LSL keywords from an XML file contained within the Second Life viewer app.

Specifically, this file: `viewer-release/indra/newview/app_settings/keywords_lsl_default.xml`

Install
---

The script uses some components which are not distributed with it. In order to gather them, you need to install Composer and then use it to install the dependencies.

If you don't know how to do this, here's a cheat sheet:

	cd lsl_keywords # this is the project directory
	curl -sS https://getcomposer.org/installer | php
	php composer.phar install

Useage
---

	php lslkeywords.php [path/keywords_lsl_default.xml]

It will write a file into the current directory called `language-lsl.cson`.

You then place this file into the `scoped-properties` directory of an Atom package.

Who?
---

This pile of PHP was written by Solo Mornington on Second Life.
