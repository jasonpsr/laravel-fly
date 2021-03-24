<div class="fly-header layui-bg-black">
    <div class="layui-container">
        <a class="fly-logo" href="/">
            <img src="/res/images/logo.png" alt="layui">
        </a>
        <ul class="layui-nav fly-nav layui-hide-xs">
            <li class="layui-nav-item layui-this">
                <a href="/"><i class="iconfont icon-jiaoliu"></i>交流</a>
            </li>
            <li class="layui-nav-item">
                <a href="case/case.html"><i class="iconfont icon-iconmingxinganli"></i>案例</a>
            </li>
            <li class="layui-nav-item">
                <a href="http://www.layui.com/" target="_blank"><i class="iconfont icon-ui"></i>框架</a>
            </li>
        </ul>

        <ul class="layui-nav fly-nav-user">
        @guest
            <!-- 未登入的状态 -->
            <li class="layui-nav-item">
                <a class="iconfont icon-touxiang layui-hide-xs" href="user/login.html"></a>
            </li>
            <li class="layui-nav-item">
                <a href="{{ route('login') }}">登入</a>
            </li>
            <li class="layui-nav-item">
                <a href="{{ route('register') }}">注册</a>
            </li>
            <li class="layui-nav-item layui-hide-xs">
                <a href="/app/qq/" onclick="layer.msg('正在通过QQ登入', {icon:16, shade: 0.1, time:0})" title="QQ登入" class="iconfont icon-qq"></a>
            </li>
            <li class="layui-nav-item layui-hide-xs">
                <a href="/app/weibo/" onclick="layer.msg('正在通过微博登入', {icon:16, shade: 0.1, time:0})" title="微博登入" class="iconfont icon-weibo"></a>
            </li>
        @else
            <!-- 登入后的状态 -->
            <li class="layui-nav-item">
                <a class="fly-nav-avatar" href="javascript:;">
                    <cite class="layui-hide-xs">贤心</cite>
                    <i class="iconfont icon-renzheng layui-hide-xs" title="认证信息：layui 作者"></i>
                    <i class="layui-badge fly-badge-vip layui-hide-xs">VIP3</i>
                    <img src="https://tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg">
                </a>
                <dl class="layui-nav-child">
                    <dd><a href="{{ route('users.show', Auth::id()) }}"><i class="layui-icon" style="margin-left: 2px; font-size: 22px;">&#xe68e;</i>个人中心</a></dd>
                    <dd><a href="{{ route('users.edit', Auth::id()) }}"><i class="layui-icon">&#xe620;</i>编辑资料</a></dd>
                    <dd><a href="user/message.html"><i class="iconfont icon-tongzhi" style="top: 4px;"></i>我的消息</a></dd>
                    <hr style="margin: 5px 0;">
                    <dd><a href="{{ route('logout') }}" style="text-align: center;">退出</a></dd>
                </dl>
            </li>
        @endguest
        </ul>

        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav mr-auto">
            <li class="nav-item {{ active_class(if_route('topics.index')) }}"><a class="nav-link" href="{{ route('topics.index') }}">话题</a></li>
            <li class="nav-item {{ active_class((if_route('categories.show') && if_route_param('category', 1))) }}"><a class="nav-link" href="{{ route('categories.show', 1) }}">分享</a></li>
            <li class="nav-item {{ active_class((if_route('categories.show') && if_route_param('category', 2))) }}"><a class="nav-link" href="{{ route('categories.show', 2) }}">教程</a></li>
            <li class="nav-item {{ active_class((if_route('categories.show') && if_route_param('category', 3))) }}"><a class="nav-link" href="{{ route('categories.show', 3) }}">问答</a></li>
            <li class="nav-item {{ active_class((if_route('categories.show') && if_route_param('category', 4))) }}"><a class="nav-link" href="{{ route('categories.show', 4) }}">公告</a></li>
        </ul>
    </div>
</div>
