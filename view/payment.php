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
    <link rel="stylesheet" href="../css/payment.css">
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
            <h1>クレジットカードの登録</h1>
            <form method="post">
                <!-- <div>
                    ブランド選択
                    <input type="radio" name="brand" value="brand_visa" id="brand_visa" checked><label for="brand_visa"></label>
                    <input type="radio" name="brand" value="brand_jcb" id="brand_jcb"><label for="brand_jcb"></label>
                    <input type="radio" name="brand" value="brand_master" id="brand_master"><label for="brand_master"></label>
                    <input type="radio" name="brand" value="brand_amex" id="brand_amex"><label for="brand_amex"></label>
                </div> -->
                <div>
                    カード番号
                    <input type="number" name="card_number" value="" placeholder="0000000000000000" class="m-form-text"></input>
                </div>
                <div>
                    カード名義人(半角ローマ字)
                    <input type="text" name="name" value="" placeholder="TARO ANSIN" class="m-form-text"></input>
                </div>
                <div>
                    有効期限
                    <input type="text" name="expire_date" value="" placeholder="MMYY" class="m-form-text"></input>
                </div>
                <div>
                    セキュリティコード
                    <input type="text" name="security_code" value="" placeholder="3桁または4桁の番号" class="m-form-text"></input>
                </div>
                <div class="btn_box">
                    <a href="purchase.php?id=<?php print $_GET["id"] ?>">戻る</a>
                    <button name="state" value="confirm">登録する</button>
                </div>
            </form>
        </div>

    </section>
    <!-- 共通フッターとグローバルナビを読み込み -->
    <?php require_once "../view/footer.html" ?>
</body>
</html>
