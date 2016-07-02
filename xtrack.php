<<<<<<< HEAD
<?php

$user_agent     =   $_SERVER['HTTP_USER_AGENT'];

?>
<!DOCTYPE  HTML  PUBLIC  "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
      <head>
            <title></title>
<script type="text/javascript">
    window.onload = function () {
        var script = document.createElement("script");
        script.type = "text/javascript";
        script.src = "http://jsonip.appspot.com/?callback=DisplayIP";
        document.getElementsByTagName("head")[0].appendChild(script);
    };
    function DisplayIP(response) {
        alert ("Your IP Address is " + response.ip);
    }
</script>
</head>
      <body>
            <INPUT  id="Button1"  type="button"  value="Button"
 name="Button1"  language=javascript  onclick="return Button1_onclick()">
      </body>
</html>
=======
<?php

$user_agent     =   $_SERVER['HTTP_USER_AGENT'];

?>
<!DOCTYPE  HTML  PUBLIC  "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
      <head>
            <title></title>
<script type="text/javascript">
    window.onload = function () {
        var script = document.createElement("script");
        script.type = "text/javascript";
        script.src = "http://jsonip.appspot.com/?callback=DisplayIP";
        document.getElementsByTagName("head")[0].appendChild(script);
    };
    function DisplayIP(response) {
        alert ("Your IP Address is " + response.ip);
    }
</script>
</head>
      <body>
            <INPUT  id="Button1"  type="button"  value="Button"
 name="Button1"  language=javascript  onclick="return Button1_onclick()">
      </body>
</html>
>>>>>>> origin/master
