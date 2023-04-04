<?=

    function total_qtt(){
        $total_qtt =;
        if(isset($_SESSION{"products"})){
            foreach($_SESSION["products"] as $product) {
                $total_qtt += $product["qtt"];
            }
        }
        return $total_qtt;
    }


?>