<?php

use yii\widgets\LinkPager;
use yii\helpers\Html;
use yii\helpers\Url;


?>
<div class="main-content">
    <div class="adminmannager">
        <!--用户管理-管理员管理-->
        <div class="adminmannager-title">
            <span>会员管理</span>&nbsp;
            <span>·&nbsp;账户管理</span>
        </div>
        <div class="adminmannager-search">
            <form action="<?= Yii::$service->url->getUrl('/admin/index/member') ?>" method="get">

                <span>会员名称</span>
                <input type="text" name="firstname"
                    <?php if($firstname){?>
                        value="<?= $firstname?>"
                    <?php }else{?>
                        placeholder="请输入会员名称"
                    <?php }?>
                >
                <span class="search-ID">ID</span>
                <input type="text" name="id" placeholder="请输入ID号">

                <div class="xiala">
                    <span class="search-ID">等级</span>
                    <select name="level" id="member-level">
                        <option value="0" <?php if ($level==0){echo "selected";}?>>普通会员</option>
                        <option value="1" <?php if ($level==1){echo "selected";}?>>白银会员</option>
                        <option value="2" <?php if ($level==2){echo "selected";}?>>黄金会员</option>

                    </select>
                    <div class="xialaimg"></div>
                </div>
                <div class="indexsearch">
                    <input class="search-img" type="submit" value="">
                </div>
            </form>

        </div>
        <!--会员列表-->
        <div class="admin-table">
            <div class="admin-tablename">
                <div class="admin-tablenamebox"></div>
                <span class="admin-tablename1"><a href="javascript:0;">会员</a></span><span class="admin-tablename2">列表</span>
            </div>
            <div class="el-table__body-wrapper is-scrolling-left">
                <table cellspacing="0" cellpadding="0" border="0" class="el-table__body"
                       style="width: 1012px;">
                    <colgroup>
                        <col name="el-table_2_column_6" width="120">
                        <col name="el-table_2_column_7" width="150">
                        <col name="el-table_2_column_8" width="150">
                        <col name="el-table_2_column_9" width="150">
                        <col name="el-table_2_column_10" width="150">
                        <col name="el-table_2_column_11" width="400">
                    </colgroup>
                    <thead class="has-gutter">
                    <tr style="font-size: 14px;color: #B1DBFE;text-align: left;height: 50px;">
                        <th
                                class="el-table_2_column_11     is-leaf">
                            <div class="cell">ID</div>
                        </th>
                        <th
                                class="el-table_2_column_12     is-leaf">
                            <div class="cell">会员名称</div>
                        </th>
                        <th
                                class="el-table_2_column_13     is-leaf">
                            <div class="cell">等级</div>
                        </th>
                        <th colspan="1" rowspan="1"
                            class="el-table_2_column_14     is-leaf">
                            <div class="cell">账户状态</div>
                        </th>
                        <th colspan="1" rowspan="1"
                            class="el-table_2_column_14     is-leaf">
                            <div class="cell">上次访问时间</div>
                        </th>
                        <th
                                class="el-table_2_column_15     is-leaf">
                            <div class="cell">相关操作</div>
                        </th>
                        <th class="gutter" style="width: 0px; display: none;"></th>
                    </tr>
                    </thead>
                </table>
            </div>
            <div class="el-table__body-wrapper is-scrolling-left">
                <table cellspacing="0" cellpadding="0" border="0" class="el-table__body"
                       style="width: 1012px;">
                    <colgroup>
                        <col name="el-table_2_column_6" width="120">
                        <col name="el-table_2_column_7" width="150">
                        <col name="el-table_2_column_8" width="150">
                        <col name="el-table_2_column_9" width="150">
                        <col name="el-table_2_column_10" width="150">
                        <col name="el-table_2_column_11" width="400">
                    </colgroup>
                    <tbody style="font-size: 12px;color:#82898e">
                    <?php foreach ($rows as $v){?>
                        <tr class="el-table__row" style="height:36px;font-size: 14px;">
                            <td class="el-table_2_column_11  ">
                                <div class="cell el-tooltip" title="<?= $v["increment_id"] ?>">
                                    <?= $v["id"] ?>
                                </div>
                            </td>
                            <td class="el-table_2_column_12">
                                <div class="cell el-tooltip">
                                    <?php echo $v["firstname"]?>
                                </div>
                            </td>

                            <td class="el-table_2_column_14">
                                <div class="cell el-tooltip" title="<?= $v["payment_method"] ?>">
                                    <?php if($v['level']==0){echo '普通会员';}else if($v['level']==1){echo '白金会员';}else if ($v['level']==2){echo '黄金会员';}?>
                                </div>
                            </td>
                            <td class="el-table_2_column_13">
                                <div class="cell el-tooltip">
                                    <?php if ($v["status"]==1){
                                        echo "正常";
                                    }else if($v["status"]==0){echo "黑名单";} else if($v["status"]==2){echo "冻结";}?>
                                </div>
                            </td>
                            <td class="el-table_2_column_14">
                                <div class="cell el-tooltip" title="<?= $v["payment_method"] ?>">
                                    <?php echo date('Y-m-d',$v["updated_at"]);?>
                                </div>
                            </td>
                            <td class="el-table_2_column_18">
                                <a style="color: #41b2fc" href="<?= Yii::$service->url->getUrl('admin/index/wmember',array('id'=>$v['id']))?>">查看</a>
                                &nbsp;<label>|</label>&nbsp;
                                <a style="color: #41b2fc" href="<?= Yii::$service->url->getUrl('admin/index/delmember',array('id'=>$v['id']))?>">删除</a>
                                &nbsp;<label>|</label>&nbsp;
                                <a style="color:<?php if($v["status"]!=0){echo "#ff5932";}else{echo "#00FE0B";}?>" href="<?= Yii::$service->url->getUrl('admin/index/mblacklist',array('id'=>$v['id']))?>">
                                    <?php if($v["status"]!=0){echo "移入黑名单";}else{echo "移出黑名单";}?>
                                </a>
                                &nbsp;<label>|</label>&nbsp;
                                <a style="color: <?php if($v["status"]!=2){echo "#41b2fc";}else{echo "#00FE0B";}?>" href="<?= Yii::$service->url->getUrl('admin/index/mfreeze',array('id'=>$v['id']))?>">
                                    <?php if($v["status"]!=2){echo "冻结账号";}else{echo "解除冻结";}?>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>


        <div class="admincount" style="justify-content: flex-end;margin-bottom: 0px;margin-top:30px;font-size: 14px;">
            <?php if($tot>10){?>
            <div class="admincountall">
                <span style="color: #3db0ff">·</span>&nbsp;<span>总计</span><span><?=$tot?></span><span>记录</span>
            </div>
            <div class="admintotalpage">
                <span style="color: #29c99a">·</span>&nbsp;<span>分</span><span
                        style="color: #29c99a"><?= ceil($tot/10)?></span><span>页</span>
            </div>
            <div class="admintotalpage">
                <span style="color: #29c99a">·</span>&nbsp;<span>每页</span>
                <input type="text" style="display: inline-block;width: 40px;height: 20px;border-radius: 10px;
                            border: 1px solid #ebf6ff;background: #f3faff;outline: none;padding:0 5px;
                            box-sizing: border-box;text-align: center;color:#29c99a;line-height: 20px; "
                       value="10" disabled>
            </div>
            <?php }?>
        </div>


        <div style="width: 100%; position: relative;height: 50px;">
            <div style="font-size: 12px; position: absolute; bottom: 0; right: 0; display: flex; justify-content: space-between;">
                <?php
                echo LinkPager::widget([
                    'pagination' => $pagination,
                    'firstPageLabel' => '首页',
                    'lastPageLabel' => '尾页',

                    'nextPageLabel' => '>',
                    'prevPageLabel' => '<',
                ]);


                ?>
            </div>
        </div>
    </div>
</div>