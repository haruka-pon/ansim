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
    <link rel="stylesheet" href="../css/news_detail.css">
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <title>アンシム - 安心フリマ</title>
    <!-- jQuery -->
    <script src="../js/jquery-3.6.0.min.js"></script>
    <title>Document</title>
</head>
<body>
    <!-- 共通ヘッダーとグローバルナビを読み込み -->
    <?php require_once "../view/header.html" ?>
<section>
    <form method="post">
        <div class="wrapper">
            <div id="notice" class="area">
                <h1><?php print $notification["title"];?></h1>
                <p class="date"><?php print $notification["date"];?></p>
                <p class="text"><?php print $notification["content"];?></p>
                <div class="parent">
                    <button name="state" value="back">戻る</button>
                    <!-- <button name="state" value="delete" class="del_btn">削除</button> -->
                </div>

            </div>
        </div>
    </form>
</section>
    <!-- 共通フッターとグローバルナビを読み込み -->
    <?php require_once "../view/footer.html" ?>
    <script src="../js/news.js"></script>

</body>
</html>
