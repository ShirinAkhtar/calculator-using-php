<?php
?>

<html>
    <head>
        <title>Simple Calculator Using AJAX/PHP</title>
        <link rel="stylesheet" href="trycal.css"> 
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    </head>
    <body>
<h5>Simple Calculator Using AJAX/PHP</h5>

<table width="120" height="120px">
    <tr>
        <td colspan="7"><textarea id="display"></textarea></td>
    </tr>
    <tr>
        <td><input value="7" type="button" class="but"/></td>
        <td><input value="8" type="button" class="but"/></td>
        <td><input value="9" type="button" class="but"/></td>
        <td><input id="plus" value="+" type="button" class="opt"></td>        
    </tr>
    <tr>
        <td><input value="4" type="button" class="but"/></td>
        <td><input value="5" type="button" class="but"/></td>
        <td><input value="6" type="button" class="but"/></td>
        <td><input id="sub" value="-" type="button" class="opt"></td>
    </tr>
    <tr>
        <td><input value="1" type="button" class="but"/></td>
        <td><input value="2" type="button" class="but"/></td>
        <td><input value="3" type="button" class="but"/></td>
        <td><input id="mul" value="*" type="button" class="opt"></td>
        
    </tr>
    <tr>
        <td><input value="0" type="button" class="but"/></td>
        <td><input id="dot" value="." type="button" class="but"></td>
        <td><input id="div" value="/" type="button" class="opt"></td>
        <td><input value="C" type="button" class="clr"></td>
        </td>
    </tr>
    <tr>
        <td colspan="5"><input id="eql" value="=" type="button" class="opt"></td>
    </tr>
</table>

<script> 
    var num = "";
    var res = 0;
    var opt = '+';
    $('.but').click(function(){
        num += $(this).val();
        $('#display').html(num);  
    });  

   
    $('.opt').click(function(){
        
        var operator = $(this).val();
        console.log(operator);
        $('#display').html(operator);
        
            $.ajax({
                url:'ajax1.php',
                type: "POST",
                dataType: 'JSON',
                data:{num:num, operator:operator, res:res, opt:opt},
                success: function(msg) {

                    res = msg['result'];
                    num = '';
                    opt = msg['operator'];
                    $('#display').html(res); 
                    console.log(res);
                },
                error: function(){
                    $('#display').html('Oops! An error occured');
                }
            });
        });
        $('.clr').on('click', function(){
            num = "";
            $('#display').html(""); 
            res = 0;
            opt = '+';
        });
   
            
</script>
</body>
</html>