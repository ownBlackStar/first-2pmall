/**
 * base javascript
 * @authors CK-Joey (zhangjie.tk)
 * @date    2016-08-19 01:07:00
 * @version 1.0
 */
'use strict';
(function($, undefined){
    // sku选择
    var tmpArr = [];
    $('body').on('click', '[name=sku_box] span', function(){
        var id = $(this).data('id');
        var attrUrl = $(this).parents('#goods_main_box').data('atr-url');
        var sureUrl = $(this).parents('#goods_main_box').data('url');
        var type = $(this).parent().data('type');
        var sureSkuStatus = false;

        $(this).addClass('cur').siblings('span').removeClass('cur');

        if($.inArray( type, tmpArr) == -1){
            tmpArr.push(type);
        }
        if(tmpArr.length >= 2){
            sureSkuStatus = true;
        }

        if(sureSkuStatus && tmpArr.length > 1){
            var data = {
                goods_id: goodsData.goods_id,
                color_attr_val_id: $('[data-type=color] span.cur').data('id'),
                size_attr_val_id: $('[data-type=size] span.cur').data('id')
            };
            $.ajax({
                url: sureUrl,
                type: 'POST',
                dataType: 'json',
                data: data
            })
            .done(function(re) {
                if(re.err_code){
                    attrSelectFun(type, id);
                }else{
                    console.log("success", re);
                    // 商品价格
                    $('[name=shop_price]').html('&yen;' + parseFloat(re.shop_price).toFixed(2));

                    // 商品市场价格
                    $('[name=market_price]').html('&yen;' + parseFloat(re.market_price).toFixed(2));

                    // 商品库存
                    $('[name=stock]').html('库存：'+ re.sku_number +'件');
                }
            })
            .fail(function(re) {
                console.log("error", re);
            });
        }else{
            attrSelectFun(type, id);
        }

        // 获取属性方法
        function attrSelectFun(type, id) {
            var data = {
                goods_id: goodsData.goods_id,
                attr_type: type,
                attr_id: id,
            };
            $.ajax({
                url: attrUrl,
                type: 'POST',
                dataType: 'json',
                data: data
            })
            .done(function(re) {
                if('err_code' in re){
                    alert(re.msg);
                }else{
                    var h = '';

                    $.each(re, function() {
                        h += '<span data-id="'+ this.id +'" data-attr-id="'+ this.attr_id +'">'+ this.value_name +'</span>';
                    });

                    if(type == 'size'){
                        $('[data-type=color]').html('颜色：' + h);
                        // tmpArr.splice($.inArray('color', tmpArr), 1);
                    }

                    if(type == 'color'){
                        $('[data-type=size]').html('规格：' + h);
                        // tmpArr.splice($.inArray('size', tmpArr), 1);
                    }

                }
            })
            .fail(function(re) {
                console.log("error", re);
            });
        }
    });
})(jQuery);
//# sourceMappingURL=detail.js.map
