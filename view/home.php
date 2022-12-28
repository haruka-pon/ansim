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
    <link rel="stylesheet" href="../css/home.css">
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <title>アンシム - 安心フリマ</title>
</head>
<body>
    <!-- 共通ヘッダーとグローバルナビを読み込み -->
    <?php require_once "../view/header.html" ?>
    <section>
        <div id="top_banner"><a href="premium_user.php"><img src="../img/top_promo.png" alt=""></a></div>
        <h2 class="rec_items">おすすめの商品</h2>
        <div id="item_list_wrapper">
            <!-- 商品のリストをphpから受け取り、表示する -->
            <?php
            $ilis = get_item_list();
            shuffle($ilis);
            foreach($ilis as $item){?>
                <a href="./item_detail.php?id=<?php print $item["id"];?>">
                    <div class="item">
                        <img src="../../ansim_user/<?php print $item["user_id"];?>/item/<?php print $item["id"];?>/<?php print explode("/",$item["img"])[0];?>">
                        <div class="item_price">¥<?php print $item["price"]; if($item["prime_status"] != NULL){?><img class="premium_logo ansim" src="../img/anism_logo.svg" alt=""><?php }?></div>
                    </div>
                    <div><?php print $item["name"];?></div>
                </a><?php
            }
            ?>
        </div>
    </section>
    <!-- 共通フッターとグローバルナビを読み込み -->
    <?php require_once "../view/footer.html" ?>
</body>
</html>
