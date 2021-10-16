<!DOCTYPE>
<html>
<head>
    <title>Laptop test Example:</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <form action="">
        <p>Please enter your complex calculation.</p>
        <p>Eg: (2+1i)+(3-5i)</p>
        <input type="text" name="complexNumbersManipulation" placeholder="(2+1i)+(3-5i)">
    </form>

    <?php if( isset($request) ) : ?>
        <p>Your calculation request is: <b><?= $request ?></b></p>
    <?php endif; ?>
    <?php if( isset($result) ) : ?>
        <p>The result is: <b><?= $result ?></b></p>
    <?php endif; ?>
</body>
</html>