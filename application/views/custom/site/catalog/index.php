<?
// цикл получения всех изображений товара. доступно внутри цикла
// foreach ( $catalog_products as $index => $product )
/*
  <? foreach ( $product->images() as $product_image ) : ?>
    <img src="<?= $product->img_src($product_image); ?>" />
  <? endforeach; ?>
*/
/*
  $item->description()    = полное описание товара (с форматрованием)
  $item->description(100) = краткое описание товара (без форматрованием)
*/
/*
  $item->in_stock()       = строковое представление поля "Товар в наличии"
  $item->in_stock(TRUE)   = булево представление поля "Товар в наличии"
*/
?>
<style type="text/css">
  .old-price {
      text-decoration: line-through;
  }
</style>
		<input class="hide" id="view_1" name="view_mode" type="radio"/>
		<input class="hide" id="view_2" name="view_mode" type="radio"/>
		<input class="hide" id="view_3" checked name="view_mode" type="radio"/>
<div class="prod_display_mode">
    <? if ( isset($catalog_products) && !empty($catalog_products) ) : ?>
        <? foreach ( $catalog_products as $index => $product ) : ?>
            <?if($product->in_stock(true) != 1):?>
                <div class="prod_unit">
                    <a class="prod_link" href="javascript:;"><?= $product->title; ?></a>
                        <div class="share_id">арт. <?= $product->article; ?></div>
                        <?if( $product->price_discount() !== $product->price()):?>
                            <div class="share_price"><span class="<?=$product->price_discount() !== $product->price() ? 'old-price' : '' ?>">
                            <?=$product->price(); ?></span> руб</div>
                            <div class="share_price"><span><?=$product->price_discount(); ?></span> руб</div>
                        <?else:?>
                            <div class="share_price"><span><?=$product->price(); ?></span> руб</div>
                        <?endif;?>
                        <div class="share_img">
                            <img src="<?= $product->image_mid(); ?>" alt="" />
                            
                            
                                <div class="button_holder">
                                   <a href="javascript:;" class="share_btn sold">Продано</a><br>
                                </div>
                            
                        </div>
                        <div class="prod_info">
                            <div class="prod_availability"><?= $product->in_stock(); ?> на складе.</div>
                            <?$brand=$this->diff_func_mapper->get_brand($product->brand);?>

                            <?if(!empty($brand->name)):?>
                            <div class="prod_brand"><span>Бренд:</span> <?=$brand->name;?></div>
                            <?endif;?>

                            <div class="prod_brand"><span>Страна:</span> Италия</div>
                        </div>

                </div>
            <?else:?>
                <div class="prod_unit">
                    <a class="prod_link" href="<?= $product->url(); ?>"><?= $product->title; ?></a>
                        <div class="share_id">арт. <?= $product->article; ?></div>
                        <?if( $product->price_discount() !== $product->price()):?>
                            <div class="share_price"><span class="<?=$product->price_discount() !== $product->price() ? 'old-price' : '' ?>">
                            <?=$product->price(); ?></span> руб</div>
                            <div class="share_price"><span><?=$product->price_discount(); ?></span> руб</div>
                        <?else:?>
                            <div class="share_price"><span><?=$product->price(); ?></span> руб</div>
                        <?endif;?>
                        <div class="share_img">
                            <a href="<?= $product->url(); ?>"><img src="<?= $product->image_mid(); ?>" alt="" /></a>
                            
                            
                                <div class="button_holder">
                                   <a href="<?= $product->url(); ?>" class="share_btn">Купить</a><br>
                                </div>
                            
                        </div>
                        <div class="prod_info">
                            <div class="prod_availability"><?= $product->in_stock(); ?> на складе.</div>
                            <?$brand=$this->diff_func_mapper->get_brand($product->brand);?>

                            <?if(!empty($brand->name)):?>
                            <div class="prod_brand"><span>Бренд:</span> <?=$brand->name;?></div>
                            <?endif;?>

                            <div class="prod_brand"><span>Страна:</span> Италия</div>
                        </div>

                </div>
            <?endif;?>
        <? endforeach; ?>
    <? endif; ?>

 <div class="pager">
   <?= ! empty($paginator) ? $paginator : ''; ?>
 </div>

</div>