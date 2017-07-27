@extends('layout.layout')
@section('title', '添加字典')
@section('cssImport')
    <style type="text/css">
        .layui-form-item .layui-inline{ width:33.333%; float:left; margin-right:0; }
        @media(max-width:1240px){
            .layui-form-item .layui-inline{ width:100%; float:none; }
        }
        .kvinput{
            display: inline-block;
            width: 40%
        }
    </style>
@endsection

@section('content')
    <form class="layui-form" style="width: 80%;">
        <div class="layui-form-item">
            <label class="layui-form-label">归属</label>
            <div class="layui-input-block">

                <select class="layui-input" name="category_id">
                    @foreach($category as $item)
                        <option value="{{$item['id']}}" >{{$item['name']}}</option>
                    @endforeach
                </select>

            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">页面标识</label>
            <div class="layui-input-block">
                <input type="text" value="" name="tag" class="layui-input" placeholder="请输入字典标识，选填">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">页面名称</label>
            <div class="layui-input-block">
                <input type="text" name="name" value="" class="layui-input" lay-verify="required" placeholder="请输入分类名">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">SEO关键字</label>
            <div class="layui-input-block">
                <input type="text" name="keyword" value="" placeholder="请输入SEO关键字" autocomplete="false" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">SEO描述</label>
            <div class="layui-input-block">
                <textarea  name="description" class="layui-textarea"></textarea>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">页面内容</label>
            <div class="layui-input-block">
                <textarea id="content" name="content" style="display: none;"></textarea>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">模板文件</label>
            <div class="layui-input-block">
                <select class="layui-input" name="template">
                    @foreach($templates as $template)
                        <option value="{{$template}}" >{{$template}}</option>
                    @endforeach
                </select>

            </div>
        </div>

        <div class="layui-form-item" id="kvs">
            <label class="layui-form-label">扩展数据</label>
            @php
                $rand = mt_rand();
            @endphp
            <div class="layui-input-block">
                <input type="text" name="additional[{{$rand}}][k]" value="" class="layui-input kvinput" placeholder="请输入键">
                <input type="text" name="additional[{{$rand}}][v]" value="" class="layui-input kvinput" placeholder="请输入值">
                <div style="display: inline-block;" >
                    <button style="margin-left: 10px;" class="layui-btn addkv">+</button>
                    <button class="layui-btn delkv">-</button>
                </div>
            </div>


        </div>

        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn" lay-submit="" lay-filter="submit" data-url="{{route('pager@postAdd')}}">立即提交</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>
    </form>

    <script type="text/html" id="kv-temp">
        <div class="layui-input-block">
            <input type="text" name="k" value="" class="layui-input kvinput" placeholder="请输入键">
            <input type="text" name="v" value="" class="layui-input kvinput" placeholder="请输入值">
            <div style="display: inline-block;">
                <button style="margin-left: 10px;" class="layui-btn addkv">+</button>
                <button class="layui-btn delkv">-</button>
            </div>
        </div>
    </script>

@endsection

@section('jsImport')
    @jsimport(pager/edit)
@endsection