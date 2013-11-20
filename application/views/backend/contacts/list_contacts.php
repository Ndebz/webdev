<!DOCTYPE>
<html>
    <?php echo $head?>
    <body>
        <?php echo $header?>
        <div class="container">
            <p><a href="<?php echo base_url() ?>index.php/contacts/add"><button class="add-new">Add New Contact</button></a></p>
            <!-- if contacts exist -->
            <?php if(count($contacts) > 0): ?>
            <table  align="center" class="admin-view-contact">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Company</th>
                        <th>Published</th>
                        <th>Home Phone</th>
                        <th>Work Phone</th>
                        <th>Cell Phone</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>     
                </thead>
                    <tbody>
                        <?php foreach($contacts as $contact): ?>
                        <tr>
                            <td><?php echo $contact->firstname.' '.$contact->lastname ?></td>
                            <td><?php echo $contact->category ?></td>
                            <td><?php echo $contact->company ?></td>
                            <td><?php if($contact->access_level == 1){ echo 'Published'; } else{ echo 'Unpublished' ;} ?></td>
                            <td><?php echo $contact->home_phone ?></td>
                            <td><?php echo $contact->work_phone ?></td>
                            <td><?php echo $contact->cell_phone?></td>
                            <td><?php echo $contact->email ?></td>
                            <td><a href="<?php echo base_url() ?>index.php/contacts/edit/<?php echo $contact->id ?>"><button>Edit</button></a> <a href="#"><button>Delete</button></a></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
            </table>
            <?php else : ?>
            <!-- if no contacts  -->
            <?php endif ?>
        </div>
        <?php echo $footer?>
    </body>
</html>
