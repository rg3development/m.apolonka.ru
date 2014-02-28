
        <section class="main_row">
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

            </div>
        </section>