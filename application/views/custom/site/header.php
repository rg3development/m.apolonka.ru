    <!DOCTYPE html>
    <html lang="ru">
    <head>
        <meta charset="utf-8">
        <title><?=$page_info['title'];?> - <?=$site_settings['title'];?></title>
        <meta name="keywords" content="<?=!empty($page_info['keywords']) ? $page_info['keywords'] : $site_settings['keywords'];?>">
        <meta name="description" content="<?=!empty($page_info['description']) ? $page_info['description'] : $site_settings['description'];?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <script src="/../www_site/js/jquery-1.9.0.min.js"></script>

        <script src="/../www_site/js/modernizr.2.js"></script>
        <script src="/../www_site/js/jquery.bxslider.min.js"></script>
        <link rel="stylesheet" href="/../www_site/css/style.css" media="all">
        <script src="/../www_site/js/script.js"></script>
        <script src="/../www_site/js/jquery.cookie.js"></script>
    </head>
    <body>
    <div class="wrapper">
        <header class="header">
            <div class="section_inner clearfix">
            <?if ( isset($widgets['main_slider4']['items'])>0):?>
                <?foreach($widgets['main_slider4']['items'] as $key4=>$value4):?>
                    <?=$value4['item']->description;?>
                <?endforeach;?>
            <?endif;?>
            </div>
        </header>
        <nav class="navigation">
            <div class="section_inner clearfix">
                <a class="logo" href="/"><?=$site_settings['logo'] ? "<img src={$site_settings['logo']} />" : '';?></a>
                <div class="cart_block">

                <?$cur_item2=0;?>
                <? foreach ( $this->cart->contents() as $index => $item ): ?>
                    <? $cur_item2 = $item['qty']+$cur_item2;?>
                <?endforeach;?>
                <?if(($this->cart->format_number($this->cart->total()))!=0):?>
                    <div class="cart_counter" ><?= $cur_item2 ; ?></div>
                    <?if($cur_item2 > 4):?>
                        <div class="cart_text"><a href="/cart">товаров</a></div>
                    <?elseif($cur_item2 > 1):?>
                        <div class="cart_text"><a href="/cart">товара</a></div>
                    <?else:?>
                        <div class="cart_text"><a href="/cart">товар</a></div>
                    <?endif;?>
                <?else:?>
                    <a href ="/cart"><div class="cart_counter">0</div></a>
                    <div class="cart_text">товаров</div>
                <?endif;?>
                    <a class="main_menu" href="#"></a>
                </div>
                <ul id="drop_menu" class="drop_menu">
                    <?=$menu;?>
                </ul>
            </div>
            <div class="section_inner clearfix">
                <? if ( isset($widgets['search_form']) ) : ?>
                    <?= $widgets['search_form']; ?>
                <? endif; ?>
            </div>
</nav>