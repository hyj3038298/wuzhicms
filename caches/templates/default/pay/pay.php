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

            <div class="row">
                <div class="col-sm-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>账户余额</h5>
                        </div>
                        <div class="ibox-content" style="min-height: 500px;">
                                <div class="mymoney">可用余额：<span class="myprice">￥<?php echo $memberinfo['money'];?></span> 账户状态：<span class="state">有效</span></div>

                                <ul id="myTab" class="nav nav-tabs" role="tablist">
                                    <li role="presentation" ><a href="?m=pay&f=payment&v=listing&set_iframe=<?php echo $set_iframe;?>">账户收支明细</a></li>
                                    <li role="presentation" class="active"><a href="?m=pay&f=payment&v=pay&acbar=1" id="2tab" >在线充值</a></li>
                                </ul>


                                <div id="myTabContent" class="tab-content tabsbordertop">

                                    <div role="tabpanel" class="tab-pane fade active in" id="formdiv" aria-labelledby="1tab">
                                        <div class="panel-body" id="panel-bodys">
                                            <form name="myform" action="" method="post" id="myform" target="_blank" onsubmit="return formsubmit();">
                                                <table width="100%" cellspacing="0" class="table table-striped table-advance table-hover text-center">
                                                    <tr>
                                                        <th width="150" align="right">余额：</th>
                                                        <td style="padding:0 0 0 10px"><div class="col-sm-3 text-left inline"><font style="color:#F00; font-size:22px;font-family:Georgia,Arial; font-weight:700"><?php echo $memberinfo['money'];?></font> 元</div></td>
                                                    </tr>
                                                    <tr>
                                                        <th align="right">充值金额：</th>
                                                        <td><div class="col-sm-3 text-left inline"><input name="form[price]" type="text" id="price" size="8" value="<?php echo $price;?>" class="form-control">&nbsp;元<span id="msgid"></span></div></td>
                                                    </tr>
                                                    <tr>
                                                        <th align="right">充值方式：</th>
                                                        <td><div class="col-sm-8 text-left inline">
                                                            <?php $n=1;if(is_array($payments_res)) foreach($payments_res AS $rs) { ?>
                                                            <label class="payment-show"><input name="payment" type="radio" value="<?php echo $rs['id'];?>" <?php if($n==1) { ?>checked<?php } ?> onclick="set_cz(<?php echo $rs['type'];?>);"> <em><?php echo $rs['name'];?></em><span class="payment"><?php echo $rs['note'];?></span></label>
                                                            <?php $n++;}?></div>
                                                        </td>
                                                    </tr>
                                                    <tr class="ctclass">
                                                        <th align="right">E-mail：</th>
                                                        <td><div class="col-sm-3 text-left inline"><input name="form[email]" type="text" id="email" size="30" value="<?php echo $memberinfo['email'];?>"  class="form-control"/></div></td>
                                                    </tr>
                                                    <tr class="ctclass">
                                                        <th align="right">姓 名：</th>
                                                        <td><div class="col-sm-3 text-left inline"><input name="form[username]" type="text" id="contactname" size="30" value="<?php echo $memberinfo['username'];?>"  class="form-control"/></div></td>
                                                    </tr>
                                                    <tr class="ctclass">
                                                        <th align="right">电 话：</th>
                                                        <td><div class="col-sm-3 text-left inline"><input name="form[telephone]" type="text" id="telephone" size="30" class="form-control"/></div></td>
                                                    </tr>

                                                    <tr class="ctclass">
                                                        <th align="right">备  注：</th>
                                                        <td><div class="col-sm-3 text-left inline"><textarea name="form[remark]"  id="remark" rows="2" cols="50" class="form-control"></textarea></div></td>
                                                    </tr>

                                                    <tr>
                                                        <td></td>
                                                        <td colspan="2"><div class="col-sm-6 text-left inline"><label>
                                                            <input type="hidden" name="v" value="pay_recharge">
                                                            <input type="submit" name="dosubmit" id="dosubmit" value="确 定" class="btn btn-primary"/>
                                                        </label></div></td>
                                                    </tr>
                                                </table>
                                            </form>
                                        </div>

                                    </div>
                                    <div id="success_div" style="display: none">
                                        已经提交，完成充值后，点击<a href="?m=pay&f=payment&v=listing"> 账户收支明细</a>
                                    </div>
                                </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    function formsubmit() {
        if($("#price").val()=='' || $("#price").val()==0) {
            alert('请输入充值金额');
            $("#price").focus();
            return false;
        }
        $("#formdiv").css('display','none');
        $("#success_div").css('display','');
        myform.submit();
    }
    function set_cz(type) {
        if(type==1) {
            $("#dosubmit").attr('disabled',false);
            $(".ctclass").css('display','');
        } else {
            $("#dosubmit").attr('disabled',true);
            $(".ctclass").css('display','none');
        }
    }
</script>
<?php if(!isset($siteconfigs)) $siteconfigs=get_cache('siteconfigs'); include T("member","foot"); ?>