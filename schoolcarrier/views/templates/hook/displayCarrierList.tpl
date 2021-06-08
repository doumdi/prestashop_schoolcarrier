<div id="delivery-options">
<h3>Ce mode de transport requiert que vous nous indiquiez les informations supplémentaires suivantes:</h3>
<input type="text" name="kid_name" placeholder="Nom de votre enfant">
  <select name="teacher">
    <option value="" disabled selected>Classe de votre enfant</option>
    {foreach from=$teachers key=relay_point item=teacher}
    <option value="{$teacher}">{$teacher}</option>
    {/foreach}
  </select>
</div>

<script>
  $(document).ready(function() {
    $("button[name=processCarrier]").addClass("disabled");
    $(".delivery_option_radio:not([checked])").change(function() {
      $("button[name=processCarrier]").removeClass("disabled"); });
    $("form [name=kid_name], form [name=teacher]").on('blur select change keyup', function() {
      if ($("form [name=kid_name]").val() == "" || $("form [name=teacher]").val() == null) {
        $("button[name=processCarrier]").addClass("disabled");
      } else {
        $("button[name=processCarrier]").removeClass("disabled");
      }
    });
  });
</script>