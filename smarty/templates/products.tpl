<form action = '' method = 'post' >
{if isset($error)}
    <h4 style="color:red">
        {$error}
    </h4>
{/if}
<table>
    <tr style = "color: #3a3427">
        <td><b>あなたの名前</b></td>
        <td><b>携帯電話番号</b></td>
        <td></td>
    </tr>
    <tr>
        <td><input type="text" id="name" name="customerName" ></td>
        <td><input type="tel" id="phone" name="phoneNumber" ></td>
        <td><input type = 'submit' value = 'Order' /></td>


    </tr>
</table>

{foreach from=$coffeeArray item=coffee}
    <div id = "inner">
        <th rowspan='6' width = '150px' ><img id="productsImage" runat = 'server' src = '{$coffee->image}' /></th>
        <p id="productsName" >{$coffee->name}</p>
        <p id="productsPrice">{$coffee->price}</p>
        <input type="hidden" name="txtName[]" value='{$coffee->name}'/>
        <input type="hidden" name="price[]" value='{$coffee->price}'/>
        <input type="number" min="0" max="20" name="numberOrder[]" size="30" value="0">
    </div>
{/foreach}
</form>