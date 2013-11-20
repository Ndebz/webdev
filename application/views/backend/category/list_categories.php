<html>
    <?php echo $head ?>
    <body>
        <?php echo $header ?>
        <div class="container">
            <p><a href="<?php echo base_url() ?>index.php/category/add"><button class="add-new">Add New Category</button></a></p>
            <?php if(count($categories) > 0): ?>
            <table cellspacing="2" cellpadding="4" class="contact-list">
                <thead>
                    <tr>
                        <th>#</th>
                        <th width="277px">Category Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($categories as $category): ?>
                    <tr>
                        <td><?php echo $category->id; ?></td>
                        <td><?php echo $category->category_name; ?></td>
                        <td><a href="<?php echo base_url() ?>index.php/category/edit/<?php echo $category->id ?>"><button>Edit</button></a> <a href="#"><button>Delete</button></a></td>
                    </tr>
                    <?php endforeach?>
                </tbody>
            </table>
            <?php endif ?>
        </div>
    </body>
</html>
