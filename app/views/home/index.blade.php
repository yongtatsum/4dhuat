
<div class="row">
    <div
  class="fb-like"
  data-share="true"
  data-width="450"
  data-show-faces="true">
</div>
    <center><a href="{{ URL::route('myNumber',array('number'=>$my_lucky_num))}}"><h2>您今天的神字 {{ $my_lucky_num }}</h2></a></center>
</div>
<div class="row">
<!--    DAMACAI-->
    <div class="col-md-4 result_row">
        <table class="result_table">
            <thead class="result_header" style="background: #0F5CA7">
                <tr>
                    <td colspan="3"><h3>Damacai 4D</h3></td>
                    <td align="right" rowspan="2">
                        <image class="result_icon" src="{{ URL::asset('assets/images/results/damacai.png') }}"/>
                    </td>
                </tr>
                </tr><td  colspan="3"><p>{{ $damacai['date']}} ({{ $damacai['phase'] }})</p></td></tr>
            </thead>
            <tbody>
                <tr>
                     <td valign="center" class="border_bottom" style="max-width: 20px"><p class="prize_icon">1</p></td>
                    <td  valign="center" class="border_bottom"><p class="prize_title">頭獎</p></td>
                    <td  colspan="2" valign="center" class="border_bottom"><p class="prize_top3">{{ $damacai['r1']}}</p></td>
                </tr>
                <tr>
                     <td valign="center" class="border_bottom" style="max-width: 20px"><p class="prize_icon">2</p></td>
                    <td  valign="center" class="border_bottom"><p class="prize_title">二獎</p></td>
                    <td  colspan="2" valign="center" class="border_bottom"><p class="prize_top3">{{ $damacai['r2']}}</p></td>
                </tr>
                 <tr>
                     <td valign="center" class="border_bottom" style="max-width: 20px"><p class="prize_icon">3</p></td>
                    <td  valign="center" class="border_bottom"><p class="prize_title">三獎</p></td>
                    <td  colspan="2" valign="center" class="border_bottom"><p class="prize_top3">{{ $damacai['r3']}}</p></td>
                </tr>
<!--                特別獎-->
                <tr><td align="center" class="border_bottom special_row" colspan="4">特別獎</td></tr>
                <tr>
                    @for ($i = 0; $i < 4; $i++)
                        <td align="center" style="width: 25%" class="border special_row_result"><?php echo isset($damacai['specials'][$i])?$damacai['specials'][$i]:'-' ?></td>

                    @endfor

                </tr>
                <tr>
                    @for ($i = 4; $i < 8; $i++)
                        <td align="center" style="width: 25%" class="border special_row_result"><?php echo isset($damacai['specials'][$i])?$damacai['specials'][$i]:'-' ?></td>

                    @endfor
                </tr>
                <tr>
                    @for ($i = 8; $i < 10; $i++)
                        <td  colspan="2" align="center" style="width: 25%" class="border special_row_result"><?php echo isset($damacai['specials'][$i])?$damacai['specials'][$i]:'-' ?></td>

                    @endfor
                 
                </tr>
                <!--特別獎 END-->
 <!--                安慰獎-->
                <tr><td align="center" class="border_bottom consolation_row" colspan="4">安慰獎</td></tr>
                <tr>
                    @for ($i = 0; $i < 4; $i++)
                        <td align="center" style="width: 25%" class="border special_row_result"><?php echo isset($damacai['consolations'][$i])?$damacai['consolations'][$i]:'-' ?></td>

                    @endfor

                </tr>
                <tr>
                    @for ($i = 4; $i < 8; $i++)
                        <td align="center" style="width: 25%" class="border special_row_result"><?php echo isset($damacai['consolations'][$i])?$damacai['consolations'][$i]:'-' ?></td>

                    @endfor
                </tr>
                <tr>
                    @for ($i = 8; $i < 10; $i++)
                        <td  colspan="2" align="center" style="width: 25%" class="border special_row_result"><?php echo isset($damacai['consolations'][$i])?$damacai['consolations'][$i]:'-' ?></td>

                    @endfor
                 
                </tr>
                <!--特別獎 END-->               
            </tbody>
        </table>
    </div>
<!--  DAMACAI END-->

<!--=======================================-->
 
<!--    MAGNUM-->
    <div class="col-md-4 result_row">
        <table class="result_table">
            <thead class="result_header" style="background: #FABB00">
                <tr>
                    <td colspan="3"><h3>Magnum 4D</h3></td>
                    <td align="right" rowspan="2">
                        <image class="result_icon" src="{{ URL::asset('assets/images/results/magnum.png') }}"/>
                    </td>
                </tr>
                </tr><td  colspan="3"><p>{{ $magnum['date']}} ({{ $magnum['phase'] }})</p></td></tr>
            </thead>
            <tbody>
                <tr>
                     <td valign="center" class="border_bottom" style="max-width: 20px"><p class="prize_icon">1</p></td>
                    <td  valign="center" class="border_bottom"><p class="prize_title">頭獎</p></td>
                    <td  colspan="2" valign="center" class="border_bottom"><p class="prize_top3">{{ $magnum['r1']}}</p></td>
                </tr>
                <tr>
                     <td valign="center" class="border_bottom" style="max-width: 20px"><p class="prize_icon">2</p></td>
                    <td  valign="center" class="border_bottom"><p class="prize_title">二獎</p></td>
                    <td  colspan="2" valign="center" class="border_bottom"><p class="prize_top3">{{ $magnum['r2']}}</p></td>
                </tr>
                 <tr>
                     <td valign="center" class="border_bottom" style="max-width: 20px"><p class="prize_icon">3</p></td>
                    <td  valign="center" class="border_bottom"><p class="prize_title">三獎</p></td>
                    <td  colspan="2" valign="center" class="border_bottom"><p class="prize_top3">{{ $magnum['r3']}}</p></td>
                </tr>
