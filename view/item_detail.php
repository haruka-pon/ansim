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
    <link rel="stylesheet" href="../css/item_detail.css">
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <title>アンシム - 安心フリマ - 商品詳細</title>
</head>
<body>
<!-- 共通ヘッダーとグローバルナビを読み込み -->
<?php require_once "../view/header.html" ?>
<form method="post" id="form"></form>
<section id="item_datail">
    <div id="item_box">
        <div id="img_area">
            <div class="sub_item_wrapper slider_nav">
                <span class="material-icons-outlined prev">keyboard_arrow_up</span>
                <div class="slide_box">
                    <?php foreach(explode("/",$item["img"]) as $path){ ?>
                    <div class="img_container"><img src="../../ansim_user/<?php print $item["user_id"] ?>/item/<?php print $item["id"] ?>/<?php print $path ?>" alt="" class="sub_item_img"></div><?php
                    } ?>
                </div>
                <span class="material-icons-outlined next">keyboard_arrow_down</span>
            </div>
            <div class="slider">
                <span class="material-icons-outlined prev">keyboard_arrow_left</span>
                <div class="slide_box">
                    <?php foreach(explode("/",$item["img"]) as $path){ ?>
                    <div class="img_container"><img src="../../ansim_user/<?php print $item["user_id"] ?>/item/<?php print $item["id"] ?>/<?php print $path ?>" alt="" class="main_item_img"></div><?php
                    } ?>
                </div>
                <span class="material-icons-outlined next">keyboard_arrow_right</span>
            </div>
        </div>
        <div id="item_description">
            <div id="item_name"><?php print $item["name"]; if($item["prime_status"] != NULL){?><img class="premium_logo" src="../img/anism_logo.svg" alt=""><?php } ?></div>
            <div id="brand"></div>
            <div id="price"><span>¥<?php print $item["price"] ?></span>(税込み)</div>
            <?php if(isset($_COOKIE["login_id"])){?>
            <div id="icons">
                <form action="" method="post">
                    <button type="submit" name="submit" value="fav" id="fav" class="material-icons-outlined">favorite<?php print $fav_flg ? '_border':''; ?></button>
                    <span class="fav_cnt"><?php print count($fav_info); ?></span>
                </form>
                <a href="#comment_box" class="comment_icon"><span class="material-icons-outlined">mode_comment</span><span class="com_cnt"><?php print count($com_info);?></span></a>
            </div><?php
            }
            if(isset($_COOKIE["login_id"]) && $item["u_id"] != $_COOKIE["login_id"]){?>
                <button id="purchase_button" class="btn" form="form" name="purchase">購入手続きへ</button><?php
            } ?>

            <div class="br"></div>
            <div id="description">
                <h3>商品の説明</h3>
                <p><?php print $item["discription"] != "" ? $item["discription"] : "商品説明はありません"?></p>
            </div>
            <div id="category" class="desc_lists"><div>カテゴリ</div><div><?php print $category; ?></div></div>
            <div id="condition" class="desc_lists"><div>商品の状態</div><div><?php print $item_condition ?></div></div>
            <div id="shipping_fee" class="desc_lists"><div>配送料の負担</div><div><?php print $fee ?></div></div>
            <div class="br"></div>
            <div id="seller_info">
                <h3>出品者の情報</h3>
                <div id="seller_account">
                    <?php if($seller["icon_img"] == NULL){?>
                    <span class="material-icons-outlined account_img">person_outline</span><?php
                    }else{?>
                        <img src="../../ansim_user/<?php print $seller["id"] . "/" . $seller["icon_img"];?>" class="account_img"><?php
                    }?>
                    <div><?php print $seller["user_name"]; if($seller["prime_status"] != NULL){?><img class="premium_logo" src="../img/anism_logo.svg" alt=""><?php }?></div>
                </div>
                <!-- <div id="rate">★★★☆☆ 000</div> -->
                <div class="br"></div>
                <h3 class="l">コメント(<?php print count($com_info);?>)</h3>
                <div id="comment_box">
                    <?php foreach($com_info as $com): ?>
                    <div class="comment">
                        <div class="username"><a><?php print $com['user_name']; ?></a></div>
                        <div class="text"><?php print $com['comment']; ?><span class="date"><?php $d = (strtotime(date('Y-m-d')) - strtotime($com['commented_date'])) / (60 * 60 * 24); print $d == 0 ? '今日':$d.'日前'; ?></span></div>
                    </div>
                    <?php endforeach; ?>
                    <div class="form">
                        <div>商品へのコメント</div>
                        <form action="" method="post">
                            <textarea name="comment_content" id="" cols="30" rows="4" placeholder="コメントする"></textarea>
                            <button type="submit" name="submit" value="comment" class="btn" id="comment_send">コメントを送信する</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <h2 class="rec_items">おすすめの商品</h2>
    <div id="item_list_wrapper"><?php
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
<script src="../js/item_detail.js"></script>
<?php require_once "../view/footer.html";?>
</body>
</html>