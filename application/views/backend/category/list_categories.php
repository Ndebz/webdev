<html>
    <?php echo $head ?>
    <body>
        <?php echo $header ?>
        <div class="container">
            <div class="admin-form-container">
                <p><a href="<?php echo base_url() ?>index.php/category/add"><button class="add-new">Add New Category</button></a></p>
            <?php if(count($categories) > 0): ?>
            <table cellspacing="2" cellpadding="4" class="category-list">
                <thead>
                    <tr>
                        <th>#</th>
                        <th width="277px">Category Name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($categories as $category): ?>
                    <tr>
                        <td><?php echo $category->id; ?></td>
                        <td><a href="<?php echo base_url() ?>index.php/category/edit/<?php echo $category->id ?>"><?php echo $category->category_name; ?></a></td>  
                    </tr>
                    <?php endforeach?>
                </tbody>
            </table>
            <?php endif ?>
            </div>
        </div>
    </body>
</html>
