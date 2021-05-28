{foreach from=$coffeeArray item=coffee}
    <table class = 'coffeeTable'>
        <tr>
            <th rowspan='6' width = '150px' ><img runat = 'server' src = '{$coffee->image}' /></th>
            <th width = '75px' >Name: </th>
            <td>{$coffee->name}</td>
        </tr>
                            
        <tr>
            <th>Type: </th>
            <td>{$coffee->type}</td>
        </tr>
                            
        <tr>
            <th>Price: </th>
            <td>{$coffee->price}</td>
        </tr>
                            
        <tr>
            <th>Roast: </th>
            <td>{$coffee->roast}</td>
        </tr>
                            
        <tr>
            <th>Origin: </th>
            <td>{$coffee->country}</td>
        </tr>
                            
        <tr>
            <td colspan='2' >{$coffee->review}</td>
        </tr>           
    </table>
{/foreach}