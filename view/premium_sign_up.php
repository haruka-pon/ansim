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
    <link rel="stylesheet" href="../css/premium_sign_up.css"><!-- プレミアム会員ページCSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <!-- jQuery -->
    <script src="../js/jquery-3.6.0.min.js"></script>
    <title>プレミアム会員TOP</title>
</head>
<body>
    <!-- 共通ヘッダーとグローバルナビを読み込み -->
    <?php require_once "../view/header.html" ?>
    <section>
        <form method="post">
            <h1>Ansim Premiumに登録</h1>
            <div class="maru"><span class="material-icons-outlined">verified_user</span></div>
            <div>
                <h2>月額</h2>
                <div class="price">￥1980</div>
            </div>
            <div class="pay_info">
                <h2>支払方法</h2>
                    <!-- DBで支払方法があればtrue  -->
                    <?php if($payment != NULL){ ?>
                        <div class="payment"><span class="material-icons-outlined">credit_card</span><sapn id="card_brand">VISA</sapn>下4桁<span><?php print substr($payment["card_number"],-4,4)?></span></div>
                        <!-- <div class="change"><a href="./payment.php">変更する</a> --></div>
                    <?php }else{ ?>
                        <div class="change pay_add"><a href="./payment.php?id=<?php print $_GET["id"];?>"><span class="material-icons-outlined">add_circle_outline</span>支払方法を追加する</a></div>
                    <?php } ?>
            </div>

            <div class="btn_box"><button type="submit" id="purchase_btn" class="btn cancel" name="state" value="cancel">キャンセル</button><button type="submit" id="purchase_btn" class="btn" name="state" value="confirm">登録</button></div>
        </form>
    </section>
    <!-- 共通フッターとグローバルナビを読み込み -->
    <?php require_once "../view/footer.html" ?>
    <script src="../js/file_preview.js"></script>
</body>
</html>