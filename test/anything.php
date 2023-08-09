<?php
function re($d){
  echo $d;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
      var d=10;
    $(document).ready(function(){
      $("button").click(function(){
        $.post("php.php",
        {
          name: "Donald Duck",
          city: "Duckburg"
        },
        function(data=new array,status){
          d=data;
          console.log(d);
          alert("Data: " + data + "\nStatus: " + status);
        });
      });
    });
    </script>
</head>
<button>click</button>
<body>
    
</body>
</html>