x_stopforumspam
===============

http://stopforumspam.com/ addon for atk4


Usage:

Add $c = $this->add('x_stopforumspam/Controller_StopForumSpam');

Then use one of the three methods:

$c->checkIp('IP for checking (string)');

$c->checkEmail('EMAIL for checking (string)');

$c->checkUserName('USERNAME for checking (string)');


RETURN:

false - if user is not in the bun list

or

true - if user in the bun list
