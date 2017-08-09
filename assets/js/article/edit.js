var $;
layui.config({
}).use(['form','layer','jquery','laydate','layedit','upload'],function(){
    var form = layui.form(),
        layer = parent.layer === undefined ? layui.layer : parent.layer,
        $ = layui.jquery,
        laydate = layui.laydate,
        layedit = layui.layedit;

    var editor =layedit.build('content',{
        uploadImage:{
            url : window.uploadUrl + "?name=file&temp=layui&module=AdminBase"
        }
    });

    layui.upload({
        url : window.uploadUrl+'?name=file',
        success: function(res){
            if(res.code == 0){
                $('#file').attr('src',window.baseUrl+res.data);
                $('[name=pic]').val(res.data);
            }else{
                layer.alert(data.msg, {icon: 2});
            }
        }
    });

    form.on("submit(submit)",function(data){
        data.field.content = layedit.getContent(editor);
        var index = top.layer.msg('数据提交中，请稍候',{icon: 16,time:false,shade:0.8});
        var url = $(this).data('url');
        $.ajax({
            url:url,
            type:'post',
            dataType:'json',
            data:data.field,
            success:function (data) {
                top.layer.close(index);
                if(data.code == 0){
                    top.layer.msg("操作成功！");
                    layer.closeAll("iframe");
                }else{
                    layer.alert(data.msg, {icon: 2});
                }
            }
        });
        return false;
    });

    form.on('select(category)', function(data){
        if($('.category-tags [value='+data.value+']').length == 0){
            var template = $($('#tag_template').html());
            template.find('span').html($(data.elem).find('[value='+data.value+']').data('name'));
            template.find('input').val(data.value);
            template.find('input').attr('name','categories['+data.value+']');
            $('.category-tags').append(template);
        }
    });

    $('body').on('click','.remove_category_tag',function () {
        $(this).parents('.category-tag').remove()
    });
});