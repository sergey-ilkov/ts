<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Відновлення паролю</title>

    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap');
    </style>
</head>

<body style="margin:0;padding:0" bgcolor="#ffffff">

    <div style="margin:0;padding:10px" bgcolor="#fafafa">
                                                
        <table width="100%" cellspacing="0" cellpadding="0" role="presentation">
            <tbody>
                <tr>
                    <td bgcolor="#fafafa" style="border-radius:5px; padding:30px 20px 30px 20px; ">
                        <table border="0" cellspacing="0" cellpadding="0" role="presentation"
                            style="font-family:Open Sans,sans-serif;font-weight:400;color:#141414;line-height:1.2;font-size:16px">
                            <tbody>                               
                                <tr>
                                    <td style="padding-bottom:20px">
                                        <span style="font-size:20px;font-weight:600; color:#141414;">
                                            Відновлення паролю.
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-bottom:10px">
                                        <span style="font-size:16px;color:#141414; font-weight:400;">
                                            Ви можете встановити новий пароль за посиланням нижче:
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-bottom:40px">                                       
                                        <a style="color:#18b2de; font-size:16px;font-weight:400;" href="{{ route('password.reset.index', $data['token']) }}" target="_blank">
                                            {{ __('Встановити новий пароль') }}
                                            {{-- {{ route('password.reset.index', $data['token']) }} --}}
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span style="color:#141414; font-weight:400; font-style: italic;">
                                            Не звертайте увагу на цей лист, якщо ви не відновлюєте пароль на сайті:
                                        </span>  
                                        <a style="color:#18b2de;" href="{{ route('home') }}">
                                            {{ route('home') }}
                                        </a>                                                                      
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>                                        
        </table>

    </div>

</body>

</html>