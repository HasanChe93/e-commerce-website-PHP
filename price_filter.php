
<!DOCTYPE html>
<html>
<head>
<title>Product Filters Price Range </title>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
    <br />
    <h2 text-align="center">Range price Filteration </h2>
    <br />
        <div class="col-md-3">                                
            <div class="list-group">
                <h3>Price</h3>
                <input type="hidden" id="hidden_minimum_price" value="0" />
                <input type="hidden" id="hidden_maximum_price" value="65000" />
                <p id="price_show">10 - 5000</p>
                <div id="price_range"></div>
            </div>                
        </div>
        <div class="col-md-9">
            <br />
           <div class="row filter_data">
        </div>
    </div>
    </div>
</div>
<style>
#loading{text-align:center; background: url('images/loading.gif') no-repeat center; height: 150px;}
</style>
<script>
$(document).ready(function(){
    filter_data();
    function filter_data()
    {
        $('.filter_data').html('<div id="loading" style="" ></div>');
        var action = 'fetch_data';
        var minimum_price = $('#hidden_minimum_price').val();
        var maximum_price = $('#hidden_maximum_price').val();
        $.ajax({
            url:"fetch_data.php",
            method:"POST",
            data:{action:action, minimum_price:minimum_price, maximum_price:maximum_price},
            success:function(data){
                $('.filter_data').html(data);
            }
        });
    }
    $('#price_range').slider({
        range:true,
        min:50,
        max:5000,
        values:[50, 5000],
        step:50,
        stop:function(event, ui)
        {
            $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
            $('#hidden_minimum_price').val(ui.values[0]);
            $('#hidden_maximum_price').val(ui.values[1]);
            filter_data();
        }
    });
});
</script>
</body>
</html>