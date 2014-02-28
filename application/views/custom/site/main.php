<style type="text/css">
  .old-price {
      text-decoration: line-through;
  }
</style>
	<section class="main_row">
		<div class="section_inner">

			<div class="slider_wrapper">
				<div class="slide_prev"></div>
				<div class="slide_next"></div>
                <?if ( isset($widgets['main_slider1']['items'])>0):?>
                    <ul id="slider" class="slider">
                        <?foreach($widgets['main_slider1']['items'] as $key1=>$value1):?>
                            <li class="slide"><img src="<?= base_url('/upload/images/banner/'.$value1['maxi']->getFilenameThumb()); ?>" alt=""/></li>
                        <?endforeach;?>
                    </ul>
                <?endif;?>
			</div>


			<div class="share_block">
				<ul id="share_controls" class="share_tabs">
					<li class="tab_control current_tab">Последние поступления</li>
					<li class="tab_control">Распродажа</li>
				</ul>
                <?$new_prod=$this->diff_func_mapper->get_new_product(6);?>
                <?$sale_prod=$this->diff_func_mapper->get_sale_product(6);?>
				<ul id="share_container" class="share_container">
                <!--последние поступления-->

					<li class="tab_item">
                    <?if(!empty($new_prod)):?>
                        <?foreach($new_prod as $keys1=>$new_p):?>
                            <?if($new_p->in_stock(true) != 1):?>
                                <div class="share_unit">
                                    <div class="share_img"><img src="<?= $new_p->image_mid(); ?>" style ="<?= $new_p->image_mid() == '/../www_site/img/noimg.png' ? 'height:130px;' : ''; ?>" alt=""/></div>
                                    <a href="javascript:;" class="share_btn sold">Продано</a><br>
                                    <div class="params">
                                        <a class="share_link" href="javascript:;"><?=$new_p->title;?></a>
                                    </div>
                                    <div class="share_id">арт. <?=$new_p->article;?></div>   
                                    <?if( $new_p->price_discount() !== $new_p->price()):?>
                                        <div class="share_price"><span class="<?=$new_p->price_discount() !== $new_p->price() ? 'old-price' : '' ?>">
                                        <?=$new_p->price(); ?></span> руб</div>
                                        <div class="share_price"><span>
                                        <?=$new_p->price_discount(); ?></span> руб</div>
                                    <?else:?>
                                        <div class="share_price"><span>
                                        <?=$new_p->price(); ?></span> руб</div>
                                    <?endif;?>
                                                                    
                                </div>
                            <?else:?>
                                <div class="share_unit">
                                    <div class="share_img"><a href="<?= $new_p->url(); ?>"><img src="<?= $new_p->image_mid(); ?>" style ="<?= $new_p->image_mid() == '/../www_site/img/noimg.png' ? 'height:130px;' : ''; ?>" alt=""/></a></div>
                                    <a href="<?= $new_p->url(); ?>" class="share_btn">Купить</a><br>
                                    <div class="params">
                                        <a class="share_link" href="<?= $new_p->url(); ?>"><?=$new_p->title;?></a>
                                    </div>
                                    <div class="share_id">арт. <?=$new_p->article;?></div>   
                                    <?if( $new_p->price_discount() !== $new_p->price()):?>
                                        <div class="share_price"><span class="<?=$new_p->price_discount() !== $new_p->price() ? 'old-price' : '' ?>">
                                        <?=$new_p->price(); ?></span> руб</div>
                                        <div class="share_price"><span>
                                        <?=$new_p->price_discount(); ?></span> руб</div>
                                    <?else:?>
                                        <div class="share_price"><span>
                                        <?=$new_p->price(); ?></span> руб</div>
                                    <?endif;?>                                
                                </div>
                            <?endif;?>
                        <?endforeach;?>
                    <?endif;?>
					</li>
					<li class="tab_item">
                    <?if(!empty($sale_prod)):?>
                        <?foreach($sale_prod as $keys1=>$sale_p):?>
                            <?if($sale_p->in_stock(true) != 1):?>
                                <div class="share_unit">
                                    <div class="share_img"><img src="<?= $sale_p->image_mid(); ?>" style ="<?= $sale_p->image_mid() == '/../www_site/img/noimg.png' ? 'height:130px;' : ''; ?>" alt=""/></div>
                                    <a href="javascript:;" class="share_btn sold">Продано</a><br>
                                    <div class="params">
                                        <a class="share_link" href="javascript:;"><?= $sale_p->title; ?></a>
                                    </div>
                                        <div class="share_id">арт. <?= $sale_p->article; ?></div>
                                    <?if( $sale_p->price_discount() !== $sale_p->price()):?>
                                        <div class="share_price"><span class="<?=$sale_p->price_discount() !== $sale_p->price() ? 'old-price' : '' ?>">
                                        <?=$sale_p->price(); ?></span> руб</div>
                                        <div class="share_price"><span>
                                        <?=$sale_p->price_discount(); ?></span> руб</div>
                                    <?else:?>
                                        <div class="share_price"><span>
                                        <?=$sale_p->price(); ?></span> руб</div>
                                    <?endif;?>
                                    
                                </div>
                            <?else:?>
                                <div class="share_unit">
                                    <div class="share_img"><a href ="<?= $sale_p->url(); ?>"><img src="<?= $sale_p->image_mid(); ?>" style ="<?= $sale_p->image_mid() == '/../www_site/img/noimg.png' ? 'height:130px;' : ''; ?>" alt=""/></a></div>
                                    <a href="<?= $sale_p->url(); ?>" class="share_btn">Купить</a><br>
                                    <div class="params">
                                        <a class="share_link" href="<?= $sale_p->url(); ?>"><?= $sale_p->title; ?></a>
                                    </div>
                                        <div class="share_id">арт. <?= $sale_p->article; ?></div>
                                    <?if( $sale_p->price_discount() !== $sale_p->price()):?>
                                        <div class="share_price"><span class="<?=$sale_p->price_discount() !== $sale_p->price() ? 'old-price' : '' ?>">
                                        <?=$sale_p->price(); ?></span> руб</div>
                                        <div class="share_price"><span>
                                        <?=$sale_p->price_discount(); ?></span> руб</div>
                                    <?else:?>
                                        <div class="share_price"><span>
                                        <?=$sale_p->price(); ?></span> руб</div>
                                    <?endif;?>
                                    
                                </div>
                            <?endif;?>                            
                        <?endforeach;?>
                    <?endif;?>

					</li>
				</ul>
			</div>
		</div>
        <?if ( isset($widgets['main_slider3']['items'])>0):?>
		<div class="benefits_block">
			<ul id="benefits_controls" class="benefits_tabs">
             <?foreach($widgets['main_slider3']['items'] as $key3=>$value3):?>
                <?if($key3 == 0):?>
                    <li class="tab_control mod_1 current_tab"><img src="<?= base_url('/upload/images/banner/'.$value3['maxi']->getFilename()); ?>" alt=""/></li>
                <?else:?>
                    <li class="tab_control"><img src="<?= base_url('/upload/images/banner/'.$value3['maxi']->getFilename()); ?>" alt=""/></li>
                <?endif;?>
            <?endforeach;?>
			</ul>
			<ul id="benefits_container" class="benefits_container">
            <?foreach($widgets['main_slider3']['items'] as $key3=>$value3):?>
				<li class="tab_item">
					<div class="benefits_title"><?=$value3['item']->title;?></div>
					<div class="benefits_text"><?=$value3['item']->description;?>
					</div>
				</li>
            <?endforeach;?>
			</ul>
		</div>
        <?endif;?>
		<div class="section_inner">
            <?= $content; ?>
		</div>
	</section>