<head>
    <title><?php echo $title ?></title>
    <link type="text/css" href="<?php echo base_url() ?>css/style.css" rel="stylesheet" />
    <script type="text/javascript" src="<?php echo base_url() ?>js/jquery.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
           
           //when key is pressed down post value
           $( ".search-box" ).keyup(function() {
               
              $.post( "<?php echo base_url().'index.php/contactbook/ajaxsearch' ?>", { search: $(this).val() })
              
                .done(function( data ) {
                    
                    //if input not empty display results box
                    if($('.search-box').val() != ''){
                        $('.ajax-search-box').css('display','block');
                    }
                    
                    $('.ajax-search-box').html(data);
                });
                
                //if searchbox empty hide box
                if($(this).val() == ''){
                    $('.ajax-search-box').css('display','none');
                }
            });
           
        });
    </script>
</head>