<!--                特別獎-->
                <tr><td align="center" class="border_bottom special_row" colspan="4">特別獎</td></tr>
                <tr>
                    @for ($i = 0; $i < 4; $i++)
                        <td align="center" style="width: 25%" class="border special_row_result"><?php echo isset($magnum['specials'][$i])?$magnum['specials'][$i]:'-' ?></td>

                    @endfor

                </tr>
                <tr>
                    @for ($i = 4; $i < 8; $i++)
                        <td align="center" style="width: 25%" class="border special_row_result"><?php echo isset($magnum['specials'][$i])?$magnum['specials'][$i]:'-' ?></td>

                    @endfor
                </tr>
                <tr>
                    @for ($i = 8; $i < 10; $i++)
                        <td  colspan="2" align="center" style="width: 25%" class="border special_row_result"><?php echo isset($magnum['specials'][$i])?$magnum['specials'][$i]:'-' ?></td>

                    @endfor
                 
                </tr>
                <!--特別獎 END-->
 <!--                安慰獎-->
                <tr><td align="center" class="border_bottom consolation_row" colspan="4">安慰獎</td></tr>
                <tr>
                    @for ($i = 0; $i < 4; $i++)
                        <td align="center" style="width: 25%" class="border special_row_result"><?php echo isset($magnum['consolations'][$i])?$magnum['consolations'][$i]:'-' ?></td>

                    @endfor

                </tr>
                <tr>
                    @for ($i = 4; $i < 8; $i++)
                        <td align="center" style="width: 25%" class="border special_row_result"><?php echo isset($magnum['consolations'][$i])?$magnum['consolations'][$i]:'-' ?></td>

                    @endfor
                </tr>
                <tr>
                    @for ($i = 8; $i < 10; $i++)
                        <td  colspan="2" align="center" style="width: 25%" class="border special_row_result"><?php echo isset($magnum['consolations'][$i])?$magnum['consolations'][$i]:'-' ?></td>

                    @endfor
                 
                </tr>
                <!--特別獎 END-->               
            </tbody>
        </table>
    </div>
<!--  MAGNUM END-->

<!--=======================================-->
 
<!--    TOTO-->
    <div class="col-md-4 result_row">
        <table class="result_table">
            <thead class="result_header" style="background: #FA1100">
                <tr>
                    <td colspan="3"><h3>TOTO 4D</h3></td>
                    <td align="right" rowspan="2">
                        <image class="result_icon" src="{{ URL::asset('assets/images/results/toto.png') }}"/>
                    </td>
                </tr>
                </tr><td  colspan="3"><p>{{ $toto['date']}} ({{ $toto['phase'] }})</p></td></tr>
            </thead>
            <tbody>
                <tr>
                     <td valign="center" class="border_bottom" style="max-width: 20px"><p class="prize_icon">1</p></td>
                    <td  valign="center" class="border_bottom"><p class="prize_title">頭獎</p></td>
                    <td  colspan="2" valign="center" class="border_bottom"><p class="prize_top3">{{ $toto['r1']}}</p></td>
                </tr>
                <tr>
                     <td valign="center" class="border_bottom" style="max-width: 20px"><p class="prize_icon">2</p></td>
                    <td  valign="center" class="border_bottom"><p class="prize_title">二獎</p></td>
                    <td  colspan="2" valign="center" class="border_bottom"><p class="prize_top3">{{ $toto['r2']}}</p></td>
                </tr>
                 <tr>
                     <td valign="center" class="border_bottom" style="max-width: 20px"><p class="prize_icon">3</p></td>
                    <td  valign="center" class="border_bottom"><p class="prize_title">三獎</p></td>
                    <td  colspan="2" valign="center" class="border_bottom"><p class="prize_top3">{{ $toto['r3']}}</p></td>
                </tr>
<!--                特別獎-->
                <tr><td align="center" class="border_bottom special_row" colspan="4">特別獎</td></tr>
                <tr>
                    @for ($i = 0; $i < 4; $i++)
                        <td align="center" style="width: 25%" class="border special_row_result"><?php echo isset($toto['specials'][$i])?$toto['specials'][$i]:'-' ?></td>

                    @endfor

                </tr>
                <tr>
                    @for ($i = 4; $i < 8; $i++)
                        <td align="center" style="width: 25%" class="border special_row_result"><?php echo (isset($toto['specials'][$i]))?$toto['specials'][$i]:'-' ?></td>

                    @endfor
                </tr>
                <tr>
                    @for ($i = 8; $i < 10; $i++)
                        <td  colspan="2" align="center" style="width: 25%" class="border special_row_result"><?php echo isset($toto['specials'][$i])?$toto['specials'][$i]:'-' ?></td>

                    @endfor
                 
                </tr>
                <!--特別獎 END-->
 <!--                安慰獎-->
                <tr><td align="center" class="border_bottom consolation_row" colspan="4">安慰獎</td></tr>
                <tr>
                    @for ($i = 0; $i < 4; $i++)
                        <td align="center" style="width: 25%" class="border special_row_result"><?php echo isset($toto['consolations'][$i])?$toto['consolations'][$i]:'-' ?></td>

                    @endfor

                </tr>
                <tr>
                    @for ($i = 4; $i < 8; $i++)
                        <td align="center" style="width: 25%" class="border special_row_result"><?php echo isset($toto['consolations'][$i])?$toto['consolations'][$i]:'-' ?></td>

                    @endfor
                </tr>
                <tr>
                    @for ($i = 8; $i < 10; $i++)
                        <td  colspan="2" align="center" style="width: 25%" class="border special_row_result"><?php echo isset($toto['consolations'][$i])?$toto['consolations'][$i]:'-' ?></td>

                    @endfor
                 
                </tr>
                <!--特別獎 END-->                
            </tbody>
        </table>
    </div>
