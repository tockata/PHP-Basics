<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sidebar Builder</title>
        <style>
            aside {
                border: 1px solid green;
                border-radius: 5px;
                background-color: lightgreen;
                width: 150px;
                margin-bottom: 10px;
                padding: 5px;
            }
            aside a {
                color: black;
            }
        </style>
    </head>
    <body>
        <form method="POST" action="03-SidebarBuilder.php">
            <label for="categories">Categories: </label>
            <input type="text" name="categories" id="categories"><br>
            <label for="tags">Tags: </label>
            <input type="text" name="tags" id="tags"><br>
            <label for="months">Months: </label>
            <input type="text" name="months" id="months"><br>
            <input type="submit" value="Generate">
        </form>
        <br>
        <?php
        if (isset($_POST['categories'], $_POST['tags'], $_POST['months'])):
            $categories = explode(', ', $_POST['categories']);
            $tags = explode(', ', $_POST['tags']);
            $months = explode(', ', $_POST['months']);
        ?>
        <aside>
            <h1>Categories</h1>
            <ul>
                <?php foreach ($categories as $categorie): ?>
                <li><a href="#"><?= $categorie ?></a></li>        
                <?php endforeach; ?>
            </ul>
        </aside>
        <aside>
            <h1>Tags</h1>
            <ul>
                <?php foreach ($tags as $tag): ?>
                <li><a href="#"><?= $tag ?></a></li>        
                <?php endforeach; ?>
            </ul>
        </aside>
        <aside>
            <h1>Months</h1>
            <ul>
                <?php foreach ($months as $month): ?>
                <li><a href="#"><?= $month ?></a></li>        
                <?php endforeach; ?>
            </ul>
        </aside>
        <?php endif; ?>
    </body>
</html>