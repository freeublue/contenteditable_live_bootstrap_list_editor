<?
$title = $_POST['title'];
$numberFields = $_POST['fieldnum'];
$typexx = $_POST['type'];
echo "$title $numberFields $type";
include "../../configadmin.php";
$sq = $db->query("INSERT INTO listtb (li_title, li_fields, li_type)values('$title', '$numberFields', '$typexx')");
if($typexx == 'num') { 
$type = 'ol';
$listclass = 'list_styled'; } 
elseif($typexx == 'bullet') { 
$type = 'ul';
$listclass = 'list_styled';
} 
elseif($typexx == 'unstyled') { 
$type = 'ul';
$listclass = 'list_unstyled';
} 

?>
<?
include "bootstraptop.php";
function blisted($id, $type, $listclass, $contentarray, $opt) {   
if($type == ul) { 
echo "<ul id='$id' class='$listclass'>"; } else { 
echo "<ol id='$id' class='$listclass'>"; }     

$size = count($contentarray);
for($i=0;$i<$size;$i++) { 
$gid = $opt[$i];
        echo "<li contenteditable='true' id='$gid'>$contentarray[$i] $gid</li>"; } 
        if($type == ul) { 
      echo "</ul>"; } else { 
echo "</ol>"; } 
      } 
      
 $ssq = $db->query("SELECT * FROM listtb WHERE li_title = '$title'");
while($row = $ssq->fetchArray(SQLITE3_ASSOC) ) { 

$idd = $row[li_id];
}    
      
      ?>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Make a list
</button>
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add items to list</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"><h4>Click on an item to change</h4>
      <?
        $id = $title;
      $opt = array();
      $listclass = $listclass;
      $contentarray = range(1, $numberFields, 1);
      for($i=0;$i<$numberFields;$i++) { 
      $opt[] = 'innercss' . $i; } 
      
      blisted($id, $type, $listclass, $contentarray, $opt);
      ?>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" onclick='savelist();' class="btn btn-primary">Save changes</button>
      </div>
    </div></div><form action='savelist.php' method='post' name='mylist'><textarea rows='20' cols='20' name='content' id="saves"></textarea><input type='text' value='<? echo $idd; ?>' name='idd' /><input type='submit' name='submit' value='submit' /></form>
    <?
    require "../../bootstrapbottom.php";
    echo " fields $numberFields";
    ?>
    <script>
    var numfields = "<? echo $numberFields; ?>";
    function savelist() {
    var i;
   
   for(i=0;i<numfields;i++) { 
   var itemname = 'innercss' + i;
    document.getElementById("saves").innerHTML =  document.getElementById("saves").innerHTML + document.getElementById(itemname).innerHTML + ","; }
    }
    
    </script>
  