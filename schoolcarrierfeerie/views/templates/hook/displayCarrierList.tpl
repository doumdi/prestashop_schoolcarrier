<div id="delivery-options-schoolcarrier-feerie">
<h3>Ce mode de transport requiert que vous nous indiquiez les informations supplémentaires suivantes:</h3>
    <table>
        <tr>
            <td><label for="school_carrier_feerie_kid_name">Nom de votre enfant</label></td>
            <td><input id="school_carrier_feerie_kid_name" type="text" name="feerie_kid_name" placeholder="Nom de votre enfant"></td>
        </tr>
        <tr>
            <td><label for="school_carrier_feerie_kid_level">Niveau de votre enfant</label></td>
            <td><input id="school_carrier_feerie_kid_level" type="text" name="feerie_kid_level" placeholder="Niveau"></td>
        </tr>
        <tr>
            <td><label for="school_carrier_feerie_kid_phone">Numéro de téléphone cellulaire</label></td>
            <td><input id="school_carrier_feerie_kid_phone" type="text" name="feerie_kid_phone" placeholder="Numéro de cellulaire"></td>
        </tr>
    </table>
</div>

<script>

document.addEventListener('DOMContentLoaded', function () {
    //When page is loaded
    test_fields_school_carrier_feerie();

    //Radio button changed
    $(".delivery-option input[type=\"radio\"]").change(test_fields_school_carrier_feerie);

    //Fields changed
    $("form [name=feerie_kid_name], form [name=feerie_kid_level], form [name=feerie_kid_phone]").on('blur select change keyup', test_fields_school_carrier_feerie);

    function test_fields_school_carrier_feerie() {
      if ($("#delivery_option_{$schoolcarrier_feerie_carrier_id}")[0].checked) {

          if ($("form [name=feerie_kid_name]").val() == "" || $("form [name=feerie_kid_level]").val() == "" || $("form [name=feerie_kid_phone]").val() == "") {
            $("button[name=confirmDeliveryOption]").addClass("disabled");
          } else {
            $("button[name=confirmDeliveryOption]").removeClass("disabled");
          }
      }
      else
      {
          $("button[name=confirmDeliveryOption]").removeClass("disabled");
      }
    }
  });
</script>