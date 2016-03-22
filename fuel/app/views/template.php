<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <?php echo Asset::css('bootstrap.css'); ?>
</head>
 
<body>
 
    <div id="content">
 
        <p>
            <?php
                echo \Html::anchor('posts/index', 'Listing'), '&nbsp;', \Html::anchor('posts/add', 'Add');
            ?>
        </p>
 
        <?php if(isset($messages) and count($messages)>0): ?>
        <div class="message">
            <ul>
            <?php
                foreach($messages as $message)
                {
                    echo '<li>', $message,'</li>';
                }
            ?>
            </ul>
        </div>
        <?php endif; ?>
 
        <?php   if (isset($content)) {
                    echo $content;
                } else {
                    echo "Brak zawartości";
                }
        ?>
    </div>
 
</body>
</html>