<table class='overViewTable'>
    <tr>
        <td></td>
        <td></td>
        <td><b>Id</b></td>
        <td><b>Name</b></td>
        <td><b>Type</b></td>
        <td><b>Price</b></td>
        <td><b>Roast</b></td>
        <td><b>Country</b></td>
    </tr>
        <form action = '' method = 'post'>
            {foreach from=$coffeeArray item=value}
                <tr>
                <td><button name="update" type="submit" value={$value->id} formaction="coffeeUpdate">Update</button></td>
                <td><button name="delete" type="submit" value={$value->id} onclick="return show_confirm();">Delete</button></td>
                <td>{$value->id}</td>
                <td>{$value->name}</td>
                <td>{$value->type}</td>    
                <td>{$value->price}</td> 
                <td>{$value->roast}</td>
                <td>{$value->country}</td>   
                </tr>
            {/foreach}
        </form>
   
</table>