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
    <link rel="stylesheet" href="../css/evaluation.css"><!-- 評価ページ用CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <!-- jQuery -->
    <script src="../js/jquery-3.6.0.min.js"></script>
    <title>出品者への評価</title>
</head>
<body>
    <!-- 共通ヘッダーとグローバルナビを読み込み -->
    <?php require_once "../view/header.html" ?>
    <section>
        <div>
            <h1>出品者への評価</h1>
            <p>サービスのご利用ありがとうございます</p>
            <div class="img"><img src="" alt="出品者のアイコン"></div>
            <p>今回の取引はどうでしたか？<br>出品者への評価をお願いします。</p>

            <div class="star_wrap">
                <div id="star_raty">★</div>
                <div id="star_raty">★</div>
                <div id="star_raty">★</div>
                <div id="star_raty">★</div>
                <div id="star_raty">★</div>
            </div>

            <div class="back"><a href="./news.php">＜　戻る</a></div>
        </div>


    </section>
    <!-- 共通フッターとグローバルナビを読み込み -->
    <?php require_once "../view/footer.html" ?>
    <script src="../js/file_preview.js"></script>
    <script src="../js/star_raty.js"></script>
</body>
</html>