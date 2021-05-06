<?php
include('3cx_connect.inc.php');

$query = "SELECT MOD(E.currentprofile, 5) AS p, e.qstatus AS q FROM (extension e JOIN dn d ON ((e.fkiddn = d.iddn))) WHERE d.value = '{$_GET['EXT']}'";
$result = pg_query($query);
$ext_status = pg_fetch_array($result);

header('Content-Type: application/xml');
?>
<?xml version="1.0" encoding="UTF-8"?>
<SnomIPPhoneMenu>
    <Title>3CX Menü</Title>
    <MenuItem>
        <Name>Nebenstelle (<?php echo $PRESENCE[$ext_status['p']]; ?>)</Name>
        <URL>http://<?php echo $_SERVER['HTTP_HOST']; ?>/snom/3cx_presence.xml</URL>
    </MenuItem>

    <MenuItem>
        <Name>Warteschleife (<?php echo $QUEUE[$ext_status['q']]; ?>)</Name>
        <URL>http://<?php echo $_SERVER['HTTP_HOST']; ?>/snom/3cx_queue.xml</URL>
    </MenuItem>

    <MenuItem>
        <Name>3CX Nebenstellen</Name>
        <URL>http://<?php echo $_SERVER['HTTP_HOST']; ?>/snom/3cx_ext.php?EXT=<?php echo $_GET['EXT']; ?></URL>
    </MenuItem>
</SnomIPPhoneMenu>
<?php
pg_free_result($result);
pg_close($dbconn);
?>
