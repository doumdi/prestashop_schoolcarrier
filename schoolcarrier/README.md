
# Modifications à faire à "pdf/invoice.shipping-tab.tpl"

```html
<table id="shipping-tab" width="100%">
    <tr>
        <td class="shipping center small grey bold" width="44%">{l s='Carrier' d='Shop.Pdf' pdf='true'}</td>
        <td class="shipping center small white" width="56%">{$carrier->name}</td>
    </tr>


    {if $order->gift}
    <tr>
        <td class="shipping center small grey bold" width="44%">Note de livraison</td>
        <td class="shipping center small white" width="56%">{$order->gift_message}</td>
    </tr>
    {/if}

</table>
```
