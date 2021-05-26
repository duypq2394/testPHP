{if isset($coffee)}
<form action='' method='post' name = "update">
    <fieldset>
        <legend>Add a new Coffee</legend>
        <input type="hidden" name="intId" value={$coffee->id}/>
        <label for='name'>Name: </label>
        <input type='text' class='inputField' name='txtName' value='{$coffee->name}' /><br/>

        <label for='type'>Type: </label>
        <select class='inputField' name='ddlType'>
            <option value='%'>All</option>
            {foreach from=$valueArray item=value}
                <option value = '{$value}'>{$value}</option>
            {/foreach}
        </select><br/>

        <label for='price'>Price: </label>
        <input type='text' class='inputField' name='txtPrice' value='{$coffee->price}'/><br/>

        <label for='roast'>Roast: </label>
        <input type='text' class='inputField' name='txtRoast' value='{$coffee->roast}'/><br/>
                
        <label for='country'>Country: </label>
        <input type='text' class='inputField' name='txtCountry' value='{$coffee->country}'/><br/>
                
        <label for='image'>Image: </label>
        <select class='inputField' name='ddlImage'>
            {foreach from=$images item=image}
                <option value = '{$image}'>{$image}</option>
            {/foreach}
        </select><br/>

        <label for='review'>Review: </label>
        <textarea cols='70' rows='12' name='txtReview'>{$coffee->review}</textarea><br/>

        <input type='submit' value='Submit'/>
    </fieldset>
</form>
{/if}