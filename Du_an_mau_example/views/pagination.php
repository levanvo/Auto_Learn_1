<style>
    *{
        margin: 0;padding: 0;
    }
    a{
        text-decoration: none;
        color: #fff;
    }
    .pagination{
        margin-left: 650px;
        
    }
    .pagination_ul{
        display: flex;
        margin: 30px 0;
    }
    .pagination_li{
        list-style: none;
        padding: 10px; font-size: 18px;
        background-color: #86f10b;
        margin: 5px;
        border-radius: 5px;
    }
    .strong{
        border-bottom:2px solid #fff ;
        padding: 5px;
    }
</style>
<nav class="pagination">
    <ul class="pagination_ul" >
        <li class="pagination_li" >
            <a href="?limit=<?= $limit ?>&page=<?= $current_page - 1 ?>" >
                <span>&laquo;</span>
            </a>
        </li>
        <?php
        for ($i = 1; $i <= $totalPage; $i++) {
            if ($i != $current_page) {
        ?>
                <li class="pagination_li" ><a href="?limit=<?= $limit ?>&page=<?= $i ?>" ><?= $i ?></a></li>
            <?php
            } else {
            ?>
                <li class="pagination_li" ><a href="?limit=<?= $limit ?>&page=<?= $i ?>" ><strong class="strong"><?= $i ?></strong> </a></li>
        <?php
            }
        }
        ?>
        <li class="pagination_li" >
            <a href="?limit=<?= $limit ?>&page=<?= $current_page + 1 ?>" >
                <span>&raquo;</span>
            </a>
        </li>
    </ul>
</nav>