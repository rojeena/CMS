<?php

/**
 * HybridAuth
 * http://hybridauth.sourceforge.net | http://github.com/hybridauth/hybridauth
 * (c) 2009-2015, HybridAuth authors | http://hybridauth.sourceforge.net/licenses.html
 */
// ----------------------------------------------------------------------------------------
//	HybridAuth Config file: http://hybridauth.sourceforge.net/userguide/Configuration.html
// ----------------------------------------------------------------------------------------

return
		array(
			"base_url" => base_url('members/social/process'),
			"providers" => array(
				"Facebook" => array(
					"enabled" => true,
					"keys" => array("id" => "934308949957590", "secret" => "6ede848949e1bd8817dc639f1b00c67e"),
					"trustForwarded" => false
				),
				"Twitter" => array(
					"enabled" => true,
					"keys" => array("key" => "73aNVrG8B8n4fwDYMg1JvSyrG", "secret" => "YbBEUos0B0PPeSCi1MoTfPpHozTCgIDIwWShwRH9mv2Ap6hJYr"),
					"includeEmail" => false
				)
			),
			// If you want to enable logging, set 'debug_mode' to true.
			// You can also set it to
			// - "error" To log only error messages. Useful in production
			// - "info" To log info and error messages (ignore debug messages)
			"debug_mode" => false,
			// Path to file writable by the web server. Required if 'debug_mode' is not false
			"debug_file" => "",
);