<!--  TOTO END-->

</div>
<!--++++++++++++++++++++++++++++++++++++-->
<div class="row">
<!--    Magnum Powerball-->
    <div class="col-md-4 result_row">
        <table class="result_table">
            <thead class="result_header" style="background: #FABB00">
                <tr>
                    <td colspan="3"><h3>Magnum 4D POWERBALL</h3></td>
                    <td align="right" rowspan="2">
                        <image class="result_icon" src="{{ URL::asset('assets/images/results/magnum.png') }}"/>
                    </td>
                </tr>
                </tr><td  colspan="3"><p>{{ $power_ball['date']}} ({{ $power_ball['phase'] }})</p></td></tr>
            </thead>
            <tbody>
            <tr><td align="center" class="border_bottom special_row_result" colspan="4"><?php echo isset($power_ball['specials'][0])?$power_ball['specials'][0]:'-' ?></td></tr>

            <tr><td align="center" class="border_bottom special_row" style="background: #FABB00" colspan="4">特別獎</td></tr>

            <tr><td align="center" class="border_bottom special_row_result" colspan="4"><?php echo isset($power_ball['specials'][1])?$power_ball['specials'][1]:'-' ?></td></tr>

            </tbody>
        </table>
    </div>
<!--  MAGNUM POWERBALL END-->

<!--=======================================-->
<div class="col-md-4 result_row">
    <center>
        <!-- JuicyAds v3.0 -->
        <script async src="//adserver.juicyads.com/js/jads.js"></script>
        <ins id="574540" data-width="250" data-height="262"></ins>
        <script>(adsbyjuicy = window.adsbyjuicy || []).push({'adzone':574540});</script>
        <!--JuicyAds END-->
    </center>
    
</div>
<!--    TOTO 5D-->
    <div class="col-md-4 result_row">
        <table class="result_table">
            <thead class="result_header" style="background: #FA1100">
                <tr>
                    <td colspan="3"><h3>TOTO 5D</h3></td>
                    <td align="right" rowspan="2">
                        <image class="result_icon" src="{{ URL::asset('assets/images/results/toto.png') }}"/>
                    </td>
                </tr>
                </tr><td  colspan="3"><p>{{ $toto_5d['date']}} ({{ $toto_5d['phase'] }})</p></td></tr>
            </thead>
            <tbody>
                <tr>
                    <td align="center" style="width: 20%;background: #fecfcc" class="border special_row_result">頭獎</td>
                    <td align="center" style="width: 30%" class="border special_row_result"><?php echo isset($toto_5d['specials'][0])?$toto_5d['specials'][0]:'-' ?></td>
                    <td align="center" style="width: 20%;background: #fecfcc" class="border special_row_result">四獎</td>
                    <td align="center" style="width: 30%" class="border special_row_result"><?php echo isset($toto_5d['specials'][1])?$toto_5d['specials'][1]:'-' ?></td>
                    </tr> 
                    <tr>
                    <td align="center" style="width: 20%;background: #fecfcc" class="border special_row_result">二獎</td>
                    <td align="center" style="width: 30%" class="border special_row_result"><?php echo isset($toto_5d['specials'][2])?$toto_5d['specials'][2]:'-' ?></td>
                    <td align="center" style="width: 20%;background: #fecfcc" class="border special_row_result">五獎</td>
                    <td align="center" style="width: 30%" class="border special_row_result"><?php echo isset($toto_5d['specials'][3])?$toto_5d['specials'][3]:'-' ?></td>
                     </tr> 
                     <tr>
                    <td align="center" style="width: 20%;background: #fecfcc" class="border special_row_result">三獎</td>
                    <td align="center" style="width: 30%" class="border special_row_result"><?php echo isset($toto_5d['specials'][4])?$toto_5d['specials'][4]:'-' ?></td>
                    <td align="center" style="width: 20%;background: #fecfcc" class="border special_row_result">六獎</td>
                    <td align="center" style="width: 30%" class="border special_row_result"><?php echo isset($toto_5d['specials'][5])?$toto_5d['specials'][5]:'-' ?></td>
                    </tr> 
                </tr>             
            </tbody>
        </table>
    </div>
<!--  TOTO 5D END-->

</div>

<!--++++++++++++++++++++-->

