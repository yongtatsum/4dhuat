

<div class="row">

    <div class="col-xs-12 col-md-6 col-md-offset-3" style="background: white;padding-bottom: 25px">
     
      <center>
           <h3>您今天的神字</h3>
           <form method="get" action="{{ URL::route('myNumber')}}">
            <input type="text" name="number" value="{{ $number }}" style=" font-size:24px;text-align: center"/>
              <br/>
            <button type="submit" class="btn btn-default" style="margin-top: 20px">查找</button>
           </form>
         <br/>
           <a href="{{ URL::route('myNumber')}}" class="btn btn-primary btn-lg" style="margin-top: 20px"role="button">刷新</a>

           <hr>
           <h3>數字分析</h3>
           <h3>- 從 2016-01-01 開始計算-</h3>
           <hr>
           <table style="width: 60%">
               <tr class="border_bottom">
                   <td><h3 class="prize_icon">1</h3></td>
                   <td><h3>頭獎</h3></td>
                   <td align="right"><h3>x {{sizeOf($first_prizes)}}</h3></td>
               </tr>
               
                   @foreach ($first_prizes as $first_prize)
                        <tr style="background: #efefef">
                            <td></td>
                            <td colspan="2">
                         {{$first_prize['title']}} ({{$first_prize['date']}}) 
                            </td>

                        </tr>
                @endforeach
                
                
               <tr class="border_bottom">
                   <td><h3 class="prize_icon">2</h3></td>
                   <td><h3>二獎</h3></td>
                   <td align="right"><h3>x {{sizeOf($second_prizes)}}</h3></td>
               </tr>
               @foreach ($second_prizes as $second_prize)
                        <tr style="background: #efefef">
                            <td></td>
                            <td colspan="2">
                         {{$second_prize['title']}} ({{$second_prize['date']}}) 
                            </td>

                        </tr>
                @endforeach
                
               <tr class="border_bottom">
                   <td><h3 class="prize_icon">3</h3></td>
                   <td><h3>三獎</h3></td>
                   <td align="right"><h3>x {{sizeOf($third_prizes)}}</h3></td>
               </tr>
               
                @foreach ($third_prizes as $third_prize)
                        <tr style="background: #efefef">
                            <td></td>
                            <td colspan="2">
                         {{$third_prize['title']}} ({{$third_prize['date']}}) 
                            </td>

                        </tr>
                @endforeach
               
               <tr class="border_bottom">
                   <td><h3 class="prize_icon">S</h3></td>
                   <td><h3>特別獎</h3></td>
                   <td align="right"><h3>x {{sizeOf($special_prizes)}}</h3></td>
               </tr>
               
                @foreach ($special_prizes as $special_prize)
                        <tr style="background: #efefef">
                            <td></td>
                            <td colspan="2">
                         {{$special_prize['title']}} ({{$special_prize['date']}}) 
                            </td>

                        </tr>
                @endforeach       
                <tr class="border_bottom">
                   <td><h3 class="prize_icon">C</h3></td>
                   <td><h3>安慰獎</h3></td>
                   <td align="right"><h3>x {{sizeOf($con_prizes)}}</h3></td>
               </tr>
               
                @foreach ($con_prizes as $con_prize)
                        <tr style="background: #efefef">
                            <td></td>
                            <td colspan="2">
                         {{$con_prize['title']}} ({{$con_prize['date']}}) 
                            </td>

                        </tr>
                @endforeach   
           </table>
      </center>
      
    </div>
    <div class="col-xs-6 col-md-3"> 
      <center>
             <!-- JuicyAds v3.0 -->
            <script async src="//adserver.juicyads.com/js/jads.js"></script>
            <ins id="574545" data-width="160" data-height="612"></ins>
            <script>(adsbyjuicy = window.adsbyjuicy || []).push({'adzone':574545});</script>
            <!--JuicyAds END-->
            
             <!-- JuicyAds v3.0 -->
                <script async src="//adserver.juicyads.com/js/jads.js"></script>
                <ins id="574544" data-width="125" data-height="137"></ins>
                <script>(adsbyjuicy = window.adsbyjuicy || []).push({'adzone':574544});</script>
                <!--JuicyAds END-->
                          <!-- JuicyAds v3.0 -->
                <script async src="//adserver.juicyads.com/js/jads.js"></script>

                <ins id="574541" data-width="728" data-height="102"></ins>
                <script>(adsbyjuicy = window.adsbyjuicy || []).push({'adzone':574541});</script>
                <!--JuicyAds END-->
                 <script async src="//adserver.juicyads.com/js/jads.js"></script>
        <ins id="574540" data-width="250" data-height="262"></ins>
        <script>(adsbyjuicy = window.adsbyjuicy || []).push({'adzone':574540});</script>
        <!--JuicyAds END-->
        </center>
  
  
  </div>
