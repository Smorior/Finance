 <script>
   var suggestions;
   $.ajax({
            url: 'suggest_more.php',
            type: 'POST',
            dataType: 'json',
            data: {symbol: $(this).val()},
            success: function(data)
            {suggestions=data;},
  $( function() {
    var availableTags = suggestions;
    $( "#tags" ).autocomplete({
      source: availableTags
    });
  } );
  </script>
<div class="ui-widget">
  <label for="tags">Tags: </label>
  <input id="tags">
</div>
