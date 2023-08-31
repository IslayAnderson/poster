<?php include_once '/wordpress.php' ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Islay Anderson</title>
    <link rel="stylesheet" href="style/style.css">
  </head>
  <body>
    <header>
        <?php 
            $wordpress = new Wordpress();
            $categories = $wordpress->getCategories();
            $randCat = array(
                $categories[rand(0, count($categories)-1)]->name,
                $categories[rand(0, count($categories)-1)]->name,
                $categories[rand(0, count($categories)-1)]->name,
                $categories[rand(0, count($categories)-1)]->name
            );
            $wordpress->closeConnection();
        ?>
        <h1 class="title">Islay Anderson<span><?=$randCat[0]?>, <?=$randCat[1]?>, <?=$randCat[2]?>, <?=$randCat[3]?></span></h1>
    </header>
    <main>
        <div class="row">
            <div class="project headline">
                <a href="https://photography.islayanderson.co.uk" class="section_headline">
                    <h2>Photography</h2>
                </a>
                <div class="h_line"></div>
                <div class="tag_cloud">
                    <span>120mm</span>
                    <span>35mm</span>
                    <span>Color 400</span>
                    <span>ColorPlus 200</span>
                    <span>Delta 3200</span>
                    <span>FP4 Plus</span>
                    <span>Gold 200</span>
                    <span>HP5 Plus</span>
                    <span>Ilford</span>
                    <span>Kodak</span>
                    <span>Lomography</span>
                    <span>Portra 400</span>
                    <span>UltraMax 400</span>
                    <span>XP2</span>
                </div>
            </div>
            <div class="project proof">
                <img src="https://photography.islayanderson.co.uk/i.php?/upload/2023/08/20/20230820141935-c6a72f48-xx.jpg">
            </div>
            <div class="project proof">
                <img src="https://photography.islayanderson.co.uk/i.php?/upload/2023/08/20/20230820131817-082dd59d-la.jpg">
            </div>
            <div class="project headline">
                <a href="https://blog.islayanderson.co.uk" class="section_headline">
                    <h2>Engineering &amp; Politics Blog</h2>
                </a>
                <?php
                    $wordpress = new wordpress();
                    $latestPost = $wordpress->getLatestPost();
                    $wordpress->closeConnection();
                ?>
                <div class="h_line"></div>
                <div class="lastest_entry">
                    <h3><?=$latestPost["title"]?></h3>
                    <?=$latestPost["content"]?>
                    <a href="<?=$latestPost["permalink"]?>" title="latest blog entry">permalink</a>
                </div>
            </div>
        </div>
    </main>

	<script src="script/main.js"></script>
  </body>
</html>