<? if ( isset($search_result) && $search_result['count'] ) : ?>
 <ol class="searchresults">
    <? foreach ( $search_result['text'] as $key => $result ) : ?>
        <li>
            <a href="<?= $result['link']; ?>">
                <?= $result['object']->title; ?>
            </a>
        </li>
    <? endforeach; ?>
    <? foreach ( $search_result['news'] as $key => $result ) : ?>
        <li>
            <a href="<?= $result['link']; ?>">
                <?= $result['object']->title; ?>
            </a>
        </li>
    <? endforeach; ?>
    <? foreach ( $search_result['catalog'] as $key => $result ) : ?>
        <li>
            <a href="<?= $result['object']->url(); ?>">
                <?= $result['object']->title; ?>
            </a>
        </li>
    <? endforeach; ?>
 </ol>
<? else: ?>
    <div class="notfound">
        По вашему запросу ничего не найдено.
    </div>
<? endif;?>