<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>Hey!</p>

    <p>Sorry , Your {{ $details['className'] }} class on {{ $details['classDateTime']->format('js F') }} at {{ $details['classDateTime']->format('g:i a') }} was Canceled by the instructor .Check the schedule and book another, Thank You</p>

</body>
</html>
