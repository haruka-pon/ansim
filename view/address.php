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
    <link rel="stylesheet" href="../css/address.css">
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <title>アンシム - 安心フリマ - 商品購入</title>
</head>
<body>
    <!-- 共通ヘッダーとグローバルナビを読み込み -->
    <?php require_once "../view/header.html" ?>
    <section>
        <div class="form_box">
            <h1>お届け先の登録</h1>
            <form method="post">
                <label>
                    <div class=item_title>受取人氏名（任意の名前）</div>
                    <input type="text" name="name" value="">
                </label>
                <label>
                    <div class=item_title>郵便番号</div>
                    <div class="post_box">
                        <input type="text" name="post_number" maxlength="8" value="">
                        <button type="button" onClick="AjaxZip3.zip2addr('post_number','','address','address');">郵便番号から住所を検索</button>
                    </div>
                </label>
                <label>
                    <div class=item_title>住所</div>
                    <input type="text" name="address" value="">
                </label>
                <div class="btn_box">
                    <button name="state" value="back">戻る</button>
                    <button name="state" value="confirm">登録する</button>
                </div>
            </form>
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
