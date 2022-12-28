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
<body>
    <!-- 共通ヘッダーとグローバルナビを読み込み -->
    <?php require_once "../view/header_sign.html" ?>
    <section>
        <h1>入力内容の確認</h1>
        <!-- 入力内容の確認 -->
        <div id="progress">
            <div class="point completed"></div>
            <div class="point current"></div>
            <div class="point"></div>
        </div>
        <div class="items">
            <div class=item_title>氏名</div>
            <div class="item_detail"><?php echo $data['name']["value"]; ?></div>
        </div>
        <div class="items">
            <div class=item_title>ユーザー名</div>
            <div class="item_detail"><?php echo $data['user_name']["value"]; ?></div>
        </div>
        <div class="items">
            <div class=item_title>メールアドレス</div>
            <div class="item_detail"><?php echo $data['email']["value"]; ?></div>
        </div>
        <div class="items">
            <div class=item_title>パスワード</div>
            <div class="item_detail"><?php echo str_repeat("●",strlen($data['password']["value"])); ?></div>
        </div>
        <div class="items">
            <div class=item_title>郵便番号</div>
            <div class="item_detail"><?php echo $data['post_number']["value"]; ?></div>
        </div>
        <div class="items">
            <div class=item_title>住所</div>
            <div class="item_detail"><?php echo $data['address']["value"]; ?></div>
        </div>
        <div class="items">
            <div class=item_title>電話番号</div>
            <div class="item_detail"><?php echo $data['tel']["value"]; ?></div>
        </div>
        <form action="" method="post">
            <div class="btn_box">
                <button type="submit" name="submit" value="back" class="btn back">修正する</button>
                <button type="submit" name="submit" value="register"　class="btn">登録する</button>
            </div>
        </form>
    </section>
    <!-- 共通フッターとグローバルナビを読み込み -->
    <?php require_once "../view/footer.html" ?>

    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/jquery.validate.min.js"></script>
    <script src="../js/ajaxzip3.js"></script>
    <script src="../js/script.js"></script>
</body>
</html>
