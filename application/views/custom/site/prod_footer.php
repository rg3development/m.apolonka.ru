
<?if(!empty($_GET['item'])):?>
 	<footer class="footer">
		<div class="section_inner">
			<div class="full_ver">Перейти на основной сайт <a href="http://apolonka.ru/">apolonka.ru</a></div>
			<div class="copyright">
				© 2011 ООО «Аполонка» <br>
				При перепечатке информации с данного сайта,
				гиперссылка обязательна.
            <?if ( isset($widgets['main_slider2']['items'])>0):?>
                <?foreach($widgets['main_slider2']['items'] as $key2=>$value2):?>
                    <?=$value2['item']->title;?> <?=$value2['item']->description;?><br>
                <?endforeach;?>
            <?endif;?>
			</div>
		</div>
	</footer>
	<div class="overlay">
		<div class="popup_form">
			<a id="close_popup" class="cart_remove" href="#"></a>
			<div class="popup_title"><?= $item->title; ?></div>
			<div class="popup_msg">успешно добавлена <br>
				в ваш заказ.
			</div>
			<div class="popup_info">Для оформления покупки в кредит сумма
				заказа должна составлять не менее
				10 000 руб.
			</div>
			<div class="popup_info">Оформление кредита возможно из корзины.
			</div>
            
			<a class="popup_link3 popup_link" href="/<?=$page_info['url'];?>">Продолжить выбирать товары
				в нашем каталоге »</a> <br>
			<a class="popup_link2 popup_link" href="/cart">Оформить заказ и доставку »</a>
		</div>
	</div>


    <script>
	$(document).ready(function ($) {
    
    $('#add_to_cart').click(function() {
                $.ajax({
                    type: 'GET',
                    url: 'http://apolonka.rg3.su/catalog?type=add&item_id=<?= $item->id; ?>&qty=1',
                    dataType: "html",
                    success: function(b) {
                        $(".share_btn2").click();                        
                        $(".cart_counter").html('  '); 
                        <?$cur_item2=0;?>
                        <? foreach ( $this->cart->contents() as $index => $item ): ?>
                            <? $cur_item2 = $item['qty']+$cur_item2;?>
                        <?endforeach;?>
                        <?if($cur_item2 >0 ):?>  
                            var tovar = <?= $cur_item2 ; ?>+1;
                        <?else:?>
                            var tovar = 1;
                        <?endif;?>
                        $(".cart_counter").html(''+tovar+'');
                        
                        
                    }
                });
    });

		function hidePopup () {
			$('.popup_form').animate({'top': -1000}, 500);
			$('.overlay').fadeOut(500);
		}
		$('#close_popup').on ('click', function () {
			hidePopup();
			return false;
		});
		$('.popup_link2').on ('click', function () {
			window.location.href = "/cart";
		});
		$('.popup_link3').on ('click', function () {
			window.location.href = "/<?=$page_info['url'];?>";
		});
        $('.overlay').on ('click', function () {
			hidePopup();
			return false;
		});
		$('.share_btn2').on ('click', function () {
			$('.overlay').fadeIn(500);
			$('.popup_form').animate({'top':$(document).scrollTop()+100},500);
			return false;
		});
		function hideDropDowns() {
			setTimeout(function () {
				$('.display_drop_down').removeClass('opened');
			}, 500);
			$('.display_drop_list').slideUp(500);
		}
		$(document).click(function (e) {
			if ($(e.target).parents().filter('.display_drop_list').length != 1) {
				hideDropDowns();
			}
		});
		$('.tab_control').on('click', function () {
			var firedEl = $(this);
			firedEl.addClass('current_tab').siblings().removeClass('current_tab');
			firedEl.parent().next().find('.tab_item').hide().eq(firedEl.index()).show();
			return false;
		});
		$('.display_drop_down').on('click', function () {
			var firedEl = $(this);
			if (firedEl.hasClass('opened')) {
				hideDropDowns();
			} else {
				firedEl.addClass('opened').siblings().removeClass('opened');
				$('.display_drop_list').hide().eq(firedEl.index()).slideDown(500);
			}
			return false;
		});
		$('.display_item').on('click', function () {
			var firedEl = $(this);

			firedEl.addClass('cur_display').siblings().removeClass('cur_display');
		});
		$('#prod_images').bxSlider({
			slideSelector: ('.prod_slide'),
			minSlides: 1,
			maxSlides: 1,
			moveSlides: 1,
			nextSelector: $('.prod_slide_next'),
			prevSelector: $('.prod_slide_prev'),
			prevText: '',
			nextText: '',
			pager: false
		});
	});
</script>
<?else:?>
 	<footer class="footer">
		<div class="section_inner">
			<div class="full_ver">Перейти на основной сайт <a href="http://apolonka.ru/">apolonka.ru</a></div>
			<div class="copyright">
				© 2011 ООО «Аполонка» <br>
				При перепечатке информации с данного сайта,
				гиперссылка обязательна.
            <?if ( isset($widgets['main_slider2']['items'])>0):?>
                <?foreach($widgets['main_slider2']['items'] as $key2=>$value2):?>
                    <?=$value2['item']->title;?> <?=$value2['item']->description;?><br>
                <?endforeach;?>
            <?endif;?>
			</div>
		</div>
	</footer>
<script>
	$(document).ready(function ($) {
		function hideDropDowns() {
			setTimeout(function () {
				$('.display_drop_down').removeClass('opened');
			}, 500);
			$('.display_drop_list').slideUp(500);
		}
		$(document).click(function (e) {
			if ($(e.target).parents().filter('.display_drop_list').length != 1) {
				hideDropDowns();
			}
		});
		$('.tab_control').on('click',function () {
			var firedEl = $(this);
			firedEl.addClass('current_tab').siblings().removeClass('current_tab');
			firedEl.parent().next().find('.tab_item').hide().eq(firedEl.index()).show();
			return false;
		});
		$('.display_drop_down').on ('click', function () {
			var firedEl = $(this);
			if (firedEl.hasClass('opened')) {
				hideDropDowns();
			} else {
				firedEl.addClass('opened').siblings().removeClass('opened');
				$('.display_drop_list').hide().eq(firedEl.index()).slideDown(500);
			}
			return false;
		});
		$('.display_item').on('click', function () {
			var firedEl = $(this);
			firedEl.addClass('cur_display').siblings().removeClass('cur_display');
		});
		$('#slider').bxSlider({
			slideSelector: ('.slide'),
			minSlides: 1,
			maxSlides: 1,
			moveSlides: 1,
			nextSelector: $('.slide_next'),
			prevSelector: $('.slide_prev'),
			prevText: '',
			nextText: '',
			pager: false
		});
	});
</script>
<?endif;?>
</div>
</body>
</html>