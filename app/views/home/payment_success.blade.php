

<div class="row">

    <div class="col-xs-12 col-md-6 col-md-offset-3" style="background: white;padding: 15px">
     
      <center>
          <h2>謝謝您的打賞!!</h2>
           <h3>Thank you for your donation !!</h3>
           <p>您的打賞是我们作得更好的动力。</p>
  @if(isset($bid_number_array))
           <div class="alert alert-success" role="alert">您的号码： <br>
              
            @foreach ($bid_number_array as $bid_number)
                      [{{$bid_number['number']}}] 
                @endforeach
                
           </div>
  @endIf
  <a class="btn btn-default" href="{{ URL::route('tips') }}" role="button">返回 打赏 页面</a>
      </center>
      
    </div>

