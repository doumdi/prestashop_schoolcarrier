<div id="delivery-options">
<p>Ce mode de transport requiert que vous nous indiquiez les informations supplémentaires suivantes:<p>
<input type="text" name="kid_name" placeholder="Nom de votre enfant">
  <select name="teacher">
    <option value="" disabled selected>Indiquez la classe de votre enfant</option>
    {foreach from=$teachers key=relay_point item=teacher}
    <option value="{$teacher}">{$teacher}</option>
    {/foreach}
  </select>
</div>

<script>
</script>