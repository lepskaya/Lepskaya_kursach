<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="js/script.js"></script>
    <title>Document</title>
</head>
<body>
    <script>
        $(document).ready(function () {
            $('input[type=button]').click(function () {
                document.cookie = 'test=' + this.id; 
                document.location = 'modules/get_content_array.php';  
        });
        });
    </script>
    <input type="button" value="2" id="2">
    
</body>
</html>