<form action="/catalog" method="post" name="order">
    <input type="hidden" name="type" value="upd">
    <? foreach ( $this->cart->contents() as $index => $item ): ?>
        <? $cur_item = $this->catalog_mapper->get_object($item['id'], 'item'); ?>
                            <div class="cart_unit clearfix">
                                <div class="share_img"><img src="<?= $cur_item->image_sm(); ?>" alt=""/></div>
                                <div class="cart_title">
                                    <a class="cart_link" href="<?= $cur_item->url(); ?>"><?= $cur_item->title; ?></a>
                                    <div class="cart_id">арт. <?= $cur_item->article; ?></div>
                                </div>
                                <div class="cart_controls">
                                    <label class="cart_input_w">
                                        <input type="hidden" name="my_ids[]" value="<?= $item['rowid']; ?>">               
                                        <input value="<?= $item['qty']; ?>" type="text" name="my_qty[]"/> шт.
                                    </label>
                                    <div class="cart_price"><?= $this->cart->format_number($item['subtotal']); ?><span>руб.</span></div>
                                    <a class="cart_remove"  onclick='document.forms["delete<?= $item['id']; ?>"].submit();' href="#"></a>
                                </div>
                            </div>
    <? endforeach; ?>
<!--    <label for="coupon_code" class="coupon_title">Если у вас есть купон на скидку, <br> введите номер:</label>
    <input id="coupon_code" type="text" name="coupon_code"/>-->
</form>  
<form name="checkout" method="post">  
    <?$delivery=$this->diff_func_mapper->delivery();?>
        <?if(isset($delivery[0]['name'])>0):?>    
            <label class="delivery_select">Способ доставки:</label> 

                <div class="delivery_wrapper clearfix">
                    <select id="deliveries" name="delivery" class="select_filter">
                    <?foreach($delivery as $index=>$deliv):?>
                        <option name="<?=$deliv['cost'];?>" value="<?=$deliv['id'];?>"><?=$deliv['name'];?></option>
                    <?endforeach;?>
                    </select>
                    <div id="share_price" class="cart_price"><?=$delivery[0]['cost']?><span>руб.</span></div>
                </div>
        <?endif;?>


                <div class="button_holder mod_1"><a class="filter_btn" onclick='document.forms["order"].submit();' href="#">Пересчитать</a></div>
                <div class="total_price"><b>Итого:</b> <span class="price"><?= $total_price; ?></span> руб.</div>
            

         
<div class="form_title">Детали заказа:</div>
<? if ( validation_errors() ) : ?>
    <div class="alert">   
        <span class="error_text">                        
            <?= validation_errors(); ?>
        </span> 
    </div>
<? endif; ?>

    <input type="hidden" name="type" value="save">                
    <label class="order_label">
        Ваше имя:
        <input type="text" name="full_name" value="<?=set_value('full_name');?>" id="billing_company" placeholder="Имя" />
    </label>
    <label class="order_label">
        Телефон:
        <input type="text" name="phone" value="<?=set_value('phone');?>" id="billing_phone" placeholder="Телефон" />
    </label>
    <label class="order_label">
        Электронная почта:
        <input type="text" class="input-text" name="email" value="<?=set_value('email');?>" id="billing_email" placeholder="Электронный адрес" />
    </label>
        <!--<label class="order_label">
            Адрес доставки:
            <input type="text" name="address" value="" id="billing_company" placeholder="Адрес" />
        </label>
        <label class="order_label">
            Комментарий:
            <textarea class="order_comment" name="comments" id="order_comments" placeholder="Ваши комментарии"></textarea>
        </label>-->
        <div id="payment">
    <div class="button_holder mod_1"><button id="checkout"  onclick='document.forms["save"].submit();' class="filter_btn mod_order"  >Оформить заказ!</button></div>
</div>
</form>
            <? foreach ( $this->cart->contents() as $index => $item ): ?>
                <form name="delete<?=$item['id'];?>" action="/catalog" method="post">
                    <input type="hidden" name="rowid" value="<?= $item['rowid']; ?>">
                    <input type="hidden" name="type" value="del">
                </form>
            <? endforeach; ?>                 

