<?php
include('3cx_connect.inc.php');

$query = "SELECT d.value AS dn,
    (concat_ws(', '::text, u.lastname, u.firstname))::character varying AS name
   FROM ((users u
     JOIN extension e ON ((u.fkidextension = e.fkiddn)))
     JOIN dn d ON ((e.fkiddn = d.iddn)))
   ORDER BY 2";
   
$result = pg_query($query);

header('Content-Type: application/xml');
?>
<?xml version="1.0" encoding="UTF-8"?>
<SnomIPPhoneDirectory>
    <Title>3CX Nebenstellen</Title>
<?php
while($ext = pg_fetch_row($result)) {
    echo "    <DirectoryEntry>\n";
    echo "        <Name>{$ext[1]}</Name>\n";
    echo "        <Telephone>{$ext[0]}</Telephone>\n";
    echo "    </DirectoryEntry>\n";
}
?>
</SnomIPPhoneDirectory>
<?php
pg_free_result($result);
pg_close($dbconn);
?>
