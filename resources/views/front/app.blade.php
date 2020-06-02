<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hello Bulma!</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.2/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <style>
        .twrap {
            text-align: center;
            padding: 80px 60px;
            margin-top: 20%;
            background: #f1f3fa;
            border-radius: 20px;
        }

        .twrap p {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .twrap h3 {
            font-size: 30px;
            margin-bottom: 10px;
            color: #f39727;
        }

        h1.tw-h1 {
            font-size: 72px;
            color: #9C27B0;
            font-weight: 700;
            margin-bottom: 30px;
        }

        span.yesil {
            color: #FF9800;
            font-weight: 800;
        }

        h2.tw-h3 {
            font-size: 32px;
            border-bottom: 1px solid #a157af63;
            color: #9C27B0;
        }
    </style>
</head>
<body>
@yield('content')
</body>
</html>
