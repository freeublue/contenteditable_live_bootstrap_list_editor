<?
require "bootstraptop.php";
?>
<form action='processlistform.php' method='post'>
<label>Add a Name to Identify your list, no spaces, numbers or other characters</label><br><input type='text' name='title' /><br><label>Number of fields</label><br><select name='fieldnum'>
<?
$arr = range(1, 50, 1);
foreach($arr as $ar) { 
echo "<option value='$ar'>$ar</option>";
} 
?>
</select><br>
<br><label>List type</label><br><select name='type'>
<option value='num'>Numbered List</option>
<option value='bullet'>Bulleted List</option>
<option value='unstyled'>No bullets or number(unstyled)</option>
<option value='icon'>Ticked icon list</option>
</select>

<input type='submit' name='submit' value='submit' /></form>