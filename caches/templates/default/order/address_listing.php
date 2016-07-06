<?php defined('IN_WZ') or exit('No direct script access allowed'); ?><?php if(!isset($siteconfigs)) $siteconfigs=get_cache('siteconfigs'); include T("member","head"); ?>
<body class="gray-bg">
<?php if($set_iframe==0) { ?>
<?php if(!isset($siteconfigs)) $siteconfigs=get_cache('siteconfigs'); include T("member","iframetop"); ?>
<?php } else { ?>
<div style="padding-top: 15px;"></div>
<?php } ?>
<div class="container-fluid  ie8-member">
    <div  class="row row-40">
        <?php if($set_iframe==0) { ?>
        <div class="col-sm-3 left-nav">             <!--左侧导航-->
            <nav class="navbar-default navbar-static-side" role="navigation">
                <div class="nav-close"><i class="fa fa-times-circle"></i>
                </div>
                <div class="slimScrollDiv" style="position: relative; width: auto; height: 100%;"><div class="sidebar-collapse" style="width: auto; height: 100%;">
                    <?php if(!isset($siteconfigs)) $siteconfigs=get_cache('siteconfigs'); include T("member","left"); ?>
                </div></div>
            </nav>
            <!--end 左侧导航-->
        </div><!--col-sm-3-->
        <?php } ?>

        <div class="<?php if($set_iframe==0) { ?>col-sm-9<?php } else { ?>col-sm-12<?php } ?> paddingleft0">

            <div class="row">
                <div class="col-sm-12">

                    <div class="memberright ">

                        <div class=" ibox">
                            <section class="panel" style="border: 0;     border-radius: 0;">
                                <header class="panel-heading"><span class="title">收货地址管理</span></header>

                                <ul id="myTab" class="nav nav-tabs" role="tablist" style="padding-left: 16px">
                                    <li role="presentation" class="active"><a href="#tabs1" id="1tab" role="tab" data-toggle="tab" aria-controls="tabs1" aria-expanded="true">全部</a></li>
                                    <li role="presentation" class=""><a href="#tabs2" role="tab" id="2tab" data-toggle="tab" aria-controls="tabs2" aria-expanded="false">新增地址</a></li>
                                </ul>

                                <div id="myTabContent" class="tab-content tabsbordertop">

                                    <div role="tabpanel" class="tab-pane fade active in" id="tabs1" aria-labelledby="1tab">
                                        <div class="panel-body" id="panel-bodys">
                                            <table class="table table-striped table-advance table-hover">
                                                <thead>
                                                <tr>
                                                    <th class="tablehead">收件人</th>
                                                    <th class="tablehead">地址</th>
                                                    <th class="tablehead">电话</th>
                                                    <th class="tablehead">默认</th>
                                                    <th class="tablehead">管理操作</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php $n=1;if(is_array($result)) foreach($result AS $r) { ?>
                                                <tr>
                                                    <td class="orderlist"><?php echo $r['addressee'];?></td>
                                                    <td class="orderlist"><?php echo $r['province'];?> <?php echo $r['city'];?> <?php echo $r['address'];?></td>
                                                    <td class="orderlist"><?php echo $r['mobile'];?></td>
                                                    <td class="orderlist"><?php if($r['isdefault']) { ?>
                                                        <i class="paymenticon"></i>默认地址<?php } else { ?>
                                                        <a href="index.php?m=order&f=address&v=setdefault&addressid=<?php echo $r['addressid'];?>&acbar=3">设为默认</a>
                                                        <?php } ?></td>
                                                    <td class="orderlist"><a href="index.php?m=order&f=address&v=delete&addressid=<?php echo $r['addressid'];?>&acbar=3">删除</a></td>
                                                </tr>
                                                <?php $n++;}?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <?php if($total>20) { ?>
                                        <div class="paginationpage text-center">
                                            <nav>
                                                <ul class="pagination">
                                                    <?php echo $pages;?>
                                                </ul>
                                            </nav>
                                        </div>
                                        <?php } ?>
                                    </div>


                                    <div role="tabpanel" class="tab-pane fade" id="tabs2" aria-labelledby="2tab">

                                        <form name="myform" action="index.php?m=order&f=address&v=add" method="post" id="myform" class="form-horizontal">
                                            <table class="table table-striped table-advance table-hover">
                                                <tr>
                                                    <td colspan="2" style="line-height:32px;"><span class="color_777"> 电话号码、手机选项一项其余为必填项</span></td>
                                                </tr>
                                                <tr>
                                                    <td width="120" align="right">所在地区<span class="color_warning">*</span></td>
                                                    <td width="675"><?php echo linkage(1,'myfieldid1',0);?></td>
                                                </tr>
                                                <tr>
                                                    <td align="right">详细地址<span class="color_warning">*</span></td>
                                                    <td><textarea name="address" cols="60" rows="3" class="form-control" placeholder="不需要重复填写省市区，必须大于5个字符，小于120个字符" datatype="*2-120" errormsg="至少2个字符,最多120个字符！" nullmsg="请填写详细地址" class="form-control"></textarea></td>
                                                </tr>

                                                <tr>
                                                    <td align="right">收货人姓名<em class="color_warning">*</em></td>
                                                    <td><input type="text" name="addressee" id="addressee" size="36" placeholder="长度不超过20个字符" datatype="*2-30" errormsg="至少2个字符,最多20个字符！" nullmsg="请填写收货人姓名" class="form-control" class="form-control"></td>
                                                </tr>
                                                <tr>
                                                    <td align="right">手机号码<em class="color_warning">*</em></td>
                                                    <td><input type="text" name="mobile" id="mobile" size="36" placeholder="请输入电话号码" datatype="m" errormsg="请填写正确的手机号码" nullmsg="请填写手机号码" class="form-control"></td>
                                                </tr>
                                                <tr>
                                                    <td align="right">邮政编码</td>
                                                    <td>
                                                        <input type="text" name="zipcode" id="zipcode" size="36"></td>
                                                </tr>
                                                <tr>
                                                    <td align="right">&nbsp;</td>
                                                    <td><input type="checkbox" name="isdefault" id="isdefault" value="1">
                                                        <label>设为默认收货地址</label></td>
                                                </tr>
                                                <tr>
                                                    <td align="right">&nbsp;</td>
                                                    <td>
                                                        <input type="hidden" name="forward" value="<?php echo $forward;?>">
                                                        <input type="submit" name="submit" class="addbtn" id="button" value="保存"></td>
                                                </tr>
                                            </table>
                                        </form>

                                    </div>

                                </div>

                            </section>
                        </div>
                    </div>
                </div>

            </div>


        </div><!--col-sm-9-->
    </div>
</div>
<?php if(!isset($siteconfigs)) $siteconfigs=get_cache('siteconfigs'); include T("member","foot"); ?>