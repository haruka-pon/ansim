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
    <link rel="stylesheet" href="../css/my_page_others.css"><!-- マイページのいいね！、出品、購入履歴の共通css -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <!-- jQuery -->
    <script src="../js/jquery-3.6.0.min.js"></script>
    <title>My Page|出品履歴</title>
</head>
<body>
    <!-- 共通ヘッダーとグローバルナビを読み込み -->
    <?php require_once "../view/header.html" ?>
    <section>
        <!-- マイページ用の左側のナビを読み込み -->
        <?php require_once "../view/my_page_navi.html" ?>
        <main>
            <div class="contents">
                <h2>いいね！した商品</h2>
                <div id="item_list_wrapper">
                    <!-- 商品のリストをphpから受け取り、表示する -->
                    <?php
                    for($i = 0; $i < 8; $i ++){?>
                        <div>
                            <a href="./item_detail.php">
                                <!-- ↓売り切れであれば"sold"のclassが付く -->
                                <div class="item sold">
                                    <img src="" alt="">
                                    <div class="item_price">¥0,000</div>
                                </div>
                                <div>サンプル商品名</div>
                            </a>
                            <button class="delete_btn" type="submit">削除</button>
                        </div><?php
                    }
                    ?>
                </div>
            </div>

        </main>
    </section>
    <!-- 共通フッターとグローバルナビを読み込み -->
    <?php require_once "../view/footer.html" ?>
    <script src="../js/file_preview.js"></script>
</body>
</html>