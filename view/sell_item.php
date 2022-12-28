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
    <link rel="stylesheet" href="../css/sell_item.css">
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <title>アンシム - 安心フリマ - 出品</title>
</head>
<body>
    <!-- 共通ヘッダーとグローバルナビを読み込み -->
    <?php require_once "../view/header_sign.html" ?>
    <section>
    <form id="form" method="post" enctype="multipart/form-data">
        <h1>商品の出品</h1>
        <div id="input_wrapper">
            <div class="input" id="img_input_wrapper">
                <h3>商品画像(最大10枚)</h3>
                <div id="preview_box"></div>
                <div class="item_img_input">
                    <label>
                        <div class="icon"><span class="material-icons-outlined">add_a_photo</span></div>
                        <div class="drag_drop">画像をドラッグ＆ドロップ</div>
                        <div class="select_image_btn">画像を選択</div>
                        <input type="file" name="item_img_1" id="item_img_1" accept=".jpg,.jpeg,.png">
                    </label>
                </div>
            </div>
            <h2>商品の詳細</h2>
            <div class="input">
                <h3>商品カテゴリ</h3>
                <div>
                    <select name="category_id" id="" required>
                        <option selected disabled>カテゴリを選択してください</option>
                        <?php
                        foreach($category as $val){?>
                            <option value="<?php print $val["id"] ?>"><?php print $val["name"] ?></option><?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="input">
                <h3>商品状態</h3>
                <div>
                    <select name="item_condition_id" required>
                        <option selected disabled>商品状態を選択してください</option>
                        <?php
                        foreach($item_condition as $val){?>
                            <option value="<?php print $val["id"] ?>"><?php print $val["item_condition"] ?></option><?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <h2>商品名と説明</h2>
            <div class="input">
                <h3>商品名</h3>
                <div>
                    <input type="text" name="name" required placeholder="商品名を記入してください" id="item_name">
                    <div class="counter"><span id="item_len">0</span>/100</div>
                </div>
            </div>
            <div class="input">
                <h3>商品説明<span class="optional">任意</span></h3>
                <div>
                    <textarea name="discription" cols="30" rows="10" placeholder="色、素材、重さ、定価、注意点など

例) 2010年頃に1万円で購入したジャケットです。ライトグレーで傷はありません。あわせやすいのでおすすめです。

#ジャケット #ジャケットコーデ" id="discription"></textarea>
                    <div class="counter"><span id="desc_len">0</span>/1000</div>
                </div>
            </div>
            <h2>配送について</h2>
            <div class="input">
                <h3>送料の負担</h3>
                <div>
                    <select name="who_pays_fee" id="" required>
                        <option selected disabled>送料の負担者を選択してください</option>
                        <?php
                        foreach($who_pays_fee as $val){?>
                            <option value="<?php print $val["id"] ?>"><?php print $val["who"] ?></option><?php
                        }
                        ?>
                    </select>
                    <a href="">集荷サービスについて<span class="material-icons-outlined">help_outline</span></a>
                </div>
            </div>
            <div class="input">
                <h3>集荷</h3>
                <div>
                    <select name="pickup_id" id="" required>
                        <option selected disabled>集荷の要否を選択してください</option>
                        <?php
                        foreach($pickup as $val){?>
                            <option value="<?php print $val["id"] ?>"><?php print $val["pickup"] ?></option><?php
                        }
                        ?>
                    </select>
                    <a href="">集荷サービスについて<span class="material-icons-outlined">help_outline</span></a>
                </div>
            </div>
            <div class="input">
                <h3>検品</h3>
                <div>
                    <select name="inspection_id" id="" required>
                        <option selected disabled>検品の要否を選択してください</option>
                        <?php
                        foreach($inspection as $val){?>
                            <option value="<?php print $val["id"] ?>"><?php print $val["inspection"] ?></option><?php
                        }
                        ?>
                    </select>
                    <a href="">検品サービスについて<span class="material-icons-outlined">help_outline</span></a>
                </div>
            </div>
            <h2>販売価格</h2>
            <div class="input">
                <h3>販売価格</h3>
                <div>
                    <input type="number" name="price" id="price" required placeholder="￥0000">
                    <span class="material-icons-outlined">currency_yen</span>
                </div>
                <div class="calc">
                    <div>販売手数料</div>
                    <div id="charge">-</div>
                </div>
                <div class="calc">
                    <div>販売利益</div>
                    <div id="profit">-</div>
                </div>
            </div>
        </div>
        <button id="purchase_btn" class="btn" name="state" value="sell">出品する</button>
    </form>
    </section>
    <!-- 共通フッターとグローバルナビを読み込み -->
    <?php require_once "../view/footer.html" ?>
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/jquery.validate.min.js"></script>
    <script src="../js/sell_item.js"></script>
</body>
</html>
