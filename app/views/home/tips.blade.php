
<div class="row" style="margin-bottom: 20px">

    <div class="col-xs-12 col-md-8 col-md-offset-2" style="background: white">
        <div class="row" style="background: #fdf1d6">
            <center>
                                    <image src="{{ URL::asset('assets/images/event_banner_bck.png') }}" style="width:70%;height:auto"/>
                                    

            </center>

        </div>
        <div class="row" style="background: #fdf1d6">
            @if(Session::has('alert'))
             <div class="alert alert-danger" role="alert" style="margin: 10px">{{ Session::get('alert') }}</div>
             @endif
             <div class="col-xs-8 col-md-8">
                  

                 <h3>奖金 MYR {{$phase['jackport']['reward']}}</h3> 
             </div>
            <div align="right" class="col-xs-4 col-md-4" >
                <a data-toggle="modal" data-target="#rulesModal" href="#"> <div  style="background: #ce2c2c;padding:5px;width: 80px;color:white;margin-top: 15px;text-align: right">如何参加？</div></a>
             </div>
        </div>
        <div class="row" style="background: #fdf1d6">
             <div class="col-xs-12 col-md-12">
                <h4>幸运号公布日：@If($phase['release_date'] =='')派完号码后公布 @else {{$phase['release_date'] }} @endIf</h4>

             </div>
        </div>
        <div class="row" style="background: #fdf1d6">
             <div class="col-xs-12 col-md-12">
                 <h5>{{$resultMethod}}</h5>
             </div>
        </div>
        <div class="row" style="background: #fdf1d6;padding-bottom: 15px">
             <div class="col-xs-12 col-md-12">
                   <h5>{{$phase['jackport']['description']}}</h5> 
             </div>
        </div>
        <div class="row" style="background: #daedf9;padding-top: 10px">
             <div class="col-xs-8 col-md-8">
                 <h5><b>号码已派送 : {{$joined_percentage}}</b> </h5>
             </div>
               <div align="right" class="col-xs-4 col-md-4" >
                <a data-toggle="modal" data-target="#numbersModal" href="#"> <div  style="background: #FABB00;padding:5px;width: 80px;color:white;margin-top: 5px;text-align: right">我的号码。</div></a>
             </div>
        </div>
        
        <div class="row" style="background: #daedf9;padding-top: 10px">
             <div class="col-xs-12 col-md-12">
                 <div class="progress">
                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70"
                    aria-valuemin="0" aria-valuemax="100" style="width:{{$joined_percentage}}%">
                      {{$joined_percentage}}
                    </div>
                  </div>
             </div>
        </div>
        <div class="row" style="background: #daedf9;padding-bottom: 10px">
             <div class="col-xs-3 col-md-3">
                 <h5><b>[0001]</b></h5>
             </div>
            <div align="right" class="col-xs-3 col-md-3 col-md-offset-6">
                 <h5><b>[{{ $phase['jackport']['require_join']}}]</b></h5>
             </div>
        </div>
        <div class="row" style="background: #eae3f1;padding-bottom: 10px">
            <div  class="col-xs-12 col-md-12"><h3>打赏送号码,号码赢奖金！</h3></div>
        </div>
        <div class="row"  >
            <div  class="col-xs-12 col-md-12" style='position: relative;' >
                  @if (!Auth::check())
                <div style="width:98%;height:100%;position: absolute"class="black_trans"><center><h5 align='center' style="color:white;margin-top: 50px"><a href='{{ URL::route('login') }}'>脸书登入后，才能打赏</a> </h5></center></div>
                @endIf 
   
                <form style="margin-top: 15px;display:none" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
                    <input type="hidden" name="cmd" value="_s-xclick">
                    <input type="hidden" name="hosted_button_id" value="WPSCEZWHTP2PL">
                    <input type="submit" class="btn btn-info" value="RM 9.99, 获得8个号码 (sandbox)"> 
                    <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
                </form>
                <form style="margin-top: 15px" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                <input type="hidden" name="cmd" value="_s-xclick">
                <input type="hidden" name="hosted_button_id" value="ZUY9SKQ2ARS2U">
                    <input type="submit" class="btn btn-info" value="RM 9.99, 获得8个号码"> 
                <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                </form>


            </div>
        </div>
        <hr>
        <table style="width: 100%">
            <tr class="border_bottom" ><td style="padding: 10px"><a href="{{ URL::route('redeem_free') }}"><image src="{{ URL::asset('assets/images/4dhuat/ic_thumb_up_black_18dp_xsmall.png') }}" /> RM 0.00, 免费获得1个号码 (剩 {{$freeNumberLeft}}个)</a></td></tr>
            <tr class="border_bottom" ><td style="padding: 10px"><a data-toggle="modal" data-target="#myModal" href="#"><image src="{{ URL::asset('assets/images/4dhuat/ic_thumb_up_black_18dp_xsmall.png') }}" /> RM 4.99, 获得4个号码</a></td></tr>
            <tr class="border_bottom" ><td style="padding: 10px"><a data-toggle="modal" data-target="#myModal" href="#"><image src="{{ URL::asset('assets/images/4dhuat/ic_thumb_up_black_18dp_xsmall.png') }}" /> RM 29.99, 获得25个号码</a></td></tr>
            <tr class="border_bottom" ><td style="padding: 10px"><a data-toggle="modal" data-target="#myModal" href="#"><image src="{{ URL::asset('assets/images/4dhuat/ic_thumb_up_black_18dp_xsmall.png') }}" /> RM 49.99, 获得43个号码</a></td></tr>
            <tr class="border_bottom" ><td style="padding: 10px"><a data-toggle="modal" data-target="#myModal" href="#"><image src="{{ URL::asset('assets/images/4dhuat/ic_thumb_up_black_18dp_xsmall.png') }}" /> RM 99.99, 获得88个号码</a></td></tr>

        </table>
    
      
    </div>
    <div class="col-xs-2 col-md-2"> 

  
  </div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">下载我们的 android app 吧</h4>
      </div>
      <div class="modal-body">
          <a href="https://play.google.com/store/apps/details?id=com.solution.flyhigh.fourdhuat"  target="_blank"><img style="width:70px;heigh:70px" alt="{{ Config::get('4dhuat.name') }}" src="{{ URL::asset('assets/images/4dhuat/ic_launcher_xxx.png') }}"></a>
          <p>此打赏需要下载我们的 android app [fourdhuat] 哦。<a  target="_blank" href="https://play.google.com/store/apps/details?id=com.solution.flyhigh.fourdhuat">点击下载</a></p>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <a href="https://play.google.com/store/apps/details?id=com.solution.flyhigh.fourdhuat" type="button" class="btn btn-primary"  target="_blank">好的</a>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="rulesModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">参加方法与规则</h4>
      </div>
      <div class="modal-body">
          <h3>幸运号码计算法</h3>
            <img style="width:100%;heigh:auto" alt="{{ Config::get('4dhuat.name') }}" src="{{ URL::asset('assets/images/4dhuat/rule_1.png') }}"> 
          <h4>举例</h4>
          <hr>
          <h4>万字成绩 (选一)</h4>
          <p> = TOTO 头奖 / Dacamai 头奖 / Magnum 头奖 ...</p>
          <h5 style="color:#8c0e0e">=9808</h5>
         
          <h4>奖品所需号码</h4>
          <h5 style="color:#8c0e0e">=2000</h5>
          <br>
            <h4>成绩</h4>
             <h5 style="color:#305700">9808%2000=2000</h5>
             <p>持有号码 [1808]的将会成为赢家，可以拿走我们的奖金。</p>
            <br>
           <h4 style="background:#daedf9;padding: 10px">选择万字成绩</h4>
           <hr>
           <p>当号码派完时，我们的工作人员将会在3天内公布赢家。</p>
           <br>
           <h4 style="background:#daedf9;padding: 10px">如果派的号码多过奖品所需号码？</h4>
           <hr>
           <p>举例，如果奖品所需号码是2000个，但系统派到 2015 时。奖品所需号码将由 ［2000］变成 ［2015］。</p>
            <br>
           <h4 style="background:#daedf9;padding: 10px">如果我赢了，如何得到我的奖金？</h4>
           <hr>
           <p>我们的工作人员会在脸书通知您，然后通过网上转账给您 （只接受大马的银行）</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade" id="numbersModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">活动号码</h4>
      </div>
      <div class="modal-body">
         
          <div>

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                  <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">我的号码</a></li>
                  <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">其他用户</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                  <div role="tabpanel" class="tab-pane active" id="home">
                    {{ $jackportBids->links() }}
                    <table style="width: 100%">


                      @foreach ($jackportBids as $jackportBid)

                          <tr class="border_bottom" style="padding:10px">
                             <td>
                                 <h3>{{sprintf("%04s", $jackportBid->id)}}</h3>
                             </td>
                         </tr>

                      @endforeach

                      </table>
                  </div>
                    <div role="tabpanel" class="tab-pane" id="profile">

                        {{ $other_jackportBids->links() }}
                    <table style="width: 100%">


                      @foreach ($other_jackportBids as $other_jackportBid)

                          <tr class="border_bottom" style="padding:10px;">
                              <td style="width: 80px"><image src="{{$other_jackportBid['image']}}" style="width:50px;heigh50px" /></td>

                              <td>
                                  <h4 style="color:#FA1100">{{sprintf("%04s", $other_jackportBid->id)}}</h4>
                                  <h4>{{$other_jackportBid['name']}}</h4>
                                  <p class="help-block">{{date('d.m.Y h:i a', strtotime($other_jackportBid['created_on']))}}</p>
                             </td>
                         </tr>

                      @endforeach

                      </table>

                    </div>
                </div>

</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->