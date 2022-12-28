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
    <link rel="stylesheet" href="../css/premium_user.css"><!-- プレミアム会員ページCSS -->
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
        <div class="content">
            <h1>1ヶ月無料でPremiumを楽しもう</h1>
            <p>キャンペーン終了後は、月額たったの￥1980。いつでも解約できます。</p>
            <div>
                <div class="start_btn"><a href="premium_sign_up.php">今すぐ始める</a></div>
                <div class="read_btn"><a href="#plan">プランを見る</a></div>
            </div>
            <p>※現在Premium会員であるお客様、すでにPremium会員をお試しいただいたお客様は、1ヶ月無料キャンペーンの対象外となります。</p>
        </div>
        <div class="content">
            <h1>Puremiumをおすすめする理由</h1>
            <div>
                <div>
                    <div class="maru"><span class="material-icons-outlined">check_circle</span></div>
                    <h2>検品無料</h2>
                    <p>出品時の検品が無料に。</p>
                </div>
                <div>
                    <div class="maru"><span class="material-icons-outlined">local_shipping</span></div>
                    <h2>集荷無料</h2>
                    <p>出品時の集荷が無料に。</p>
                </div>
                <div>
                    <div class="maru"><span class="material-icons-outlined">search</span></div>
                    <h2>優先検索</h2>
                    <p>検索時にPremium会員だけを検索できる。</p>
                </div>
            </div>
        </div>
        <div class="content" id="plan">
            <h1>プランについて</h1>
            <p>わかりやすいシンプルな１プラン。</p>
            <div>
                <div class="label">1ヶ月無料</div>
                <h2>Ansim Premium</h2>
                <p>キャンペーン終了後は、月額￥1980</p>
                <div class="item">
                    <span class="material-icons-outlined">verified_user</span>
                    <p>出品時の検品が無料</p>
                </div>
                <div class="item">
                    <span class="material-icons-outlined">verified_user</span>
                    <p>出品時の集荷が無料</p>
                </div>
                <div class="item">
                    <span class="material-icons-outlined">verified_user</span>
                    <p>優先的な検索</p>
                </div>
                <div class="start_btn"><a href="premium_sign_up.php">今すぐ始める</a></div>
            </div>
        </div>
    </section>
    <!-- 共通フッターとグローバルナビを読み込み -->
    <?php require_once "../view/footer.html" ?>
    <script src="../js/file_preview.js"></script>
</body>
</html>