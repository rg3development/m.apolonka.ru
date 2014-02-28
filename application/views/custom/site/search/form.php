<form action="<?= $search['url']; ?>" method="POST">
    <label class="search_wrapper">
        <input type="text" name="<?= $search['param']; ?>" placeholder="Более 1000 товаров" value="<?= $search['value']; ?>" />
        <button class="search_btn"></button>        
    </label>
</form>