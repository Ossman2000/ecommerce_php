<?php include 'init.php'; ?>

<div class="container">
    <h1 class="text-center">
        <?php echo str_replace('-', ' ', $_GET['Pagename']); ?>
    </h1>
    <div class="row">
    <?php
    foreach(getitems('Cat_ID',$_GET['Pageid']) as $item){
        echo '<div class="col-sm-6 col-md-3">';
            echo '<div class="thumbnail item-box ">';
                echo '<span class="item-box.price-tag">' .$item['Price'] . '</span>';
      echo '<img class="product-images " src=lap.jpg  alt=""/>';
                   echo '<div class="caption">';
                   echo '<h3>'.$item['Name'].'</h3>';
echo '<p>'.$item['Description'].'</p>';
echo'</div>';
echo '</div>';
echo '</div>';
}



    ?>
    </div>
</div>

<?php include $tpl . 'footer.php'; ?>

