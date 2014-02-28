    <!DOCTYPE html>    <html lang="ru">    <head>        <meta charset="utf-8">        <title><?=$page_info['title'];?> - <?=$site_settings['title'];?></title>        <meta name="keywords" content="<?=!empty($page_info['keywords']) ? $page_info['keywords'] : $site_settings['keywords'];?>">        <meta name="description" content="<?=!empty($page_info['description']) ? $page_info['description'] : $site_settings['description'];?>">		<meta name="viewport" content="width=device-width, initial-scale=1.0" />        <script src="/../www_site/js/jquery-1.9.0.min.js"></script>        <script src="/../www_site/js/modernizr.2.js"></script>        <script src="/../www_site/js/jquery.bxslider.min.js"></script>        <link rel="stylesheet" href="/../www_site/css/style.css" media="all">        <script src="/../www_site/js/script.js"></script>    </head>    <body>    <div class="wrapper">        <header class="header">            <div class="section_inner clearfix">            <?if ( isset($widgets['main_slider4']['items'])>0):?>                <?foreach($widgets['main_slider4']['items'] as $key4=>$value4):?>                    <?=$value4['item']->description;?>                <?endforeach;?>            <?endif;?>            </div>        </header>        <nav class="navigation">            <div class="section_inner clearfix">                <a class="logo" href="/"><?=$site_settings['logo'] ? "<img src={$site_settings['logo']} />" : '';?></a>                <div class="cart_block">                <?$cur_item2=0;?>                <? foreach ( $this->cart->contents() as $index => $item ): ?>                    <? $cur_item2 = $item['qty']+$cur_item2;?>                <?endforeach;?>                <?if(($this->cart->format_number($this->cart->total()))!=0):?>                    <div class="cart_counter"><?= $cur_item2 ; ?></div>                    <?if($cur_item2 > 4):?>                        <div class="cart_text"><a href="/cart">товаров</a></div>                    <?elseif($cur_item2 > 1):?>                        <div class="cart_text"><a href="/cart">товара</a></div>                    <?else:?>                        <div class="cart_text"><a href="/cart">товар</a></div>                    <?endif;?>                <?else:?>                    <a href ="/cart"><div class="cart_counter">0</div></a>                    <div class="cart_text"><a href="/cart">товаров</a></div>                <?endif;?>                    <a class="main_menu" href="#"></a>                </div>                <ul id="drop_menu" class="drop_menu">                    <?=$menu;?>                </ul>            </div>            <div class="section_inner clearfix">                <? if ( isset($widgets['search_form']) ) : ?>                    <?= $widgets['search_form']; ?>                <? endif; ?>            </div>            <div class="section_inner clearfix">            <?if(empty($_GET['item'])):?>                <ul class="breadcrumbs">                    <li class="crumb_item"><a class="crumb_link crumb_home" href="/"></a></li>                    <?if(empty($_GET['cat'])):?>                        <?if(empty($_GET['met'])):?>                            <li class="crumb_item"><a class="crumb_link crumb_current" href="/<?=$page_info['url'];?>">Каталог</a></li>                        <?else:?>                            <?if($_GET['met'] == 1):?>                            <li class="crumb_item"><a class="crumb_link" href="/<?=$page_info['url'];?>">Каталог</a></li>                             <li class="crumb_item"><a class="crumb_link crumb_current" href="#">Новинки</a></li>                                <?endif;?>                            <?if($_GET['met'] == 2):?>                             <li class="crumb_item"><a class="crumb_link" href="/<?=$page_info['url'];?>">Каталог</a></li>                             <li class="crumb_item"><a class="crumb_link crumb_current" href="#">Распродажа</a></li>    <?endif;?>                            <?if($_GET['met'] == 3):?>                            <li class="crumb_item"><a class="crumb_link" href="/<?=$page_info['url'];?>">Каталог</a></li>                            <li class="crumb_item"><a class="crumb_link" href="/<?=$page_info['url'];?>?cat=1">Для женщин</a></li>                            <li class="crumb_item"><a class="crumb_link crumb_current" href="#">Аксессуары</a></li>                            <?endif;?>                            <?if($_GET['met'] == 4):?>                            <li class="crumb_item"><a class="crumb_link" href="/<?=$page_info['url'];?>">Каталог</a></li>                             <li class="crumb_item"><a class="crumb_link" href="/<?=$page_info['url'];?>?cat=25">Для мужчин</a></li>                            <li class="crumb_item"><a class="crumb_link crumb_current" href="#">Аксессуары</a></li>                            <?endif;?>                        <?endif;?>                    <?else:?>                    <?$categor=$this->catalog_mapper->get_parent_category($_GET['cat']);?>                    <?$parent_category=$this->catalog_mapper->get_parent_category($categor->parent_category_id,'id');?>                                            <?if(empty($parent_category->title)):?>                            <li class="crumb_item"><a class="crumb_link" href="/<?=$page_info['url'];?>">Каталог</a></li>                            <li class="crumb_item"><a class="crumb_link crumb_current" href="#"><?=$categor->title;?></a></li>                        <?else:?>                            <li class="crumb_item"><a class="crumb_link" href="/<?=$page_info['url'];?>">Каталог</a></li>                            <li class="crumb_item"><a class="crumb_link" href="/<?=$page_info['url'];?>?cat=<?=$parent_category->id;?>"><?=$parent_category->title;?></a></li>                            <li class="crumb_item"><a class="crumb_link crumb_current" href="#"><?=$categor->title;?></a></li>                        <?endif;?>                    <?endif;?>                </ul>            <?else:?>             <?$itemer =$this->catalog_mapper->get_object($_GET['item'], 'item' );?>             <?$category_breadcrumps = $itemer->category();?>                <ul class="breadcrumbs">                    <li class="crumb_item"><a class="crumb_link crumb_home" href="/"></a></li>                    <li class="crumb_item"><a class="crumb_link" href="/<?=$page_info['url'];?>">Каталог</a></li>                    <?if(isset($category_breadcrumps)>0):?>                        <li class="crumb_item"><a class="crumb_link" href="<?=$category_breadcrumps->category_link ();?>"><?=$category_breadcrumps->title;?></a></li>                    <?endif;?>                    <li class="crumb_item"><a class="crumb_link crumb_current" href="#"><?= $itemer->title; ?></a></li>                </ul>            <?endif;?>            </div><?if(empty($_GET['item'])):?>		<div class="prod_controls clearfix">			<div class="display_mode">				<label for="view_1" class="display_item mod_1"></label>				<label for="view_2" class="display_item mod_2"></label>				<label for="view_3" class="display_item cur_display mod_3"></label>			</div>			<div class="display_settings">				<div class="display_drop_down">Категории</div>				<div class="display_drop_down">Фильтр</div>			</div>		</div>		<div class="display_drop_list">        <?if(!empty($_GET['cat'])):?>            <?$category_map=$this->catalog_mapper->get_category_list2 ($_GET['cat']);?>        <?else:?>              <?if(!empty($_GET['met'])):?>                <?if($_GET['met'] == 3):?>                    <?$category_map = $this->catalog_mapper->get_met(4, 29, 2, 122, 21);?>                <?elseif($_GET['met'] == 4):?>                    <?$category_map = $this->catalog_mapper->get_met(2, 30, 31);?>                <?else:?>                    <?$category_map=$this->catalog_mapper->get_category_list (15);?>                <?endif;?>            <?else:?>            <?$category_map=$this->catalog_mapper->get_category_list (15);?>            <?endif;?>        <?endif;?>        <?$numb=0;?>        <?if(isset($category_map[0]->id)>0):?>            <?foreach($category_map as $key => $cg_map):?>                <?$numb++;?>            <?endforeach;?>            <?$num_col=(($numb-$numb%2)/2)+$numb%2;?>            <?if(isset($category_map[0])>0):?>                <div class="drop_category">                <?$sch=0;?>                <?foreach($category_map as $key => $cg_map):?>                    <?if($sch>$num_col):?>                    <?$sch=0;?>                        </div>                        <div class="drop_category">                    <?endif;?>                    <?if(!empty($_GET['cat'])):?>                    <a class="category_link <?=$_GET['cat'] == $cg_map->id ? 'current_category' : ''?>" href="<?=$cg_map->category_link ();?>"><?=$cg_map->title;?></a>                    <?else:?>                    <a class="category_link" href="<?=$cg_map->category_link ();?>"><?=$cg_map->title;?></a>                    <?endif;?>                    <?$sch++;?>                <?endforeach;?>                </div>            <?endif;?>        <?endif;?>		</div>        <?$brands=$this->diff_func_mapper->brands();?>        <?$colours=$this->diff_func_mapper->colours();?>        <?$materials=$this->diff_func_mapper->materials();?>        <?$sizes=$this->diff_func_mapper->sizes();?>    <form id="filtr" method="get">        <?if(!empty($_GET['cat'])):?>        <input type="hidden" name="cat" value="<?=$_GET['cat'];?>"/>    <?endif;?>    <?if(!empty($_GET['met'])):?>        <input type="hidden" name="met" value="<?=$_GET['met'];?>"/>    <?endif;?>    <input type="hidden" name="type" value="filtr"/>		<div class="display_drop_list mod_filters">        <?if(!empty($colours[0]['name'])):?>			<label class="select_wrapper">				<select name="colour" class="select_filter">					<option value="0" class="">Цвет</option>                    <?foreach($colours as $key=>$col):?>                        <option value="<?=$col['id'];?>" class=""><?=$col['name'];?></option>                    <?endforeach;?>				</select>			</label>        <?endif;?>        <?if(!empty($brands[0]['name'])):?>			<label class="select_wrapper">				<select name="brands" class="select_filter">					<option value="0" class="">Бренд</option>                    <?foreach($brands as $key=>$br):?>                        <option value="<?=$br['id'];?>" class=""><?=$br['name'];?></option>                    <?endforeach;?>				</select>			</label>        <?endif;?>        <?if(!empty($sizes[0]['name'])):?>			<label class="select_wrapper">				<select name="size" class="select_filter">					<option value="0" class="">Размер</option>                    <?foreach($sizes as $key=>$size):?>                        <option value="<?=$size['id'];?>" class=""><?=$size['name'];?></option>                    <?endforeach;?>				</select>			</label>        <?endif;?>        <?if(!empty($materials[0]['name'])):?>			<label class="select_wrapper">				<select name="material" class="select_filter">					<option value="0" class="">Материал</option>                    <?foreach($materials as $key=>$mat):?>                        <option value="<?=$mat['id'];?>" class=""><?=$mat['name'];?></option>                    <?endforeach;?>				</select>			</label>        <?endif;?>			<label class="select_wrapper full_w">				Сортировать при этом по:				<select name="price" class="select_filter">                    <option value="0" class="">По наличию на складе</option>					<option value="1" class="">По возрастанию цены</option>					<option value="2" class="">По убыванию цены</option>				</select>			</label>            <?if(!empty($_GET['cat'])):?>                <a class="filter_btn" id="start" href="#">Применить</a>                <a class="filter_btn" id="auth" href="/<?=$page_info['url'];?>?cat=<?=$_GET['cat'];?>">Сбросить</a>            <?else:?>                <a class="filter_btn" id="start" href="#">Применить</a>                <a class="filter_btn" id="auth" href="/<?=$page_info['url'];?>">Сбросить</a>            <?endif;?>		</div>    </form><?endif;?></nav><script>  $(document).ready(function() {    $('#start').click(function() {      $('#filtr').submit();      return false;    });  });</script>