<div class="row">
    <!--    TOTO 6D-->
    <div class="col-md-4 result_row">
        <table class="result_table">
            <thead class="result_header" style="background: #FA1100">
                <tr>
                    <td colspan="4"><h3>TOTO 6D</h3></td>
                    <td align="right" rowspan="2">
                        <image class="result_icon" src="{{ URL::asset('assets/images/results/toto.png') }}"/>
                    </td>
                </tr>
                </tr><td  colspan="4"><p>{{ $toto_6d['date']}} ({{ $toto_6d['phase'] }})</p></td></tr>
            </thead>
            <tbody>
                <tr><td align="center" class="border_bottom special_row_result" colspan="5"><b>{{$toto_6d['r1']}}</b></td></tr>

                <tr>
                    <td align="center" style="background: #fecfcc" class="border special_row_result">二獎</td>
                    <td align="left" colspan="2" class="border-right special_row_result"><?php echo isset($toto_6d['specials'][0])?$toto_6d['specials'][0]:'-' ?></td>
                    <td align="right" colspan="2" class=" special_row_result"><?php echo isset($toto_6d['specials'][1])?$toto_6d['specials'][1]:'-' ?></td>
                </tr> 
                <tr>
                    <td align="center" style="background: #fecfcc" class="border special_row_result">三獎</td>
                      <td align="left" colspan="2" class="border-right special_row_result"><?php echo isset($toto_6d['specials'][2])?$toto_6d['specials'][2]:'-' ?></td>
                    <td align="right" colspan="2" class=" special_row_result"><?php echo isset($toto_6d['specials'][3])?$toto_6d['specials'][3]:'-' ?></td>
                </tr> 
                <tr>
                    <td align="center" style="background: #fecfcc" class="border special_row_result">四獎</td>
                     <td align="left" colspan="2" class="border-right special_row_result"><?php echo isset($toto_6d['specials'][4])?$toto_6d['specials'][4]:'-' ?></td>
                    <td align="right" colspan="2" class=" special_row_result"><?php echo isset($toto_6d['specials'][5])?$toto_6d['specials'][5]:'-' ?></td>
                </tr> 
                <tr>
                    <td align="center" style="background: #fecfcc" class="border special_row_result">五獎</td>
  <td align="left" colspan="2" class="border-right special_row_result"><?php echo isset($toto_6d['specials'][6])?$toto_6d['specials'][6]:'-' ?></td>
                    <td align="right" colspan="2" class=" special_row_result"><?php echo isset($toto_6d['specials'][7])?$toto_6d['specials'][7]:'-' ?></td>
                </tr>                 
                </tr>             
            </tbody>
        </table>
    </div>
<!--  TOTO 6D END-->


  
    <div class="col-md-4 result_row">
          <!--    TOTO 55-->
        <table class="result_table">
            <thead class="result_header" style="background: #FA1100">
                <tr>
                    <td colspan="5"><h3>TOTO 55</h3></td>
                    <td align="right" rowspan="2">
                        <image class="result_icon" src="{{ URL::asset('assets/images/results/toto.png') }}"/>
                    </td>
                </tr>
                </tr><td  colspan="5"><p>{{ $toto_55['date']}} ({{ $toto_55['phase'] }})</p></td></tr>
            </thead>
            <tbody>

            <tr>
                
                 @for ($i = 0; $i < 6; $i++)
                        <td align="center" style="width: 16.66%" class="border_bottom special_row_result"><?php echo (isset($toto_55['specials'][$i]))?$toto_55['specials'][$i]:'-' ?></td>

                    @endfor

            </tr>
            <tr><td align="center" class="special_row_result" colspan="6"><b>{{ $toto_55['prize_1']}}</b></td></tr>

            </tbody>
        </table>
        <!--  TOTO 55 END-->
        
        <!--    TOTO 58-->
        <table class="result_table" style="margin-top: 15px">
            <thead class="result_header" style="background: #FA1100">
                <tr>
                    <td colspan="5"><h3>TOTO 58</h3></td>
                    <td align="right" rowspan="2">
                        <image class="result_icon" src="{{ URL::asset('assets/images/results/toto.png') }}"/>
                    </td>
                </tr>
                </tr><td  colspan="5"><p>{{ $toto_58['date']}} ({{ $toto_58['phase'] }})</p></td></tr>
            </thead>
               <tbody>

            <tr>
                
                 @for ($i = 0; $i < 6; $i++)
                        <td align="center" style="width: 16.66%" class="border_bottom special_row_result"><?php echo (isset($toto_58['specials'][$i]))?$toto_58['specials'][$i]:'-' ?></td>

                    @endfor

            </tr>
            <tr><td align="center" class="special_row_result" colspan="6"><b>{{ $toto_58['prize_1']}}</b></td></tr>

            </tbody>
        </table>
        <!--  TOTO 58 END-->
    </div>
    <div class="col-md-4 result_row">
            <!--    TOTO 63-->
        <table class="result_table">
            <thead class="result_header" style="background: #FA1100">
                <tr>
                    <td colspan="5"><h3>TOTO 63</h3></td>
                    <td align="right" rowspan="2">
                        <image class="result_icon" src="{{ URL::asset('assets/images/results/toto.png') }}"/>
                    </td>
                </tr>
                </tr><td  colspan="5"><p>{{ $toto_63['date']}} ({{ $toto_63['phase'] }})</p></td></tr>
            </thead>
               <tbody>

            <tr>
                
                 @for ($i = 0; $i < 6; $i++)
                        <td align="center" style="width: 16.66%" class="border_bottom special_row_result"><?php echo (isset($toto_63['specials'][$i]))?$toto_63['specials'][$i]:'-' ?></td>

                    @endfor

            </tr>
            <tr><td align="center" class="special_row_result" colspan="6"><b>{{ $toto_63['prize_1']}}</b></td></tr>

            </tbody>
        </table>
        <!--  TOTO 58 END-->
       
        <div style="height:15px"></div>
        <center>
             <!-- JuicyAds v3.0 -->
            <ins id="574542" data-width="158" data-height="180"></ins>
        <script>(adsbyjuicy = window.adsbyjuicy || []).push({'adzone':574542});</script>
        <!--JuicyAds END-->
        </center>

