<?php if(count($contacts) > 0): ?>
    <p>Suggestions...</p>
    <?php foreach($contacts as $contact):?>
        <p><a href="<?php echo base_url() ?>index.php/contactbook/contact/<?php echo $contact->id ?>"><?php echo $contact->firstname.' '.$contact->lastname ?></a></p>
    <?php endforeach ?>
<?php else:?>
        <p>No Suggestions...</p>
<?php endif; ?>
