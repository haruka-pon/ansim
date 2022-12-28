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
    <link rel="stylesheet" href="../css/purchase.css">
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
        <form method="post">
            <h1>購入内容の確認</h1>
            <div class="rows">
                <h2>注文商品</h2>
                <div>
                    <div>
                        <img src="../../ansim_user/<?php print $item["user_id"];?>/item/<?php print $item["id"];?>/<?php print explode("/",$item["img"])[0];?>">
                        <div>
                            <div id="item_name"><?php print $item["name"] ?></div>
                            <div id="seller"><span><?php print $seller["user_name"] ?></span>さんの出品</div>
                            <div class="price">¥<?php print $item["price"];?></div>
                        </div>
                    </div>
                </div>
                <div class="btn cancel"><a href="item_detail.php?id=<?php print $_GET["id"] ?>">注文を取り消す</a></div>
            </div>
            <div class="rows">
                <h2>配送先</h2>
                <?php if($send_address != NULL){?>
                <div id="shipping_address">
                    <div><?php print $send_address["name"];?></div>
                    <div>〒<?php print $send_address["post_number"];?></div>
                    <div><?php print $send_address["address"];?></div>
                </div>
                <!-- <div class="change"><a href="./address.php">変更する<span class="material-icons-outlined">edit</span></a></div> --><?php
                }else{?>
                    <div class="change pay_add"><a href="./address.php?id=<?php print $_GET["id"];?>"><span class="material-icons-outlined">add_circle_outline</span>配送先を追加する</a></div><?php
                } ?>
            </div>
            <!-- <div class="rows">
                <h2>配送日時</h2>
                <div id="shipping_date">
                    <div>YYYY年MM月DD日</div>
                    <div>HH時~HH時</div>
                    <div><a>日時を指定する</a></div>
                </div>
            </div> -->
            <div class="rows">
                <h2>支払方法</h2>
                <!-- DBで支払方法があればtrue  -->
                <?php if($payment != NULL){ ?>
                    <div class="payment"><span class="material-icons-outlined">credit_card</span><sapn id="card_brand">VISA</sapn>下4桁<span><?php print substr($payment["card_number"],-4,4)?></span></div>
                    <!-- <div class="change"><a href="./payment.php">変更する</a> --></div>
                <?php }else{ ?>
                    <div class="change pay_add"><a href="./payment.php?id=<?php print $_GET["id"];?>"><span class="material-icons-outlined">add_circle_outline</span>支払方法を追加する</a></div>
                <?php } ?>
            </div>
            <div class="rows">
                <h2>請求額</h2>
                <div id="bill">
                    <div class="rows">
                        <div>小計</div>
                        <div>¥<?php print $item["price"];?></div>
                    </div>
                    <div class="rows">
                        <div>配送料・手数料</div>
                        <div><?php if($item["who_pays_fee"] == 1){
                            print "-";
                        }else{
                            print "￥380";
                        } ?></div>
                    </div>
                    <div class="rows price">
                        <div>合計</div>
                        <div>￥<?php if($item["who_pays_fee"] == 1){
                            print $item["price"];
                        }else{
                            print $item["price"] + 380;
                        } ?></div>
                    </div>
                </div>
            </div>

            <button id="purchase_btn" class="btn" name="state" value="purchase" <?php print $btn_active ?>>購入する</button>
        </form>
    </section>
    <!-- 共通フッターとグローバルナビを読み込み -->
    <?php require_once "../view/footer.html" ?>
</body>
</html>