</div>


</div>
<div class="row" style="overflow:hidden">
    <center>
          <!-- JuicyAds v3.0 -->
    <script async src="//adserver.juicyads.com/js/jads.js"></script>

    <ins id="574541" data-width="728" data-height="102"></ins>
    <script>(adsbyjuicy = window.adsbyjuicy || []).push({'adzone':574541});</script>
    <!--JuicyAds END-->
    </center>
  
</div>
<hr>
<center><h2>东马</h2></center>
<div class="row">
<!--    CashSweep-->
    <div class="col-md-4 result_row">
        <table class="result_table">
            <thead class="result_header" style="background: #305700">
                <tr>
                    <td colspan="3"><h3>CashSweep 4D</h3></td>
                    <td align="right" rowspan="2">
                        <image class="result_icon" src="{{ URL::asset('assets/images/results/cashsweep_logo.png') }}"/>
                    </td>
                </tr>
                </tr><td  colspan="3"><p>{{ $cashSweep['date']}} ({{ $cashSweep['phase'] }})</p></td></tr>
            </thead>
           <tbody>
                <tr>
                     <td valign="center" class="border_bottom" style="max-width: 20px"><p class="prize_icon">1</p></td>
                    <td  valign="center" class="border_bottom"><p class="prize_title">頭獎</p></td>
                    <td  colspan="2" valign="center" class="border_bottom"><p class="prize_top3">{{ $cashSweep['r1']}}</p></td>
                </tr>
                <tr>
                     <td valign="center" class="border_bottom" style="max-width: 20px"><p class="prize_icon">2</p></td>
                    <td  valign="center" class="border_bottom"><p class="prize_title">二獎</p></td>
                    <td  colspan="2" valign="center" class="border_bottom"><p class="prize_top3">{{ $cashSweep['r2']}}</p></td>
                </tr>
                 <tr>
                     <td valign="center" class="border_bottom" style="max-width: 20px"><p class="prize_icon">3</p></td>
                    <td  valign="center" class="border_bottom"><p class="prize_title">三獎</p></td>
                    <td  colspan="2" valign="center" class="border_bottom"><p class="prize_top3">{{ $cashSweep['r3']}}</p></td>
                </tr>
<!--                特別獎-->
                <tr><td align="center" class="border_bottom special_row" colspan="4">特別獎</td></tr>
                <tr>
                    @for ($i = 0; $i < 4; $i++)
                        <td align="center" style="width: 25%" class="border special_row_result"><?php echo isset($cashSweep['specials'][$i])?$cashSweep['specials'][$i]:'-' ?></td>

                    @endfor

                </tr>
                <tr>
                    @for ($i = 4; $i < 8; $i++)
                        <td align="center" style="width: 25%" class="border special_row_result"><?php echo (isset($cashSweep['specials'][$i]))?$cashSweep['specials'][$i]:'-' ?></td>

                    @endfor
                </tr>
                <tr>
                    @for ($i = 8; $i < 10; $i++)
                        <td  colspan="2" align="center" style="width: 25%" class="border special_row_result"><?php echo isset($cashSweep['specials'][$i])?$cashSweep['specials'][$i]:'-' ?></td>

                    @endfor
                 
                </tr>
                <!--特別獎 END-->
 <!--                安慰獎-->
                <tr><td align="center" class="border_bottom consolation_row" colspan="4">安慰獎</td></tr>
                <tr>
                    @for ($i = 0; $i < 4; $i++)
                        <td align="center" style="width: 25%" class="border special_row_result"><?php echo isset($cashSweep['consolations'][$i])?$cashSweep['consolations'][$i]:'-' ?></td>

                    @endfor

                </tr>
                <tr>
                    @for ($i = 4; $i < 8; $i++)
                        <td align="center" style="width: 25%" class="border special_row_result"><?php echo isset($cashSweep['consolations'][$i])?$cashSweep['consolations'][$i]:'-' ?></td>

                    @endfor
                </tr>
                <tr>
                    @for ($i = 8; $i < 10; $i++)
                        <td  colspan="2" align="center" style="width: 25%" class="border special_row_result"><?php echo isset($cashSweep['consolations'][$i])?$cashSweep['consolations'][$i]:'-' ?></td>

                    @endfor
                 
                </tr>
                <!--特別獎 END-->                
            </tbody>
        </table>
    </div>
<!--  CashSweep END-->

<!--=======================================-->
 
