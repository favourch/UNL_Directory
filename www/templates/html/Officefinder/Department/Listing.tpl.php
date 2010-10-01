<?php
$address = $context->address;
if (preg_match('/^([A-Z]+)\s/', $context->address, $matches)) {
    $address = str_replace($matches[1], '<a class="location mapurl" href="http://maps.unl.edu/#'.$matches[1].'">'.$matches[1].'</a>', $context->address);
}

if ($context->userCanEdit(UNL_Officefinder::getUser())) {
    echo '<div class="edit">';
    echo ' <a href="'.$context->getURL().'&amp;format=editing" class="action edit" title="Edit">edit</a>'.PHP_EOL;
    echo $savvy->render($context, 'Officefinder/Department/Listing/SortForm.tpl.php');
    include dirname(__FILE__).'/../../../editing/Officefinder/Department/DeleteForm.tpl.php';
    echo ' <a href="'.UNL_Officefinder::getURL(null, array('view'      => 'department',
                                                          'parent_id' => $context->id)).'&amp;format=editing" class="action addchild" title="Add Child">Add child</a>';
    echo '</div>';
}
?>
<div class="listingDetails">
    <?php echo $context->name ?>
    <span class="tel"><?php echo $savvy->render($context->phone, 'Peoplefinder/Record/TelephoneNumber.tpl.php') ?></span>
    <?php if (isset($context->building)): ?>
    <span class="room"><?php echo $context->room.' <a class="location mapurl" href="http://maps.unl.edu/#'.$context->building.'">'.$context->building.'</a>'; ?></span>
    <?php endif; ?>
    <span class="adr"><?php echo $address; ?></span>
    <span class="postal-code"><?php echo $context->postal_code; ?></span>
</div>
