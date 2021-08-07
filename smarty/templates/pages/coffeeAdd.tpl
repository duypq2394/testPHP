
<form action='' method='post'>
    <fieldset>
    <legend>製品を追加し</legend>
        <label for='name'>コーヒ名: </label>
        <input type='text' class='inputField' name='txtName' />
        <span class="error" style = "color: #FF0000;">* {$nameErr}</span>
        <br/><br/>

        <label for='type'>タイプ: </label>
        <select class='inputField' name='ddlType'>
            {foreach from=$valueArray item=value}
                <option value = '{$value}'>{$value}</option>
            {/foreach}
        </select><br/><br/>

        <label for='price'>価格: </label>
        <input type='text' class='inputField' name='txtPrice' /><br/><br/>

        <label for='roast'>ロースト: </label>
        <input type='text' class='inputField' name='txtRoast' /><br/><br/>
                
        <label for='country'>国: </label>
        <input type='text' class='inputField' name='txtCountry' /><br/><br/>
                
        <label for='image'>イメージ: </label>
        <select class='inputField' name='ddlImage'>
            {foreach from=$images item=image}
                <option value = '{$image}'>{$image}</option>
            {/foreach}
        </select><br/><br/>

        <label for='date'>追加日:　 </label>
        <input type="text" id="datepicker" name='dateTime' value='{$date}' disabled><br/><br/>

        <label for='review'>レビュー: </label>
        <textarea cols='70' rows='12' name='txtReview'></textarea><br/>

        <input type='submit' value='Submit' name="addCoffee"/>
    </fieldset>
</form>