<!--    Sandakan-->
    <div class="col-md-4 result_row">
        <table class="result_table">
            <thead class="result_header" style="background: #29AB2B">
                <tr>
                    <td colspan="3"><h3>Sandakan STC 4D</h3></td>
                    <td align="right" rowspan="2">
                        <image class="result_icon" src="{{ URL::asset('assets/images/results/damacai.png') }}"/>
                    </td>
                </tr>
                </tr><td  colspan="3"><p>{{ $sandakan['date']}} ({{ $sandakan['phase'] }})</p></td></tr>
            </thead>
            <tbody>
                <tr>
                     <td valign="center" class="border_bottom" style="max-width: 20px"><p class="prize_icon">1</p></td>
                    <td  valign="center" class="border_bottom"><p class="prize_title">頭獎</p></td>
                    <td  colspan="2" valign="center" class="border_bottom"><p class="prize_top3">{{ $sandakan['r1']}}</p></td>
                </tr>
                <tr>
                     <td valign="center" class="border_bottom" style="max-width: 20px"><p class="prize_icon">2</p></td>
                    <td  valign="center" class="border_bottom"><p class="prize_title">二獎</p></td>
                    <td  colspan="2" valign="center" class="border_bottom"><p class="prize_top3">{{ $sandakan['r2']}}</p></td>
                </tr>
                 <tr>
                     <td valign="center" class="border_bottom" style="max-width: 20px"><p class="prize_icon">3</p></td>
                    <td  valign="center" class="border_bottom"><p class="prize_title">三獎</p></td>
                    <td  colspan="2" valign="center" class="border_bottom"><p class="prize_top3">{{ $sandakan['r3']}}</p></td>
                </tr>
<!--                特別獎-->
                <tr><td align="center" class="border_bottom special_row" colspan="4">特別獎</td></tr>
                <tr>
                    @for ($i = 0; $i < 4; $i++)
                        <td align="center" style="width: 25%" class="border special_row_result"><?php echo isset($sandakan['specials'][$i])?$sandakan['specials'][$i]:'-' ?></td>

                    @endfor

                </tr>
                <tr>
                    @for ($i = 4; $i < 8; $i++)
                        <td align="center" style="width: 25%" class="border special_row_result"><?php echo (isset($sandakan['specials'][$i]))?$sandakan['specials'][$i]:'-' ?></td>

                    @endfor
                </tr>
                <tr>
                    @for ($i = 8; $i < 10; $i++)
                        <td  colspan="2" align="center" style="width: 25%" class="border special_row_result"><?php echo isset($sandakan['specials'][$i])?$sandakan['specials'][$i]:'-' ?></td>

                    @endfor
                 
                </tr>
                <!--特別獎 END-->
 <!--                安慰獎-->
                <tr><td align="center" class="border_bottom consolation_row" colspan="4">安慰獎</td></tr>
                <tr>
                    @for ($i = 0; $i < 4; $i++)
                        <td align="center" style="width: 25%" class="border special_row_result"><?php echo isset($sandakan['consolations'][$i])?$sandakan['consolations'][$i]:'-' ?></td>

                    @endfor

                </tr>
                <tr>
                    @for ($i = 4; $i < 8; $i++)
                        <td align="center" style="width: 25%" class="border special_row_result"><?php echo isset($sandakan['consolations'][$i])?$sandakan['consolations'][$i]:'-' ?></td>

                    @endfor
                </tr>
                <tr>
                    @for ($i = 8; $i < 10; $i++)
                        <td  colspan="2" align="center" style="width: 25%" class="border special_row_result"><?php echo isset($sandakan['consolations'][$i])?$sandakan['consolations'][$i]:'-' ?></td>

                    @endfor
                 
                </tr>
                <!--特別獎 END-->                
            </tbody>
        </table>
    </div>
<!--  Sandakan END-->

<!--=======================================-->
 
<!--    Lotto88-->
    <div class="col-md-4 result_row">
        <table class="result_table">
            <thead class="result_header" style="background: #e29288">
                <tr>
                    <td colspan="3"><h3>Sabah Lotto88 4D</h3></td>
                    <td align="right" rowspan="2">
                        <image class="result_icon" src="{{ URL::asset('assets/images/results/lotto_logo.png') }}"/>
                    </td>
                </tr>
                </tr><td  colspan="3"><p>{{ $lotto['date']}} ({{ $lotto['phase'] }})</p></td></tr>
            </thead>
            <tbody>
                <tr>
                     <td valign="center" class="border_bottom" style="max-width: 20px"><p class="prize_icon">1</p></td>
                    <td  valign="center" class="border_bottom"><p class="prize_title">頭獎</p></td>
                    <td  colspan="2" valign="center" class="border_bottom"><p class="prize_top3">{{ $lotto['r1']}}</p></td>
                </tr>
                <tr>
                     <td valign="center" class="border_bottom" style="max-width: 20px"><p class="prize_icon">2</p></td>
                    <td  valign="center" class="border_bottom"><p class="prize_title">二獎</p></td>
                    <td  colspan="2" valign="center" class="border_bottom"><p class="prize_top3">{{ $lotto['r2']}}</p></td>
                </tr>
                 <tr>
                     <td valign="center" class="border_bottom" style="max-width: 20px"><p class="prize_icon">3</p></td>
                    <td  valign="center" class="border_bottom"><p class="prize_title">三獎</p></td>
                    <td  colspan="2" valign="center" class="border_bottom"><p class="prize_top3">{{ $lotto['r3']}}</p></td>
                </tr>
