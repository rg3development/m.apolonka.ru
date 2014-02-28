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
</div>
<script>
	$(document).ready(function ($) {


		$('.tab_control').on('click',function () {
			var firedEl = $(this);
			firedEl.addClass('current_tab').siblings().removeClass('current_tab');
			firedEl.parent().next().find('.tab_item').hide().eq(firedEl.index()).show();
			return false;
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
        $("#brand_select").click(function() {
        var select =$("select#brand_select").val();
        $(".frey").hide();
        $("#"+select+"").show();
    });

    if($.cookie("delivery")){
        $("#deliveries :contains('"+$.cookie("delivery")+"')").attr("selected", "selected");

        $("#share_price").html($("#deliveries option:selected").attr("name")+'<span>руб.</span>');
        var price =parseNum($("#deliveries option:selected").attr("name")) + <?if(!empty($total_price)):?><?= $total_price; ?><?else:?>0<?endif;?>;
        $("span.price").html(' ');
        $("span.price").html(price);
    }
    $('#sendmail').click(function (){
      $('#checkout').submit();
    });

  
    $(".select_filter").click(function() {
        $("#share_price").html($("#deliveries option:selected").attr("name")+'<span>руб.</span>');
        var price =parseNum($("#deliveries option:selected").attr("name")) + <?if(!empty($total_price)):?><?= $total_price; ?><?else:?>0<?endif;?>;
        $("span.price").html(' ');
        $("span.price").html(price);
        var delivery = $("#deliveries option:selected").text();
        $.cookie("delivery", delivery);
    });
            function parseNum(str){ 
    return parseInt(String(str).match(/-?\d+(?:.\d+)?/, '') || 0, 10); 
    }
	});
</script>
</body>
</html>
<?=$counters;?>