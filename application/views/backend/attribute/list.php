<!DOCTYPE html>
<html>
    <?php echo $head ?>
    <body>
        <?php echo $head?>
        <div class="container">
            <div class="inner-container">
                <p><a href="<?php echo base_url().'index.php/attribute/add'?>"><button>Add new</button></a></p>
                <?php if(count($attributes) == 0): ?>
                There are currently no attributes
                
                <?php else :?>
                <table>
                    <thead>
                        <tr>
                            <th>Attribute</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($attributes as $attribute): ?>
                        <tr>
                            <td><?php echo $attribute->attribute_name ?></td>
                            <td><a href="<?php echo base_url().'index.php/attribute/edit/'.$attribute->attribute_id ?>"><button>Edit</button></a>
                                <a href="<?php echo base_url().'index.php/attribute/delete/'.$attribute->attribute_id ?>"><button>Delete</button></a></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php endif?>
            </div>
        </div>
        <?php echo $footer ?>
    </body>
</html>
