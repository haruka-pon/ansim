<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32" href="../img/favicon-32x32.png">
    <!-- css -->
    <link rel="stylesheet" href="../css/destyle.css">
    <link rel="stylesheet" href="../css/style.css"><!-- 共通css -->
    <link rel="stylesheet" href="../css/sign_up.css">
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <title>アンシム - 安心フリマ - 新規登録</title>
</head>
<body class="complete_body">
    <!-- 共通ヘッダーとグローバルナビを読み込み -->
    <?php require_once "../view/header_sign.html" ?>
    <section class="complete_section">
        <h1>登録が完了しました</h1>
        <div id="progress">
            <div class="point completed"></div>
            <div class="point completed"></div>
            <div class="point completed"></div>
        </div>
        <div class="complete">
            <p>ありがとうございます！会員情報の登録が完了しました。ログインしてサービス利用をお楽しみ下さい！
            </p>
            <p><img src="../img/complete.jpg" alt=""></p>
            <div><a href="sign_in.php"><button>ログインする</button></a></div>
        </div>
    </section>
    <!-- 共通フッターとグローバルナビを読み込み -->
    <?php require_once "../view/footer.html" ?>

    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/jquery.validate.min.js"></script>
    <script src="../js/ajaxzip3.js"></script>
    <script src="../js/script.js"></script>
</body>
</html>
