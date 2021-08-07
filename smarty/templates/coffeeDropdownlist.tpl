<form action = '' method = 'post' width = '200px'>
    コーヒーのタイプをお選びください: 
    <select name = 'types' >
    <option value = '%' >All</option>
     {foreach from=$valueArry item=value}
        <option value = '{$value}'>{$value}</option>
    {/foreach}
    </select>
    <input type = 'submit' formaction='?action=coffee' value = '検索' />
</form>