<!--                特別獎-->
                <tr><td align="center" class="border_bottom special_row" colspan="4">特別獎</td></tr>
                <tr>
                    @for ($i = 0; $i < 4; $i++)
                        <td align="center" style="width: 25%" class="border special_row_result"><?php echo isset($lotto['specials'][$i])?$lotto['specials'][$i]:'-' ?></td>

                    @endfor

                </tr>
                <tr>
                    @for ($i = 4; $i < 8; $i++)
                        <td align="center" style="width: 25%" class="border special_row_result"><?php echo (isset($lotto['specials'][$i]))?$lotto['specials'][$i]:'-' ?></td>

                    @endfor
                </tr>
                <tr>
                    @for ($i = 8; $i < 10; $i++)
                        <td  colspan="2" align="center" style="width: 25%" class="border special_row_result"><?php echo isset($lotto['specials'][$i])?$lotto['specials'][$i]:'-' ?></td>

                    @endfor
                 
                </tr>
                <!--特別獎 END-->
 <!--                安慰獎-->
                <tr><td align="center" class="border_bottom consolation_row" colspan="4">安慰獎</td></tr>
                <tr>
                    @for ($i = 0; $i < 4; $i++)
                        <td align="center" style="width: 25%" class="border special_row_result"><?php echo isset($lotto['consolations'][$i])?$lotto['consolations'][$i]:'-' ?></td>

                    @endfor

                </tr>
                <tr>
                    @for ($i = 4; $i < 8; $i++)
                        <td align="center" style="width: 25%" class="border special_row_result"><?php echo isset($lotto['consolations'][$i])?$lotto['consolations'][$i]:'-' ?></td>

                    @endfor
                </tr>
                <tr>
                    @for ($i = 8; $i < 10; $i++)
                        <td  colspan="2" align="center" style="width: 25%" class="border special_row_result"><?php echo isset($lotto['consolations'][$i])?$lotto['consolations'][$i]:'-' ?></td>

                    @endfor
                 
                </tr>
                <!--特別獎 END-->                
            </tbody>
        </table>
    </div>
<!--  Lotto88 END-->

</div>

<div class="row">
    
<!--=======================================-->
 
<!--    Lotto88 6/45-->
    <div class="col-md-4 result_row">
        <table class="result_table">
            <thead class="result_header" style="background: #e29288">
                <tr>
                    <td colspan="5"><h3>Sabah Lotto88 6/45</h3></td>
                    <td align="right" rowspan="2">
                        <image class="result_icon" src="{{ URL::asset('assets/images/results/lotto_logo.png') }}"/>
                    </td>
                </tr>
                </tr><td  colspan="5"><p>{{ $lotto_645['date']}} ({{ $lotto_645['phase'] }})</p></td></tr>
            </thead>
            <tbody>
            <tr>
                   @for ($i = 0; $i < 6; $i++)
                        <td align="center" style="width: 16.66%" class="border_bottom special_row_result"><?php echo isset($lotto_645['specials'][$i])?$lotto_645['specials'][$i]:'-' ?></td>

                    @endfor
               
            </tr>
            <tr><td align="center" class="special_row_result" colspan="6"><b>{{ $lotto_645['prize_1']}}</b></td></tr>
            <tr><td align="center" class="special_row_result" colspan="6"><b>{{ $lotto_645['prize_2']}}</b></td></tr>

            </tbody>
        </table>
</div>
<!--Lotto 88 6/45 END-->
<div class="col-md-4 result_row">
    <center>
        <!-- JuicyAds v3.0 -->
        <script async src="//adserver.juicyads.com/js/jads.js"></script>
        <ins id="574544" data-width="125" data-height="137"></ins>
        <script>(adsbyjuicy = window.adsbyjuicy || []).push({'adzone':574544});</script>
        <!--JuicyAds END-->
    </center>
    
</div>
<!--    Lotto88 3D-->
    <div class="col-md-4 result_row">
        <table class="result_table">
            <thead class="result_header" style="background: #e29288">
                <tr>
                    <td colspan="3"><h3>Sabah Lotto88 3D</h3></td>
                    <td align="right" rowspan="2">
                        <image class="result_icon" src="{{ URL::asset('assets/images/results/lotto_logo.png') }}"/>
                    </td>
                </tr>
                </tr><td  colspan="3"><p>{{ $lotto_3d['date']}} ({{ $lotto_3d['phase'] }})</p></td></tr>
            </thead>
            <tbody>
                <tr>
                     <td valign="center" class="border_bottom" style="max-width: 20px"><p class="prize_icon">1</p></td>
                    <td  valign="center" class="border_bottom"><p class="prize_title">頭獎</p></td>
                    <td  colspan="2" valign="center" class="border_bottom"><p class="prize_top3">{{ $lotto_3d['r1']}}</p></td>
                </tr>
                <tr>
                     <td valign="center" class="border_bottom" style="max-width: 20px"><p class="prize_icon">2</p></td>
                    <td  valign="center" class="border_bottom"><p class="prize_title">二獎</p></td>
                    <td  colspan="2" valign="center" class="border_bottom"><p class="prize_top3">{{ $lotto_3d['r2']}}</p></td>
                </tr>
                 <tr>
                     <td valign="center" class="border_bottom" style="max-width: 20px"><p class="prize_icon">3</p></td>
                    <td  valign="center" class="border_bottom"><p class="prize_title">三獎</p></td>
                    <td  colspan="2" valign="center" class="border_bottom"><p class="prize_top3">{{ $lotto_3d['r3']}}</p></td>
                </tr>
            </tbody>
        </table>
    </div>        
</div>



<!--+++++++++++++++++++++++++++-->

