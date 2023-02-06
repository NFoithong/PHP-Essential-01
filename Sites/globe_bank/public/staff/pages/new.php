<?php

require_once('../../../private/initialize.php');

// 1. Add form for /staff/pages/new.php 
// 2. Add form for /staff/pages/edit.php
// 3. Add links to both pages
// Remember: editing requires a page ID
// 4. Add single-page form processing for both forms
// 5. If a form was not submitted, display form
// 6. Display submitted menu_name on the forms
// Bonus: display submitted position and visibilty on forms

$menu_name = '';
$position = '';
$visible = '';

if(is_post_request()) {
	
	// Handle form values sent by new.php
	
	$menu_name = $_POST['menu_name'] ?? '';
	$position = $_POST['position'] ?? '';
	$visible = $_POST['visible'] ?? '';
	
	echo "Form parameters<br />";
	echo "Menu Name: " . $menu_name . "<br />";
	echo "Positione: " . $position . "<br />";
	echo "Visible: " . $visible . "<br />";
}


?>

<?php $page_title = 'Create Page'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
	<a class="back-link" href="<?php echo url_for('/staff/pages/index.php'); ?>">&laquo; Back to List</a>
	<div class="page new">
		<h1>Create Page</h1>
		
		<form action="<?php echo url_for('/staff/pages/new.php'); ?>" method="post">
			<dl>
				<dt>Menu Name</dt>
				<dd><input type="text" name="menu_name" value="<?php echo h($menu_name); ?>" /></dd>
			</dl>
			<dl>
				<dt>Position</dt>
				<dd>
				<select name="position">
					<option value="1"<?php if($position == "1") { echo " selected"; } ?>>1</option>
				</select>
				</dd>
			</dl>
			<dl>
				<dt>Visible</dt>
				<dd>
					<input type="hidden" name="visible" value="0" />
					<input type="checkbox" name="visible" value="1" <?php if($visible == "1") { echo " checked"; } ?> />
				</dd>
			</dl>
			<div id="operations">
				<input type="submit" value="Create Page" />
			</div>
		</form>
		
	</div>
</div>