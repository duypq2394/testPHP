<table class='overViewTable'>
    <tr>
        <td><b>名前</b></td>
        <td><b>携帯電話番号</b></td>
        <td><b>注文</b></td>
        <td><b>合計金額</b></td>
        <td><b>日付</b></td>
        <td></td>
    </tr>
        <form action = '' method = 'post'>
            {foreach from=$orderArray item=value}
                <tr>
                <td>{$value->clientName}</td>
                <td>{$value->clientPhoneNumber}</td>    
                <td style="white-space: pre-line">{$value->orderContent}</td>
                <td>{$value->price}</td>  
                <td>{$value->orderDate}</td>
                <td><button name="finish" type="submit" value={$value->id} onclick="return show_confirm();">完了 </button></td>  
                </tr>
            {/foreach}
        </form>
   
</table>