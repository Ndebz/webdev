<!DOCTYPE html>
<html>
    <?php echo $head ?>
    <body>
        <?php echo $header ?>
        <div class="container">
            <div class="inner-container">
                <div class="attribute-assignment-holder">
                    <div class="person left">
                        <h3>Details</h3>
                        <table>
                            <tr>
                                <td>First name: </td>
                                <td><?php echo $person[0]->firstname ?></td>
                            </tr>
                            <tr>
                                <td>Surname: </td>
                                <td><?php echo $person[0]->surname ?></td>
                            </tr>
                            <tr>
                                <td>DOB: </td>
                                <td><?php echo $person[0]->dob ?></td>
                            </tr>
                        </table>
                        <h3>Currently assigned attributes</h3>
                        <?php if(count($assigned_attributes) == 0): ?>
                            Currently no attributes assigned.
                        <?php else: ?>
                            <table>
                                <?php foreach($assigned_attributes as $attribute): ?>
                                    <tr>
                                        <td><label><?php echo $attribute->attribute_name ?>: </label></td>
                                        <td><?php echo $attribute->value ?></td>
                                    </tr>
                                <?php endforeach ?>
                                
                            </table>
                        <?php endif ?>
                    </div>
                    <div class="attributes right">
                        <h3>Available attributes</h3>
                        <?php if(count($available_attributes) == 0):?>
                            Currently no attributes available
                        <?php else: ?>
                            <table>
                                <?php foreach($available_attributes as $attribute ): ?>
                                <tr>
                                    <td><label><?php echo $attribute->attribute_name ?></label></td>
                                    <td><button>Assign</button></td>
                                </tr>
                                <?php endforeach; ?>
                            </table>
                        <?php endif?>
                    </div>
                </div>
            </div>
        </div>
        <?php echo $footer ?>
    </body>
</html>