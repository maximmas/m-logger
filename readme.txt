=== M-Logger - WordPress PHP logging Plugin ===
Contributor: maximmas
Tags: php, development, wordpress
Requires at least: 4.0
Tested up to: 4.9
Requires PHP: 5.2.17
License: GPLv2

== Description ==

M-Logger plugin allows to check PHP variables values during WordPress development process. 
For example, if you need to check value of the $data variable, write follow code: 

do_action( 'm-logger', $data, 'label' );

there are 'm-logger' is a name of the hook, $data is a traced variable, 'label' - a label for this variable. 

Label is necessary because this action may be used to trace different variables at the same time.

Result will be output in the log.txt file located in the plugin directory. 
