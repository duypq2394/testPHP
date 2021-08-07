<div>
    <form action='' method = 'post'>
    <button name="downloadListCoffee" type="submit">Download All</button>
    </form>
    <form id="searchForm" method = 'post' style="margin-bottom: 10px;float: right;"> 
    <input type="search" id="query" name="searchName" placeholder="Search...">
    <button>Search</button>
    </form>
</div>

{* table *}
<script> window.onload = function() { FixedMidashi.create(); }; </script>
<div class = 'scroll_div '>
<table class='overViewTable' _fixedhead='cols:2;'>
    <tr>
        <td></td>
        <td></td>
        <td><b>Id</b></td>
        <td><b>Name</b></td>
        <td><b>Type</b></td>
        <td><b>Price</b></td>
        <td><b>Roast</b></td>
        <td><b>Country</b></td>
        <td><b>Added Date</b></td>
    </tr>
        <form action = '' method = 'post'>
            {foreach from=$coffeeArray item=value}
                <tr>
                <td><button name="update" type="submit" value={$value->id} formaction="?action=coffeeUpdate">変更</button></td>
                <td><button name="delete" type="submit" value={$value->id} onclick="return show_confirm('{$value->name}');">削除</button></td>
                <td>{$value->id}</td>
                <td>{$value->name}</td>
                <td>{$value->type}</td>    
                <td>{$value->price}</td> 
                <td>{$value->roast}</td>
                <td>{$value->country}</td>   
                <td>{$value->date}</td> 
                </tr>
            {/foreach}
        </form>
   
</table>
</div>

{* {literal}
<script language="JavaScript" type="text/JavaScript">
    function show_confirm(name){
        return confirm('を削除してもよろしですか？');
    }
</script>
{/literal} *}

{$paging}

