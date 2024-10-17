<?php
    include  "faktorial.php";
?><html>
<head></head>
<body>
<?php

for ($i = 1; $i < 10; $i++) {
    echo "<div>" .factorial($i). "</div>";
}

?></body>
</html>