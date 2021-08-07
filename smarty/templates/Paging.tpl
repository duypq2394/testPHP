{if $numberRows/$pageSize > 1 }
<div class="page-header">
    <ul id="pagination">
        {if $page > 1} <li style="display: inline;"><a href="?action={$action}&page={$page - 1}">«</a></li> {/if}
        {if $page > 3}
            <li style="display: inline;"><a href="?action={$action}&page=1">1</a></li>
            {if $page > 4}
            <li style="display: inline;"><a href="#">...</a></li>
            {/if}
        {/if}
        {if ($page - 2) > 0}<li style="display: inline;"><a href="?action={$action}&page={$page - 2}">{$page - 2}</a></li>{/if}
        {if ($page - 1) > 0}<li style="display: inline;"><a href="?action={$action}&page={$page - 1}">{$page - 1}</a></li>{/if}

        <li style="display: inline;"><a href="?action={$action}&page={$page}" style="background-color:black; color:white;">{$page}</a></li>

        {if ($page + 1) < ceil($numberRows/$pageSize) + 1}<li style="display: inline;"><a href="?action={$action}&page={$page + 1}">{$page + 1}</a></li>{/if}
        {if ($page + 2) < ceil($numberRows/$pageSize) + 1}<li style="display: inline;"><a href="?action={$action}&page={$page + 2}">{$page + 2}</a></li>{/if}

        {if $page < ceil($numberRows/$pageSize - 2)}
            <li style="display: inline;"><a href="#">...</a></li>
            <li style="display: inline;"><a href="?action={$action}&page={ceil($numberRows/$pageSize)}">{ceil($numberRows/$pageSize)}</a></li>
        {/if}

        {if $page < ceil($numberRows/$pageSize)} <li style="display: inline;"><a href="?action={$action}&page={$page + 1}">»</a></li>{/if}
    </ul>
</div>
{/if}