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
    <tr>
        {foreach from=$coffeeArray item=value}
            <td><a href='CoffeeAdd.php?update={$value.id}'>Update</a></td>
            <td><a href='#' onclick='showConfirm({$value.id})'>Delete</a></td>
            <td>{$value.id}</td>
            <td>{$value.name}</td>
            <td>{$value.type}</td>    
            <td>{$value.price}</td> 
            <td>{$value.roast}</td>
            <td>{$value.country}</td>   
        {/foreach}
    </tr>
</table>