<hr>
<center><h2>新加坡</h2></center>
<div class="row">
<!--    Singapore-->
    <div class="col-md-4 result_row">
        <table class="result_table">
            <thead class="result_header" style="background: #4aa6e3">
                <tr>
                    <td colspan="3"><h3>Singapore 4D</h3></td>
                    <td align="right" rowspan="2">
                        <image class="result_icon" src="{{ URL::asset('assets/images/results/sg_logo.png') }}"/>
                    </td>
                </tr>
                </tr><td  colspan="3"><p>{{ $sg4d['date']}} ({{ $sg4d['phase'] }})</p></td></tr>
            </thead>
           <tbody>
                <tr>
                     <td valign="center" class="border_bottom" style="max-width: 20px"><p class="prize_icon">1</p></td>
                    <td  valign="center" class="border_bottom"><p class="prize_title">頭獎</p></td>
                    <td  colspan="2" valign="center" class="border_bottom"><p class="prize_top3">{{ $sg4d['r1']}}</p></td>
                </tr>
                <tr>
                     <td valign="center" class="border_bottom" style="max-width: 20px"><p class="prize_icon">2</p></td>
                    <td  valign="center" class="border_bottom"><p class="prize_title">二獎</p></td>
                    <td  colspan="2" valign="center" class="border_bottom"><p class="prize_top3">{{ $sg4d['r2']}}</p></td>
                </tr>
                 <tr>
                     <td valign="center" class="border_bottom" style="max-width: 20px"><p class="prize_icon">3</p></td>
                    <td  valign="center" class="border_bottom"><p class="prize_title">三獎</p></td>
                    <td  colspan="2" valign="center" class="border_bottom"><p class="prize_top3">{{ $sg4d['r3']}}</p></td>
                </tr>
<!--                特別獎-->
                <tr><td align="center" class="border_bottom special_row" colspan="4">特別獎</td></tr>
                <tr>
                    @for ($i = 0; $i < 4; $i++)
                        <td align="center" style="width: 25%" class="border special_row_result"><?php echo isset($sg4d['specials'][$i])?$sg4d['specials'][$i]:'-' ?></td>

                    @endfor

                </tr>
                <tr>
                    @for ($i = 4; $i < 8; $i++)
                        <td align="center" style="width: 25%" class="border special_row_result"><?php echo (isset($sg4d['specials'][$i]))?$sg4d['specials'][$i]:'-' ?></td>

                    @endfor
                </tr>
                <tr>
                    @for ($i = 8; $i < 10; $i++)
                        <td  colspan="2" align="center" style="width: 25%" class="border special_row_result"><?php echo isset($sg4d['specials'][$i])?$sg4d['specials'][$i]:'-' ?></td>

                    @endfor
                 
                </tr>
                <!--特別獎 END-->
 <!--                安慰獎-->
                <tr><td align="center" class="border_bottom consolation_row" colspan="4">安慰獎</td></tr>
                <tr>
                    @for ($i = 0; $i < 4; $i++)
                        <td align="center" style="width: 25%" class="border special_row_result"><?php echo isset($sg4d['consolations'][$i])?$sg4d['consolations'][$i]:'-' ?></td>

                    @endfor

                </tr>
                <tr>
                    @for ($i = 4; $i < 8; $i++)
                        <td align="center" style="width: 25%" class="border special_row_result"><?php echo isset($sg4d['consolations'][$i])?$sg4d['consolations'][$i]:'-' ?></td>

                    @endfor
                </tr>
                <tr>
                    @for ($i = 8; $i < 10; $i++)
                        <td  colspan="2" align="center" style="width: 25%" class="border special_row_result"><?php echo isset($sg4d['consolations'][$i])?$sg4d['consolations'][$i]:'-' ?></td>

                    @endfor
                 
                </tr>
                <!--特別獎 END-->                
            </tbody>
        </table>
    </div>
<!--  Singapore END-->

<!--=======================================-->
 
<!--    Singapore 6/45 -->
    <div class="col-md-4 result_row">
             <table class="result_table">
            <thead class="result_header" style="background: #4aa6e3">
                <tr>
                    <td colspan="6"><h3>Singapore 6/45</h3></td>
                    <td align="right" rowspan="2">
                        <image class="result_icon" src="{{ URL::asset('assets/images/results/sg_logo.png') }}"/>
                    </td>
                </tr>
                </tr><td  colspan="6"><p>{{ $sg645['date']}} ({{ $sg645['phase'] }})</p></td></tr>
            </thead>
            <tbody>

            <tr>
                <tr>
                   @for ($i = 0; $i < 6; $i++)
                        <td align="center" style="width: 14.22%" class="border_bottom special_row_result"><?php echo isset($sg645['specials'][$i])?$sg645['specials'][$i]:'-' ?></td>

                    @endfor
                <td align="center" style="width: 14.22%;background:#a4d2f1"  class="border_bottom special_row_result"><?php echo isset($sg645['specials'][6])?$sg645['specials'][6]:'-' ?></td>

            </tr>
               
            <tr><td align="center" class="special_row_result" colspan="6"><b>{{ $sg645['prize_1']}}</b></td></tr>

            </tbody>
        </table>
    </div>
<!--  Singapore 6/45 END-->

<!--=======================================-->
 

    <div class="col-md-4 result_row">
        <center>
             <!-- JuicyAds v3.0 -->
            <script async src="//adserver.juicyads.com/js/jads.js"></script>
            <ins id="574545" data-width="160" data-height="612"></ins>
            <script>(adsbyjuicy = window.adsbyjuicy || []).push({'adzone':574545});</script>
            <!--JuicyAds END-->
        </center>
   
    </div>


</div>