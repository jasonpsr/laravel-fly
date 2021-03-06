@extends('layouts.app')
@section('title', $user->name . ' 的个人中心')

@section('content')
    <div class="layui-container fly-marginTop fly-user-main">
        <ul class="layui-nav layui-nav-tree layui-inline" lay-filter="user">
            <li class="layui-nav-item">
                <a href="home.html">
                    <i class="layui-icon">&#xe609;</i>
                    我的主页
                </a>
            </li>
            <li class="layui-nav-item">
                <a href="index.html">
                    <i class="layui-icon">&#xe612;</i>
                    用户中心
                </a>
            </li>
            <li class="layui-nav-item layui-this">
                <a href="set.html">
                    <i class="layui-icon">&#xe620;</i>
                    基本设置
                </a>
            </li>
            <li class="layui-nav-item">
                <a href="message.html">
                    <i class="layui-icon">&#xe611;</i>
                    我的消息
                </a>
            </li>
        </ul>

        <div class="site-tree-mobile layui-hide">
            <i class="layui-icon">&#xe602;</i>
        </div>
        <div class="site-mobile-shade"></div>

        <div class="site-tree-mobile layui-hide">
            <i class="layui-icon">&#xe602;</i>
        </div>
        <div class="site-mobile-shade"></div>


        <div class="fly-panel fly-panel-user" pad20>
            <div class="layui-tab layui-tab-brief" lay-filter="user">
                <ul class="layui-tab-title" id="LAY_mine">
                    <li class="layui-this" lay-id="info">我的资料</li>
                    <li lay-id="avatar">头像</li>
                    <li lay-id="pass">密码</li>
                    <li lay-id="bind">帐号绑定</li>
                </ul>
                <div class="layui-tab-content" style="padding: 20px 0;">
                    <div class="layui-form layui-form-pane layui-tab-item layui-show">
                        <form action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            @include('shared._error')

                            <div class="layui-form-item">
                                <label for="L_username" class="layui-form-label">用户名</label>
                                <div class="layui-input-inline">
                                    <input type="text" id="L_username" name="name" required lay-verify="required" autocomplete="off" value="{{ old('name', $user->name) }}" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label for="L_email" class="layui-form-label">邮箱</label>
                                <div class="layui-input-inline">
                                    <input type="text" id="L_email" name="email" required lay-verify="email" autocomplete="off" value="{{ old('email', $user->email) }}" class="layui-input">
                                </div>
                                <div class="layui-form-mid layui-word-aux">如果您在邮箱已激活的情况下，变更了邮箱，需<a href="activate.html" style="font-size: 12px; color: #4f99cf;">重新验证邮箱</a>。</div>
                            </div>
                            <div class="layui-form-item layui-form-text">
                                <label for="L_sign" class="layui-form-label">个人简介</label>
                                <div class="layui-input-block">
                                    <textarea placeholder="随便写些什么刷下存在感" id="L_sign"  name="introduction" autocomplete="off" class="layui-textarea" style="height: 80px;">{{ old('introduction', $user->introduction) }}</textarea>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label for="L_username" class="layui-form-label">用户头像</label>
                                <div class="layui-input-inline">
                                    <input type="file" name="avatar" class="form-control-file">
                                    @if($user->avatar)
                                        <br>
                                        <img class="thumbnail img-responsive" src="{{ $user->avatar }}" width="200" />
                                    @endif
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <button class="layui-btn" key="set-mine" lay-filter="*" lay-submit>确认修改</button>
                            </div>
                    </div>

                    <div class="layui-form layui-form-pane layui-tab-item">
                        <div class="layui-form-item">
                            <div class="avatar-add">
                                <p>建议尺寸168*168，支持jpg、png、gif，最大不能超过50KB</p>
                                <button type="button" class="layui-btn upload-img">
                                    <i class="layui-icon">&#xe67c;</i>上传头像
                                </button>
                                <img src="https://tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg">
                                <span class="loading"></span>
                            </div>
                        </div>
                    </div>

                    <div class="layui-form layui-form-pane layui-tab-item">
                        <form action="/user/repass" method="post">
                            <div class="layui-form-item">
                                <label for="L_nowpass" class="layui-form-label">当前密码</label>
                                <div class="layui-input-inline">
                                    <input type="password" id="L_nowpass" name="nowpass" required lay-verify="required" autocomplete="off" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label for="L_pass" class="layui-form-label">新密码</label>
                                <div class="layui-input-inline">
                                    <input type="password" id="L_pass" name="pass" required lay-verify="required" autocomplete="off" class="layui-input">
                                </div>
                                <div class="layui-form-mid layui-word-aux">6到16个字符</div>
                            </div>
                            <div class="layui-form-item">
                                <label for="L_repass" class="layui-form-label">确认密码</label>
                                <div class="layui-input-inline">
                                    <input type="password" id="L_repass" name="repass" required lay-verify="required" autocomplete="off" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <button class="layui-btn" key="set-mine" lay-filter="*" lay-submit>确认修改</button>
                            </div>
                        </form>
                    </div>

                    <div class="layui-form layui-form-pane layui-tab-item">
                        <ul class="app-bind">
                            <li class="fly-msg app-havebind">
                                <i class="iconfont icon-qq"></i>
                                <span>已成功绑定，您可以使用QQ帐号直接登录Fly社区，当然，您也可以</span>
                                <a href="javascript:;" class="acc-unbind" type="qq_id">解除绑定</a>

                                <!-- <a href="" onclick="layer.msg('正在绑定微博QQ', {icon:16, shade: 0.1, time:0})" class="acc-bind" type="qq_id">立即绑定</a>
                                <span>，即可使用QQ帐号登录Fly社区</span> -->
                            </li>
                            <li class="fly-msg">
                                <i class="iconfont icon-weibo"></i>
                                <!-- <span>已成功绑定，您可以使用微博直接登录Fly社区，当然，您也可以</span>
                                <a href="javascript:;" class="acc-unbind" type="weibo_id">解除绑定</a> -->

                                <a href="" class="acc-weibo" type="weibo_id"  onclick="layer.msg('正在绑定微博', {icon:16, shade: 0.1, time:0})" >立即绑定</a>
                                <span>，即可使用微博帐号登录Fly社区</span>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
