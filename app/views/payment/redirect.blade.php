<!DOCTYPE html>
<html>
    <head>
        <title>{{ Lang::get('label.Payment') }}...</title>
    </head>
    <body>
        <h1>{{ Lang::get('label.process_payment') }}...</h1>
        {{ Form::open(array('id' => 'frm-submit', 'method' => 'post', 'url' => $ipay88_url)) }}
            <p>{{ Lang::get('label.payment_redirect_msg') }}</p>
            {{ Form::button(Lang::get('label.RETRY'), array(
                'type' => Lang::get('label.Submit'),
            )) }}
            @foreach ($data as $key => $param)
                {{ Form::hidden($key, $param) }}
            @endforeach
        {{ Form::close() }}
        <script type="text/javascript">
            setTimeout(function() {
                document.getElementById('frm-submit').submit();
            }, 100);
        </script>
    </body>
</html>
