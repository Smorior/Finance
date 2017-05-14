<?php

    // configuration
    require("../includes/config.php"); 

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // load suggestion data
       $data = @file_get_contents("http://d.yimg.com/autoc.finance.yahoo.com/autoc?query={$_POST['symbol']}&region=1&lang=en&callback=YAHOO.Finance.SymbolSuggest.ssCallback");

        // parse yahoo data into a list of symbols
        $result = [];
        $json = json_decode(substr($data, strlen('YAHOO.Finance.SymbolSuggest.ssCallback('), -2));
        foreach ($json->ResultSet->Result as $stock)
            $result[] = $stock;

        echo json_encode(['symbols' => $result]);
    }

?>
