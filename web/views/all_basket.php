<?// Страничка корзины с покупками . Сейчас не актуальна.?>
 <div class="block_basket">
 <h5>Корзина</h5>
 <img class="basket_img" src="/web/static/img/basket/basket.png">
 <?
    if ($_COOKIE["basket"]) {
        $basket=unserialize($_COOKIE["basket"]);
    } else {
            //echo "WARNING: cookie my_basket is unset.";
            $basket=[];
    }
        // var_dump($basket) ;
        if (count($basket)<1) {?>
            <p>В вашей корзине пока пусто =(. Выберите какой-то товар</p>
        <?} else {
            $totalCount=0;
            foreach ($basket as $key => $basketvalue) {
                $totalCount+=$basketvalue;
            }
            ?>
            <p>В вашей корзине <?echo $totalCount?> товар(ов)</p>


        <?}
?>
            <span class="btn-buy">
            <!-- < TODO перенести в веб > -->
                <button  type="submit" class="submit" style="" name="regBasket" 
                onClick=<?echo "'location.href=\"/basket\"'"?> >Оформить заказ </button>
    <!--             <button type="submit" class="btn btn-primary" name="edit" id="edit"
                 onClick=<?//echo "'location.href=\"/administrator/goods/buygood?id=". $goods_value["idGood"]."\"'"?>>Изменить</button> -->
            </span>
 <?//var_dump($this->globaldata["basket"])?>
</div>