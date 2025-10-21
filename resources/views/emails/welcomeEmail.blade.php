<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مرحبا بك في موقعنا</title>
    <style>
        body {
            font-family: 'Coding Task', Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            direction: rtl;
            text-align: right;
        }

        .container {
            max-width: 600px;
            background: #ffffff;
            margin: 20px auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
            text-align: center;
        }

        .details {
            padding: 10px;
            background: #fafafa;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        p {
            font-size: 16px;
            color: #555;
            margin: 5px 0;
        }

        strong {
            color: #333;
        }

        .footer {
            text-align: center;
            font-size: 14px;
            color: #777;
            margin-top: 20px;
            padding-top: 10px;
            border-top: 1px solid #ddd;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>مرحبا بك في موقعنا</h2>

        <div class="details">
            <p><strong>الاسم:</strong> {{ $name }}</p>
            <p><strong>البريد الإلكتروني:</strong> {{ $email }}</p>
            <p><strong>الرسالة:</strong>{{ $userMessage }}</p>
            <p><strong>الموضوع:</strong> {{ $subjectMessage }}</p>
        </div>

        <div class="footer">
            <p>شكرا لك على التسجيل في موقعنا. نحن سعداء لانضمامك إلينا!</p>
        </div>
    </div>
</body>

</html>
