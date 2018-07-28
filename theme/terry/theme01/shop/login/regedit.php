<style>
    .forget1{
        width: 128px;
        height: 100%;
        float: right;
        line-height: 32px;
    }
    .forget1 div{
        width: 12px;
        height: 12px;
        border:4px solid #37e06f;
        box-sizing: border-box;
        float: left;
        border-radius: 50%;
        margin-top:10px;
    }
    .forget1 span{
        float:left;
        margin-left:6px;
        font-size: 12px;
        color: #b4c2cc;
    }
    .forget1 a{
        float:left;
        margin-left:10px;
        font-size: 12px;
        color: #b4c2cc;
    }
    .submit{
        display: block;
        width: 208px;
        height: 33px;
        border:0;
        background: #36de76;
        text-align: center;
        line-height: 33px;
        color:#fff;
        margin:0 auto;
        border-radius:16px;
        outline: none;
    }
    .submit a{
        color:#fff;
    }
    input:-webkit-autofill{
        -webkit-box-shadow: 0 0 0px 1000px  #f3faff inset !important;
    }
    .login-2 ul li input{
        width: 230px;
        margin-left:30px;
        font-size: 14px;
        color:#9eabb5;
    }
    #loginin{
        width: 100%;
        height: 100%;
        position: relative;
        background: url("/public/background.png") no-repeat top center/100% 100%;
        overflow: hidden;
    }
    .login-box{
        width: 441px;
        height: 332px;
        background: #fff;
        border-radius: 4px;
        position: fixed;
        left:0px;
        top:0px;
        right:0px;
        bottom:0px;
        margin:auto;
        overflow: hidden;
    }
    .login-logo{
        width: 100%;
        height: 82px;
        text-align: center;
        margin-top:17px;
    }
    .login-logo img{
        display: block;
        margin:0 auto;
    }
    .login-logo span{
        font-size: 14px;
        color: #4c545a;
    }
    .login-l{
        width: 100%;
        height: 80px;
        margin-top:20px;
    }
    .login-l ul{
        width: 100%;
        height: 100%;
    }
    .login-l ul li{
        width: 286px;
        height: 32px;
        border:2px solid #ebf6ff;
        box-sizing: border-box;
        border-radius: 16px;
        margin: 3px auto;
        background: #f3faff;
        position: relative;
        line-height: 32px;
    }
   
    .login-l ul li img{
        display: block;
        width: 18px;
        height: 18px;
        position:absolute;
        left:10px;
        top:0;
        bottom:0;
        margin:auto 0;
    }
    .login-l ul li span{
        display: block;
        float: left;
        margin-left:40px;
        font-size: 14px;
        color: #516676;
    }
    .login-l ul li input{
        height: 100%;
        border:0;
        float: left;
        width: 180px;
        outline: none;
        padding-left:6px;
        background: #f3faff;
    }
    #loginin{
        width: 100%;
        height: 100vh;
    }
    *{
        margin: 0;
        padding: 0;
        list-style: none;
    }
    a{
        text-decoration: none;
    }
</style>
<div id="loginin">
    <form action="<?= Yii::$service->url->getUrl('shop/login/reg') ?>" method="post">
        <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken ?>" />
        <div class="login-box">
            <div class="login-logo">
                <img src="/public/login.png" alt="">
                <span>晋彤商家管理系统</span>
            </div>
            <div class="login-l">
                <ul>
                    <li>
                        <img src="/public/account.png" alt="">
                        <span>账&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;户</span>
                        <input type="text" name="firstname">
                    </li>

                    <li>
                        <img src="/public/pwd.png" alt="">
                        <span>密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码</span>
                        <input type="password" name="password_hash">
                    </li>
                    <li>
                        <img src="/public/pwd.png" alt="">
                        <span>确认密码</span>
                        <input type="password" name="repassword" id="">
                    </li>
                </ul>

                <div style="width: 100%;height: 34px;cursor: pointer;margin-top:38px;">
                    <button style="cursor: pointer" class="submit">注册</button>
                </div>

            </div>
        </div>
    </form>
</div>