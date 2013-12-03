<!DOCTYPE html>
<html>
    <?php echo $head ?>
    <body>
        <script type="text/javascript">

            $(document).ready(function(){
                $('#assign-attribute-form').submit(function(e){             
                    e.preventDefault();
                    
                    $.post("" , {person_id: $('#person_id').val() , attribute_id: $('#attribute_id').val() , attribute_value: $('#attribute_value').val()})
                    .done(function(data){
                
                    });
                });
            });
            
        </script>
        <?php echo $header ?>
        <div class="container">
            <div class="inner-container">
                <form id="assign-attribute-form">
                    <input type="hidden" id="person_id" value="<?php echo $person_id ?>"/>
                    <input type="hidden" id="attribute_id" value="<?php echo $attribute_id ?>"/>
                    <p>
                        <label><?php echo $attribute[0]->attribute_name ?></label><br>
                        <input type="text" id="attribute_value" name="attribute_value" /><br>
                        <input id="submit-button" type="submit" value="Save" />
                    </p>
                </form>
            </div>
        </div>
    </body>
</html>
