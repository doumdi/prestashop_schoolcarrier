<div id="delivery-options-schoolcarrier">
<h3>Ce mode de transport requiert que vous nous indiquiez les informations supplémentaires suivantes:</h3>
    <table>
        <tr>
            <td><label for="school_carrier_kid_name">Nom de votre enfant</label></td>
            <td><input id="school_carrier_kid_name" type="text" name="kid_name" placeholder="Nom de votre enfant"></td>
        </tr>
        <tr>
            <td><label for="school_carrier_kid_level">Niveau de votre enfant</label></td>
            <td><input id="school_carrier_kid_level" type="text" name="kid_level" placeholder="Niveau"></td>
        </tr>
        <tr>
            <td><label for="school_carrier_kid_teacher">Nom du professeur de votre enfant</label></td>
            <td><input id="school_carrier_kid_teacher" type="text" name="kid_teacher" placeholder="Nom du professeur"></td>
        </tr>
    </table>
</div>

<script>

document.addEventListener('DOMContentLoaded', function () {
    //When page is loaded
    test_fields_school_carrier();

    //Radio button changed
    $(".delivery-option input[type=\"radio\"]").change(test_fields_school_carrier);
    
    //Fields changed
    $("form [name=kid_name], form [name=kid_level], form [name=kid_teacher]").on('blur select change keyup', test_fields_school_carrier);
    
    function test_fields_school_carrier() {
      if ($("#delivery_option_{$schoolcarrier_carrier_id}")[0].checked) {    
        
          if ($("form [name=kid_name]").val() == "" || $("form [name=kid_level]").val() == "" || $("form [name=kid_teacher]").val() == "") {
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