<form action = '' method = 'post' width = '200px'>
    Please select a type: 
    <select name = 'types' >
    <option value = '%' >All</option>
     {foreach from=$valueArry item=value}
        <option value = '{$value}'>{$value}</option>
    {/foreach}
    </select>
    <input type = 'submit' value = 'Search' />
</form>