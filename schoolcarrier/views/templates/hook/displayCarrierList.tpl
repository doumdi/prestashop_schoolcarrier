<div id="delivery-options">
<h3>Ce mode de transport requiert que vous nous indiquiez les informations supplémentaires suivantes:</h3>
    <div>
        <input type="text" name="kid_name" placeholder="Nom de votre enfant">
        <input type="text" name="kid_level" placeholder="Niveau">
        <input type="text" name="kid_teacher" placeholder="Nom du professeur">
    </div>
</div>

<script>

document.addEventListener('DOMContentLoaded', function () {
  
    $("button[name=confirmDeliveryOption]").addClass("disabled");
    
    //$(".delivery_option_radio:not([checked])").change(function() {
    //  $("button[name=confirmDeliveryOption]").removeClass("disabled"); });

    $("form [name=kid_name], form [name=kid_level], form [name=kid_teacher]").on('blur select change keyup', function() {
      if ($("form [name=kid_name]").val() == "" || $("form [name=kid_level]").val() == "" || $("form [name=kid_teacher]").val() == "") {
        $("button[name=confirmDeliveryOption]").addClass("disabled");
      } else {
        $("button[name=confirmDeliveryOption]").removeClass("disabled");
      }
    });
    
    
  });
</script>