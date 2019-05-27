<?
$content = $_POST['content'];
$idd = $_POST['idd'];

echo "$content $idd";
include "../../configadmin.php";
$sq = $db->query("UPDATE listtb SET li_contar = '$content' WHERE li_id = '$idd'");

include "bootstraptop.php";
function blist($id, $type, $listclass, $contentarray, $opt) {   
if($type == ul) { 
echo "<ul id='$id' class='$listclass'>"; } else { 
echo "<ol id='$id' class='$listclass'>"; }     

$size = count($contentarray);
for($i=0;$i<$size;$i++) { 
$gid = $opt[$i];
        echo "<li id='$gid'>$contentarray[$i] $gid</li>"; } 
        if($type == ul) { 
      echo "</ul>"; } else { 
echo "</ol>"; } 
      } 
      
$sq = $db->query("SELECT * FROM listtb WHERE li_id = '$idd'");
while($row = $sq->fetchArray(SQLITE3_ASSOC) ) { 
echo "$row[li_title]<br>";
echo "$row[li_type]<br>";
echo "$row[li_fields]<br>";
echo "$row[li_contar]<br>";
$ti = $row['li_title'];
$typexx = $row['li_type'];
if($typexx == 'num') { 
$type = 'ol';
$listclass = 'list_styled'; } 
elseif($typexx = 'bullet') { 
$type = 'ul';
$listclass = 'list_styled';
} 
elseif($typexx == 'unstyled') { 
$type = 'ol';
$listclass = 'list_unstyled';
} 
$cont = $row['li_contar'];
$contf = substr($cont, 0, -1);
$contentarray = explode(',', $contf);
blist($id, $type, $listclass, $contentarray, $opt);
} 
