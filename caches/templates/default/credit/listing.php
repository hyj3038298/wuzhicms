<?php defined('IN_WZ') or exit('No direct script access allowed'); ?><?php if(!isset($siteconfigs)) $siteconfigs=get_cache('siteconfigs'); include T("member","head"); ?>
<body class="gray-bg">
<?php if($set_iframe==0) { ?>
<?php if(!isset($siteconfigs)) $siteconfigs=get_cache('siteconfigs'); include T("member","iframetop"); ?>
<?php } else { ?>
<div style="padding-top: 15px;"></div>
<?php } ?>
<div class="container-fluid  ie8-member">
    <div class="row row-40" >
        <?php if($set_iframe==0) { ?>
        <div class="col-sm-3 left-nav">             <!--左侧导航-->
            <nav class="navbar-default navbar-static-side" role="navigation">
                <div class="nav-close"><i class="fa fa-times-circle"></i>
                </div>
                <div class="slimScrollDiv" style="position: relative; width: auto; height: 100%;">
                    <div class="sidebar-collapse" style="width: auto; height: 100%;">
                        <?php if(!isset($siteconfigs)) $siteconfigs=get_cache('siteconfigs'); include T("member","left"); ?>
                    </div>
                </div>
            </nav>
            <!--end 左侧导航-->
        </div><!--col-sm-3--><?php } ?>

        <div class="<?php if($set_iframe==0) { ?>col-sm-9<?php } else { ?>col-sm-12<?php } ?> paddingleft0">
            <div class="ibox">
                <section class="panel">
                    <header class="panel-heading"><span class="title">账户积分</span></header>

                    <ul id="myTab" class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tabs1" id="1tab" role="tab" data-toggle="tab" aria-controls="tabs1" aria-expanded="true">积分明细</a></li>
                        <li role="presentation"><a href="#tabs2" id="2tab" role="tab" data-toggle="tab" aria-controls="tabs2" aria-expanded="true">购买积分</a></li>
                    </ul>


                    <div id="myTabContent" class="tab-content tabsbordertop">

                        <div role="tabpanel" class="tab-pane fade active in" id="tabs1" aria-labelledby="1tab">
                            <div class="panel-body" id="panel-bodys">
                                <table class="table table-striped table-advance table-hover text-center">
                                    <thead>
                                    <tr>
                                        <th class="tablehead">交易时间</th>
                                        <th class="tablehead">详情</th>
                                        <th class="tablehead">积分数</th>
                                    </tr>

                                    </thead>
                                    <tbody>
                                    <?php $n=1;if(is_array($result)) foreach($result AS $r) { ?>
                                    <tr <?php if($n%2==0) { ?>class="tabletr"<?php } ?>>
                                        <td  align="center"><?php echo date('Y-m-d H:i:s',$r['addtime']);?></td>
                                        <td align="left"><?php echo $r['remark'];?></td>
                                        <td class="smprice">
                                            <?php if($r['j_type']==1) { ?>
                                            <font color='green'>+<?php echo $r['point'];?></font>
                                            <?php } elseif ($r['j_type']==2) { ?>
                                            <font color='#f37800'>-<?php echo $r['point'];?></font>
                                            <?php } ?>
                                        </td>


                                    </tr>
                                    <?php $n++;}?>




                                    </tbody>
                                </table>
                            </div>

                            <!--分页开始-->
                            <div class="paginationpage text-center">
                                <nav>
                                    <ul class="pagination">
                                        <?php echo $pages;?>
                                    </ul>
                                </nav>
                            </div>
                            <!--分页结束-->

                        </div>
                        <div role="tabpanel" class="tab-pane fade active in" id="tabs2" aria-labelledby="2tab">
                            <div class="panel-body" id="panel-bodys">
                                <form class="form-horizontal" role="form" name="passworform" action="?m=credit&f=mycredit&v=exchange" method="post" id="passworform" onsubmit="return check_password();">
                                    <table class="table table-striped table-advance table-hover text-center">
                                        <tbody>
                                        <tr>
                                            <td><div class="form-groupinfo"><label class="col-sm-3 control-label text-right">剩余金额：</label><div class="col-sm-3 text-left"><?php echo $memberinfo['money'];?></div></div></td>
                                        </tr>
                                        <tr>
                                            <td><div class="form-groupinfo"><label class="col-sm-3 control-label text-right">可用积分：</label><div class="col-sm-3 text-left"><?php echo $memberinfo['points'];?></div></div></td>
                                        </tr>

                                        <tr>
                                            <td><div class="form-groupinfo"><label class="col-sm-3 control-label text-right">兑换比例：</label><div class="col-sm-3 text-left">1元：<?php echo $point_config['exchange_point'];?>积分</div></div></td>
                                        </tr>
                                        <tr>
                                            <td><div class="form-groupinfo"><label class="col-sm-3 control-label text-right">金额：</label><div class="col-sm-3 text-left"><input type="text" class="form-control" id="money" placeholder="请输入金额，必须为整数" name="money"></div></div></td>
                                        </tr>
                                        <tr>
                                            <td><div class="form-groupinfo"><label class="col-sm-3 control-label text-right"> </label><div class="col-sm-3 text-left"><button type="submit" name="submit" class="btn btn-primary">提 交</button></div></div></td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>


        </div>
    </div>
</div>
<?php if(!isset($siteconfigs)) $siteconfigs=get_cache('siteconfigs'); include T("member","foot"); ?>