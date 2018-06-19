

<div class="row">

    <div class="col-xs-12 col-md-6 col-md-offset-3" style="">
      <h3>以往开彩成绩</h3>
       {{ $dates->links() }}
       
            @foreach ($dates as $date)
                <div class="row border_bottom " style="padding:10px 10px 10px 20px;background: white">
                    <a href="{{ URL::route('home',array('date_id'=>$date->id)) }}"><h5>{{ $date->date }} ({{ $date->day }})</h5></a> 
               </div>
            @endforeach

         {{ $dates->links() }}
       
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
</div>

