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
    <link rel="stylesheet" href="../css/my_page.css"><!-- マイページ用CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <!-- jQuery -->
    <script src="../js/jquery-3.6.0.min.js"></script>
    <title>My Page</title>
</head>
<body>
    <!-- 共通ヘッダーとグローバルナビを読み込み -->
    <?php require_once "../view/header.html" ?>
    <section>
        <!-- マイページ用の左側のナビを読み込み -->
        <?php require_once "../view/my_page_navi.html" ?>

        <main>
            <div class="contents">
                <div class="layout_userData">
                    <div class="user_icon">
                    <?php if($user["icon_img"] == NULL){?>
                        <span class="material-icons-outlined account_img">person_outline</span><?php
                        }else{?>
                            <img src="../../ansim_user/<?php print $user["id"] . "/icon.jpg";?>" class="account_img"><?php
                        }?>
                    </div>
                    <div>
                        <div class="user_name"><?php print $user["user_name"]; ?>
                        <?php if($user["prime_status"] != NULL){?>
                        <img src="../img/anism_logo.svg" alt="プレミアム会員マーク"><?php
                        }
                        ?>
                    </div>
                        <div class="user_info">
                            <!-- <div class="star_group">
                                <div>★</div>
                                <div>★</div>
                                <div>★</div>
                                <div>★</div>
                                <div>★</div>
                                <span class="count">0</span>
                            </div> -->
                            <div>
                                <?php if($user["prime_status"] == NULL){ ?>
                                    <a class="btn" href="./premium_user.php">プレミアム会員登録</a>
                                <?php } ?>
                                <a class="btn" href="./profile.php">プロフィール画像を編集</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div>
                        <a href="">出品数<span><?php print count(get_purchase_list(" user_id = ". $_COOKIE['login_id']."")) ?></span></a>
                        <!-- <a href=""><span>0</span>フォロワー</a> -->
                        <!-- <a href=""><span>0</span>フォロー数</a> -->
                    </div>
                    <!-- <p>自己紹介文は登録されていません</p> -->
                </div>
            </div>
            <div class="contents">
                <h2>売上金</h2>
                <p>¥<?php print $profit; ?></p>
            </div>

            <div class="contents">
                <h2>出品した商品</h2>
                <?php if(isset($sell_item)){ ?>
                <div id="item_list_wrapper">
                    <!-- 商品のリストをphpから受け取り、表示する -->
                        <?php
                        foreach(get_purchase_list(" user_id = ". $_COOKIE['login_id']."") as $item){?>
                            <a href="./item_detail.php?id=<?php print $item["id"];?>">
                                <div class="item">
                                    <img src="../../ansim_user/<?php print $_COOKIE["login_id"];?>/item/<?php print $item["id"];?>/<?php print explode("/",$item["img"])[0];?>">
                                    <div class="item_price">¥<?php print $item["price"]; if($item["prime_status"] != NULL){?><img class="premium_logo ansim" src="../img/anism_logo.svg" alt=""><?php } ?></div>
                                </div>
                                <div><?php print $item["name"];?></div>
                            </a><?php
                        }
                        ?>
                </div>
                <!-- <p><a href="">もっと見る ＞</a></p> -->
                <?php }else{ ?>
                    出品している商品はありません
                <?php } ?>
            </div>
            <div class="contents">
                <h2>購入した商品</h2>
                <div id="item_list_wrapper">
                    <!-- 商品のリストをphpから受け取り、表示する -->
                        <?php
                        if(count($p_item)!=0){
                        foreach($p_item as $item){ ?>
                            <a href="./item_detail.php?id=<?php print $item["id"];?>">
                                <div class="item">
                                    <img src="../../ansim_user/<?php print $item["user_id"];?>/item/<?php print $item["id"];?>/<?php print explode("/",$item["img"])[0];?>">
                                    <div class="item_price">¥<?php print $item["price"]; if($item["prime_status"] != NULL){?><img class="premium_logo ansim" src="../img/anism_logo.svg" alt=""><?php } ?></div>
                                </div>
                                <div><?php print $item["name"];?></div>
                            </a><?php
                        }
                        ?>
                </div>
                    <!-- <p><a href="">もっと見る ＞</a></p> -->
                    <?php }else{ ?>
                        購入している商品はありません
                    <?php } ?>
            </div>
        </main>
    </section>
    <!-- 共通フッターとグローバルナビを読み込み -->
    <?php require_once "../view/footer.html" ?>
    <script src="../js/file_preview.js"></script>
</body>
</html>