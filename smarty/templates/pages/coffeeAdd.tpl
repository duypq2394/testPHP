
<form action='' method='post'>
    <fieldset>
    <legend>Add a new Coffee</legend>
        <label for='name'>Name: </label>
        <input type='text' class='inputField' name='txtName' /><br/>

        <label for='type'>Type: </label>
        <select class='inputField' name='ddlType'>
            <option value='%'>All</option>
            {foreach from=$valueArray item=value}
                <option value = '{$value}'>{$value}</option>
            {/foreach}
        </select><br/>

        <label for='price'>Price: </label>
        <input type='text' class='inputField' name='txtPrice' /><br/>

        <label for='roast'>Roast: </label>
        <input type='text' class='inputField' name='txtRoast' /><br/>
                
        <label for='country'>Country: </label>
        <input type='text' class='inputField' name='txtCountry' /><br/>
                
        <label for='image'>Image: </label>
        <select class='inputField' name='ddlImage'>
            {foreach from=$images item=image}
                <option value = '{$image}'>{$image}</option>
            {/foreach}
        </select><br/>

        <label for='review'>Review: </label>
        <textarea cols='70' rows='12' name='txtReview'></textarea><br/>

        <input type='submit' value='Submit'/>
    </fieldset>
</form>

