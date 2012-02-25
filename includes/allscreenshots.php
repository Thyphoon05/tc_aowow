<?php

require_once('includes/game.php');

function getscreenshots($type, $typeid)
{
	global $DB;
	global $rDB;

	// TODO: AND moderated=1
	$rows = $DB->select('
		SELECT id, username, date, body, width, height
		FROM ?_screenshots
		WHERE type=? AND typeid=? 
		ORDER BY date
		',
		$type, $typeid
	);

	$screenshots = array();

	foreach($rows as $i=>$row)
	{
		$screenshots[$i] = array();
		//$comments[$i] = $rDB->selectRow('SELECT username as user,id as uid, (SELECT gmlevel from account_access where id = uid ) as roles FROM account WHERE id=? LIMIT 1', $row['userid']);
	//	if (!(IsSet($comments[$i]['user'])))
	//		$comments[$i]['user'] = "Anonymous";
		$screenshots[$i]['number'] = $i;
		$screenshots[$i]['user'] = $row['username'];
		$screenshots[$i]['body'] = $row['body'];
		$screenshots[$i]['date'] = $row['date'];
		$screenshots[$i]['width'] = $row['width'];
		$screenshots[$i]['height'] = $row['height'];
		$screenshots[$i]['type'] = $type;
		$screenshots[$i]['typeId'] = $typeid;
		$screenshots[$i]['id'] = $row['id'];
	}

	return $screenshots;
}

?>