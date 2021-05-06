<?php
$PRESENCE = array("Verfügbar", "Urlaub", "Abwesend", "Nicht stören", "Pause");
$QUEUE = array("Abgemeldet", "Angemeldet");

$pbx_cfg = parse_ini_file("/var/lib/3cxpbx/Bin/3CXPhoneSystem.ini", TRUE);
$dbpass = $pbx_cfg['DbAdminREADONLY']['Password'];
$dbconn = pg_connect("host=localhost dbname=database_single user=phonesystem password=$dbpass")
    or die('Verbindungsaufbau fehlgeschlagen: ' . pg_last_error());
?>
