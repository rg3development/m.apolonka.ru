
        <section class="main_row">
        <?if($page_info['parent_id']==0):?>
            <?$pages1=$this->diff_func_mapper->get_pages($page_info['id']);?>
        <?else:?>
            <?$pages1=$this->diff_func_mapper->get_pages($page_info['parent_id']);?>
        <?endif;?>
            <div class="section_inner">
                <h4 class="page_title"><?if($page_info['show_title']>0):?><?= $page_info['title']; ?><?endif;?></h4> 
                <?if(isset($map[0]['url'] )>0):?>                
                    <ul class="breadcrumbs">                 
                        <?if($map[0]['url'] != '/'):?>
                            <li class="crumb_item"><a class="crumb_link crumb_home" href="/"></a></li>
                        <?endif;?>
                        <?foreach($map as $key=>$maps):?>
                            <?if($map[0]['hkey'] == $key):?>
                                <?break;?>
                            <?endif;?>
                            <?if($map[0]['url'] == '/'):?>
                                <a class="crumb_link crumb_home" href="/"></a>
                            <?else:?>
                                <li class="crumb_item"><a class="crumb_link" href="/<?=$maps['url'];?>"><?=$maps['title'];?></a></li>
                            <?endif;?>  
                        <?endforeach;?>                    
                        <li class="crumb_item"><a class="crumb_link crumb_current" href="#"><?=$map[$key]['title'];?></a></li>
                    </ul>
                <?endif;?> 
                <?if(!empty($pages1[0]['url'])):?>
                    <div class="usefull_links">
                        <?foreach( $pages1 as $keys => $value60) :?>
                            <a class="usefull_link" href="/<?=$value60['url'];?>">
                                <?if((!empty($value60['alias'])>0) && ($value60['show_alias']>0)):?>
                                    <?=$value60['alias'];?>
                                <?else:?>
                                    <?=$value60['title'];?>
                                <?endif;?>
                            </a>
                        <?endforeach;?>
                    </div> 
                <?endif;?>
                
                <?= $content; ?>
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
            </div>
        </section>