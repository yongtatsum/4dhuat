

<div class="row">

    <div class="col-xs-12 col-md-6 col-md-offset-3" style="background: white;padding: 15px">
     
      <center>
           <h3>大伯公千字图</h3>
           
           <form method="get" action="{{ URL::route('tbg') }}" class="form-inline">
            <div class="form-group">
              <input type="text" class="form-control" id="keyword"name="keyword" placeholder="輸入您的號碼或關鍵詞">
            </div>
            <button type="submit" class="btn btn-default">查找</button>
          </form>
           @if($keyword!="")
           <div class="row" style="margin-top: 15px;margin-bottom: 15px">
                <a href="{{ URL::route('tbg') }}" class="btn btn-primary btn-lg" role="button">返回</a>

           </div>
            @endIf
            
        {{ $tbgs->links() }}
        <?php $index=0; ?>
            @foreach ($tbgs as $tbg)
            <?php $index++; ?>
            @if($index%4==0)
            <div class="row">
            @endIf
                <div class="col-md-3 col-xs-6" style="padding-right: 5px;padding-left: 5px; ">
                    <center>
                         <div style="border:1px solid #efefef">
                       <image src="/files/tgb/{{$tbg['id']}}/{{$tbg['image']}}" style="width: 100%;height:auto"/>
                        <h3 style="color:#0F5CA7">{{$tbg['number']}}</h3>
                        <h5>{{$tbg['name']}}</h5>
                        <h5>{{$tbg['name_cn']}}</h5>  
                    </div>
                    </center>
                   
                   
               </div>
            
            @if($index%4==0)
           </div>
            @endIf
            
            @if($index%16==0)
                <ins class="adsbygoogle"
                    style="display:block"
                    data-ad-format="fluid"
                    data-ad-layout-key="-dd-u+64-5l-7g"
                    data-ad-client="ca-pub-3166030118349880"
                    data-ad-slot="8644933473"></ins>
               <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
               </script>
            @endIf
            
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

            
            @endforeach

         {{ $tbgs->links() }}
       
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
