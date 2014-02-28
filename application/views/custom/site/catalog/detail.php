<?
// цикл получения всех изображений товара.
/*
  <? foreach ( $item->images() as $product_image ) : ?>
    <img src="<?= $item->img_src($product_image); ?>" />
  <? endforeach; ?>
*/

// форма добавления товара в корзину
// менять только селектор обработчика JS .click()
/*
  <? $item->add_to_cart(); ?>
*/

// массив похожих товаров
/*
  $similar
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
    <div class="section_inner">
                <h4 class="page_title"><?= $item->title; ?></h4>
                
                <div class="prod_slider">
                    <div class="prod_box clearfix">
                        <div class="prod_storage">
                            <div class="share_id">арт. <?= $item->article; ?></div>
                            <div class="prod_availability"><?= $item->in_stock(); ?> на складе.</div>
                        </div>
                        <?if( $item->price_discount() !== $item->price()):?>

                            <div class="share_price"><span class="<?=$item->price_discount() !== $item->price() ? 'old-price' : '' ?>">
                            <?=$item->price(); ?></span> руб</div>
                            <div class="share_price"><span>
                            <?=$item->price_discount(); ?></span> руб</div>
                        <?else:?>
                            <div class="share_price"><span>
                            <?=$item->price(); ?></span> руб</div>
                        <?endif;?>
                    </div>
                    <div class="prod_slide_next"></div>
                    <div class="prod_slide_prev"></div>
                    <ul id="prod_images" class="prod_images">
                    <?$images = $item->image_mid_all();?>
                    <?foreach($images as $img):?>
                        <li class="prod_slide"><img src="<?= $img; ?>" alt=""/></li>
                    <?endforeach;?>
                    </ul>                    
                    <div class="button_holder">  
                    <?if($item->in_stock(true) != 1):?>  
                        <a href="javascript:;" class="share_btn sold">Продано</a><br>
                    <?else:?>
                        <a id="add_to_cart" href="#" class="share_btn">Купить</a><br>
                        <a  href="#" class="share_btn2"></a>
                        <? $item->add_to_cart(); ?>
                    <?endif?>
                    </div>
                </div>
                <ul class="awards">
                    <li class="award_unit"><img src="/../www_site/img/award_1.png" alt=""/></li>
                    <li class="award_unit"><img src="/../www_site/img/award_2.png" alt=""/></li>
                    <li class="award_unit"><img src="/../www_site/img/award_3.png" alt=""/></li>
                </ul>

                <div class="delivery_caption">Стоимость доставки:</div>
                <?$delivery=$this->diff_func_mapper->delivery();?>

                <div class="delivery_info">
                <?foreach($delivery as $key=> $deliv):?>
                    <?if((int)$deliv['cost'] == 0):?>
                        <?=$deliv['name'];?> — <b>бесплатно</b>.<br>
                    <?else:?>
                    <?=$deliv['name'];?> — <b><?=$deliv['cost'];?></b> руб.<br>
                    <?endif;?>
                    
                <?endforeach;?>
                </div>
                <div class="delivery_caption">Ближайшая доставка:</div>
                <div class="delivery_info">По Москве — <b>сегодня</b><br>
                    В Санкт-Петербург — <b>послезавтра</b><br>
                    В СанкОт МКАД 0-35 км. — <b>1-2 дня.</b></div>
                <div class="delivery_caption">Описание:</div>
                <div class="prod_params"><span>Арт.</span> <?= $item->article; ?></div>
                <?if(!empty($item->adddesc)):?>
                    <?$adddesc = explode(';',$item->adddesc);?>
                    <?foreach($adddesc as $key => $ads):?>
                    <?endforeach;?>
                    <?foreach($adddesc as $key2 => $ads):?>
                        <?if($key != $key2):?>
                            <?$adm = explode(':',$ads);?>                        
                            <div class="prod_params"><span><?=$adm[0];?>:</span><?if(!empty($adm[1])):?><?=$adm[1];?><?endif;?></div>
                        <?endif;?>
                    <?endforeach;?>
                <?endif;?>
                <div class="prod_params"><?= $item->description(); ?></div>
                <?if(!empty($similar)):?>

                    <div class="similar_products">
                        <h4 class="page_title">Apolonka <span>рекомендует:</span></h4>
                        <input class="hide" id="view_1" checked name="view_mode" type="radio">
                        <div class="prod_display_mode mod_1">
                            <?foreach($similar as $index => $sim):?>
                                <?if($index < 6):?>
                                    <?if($sim->in_stock(true) != 1):?>
                                        <div class="prod_unit">
                                            <a class="prod_link" href="javascript:;"><?=$sim->title;?></a>
                                            <div class="share_id">арт. <?=$sim->article;?></div>
                                            <div class="share_price"><span class="<?=$sim->price_discount() !== $sim->price() ? 'old-price' : '' ?>"><?=$sim->price();?></span> руб</div>
                                            <? if ($sim->price_discount() !== $sim->price()) : ?>
                                                <div class="share_price"><span><?= $sim->price_discount() !== $sim->price() ? $sim->price_discount() : ''; ?></span> руб</div>
                                            <? endif; ?>
                                            
                                            
                                            <div class="share_img">
                                                <img src="<?= $sim->image_mid(); ?>" alt="" style ="<?= $sim->image_mid() == '/../www_site/img/noimg.png' ? 'height:130px;' : ''; ?>">
                                                <div class="button_holder">
                                                    <a href="javascript:;" class="share_btn sold">Продано</a><br>
                                                </div>
                                            </div>
                                            <div class="prod_info">
                                                <div class="prod_availability"><?= $sim->in_stock(); ?> на складе.</div>
                                                <?$brand=$this->diff_func_mapper->get_brand($sim->brand);?>
                                                <?if(!empty($brand->name)):?>
                                                    <div class="prod_brand"><span>Бренд:</span> <?=$brand->name;?></div>
                                                <?endif;?>
                                                <div class="prod_brand"><span>Страна:</span> Италия</div>
                                            </div>
                                        </div>
                                    <?else:?>
                                        <div class="prod_unit">
                                            <a class="prod_link" href="<?=$sim->url();?>"><?=$sim->title;?></a>
                                            <div class="share_id">арт. <?=$sim->article;?></div>
                                            <div class="share_price"><span class="<?=$sim->price_discount() !== $sim->price() ? 'old-price' : '' ?>"><?=$sim->price();?></span> руб</div>
                                            <? if ($sim->price_discount() !== $sim->price()) : ?>
                                                <div class="share_price"><span><?= $sim->price_discount() !== $sim->price() ? $sim->price_discount() : ''; ?></span> руб</div>
                                            <? endif; ?>
                                            <div class="share_img">
                                                <a href="<?=$sim->url();?>"><img src="<?= $sim->image_mid(); ?>" alt="" style ="<?= $sim->image_mid() == '/../www_site/img/noimg.png' ? 'height:130px;' : ''; ?>"></a>
                                                <div class="button_holder">
                                                    <a href="<?=$sim->url();?>" class="share_btn">Купить</a><br>
                                                </div>
                                            </div>
                                            <div class="prod_info">
                                                <div class="prod_availability"><?= $sim->in_stock(); ?> на складе.</div>
                                                <?$brand=$this->diff_func_mapper->get_brand($sim->brand);?>
                                                <?if(!empty($brand->name)):?>
                                                    <div class="prod_brand"><span>Бренд:</span> <?=$brand->name;?></div>
                                                <?endif;?>
                                                <div class="prod_brand"><span>Страна:</span> Италия</div>
                                            </div>
                                        </div>
                                    <?endif;?>
                                <?endif;?>
                            <?endforeach;?>    
                        </div>
                    </div>
                <?endif;?>
    </div>




