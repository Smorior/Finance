<div id ="content"></div>
    <script>
    
       $(document).ready( function() {
            $("#content").load("sell_index.php"); //NAME OF THE PAGE TO ADD
       });
    
    </script>

<form action="sell.php" method="post">
    <fieldset>
        <div class="control-group">
            <input autofocus name="stock" placeholder="Company symbol" type="text"/>
        </div>
        <div class="control-group">
            <button type="submit" class="btn">Sell</button>
        </div>
    </fieldset>
</form>