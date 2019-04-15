<div class="container-fluid" style="display: flex; justify-content: center;">
    <nav>
        <ul class="pagination">
            <?php
            echo <<<HTML
<li class="page-item">
    <a class="page-link" href="index.php?module={$module}&action=list&page={$paging->getPreviousPage()}" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
    </a>
</li>
HTML;

            foreach ($paging->data as $key => $value) {
                $class = "page-item";
                $class .= $paging->getCurrentPage() == $value['page'] ? " active" : "";
                echo <<<HTML
    <li class="{$class}"><a class="page-link" href="index.php?module={$module}&action=list&page={$value['page']}">{$value['page']}</a></li>
    HTML;
            }

            echo <<<HTML
<li class="page-item">
    <a class="page-link" href="index.php?module={$module}&action=list&page={$paging->getNextPage()}" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
    </a>
</li>
HTML;

            ?>
        </ul>
    </nav>
</div>