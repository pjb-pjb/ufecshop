<div class="main-content">
    <div style="width: 1012px; margin: 0px auto;">
        <div>
            <div class="content">
                <div class="biaoti">
                    <div aria-label="Breadcrumb" role="navigation" class="el-breadcrumb">
        	<span class="el-breadcrumb__item">
        		<span role="link" class="el-breadcrumb__inner is-link">商品管理</span>
        		<span role="presentation" class="el-breadcrumb__separator">·</span>
        	</span>
                        <span class="el-breadcrumb__item">
            	<span role="link" class="el-breadcrumb__inner">商品列表</span>
            	<span role="presentation" class="el-breadcrumb__separator">·</span>
            </span>
                        <span role="link" class="el-breadcrumb__inner">
            	<span style="color: rgb(48, 211, 102);">查看详情</span>
            </span>
                    </div>
                </div>

                <div class="item">
                    <div class="bottom">
                        <div style="width: 528px; height: 42px; line-height: 42px; font-size: 18px; font-weight: bolder;">
                            <div class="col-box"
                                 style="width: 12px; height: 7px; border-radius: 5px; margin-top: 17px; margin-left: 10px; margin-right: 7px; background-color: rgb(55, 224, 111);">

                            </div>
                            编号：<span style="color: rgb(48, 163, 254);"><?= $goods['_id'] ?></span>
                        </div>
                        <div class="title" style="box-sizing:border-box">
                            <form class="el-form" method="post" enctype="multipart/form-data"
                                  action="<?= Yii::$service->url->getUrl('water/goods/edit') ?>">
                                <div class="el-row" style="width: 500px;">
                                    <div class="el-form-item">
                                        <label class="el-form-item__label">货号:</label>
                                        <div class="el-form-item__content" style="margin-left: 120px;">
                                            <div style="height: 28px;line-height:28px"><?= $goods['spu'] ?></div>
                                        </div>
                                        <input type="hidden" name="_id" value="<?= $goods['_id'] ?>">
                                    </div>
                                    <div class="el-form-item">
                                        <label class="el-form-item__label" style="width: 120px;">商品名称:</label>
                                        <div class="el-form-item__content" style="margin-left: 120px;">
                                            <div class="el-input">
                                                <input type="hidden" name="_csrf"
                                                       value="<?= Yii::$app->request->csrfToken ?>"/>
                                                <input type="text" value="<?= $goods['name']['name_zh'] ?>" name="name"
                                                       placeholder="<?= $goods['name']['name_zh'] ?>"
                                                       class="el-input__inner">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="el-form-item">
                                        <label class="el-form-item__label">分类:</label>
                                        <div class="el-form-item__content" style="margin-left: 120px;">
                                            <div class="el-select">
                                                <div class="el-input el-input--suffix">

                                                    <select name="classone" onchange="getTwoMenu(this)"
                                                            class="el-input__inner"
                                                            style="width:180px;line-height:30px;" id="s1">
                                                        <?php foreach ($category as $key => $value) { ?>

                                                            <?php
                                                            if ($goods['category'][0] == $value["_id"]) {
                                                                $class = $value["zi"];
                                                                ?>
                                                                <option selected
                                                                        value="<?= $value['_id'] ?>"><?= $value['name']['name_zh'] ?></option>
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <option value="<?= $value['_id'] ?>"><?= $value['name']['name_zh'] ?></option>

                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>

                                                    <select name="classtwo" class="el-input__inner"
                                                            style="width:190px;line-height:30px;" id="s2">
                                                        <?php foreach ($class as $key => $value) { ?>
                                                            <?php
                                                            if ($goods['category'][1] == $value["_id"]) {
                                                                ?>
                                                                <option selected
                                                                        value="<?= $value['_id'] ?>"><?= $value['name']['name_zh'] ?></option>
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <option value="<?= $value['_id'] ?>"><?= $value['name']['name_zh'] ?></option>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="el-form-item">
                                        <label class="el-form-item__label">价格:</label>
                                        <div class="el-form-item__content" style="margin-left: 120px;">
                                            <div class="el-input">
                                                <input type="text" name="price" placeholder="<?= $goods['price'] ?>"
                                                       value="<?= $goods['price'] ?>" class="el-input__inner">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="el-form-item">
                                        <label class="el-form-item__label">折扣价:</label>
                                        <div class="el-form-item__content" style="margin-left: 120px;">
                                            <div class="el-input">
                                                <input type="text" name="special_price"
                                                       value="<?= $goods['special_price'] ?>"
                                                       placeholder="<?= $goods['special_price'] ?>"
                                                       class="el-input__inner">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="el-form-item">
                                        <label class="el-form-item__label">商品运费:</label>
                                        <div class="el-form-item__content" style="margin-left: 120px;">
                                            <input type="text" autocomplete="off" placeholder="按固定运费"
                                                   readonly="readonly" class="el-input__inner">
                                        </div>
                                    </div>
                                    <label class="el-form-item__label" style="width: 120px;">上下架:</label>
                                    <div class="el-form-item">
                                        <div class="el-form-item__content" style="margin-left: 120px;">
                                            <div role="switch" aria-checked="true" class="el-switch is-checked"
                                                 style="height: 30px;width:150px;display:flex;justify-content: space-around;position: relative;">
                                                <?php
                                                if ($goods['status'] == 1) {
                                                    echo '<div data-v-63f72479="" role="radio" aria-checked="true" tabindex="0" class="el-radio danxuan xuanze is-checked">
                                    <span class="el-radio__input is-checked x">
                                        <span class="el-radio__inner is-checked"></span>
                                        <input name="status" type="radio" aria-hidden="true" tabindex="-1" class="el-radio__original" value="1" checked></span>
                                            <span class="el-radio__label">上架<!----></span>
                                </div> <div data-v-63f72479="" role="radio" aria-checked="true" tabindex="0" class="el-radio danxuan xuanze is-checked">
                                    <span class="el-radio__input x">
                                        <span class="el-radio__inner"></span>
                                        <input name="status" type="radio" aria-hidden="true" tabindex="-1" class="el-radio__original" value="2"></span>
                                            <span class="el-radio__label">下架<!----></span>
                                </div> ';
                                                } else {
                                                    echo '<div data-v-63f72479="" role="radio" aria-checked="true" tabindex="0" class="el-radio danxuan xuanze is-checked">
                                    <span class="el-radio__input x">
                                        <span class="el-radio__inner "></span>
                                        <input name="status" type="radio" aria-hidden="true" tabindex="-1" class="el-radio__original" value="1"></span>
                                            <span class="el-radio__label">上架<!----></span>
                                </div> <div data-v-63f72479="" role="radio" aria-checked="true" tabindex="0" class="el-radio danxuan xuanze is-checked">
                                    <span class="el-radio__input is-checked x">
                                        <span class="el-radio__inner is-checked"></span>
                                        <input name="status" type="radio" aria-hidden="true" tabindex="-1" class="el-radio__original" value="2" checked></span>
                                            <span class="el-radio__label">下架<!----></span>
                                </div> ';
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                        var radio = document.querySelectorAll("[type=radio]");
                                        var span = document.querySelectorAll(".x");
                                        var lable = document.querySelectorAll("[role=radio]");
                                        var flag = true;

                                        lable.forEach(function (val, index) {

                                            val.onclick = function () {
                                                if (flag) {

                                                    if (index == 0) {
                                                        console.log(1)
                                                        flag = false;
                                                        span[0].classList.add("is-checked");
                                                        span[1].classList.remove("is-checked");
                                                        radio[0].click();
                                                    } else {
                                                        flag = false;
                                                        span[1].classList.add("is-checked");
                                                        span[0].classList.remove("is-checked");
                                                        radio[1].click();
                                                    }
                                                } else {
                                                    flag = true;
                                                }

                                            }
                                        });
                                    </script>
                                    <div class="el-form-item">
                                        <label class="el-form-item__label">商品简介:</label>
                                        <div class="el-form-item__content" style="margin-left: 120px;">
                                            <textarea id="" name="short_description" placeholder=""
                                                      class="details"><?= $goods['short_description']['short_description_zh'] ?></textarea>
                                        </div>
                                    </div>
                                    <div class="el-form-item">
                                        <label class="el-form-item__label" style="width: 120px;">发布时间:</label>
                                        <div class="el-form-item__content" style="margin-left: 120px;">
                                            <input type="text" name="" class="el-input__inner" id=""
                                                   value="<?php echo date('Y-m-d H:i:s', $goods['created_at']) ?>">
                                        </div>
                                    </div>
                                    <div class="el-form-item">
                                        <label class="el-form-item__label" style="width: 120px;">商品关键字:</label>
                                        <div class="el-form-item__content" style="margin-left: 120px;">
                                            <input type="text" name="keywords"
                                                   value="<?= $goods['meta_keywords']['meta_keywords_zh'] ?>"
                                                   placeholder="<?= $goods['meta_keywords']['meta_keywords_zh'] ?>"
                                                   class="el-input__inner">
                                        </div>
                                    </div>
                                    <div class="el-form-item">
                                        <label class="el-form-item__label" style="width: 120px;">商品库存:</label>
                                        <div class="el-form-item__content" style="margin-left: 120px;">
                                            <input type="text" name="kucun" value="<?= $goods['kuncun'] ?>"
                                                   placeholder="请输入商品库存" class="el-input__inner">
                                        </div>
                                    </div>
                                    <div class="el-form-item">

                                        <style>
                                            .el-form-item__content > div {
                                                position: relative;
                                                cursor: pointer;
                                            }

                                            .el-form-item__content > div > .close {
                                                position: absolute;
                                                right: -2px;
                                                top: -2px;
                                                background-color: #ccc;
                                                width: 20px;
                                                height: 20px;
                                                text-align: center;
                                                line-height: 20px;
                                                border-radius: 10px;
                                                cursor: pointer;
                                                display: none;
                                            }

                                            .el-form-item__content > div:hover .close {
                                                display: block;
                                            }

                                        </style>

                                        <label class="el-form-item__label" >上传商品图片:</label>
                                        <div class="el-form-item__content" style="margin-left: 120px;">
                                            <div onclick="setZhu(this,'<?= $goods['image']['main']['image'] ?>',0)"
                                                 class="zhu">
                                                <div class="close">&times;</div>
                                                <div class="shangpin1">
                                                    <img src="http://img.chengzhanghao.com:81/media/catalog/product/<?= $goods['image']['main']['image'] ?>"
                                                         alt="">
                                                </div>
                                                <!-- <div style="display: flex; font-size: 12px; line-height: 30px;">
                                                    <span>图片一</span>
                                                </div> -->
                                                <span></span>
                                            </div>
                                            <?php

                                            if ($goods['image']['gallery']) {
                                                # code...

                                                foreach ($goods['image']['gallery'] as $key => $value) {
                                                    ?>
                                                    <div onclick="setZhu(this,'<?= $value['image'] ?>',1)" class="zhu">
                                                        <div class="close">&times;</div>
                                                        <div class="shangpin1" style="background: url('http://img.chengzhanghao.com:81/media/catalog/product/<?= '$value[image]' ?>')no-repeat center center /100% auto">
                                                        </div>
                                                        <!-- <div style="display: flex; font-size: 12px; line-height: 30px;">
                                                <span>图片<?php echo $key + 1; ?></span>
                                            </div> -->

                                                        <?php
                                                        $zxc .= "," . $value['image'];

                                                        ?>
                                                        <span></span>
                                                    </div>

                                                    <?php
                                                }
                                            }
                                            ?>


                                            <div class="adsadas">
                                                <div style="cursor:pointer;" class="shangpin2"></div>
                                                <!-- <div style="display: flex;  font-size: 12px; line-height: 30px;">
                                                    <span>上传图片</span>
                                                </div> -->
                                                <input type="file" onchange="uploads(this)" name="file[]"
                                                       style="display:none" class="img">
                                            </div>
                                        </div>

                                        <input type="hidden" name="bao" id="bao"
                                               value=",<?= $goods['image']['main']['image'] ?><?= $zxc ?>">
                                        <input type="hidden" name="del" id="del" value="">
                                    </div>
                                    <div>
                                        <button type="submit" class="el-button blue el-button--primary is-round">
                                            <span>保存</span>
                                        </button>
                                        <button type="reset" class="el-button red el-button--danger is-round">
                                            <span>取消</span>
                                        </button>
                                    </div>
                                </div>

                        </div>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    // 点击上传按钮
    $(".shangpin2").click(function () {
        // 相当于点击文件上传框

        $(".img").eq($(".img").length - 1).click();
    });

    function uploads(obj) {
        var file = obj.files[0];

        if (window.FileReader) {
            var reader = new FileReader();
            reader.readAsDataURL(file);
            //监听文件读取结束后事件
            reader.onloadend = function (e) {

                $(".adsadas").append($("<input type='file' name='file[]' onchange='uploads(this)' style='display:none' class='img'>"));

                $("<div>").css({
                    "width": "96px",
                    "height": "96px",
                    "background":"url("+e.target.result+")no-repeat center center /100% auto"
                }).attr("class", 'zhu').insertBefore($(".adsadas"));
            };


        }
    }

    // 获取二级按钮
    function getTwoMenu(obj) {
        let id = $(obj).val();

        let str = '';

        $.get("<?= Yii::$service->url->getUrl('water/goods/ajaxclass') ?>" + "?id=" + id, function (data) {

            for (item in data) {


                str += `<option  value="${data[item]._id.$oid}" >${data[item].name.name_zh}</option>`;

            }

            $("#s2").html(str);

        }, 'json');
    }


    // 点击设置主图

    function setZhu(obj, value, idx) {

        // 取消所有的组图选项


        // 获取数据

        let val = $("#del").val();
        let bao = $("#bao").val();

        // 获取保留的图片
        $("#bao").val(bao.replace(',' + value, ''));
        // 拼接字符串

        let str = val + "," + idx + '-' + value;

        $("#del").val(str);

        // 隐藏数据

        $(obj).remove();

    }


</script>

<style>

    .content {
        width: 100%;
        height: 100%;
        box-sizing: border-box;
        padding-top: 8px;
    }

    .content .biaoti {
        height: 52px;
        font-size: 12px;
        line-height: 52px;
        font-weight: bolder;
    }

    .content .item {
        width: 100%;
        height: 50px;
    }

    .content .item .bottom {
        width: 100%;
    }

    .bottom .title {
        width: 100%;
        /*margin-top: 10px;*/
        line-height: 46px;
        font-size: 12px;
        padding-left: 22px;
    }

    .bottom .title .shangpin1 {
        width: 96px;
        height: 96px;
    }

    .shangpin1 img {
        width: 100%;
        height: 100%;
    }

    .bottom .title .shangpin2 {
        width: 96px;
        height: 96px;
        background: url("/public/img/sptp2.png") no-repeat center center /100% auto;
    }

    .content .red {
        height: 35px;
        background: #FD5E4E;
        border: none;
        box-shadow: 0 0px 8px #FD5E4E;
    }

    .content .blue {
        height: 35px;
        background: #30B5FE;
        border: none;
        box-shadow: 0 0 8px #30B5FE;
    }

    .title .details {
        width: 600px;
        height: 116px;
        outline: none;
        resize: none;
        border-radius: 3px;
        background: #f3faff;
        border: 2px solid #e5eff8;
        padding: 8px;
    }

    .el-form-item__content > div {
        float: left;
        margin: 1px;

    }

    .el-form-item__content > img {
        float: left;
        margin: 1px;

    }

    .el-switch .radio {
        position: relative;
        display: inline-block;
        font-weight: 400;
        color: #0c4757;
        padding-left: 25px;
        cursor: pointer;
    }

    .el-switch .radio input {
        position: absolute;
        left: -9999px;
    }

    .el-switch .radio i {
        display: block;
        position: absolute;
        top: 0;
        left: 0;
        width: 15px;
        height: 15px;
        outline: 0;
        border: 1px solid #e4e4e4;
        background: #ffffff;
        border-radius: 50%;
        transition: border-color .3s;
        -webkit-transition: border-color .3s;
    }

    .el-switch .radio input + i:after {
        position: absolute;
        content: '';
        top: 3px;
        left: 3px;
        width: 9px;
        height: 9px;
        border-radius: 50%;
        background-color: #30A3FE;
        opacity: 0;
        transition: opacity .1s;
        -webkit-transition: opacity .1s;
    }

    .el-switch .radio input:checked + i:after {
        opacity: 1;
    }
    .el-form-item__label{
        width: 120px;
        color: #A4ADB5;
    }
</style>