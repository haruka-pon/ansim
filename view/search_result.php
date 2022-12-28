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
    <!-- <link rel="stylesheet" href="../css/home.css"> -->
    <link rel="stylesheet" href="../css/search_result.css">
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <!-- jQuery -->
    <script src="../js/jquery-3.6.0.min.js"></script>
    <title>アンシム - 安心フリマ</title>
</head>
<body>
    <!-- 共通ヘッダーとグローバルナビを読み込み -->
    <?php require_once "../view/header.html" ?>
    <section>
        <div id="wrapper">
            <!--左固定エリア 絞り込み-->
            <div id="fixed-area">
                <form action="?" method="post">
                    <div class="title">
                        <h2>絞り込み</h2>
                        <a href="#">クリア</a>
                    </div>
                    <p class="category_title">カテゴリー</p>
                    <div class="select_box cp_sl01">
                        <select name="selected_category" required>
                        <?php foreach($categories as $val){ ?>
                            <!-- カテゴリ初期値 -->
                            <?php if((isset($_GET['category_id']) && $_GET['category_id'] == $val['id']) || (isset($_POST['selected_category']) && $_POST['selected_category'] == $val['id'])){ ?>
                                <option value="<?php echo $val['id']; ?>" selected>
                                <?php echo $val['name']; ?>
                                </option>
                            <?php }else{ ?>
                                <option value="<?php echo $val['id']; ?>">
                                <?php echo $val['name']; ?>
                                </option>
                            <?php } ?>
                        <?php } ?>
                        </select>
                    </div>
                    <div class="radio_box">
                        <p>検品</p>
                        <div class="radio">
                          <input type="radio" id="no_select" name="inspection" value="no_select" checked>
                          <label for="no_select" class="radio-label">指定なし</label>
                        </div>
                        <div class="radio">
                          <input type="radio" id="need" name="inspection" value="need" <?php echo isset($_POST['inspection']) && $_POST['inspection']=='need'? 'checked':''; ?>>
                          <label for="need" class="radio-label">有り</label>
                        </div>
                        <div class="radio">
                          <input type="radio" id="not" name="inspection" value="not" <?php echo isset($_POST['inspection']) && $_POST['inspection']=='not'? 'checked':''; ?>>
                          <label for="not" class="radio-label">無し</label>
                        </div>
                    </div>
                    <div class="radio_box">
                        <p>Ansim Premium</p>
                        <div class="radio">
                        <input type="radio" id="no_specify" name="prime" value="no_specify" checked>
                        <label for="no_specify" class="radio-label">指定なし</label>
                        </div>
                        <div class="radio">
                          <input type="radio" id="member" name="prime" value="member" <?php echo isset($_POST['prime']) && $_POST['prime']=='member'? 'checked':''; ?>>
                          <label for="member" class="radio-label">会員</label>
                        </div>
                        <div class="radio">
                          <input type="radio" id="not_member" name="prime" value="not_member" <?php echo isset($_POST['prime']) && $_POST['prime']=='not_member'? 'checked':''; ?>>
                          <label for="not_member" class="radio-label">非会員</label>
                        </div>
                    </div>
                    <button class="search_btn" name="search_btn">検索する</button>
                </form>
            </div><!--fixed area-->


            <div id="container">
                <div id="item_list_wrapper">
                    <?php foreach($list as $item): ?>
                        <a href="./item_detail.php?id=<?php echo $item['id']; ?>">
                            <div class="item">
                                <img src="../../ansim_user/<?php print $item["user_id"];?>/item/<?php print $item["id"];?>/<?php print explode("/",$item["img"])[0];?>">
                                <div class="item_price">¥<?php echo $item['price']; if($item["prime_status"] != NULL){?><img class="premium_logo ansim" src="../img/anism_logo.svg" alt=""><?php } ?></div>
                            </div>
                            <div><?php echo $item['name']; ?></div>
                        </a>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </section>
    <!-- 共通フッターとグローバルナビを読み込み -->
    <?php require_once "../view/footer.html" ?>
    <script src="../js/search_result.js"></script>
</body>
</html>
