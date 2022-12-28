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
        <h1>新規登録</h1>
        <!-- 入力フォーム -->
        <div id="progress">
            <div class="point current"></div>
            <div class="point"></div>
            <div class="point"></div>
        </div>
        <form method="post" id="form">
            <label>
                <div class=item_title>氏名</div>
                <input type="text" name="name" value="<?php echo $data['name']["value"]; ?>">
            </label>
            <label>
                <div class=item_title>ユーザー名</div>
                <input type="text" name="user_name" value="<?php echo $data['user_name']["value"]; ?>">
            </label>
            <label>
                <div class=item_title>メールアドレス</div>
                <input type="text" name="email" value="<?php echo $data['email']["value"]; ?>">
            </label>
            <label>
                <div class=item_title>パスワード</div>
                <input type="password" name="password">
            </label>
            <label>
                <div class=item_title>パスワード（確認）</div>
                <input type="password" name="password_conf">
            </label>
            <label>
                <div class=item_title>郵便番号</div>
                <div class="post_box">
                    <input type="text" name="post_number" maxlength="8" value="<?php echo $data['post_number']["value"]; ?>">
                    <button type="button" onClick="AjaxZip3.zip2addr('post_number','','address','address');">郵便番号から住所を検索</button>
                </div>
            </label>
            <label>
                <div class=item_title>住所</div>
                <input type="text" name="address" value="<?php echo $data['address']["value"]; ?>">
            </label>
            <label>
                <div class=item_title>電話番号</div>
                <input type="text" name="tel" value="<?php echo $data['tel']["value"]; ?>">
            </label>
            <div id="privacy"><input type="checkbox" name="checker"><a>利用規約</a>と<a>プライバシーポリシー</a>に同意する</div>
            <button type="submit" name="submit" value="confirm" id="sign_up_btn" class="btn">入力内容を確認する</button>
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
