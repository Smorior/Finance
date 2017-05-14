<form id="form-quote" action="quote.php" method="post">
    <fieldset>
        <div class="control-group">
            <input autofocus autocomplete="off" name="symbol" placeholder="Symbol" type="text"/>
        </div>
        <div class="control-group">
            <button type="submit" class="btn">Search</button>
        </div>
    </fieldset>
    <div id="price"></div>
    <div id="suggestions"></div>
</form>
<script type="text/javascript" src="/js/quote7.js"></script>
<script src='complete.ly.1.0.1.min.js'></script>

<script>
   var auto = completely(document.getElementById("form-quote"), {
    	fontSize : '24px',
    	fontFamily : 'Arial',
    	color:'#933',
   });
   auto.options = [json_encode(['symbols' => $result]);];
   auto.repaint(); 
   setTimeout(function() {
   	auto.input.focus();
   },0);
</script>
