<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css -->
    <link rel="stylesheet" href="../css/destyle.css">
    <link rel="stylesheet" href="../css/style.css"><!-- 共通css -->
    <link rel="stylesheet" href="../css/profile.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <!-- jQuery -->
    <script src="../js/jquery-3.6.0.min.js"></script>
    <title>master</title>
</head>
<body>
    <!-- 共通ヘッダーとグローバルナビを読み込み -->
    <?php require_once "../view/header.html" ?>
    <section>
        <form action="./profile.php" method="post" enctype="multipart/form-data" id="form" class="profile_form">
            <h2>プロフィール設定</h2>
            <label>
                <div>画像</div>
                <div class="profile_img_box">
                    <?php if($user["icon_img"] == NULL){?>
                        <div class="profile_img"><img id="preview" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="プロフィール画像" class="profile_img"></div>
                    <?php }else{ ?>
                        <div class="profile_img"><img id="preview" src="../../ansim_user/<?php print $user["id"] . "/icon.jpg";?>" alt="プロフィール画像" class="profile_img"></div>
                    <?php } ?>
                    <input type="file" name="file" class="file" id="myImage" accept=".jpg"><span class="file_btn">画像を選択する</span>
                </div>
            </label>
            <!-- <label>
                <div>ユーザーネーム</div>
                <input type="text" name="nickname" value=<?php echo $user["user_name"] ?>>
            </label> -->
            <!-- <label>
                <div>自己紹介</div>
                <textarea name="introduction" rows="4" cols="100" class="textarea"></textarea>
            </label> -->
            <div><?php echo $err ?? ''; ?></div>
            <div class="btn_box">
                <button type="submit" name="button" value="back" id="" class="btn_back">戻る</button>
                <button type="submit" name="button" value="updata" id="" class="btn_updata">更新する</button>
            </div>
        </form>
    </section>
    <!-- 共通フッターとグローバルナビを読み込み -->
    <?php require_once "../view/footer.html" ?>
    <script src="../js/file_preview.js"></script>
</body>
</html>