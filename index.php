<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Constantine IMG Countries States Cities</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body style="text-align: center;">
    <label for="countries">Countries</label><br>
    <select class="form-control" name="countries" id="countries">
        <option value="None" disabled selected>Please select country</option>
    </select>
    <br>
    <label for="states">States</label><br>
    <select class="form-control" name="states" id="states">
    </select>
    <br>
    <label for="cities">Cities</label><br>
    <select class="form-control" name="cities" id="cities">
    </select>
    <script type="text/javascript">
        function getCountries(){
            $.ajax({
                type:'GET',
                url: 'http://localhost/img_csc/countries_json.php',
                data: {},
                success: function(data) {
                    for(var counter = 0; counter < data.length; counter++){
                        $('#countries').append('<option value="'+data[counter].id+'">'+data[counter].name+'</option>');
                    }
                }, error: function(jqXHR, textStatus, errorThrown) {
                    console.log(errorThrown); 
                }
            });
        }
        getCountries();
        $("#countries").on('change', function() {
            var country_id = $(this).val();
            $('#states').children().remove();
            $.ajax({
                type:'GET',
                url: 'http://localhost/img_csc/states_json.php?country_id='+country_id,
                data: {},
                success: function(data) {
                    for(var counter = 0; counter < data.length; counter++){
                        $('#states').append('<option value="'+data[counter].id+'">'+data[counter].name+'</option>');
                    }
                }, error: function(jqXHR, textStatus, errorThrown) {
                    console.log(errorThrown); 
                }
            });
        });
        $("#states").on('change', function() {
            var state_id = $(this).val();
            $('#cities').children().remove();
            $.ajax({
                type:'GET',
                url: 'http://localhost/img_csc/cities_json.php?state_id='+state_id,
                data: {},
                success: function(data) {
                    for(var counter = 0; counter < data.length; counter++){
                        $('#cities').append('<option value="'+data[counter].id+'">'+data[counter].name+'</option>');
                    }
                }, error: function(jqXHR, textStatus, errorThrown) {
                    console.log(errorThrown); 
                }
            });
        });
    </script>
</body>
</html>